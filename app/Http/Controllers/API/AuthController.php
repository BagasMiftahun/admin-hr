<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Mail\{ResetPassword, EmailConfirmation};
use App\Models\{User,PasswordReset,Fcm};

class AuthController extends Controller
{
    public function register(Request $request){
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required',
            'confirm_password' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan cek kembali inputan anda',
                'data' => $validator->errors()
            ], 400);
        }
        else{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            // Kirim verifikasi akun
            if($user){
                $token = Str::random(64);
                Mail::to($request->email)->send(new EmailConfirmation($token));
                User::whereId($user->id)->update([
                    'remember_token' => $token
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Berhasil registrasi'
            ], 200);
        }
    }


    public function auth(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan cek kembali inputan anda',
                'data' => $validator->errors()
            ], 400);
        }
        else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = Auth::user();
                if($user->email_verified_at == null){
                    return response()->json([
                        'status' => false,
                        'message' => 'Email belum diverifikasi'
                    ], 200);
                }
                else{
                    $token =  $user->createToken('nApp')->accessToken;
                    return response()->json([
                        'status' => true,
                        'message' => 'Anda berhasil login',
                        'token' => $token,
                        'data' => $user
                    ], 200);
                }
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Email atau Password anda salah',
                ], 401);
            }
        }
    }

    public function detail(){
        $user = User::whereId(Auth()->user()->id)->first();
        if($user->photo != null){
            $user->photo = url('upload/users/'.str_replace('\\', '/', $user->photo));
        }
        return response()->json([
            'success' => true,
            'message' => 'Detail user',
            'data' => $user
        ], 200);
    }

    public function update(Request $request){
        if($request->hasFile('photo')){
            $file =$request->file('photo');
            $extention = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extention;
            $file->move('upload/users',$filename);

            if($request->name == null && $request->phone != null){
                $arr = [
                    'phone' => $request->phone,
                    'photo' => $filename
                ];
            }
            else if($request->phone == null && $request->name != null){
                $arr = [
                    'name' => $request->name,
                    'photo' => $filename
                ];
            }
            else if($request->phone == null && $request->name == null){
                $arr = [
                    'photo' => $filename
                ];
            }
            else{
                $arr = [
                    'phone' => $request->phone,
                    'name' => $request->name,
                    'photo' => $filename
                ];
            }
        }
        else{
            if($request->name == null){
                $arr = [
                    'phone' => $request->phone,
                ];
            }
            else if($request->phone == null){
                $arr = [
                    'name' => $request->name,
                ];
            }
            else{
                $arr = [
                    'phone' => $request->phone,
                    'name' => $request->name,
                ];
            }
        }
        $user = User::whereId(auth()->user()->id)->update($arr);
        return response()->json([
            'success' => true,
            'message' => 'Berhasil ubah user'
        ], 200);
    }

    public function updateFcm(Request $request){
        User::whereId(auth()->user()->id)->update([
            'fcm_token' => $request->fcm_token
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Token fcm berhasil diperbarui'
        ], 200);
    }

    public function reset(Request $request){
        $rules = [
            'email' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Silahkan cek kembali inputan anda',
                'data' => $validator->errors()
            ], 400);
        }
        else{
            $user = User::where('email', $request->email)->first();
            if(!empty($user)){
                $token = Str::random(64);
                $reset = PasswordReset::create([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => now()
                ]);
                Mail::to($request->email)->send(new ResetPassword($token));
                if($reset){
                    return response()->json([
                        'success' => true,
                        'message' => 'Silahkan cek email anda',
                    ], 200);
                }
                else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Permintaan reset password gagal',
                    ], 400);
                }
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Email tidak ditemukan',
                ], 400);
            }
        }
    }

    public function logout()
    {
        DB::table('oauth_access_tokens')
        ->where('user_id', Auth::user()->id)
        ->update([
            'revoked' => true
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil'
        ], 200);
    }
}

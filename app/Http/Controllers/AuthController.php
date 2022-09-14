<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    public function index(){
        return view('login.index',[
            'title'=>'Login'
        ]);
    }

    public function forgot($token){
        return view('login.forgot');
    }

    public function auth(Request $request){
        $email = $request->email;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            Log::create([
                'user_id' => auth()->user()->id
            ]);
            return redirect('/');
        }
        else{
            return redirect('/login')->with('email', $email);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function resetAction(Request $request, $token){
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $reset = PasswordReset::where('token', $token)->first();
        User::where('email', $reset->email)->update([
            'password' => Hash::make($request->password)
        ]);
        Alert::success('Success','Password berhasil diperbarui!');
        return back();
    }

    public function confirm($token){
        User::where('remember_token', $token)->update([
            'email_verified_at' => Carbon::now()->toDateTimeString()
        ]);

        return view('login.success');
    }
}


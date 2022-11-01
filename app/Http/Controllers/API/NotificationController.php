<?php

namespace App\Http\Controllers\API;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function get(){
        $notif = Notification::where('user_id', null)->orderBy('created_at', 'desc')->get();
        foreach($notif as $data){
            $data->date = date('Y-m-d', strtotime($data->created_at));
        }
        return response()->json($notif, 200);
    }

    public function getAuth(){
        $notif = Notification::where('user_id', auth()->user()->id)->orWhereNull('user_id')->orderBy('created_at', 'desc')->get();
        foreach($notif as $data){
            $data->date = date('Y-m-d', strtotime($data->created_at));
        }
        return response()->json($notif, 200);
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'value' => 'required'
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
            $image = $request->file('icon');
            $image->storeAs('public/notifications', $image->hashName());
            $notif = Notification::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'value' => $request->value
            ]);
            if($notif){
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil menambahkan notifikasi',
                ], 200);
            }
            else{
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal menambahkan notifikasi',
                ], 401);
            }
        }
    }

    public function count(){
        $notif = Notification::where('user_id', null)->where('read', '0')->get();
        $data = [
            'status' => $notif->count() > 0 ? true : false,
            'count' => $notif->count()
        ];
        return response()->json($data, 200);
    }

    public function authCount(){
        $notif = Notification::where(['user_id' => auth()->user()->id, 'read' => '0'])->orWhereNull('user_id')->get();
        $data = [
            'status' => $notif->count() > 0 ? true : false,
            'count' => $notif->count()
        ];
        return response()->json($data, 200);
    }

    public function update($id){
        Notification::whereId($id)->update([
            'read' => '1'
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil update notifikasi',
        ], 200);
    }
}

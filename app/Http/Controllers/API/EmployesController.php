<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\{EmployesCategory,Employes};
use App\Http\Controllers\Controller;

class EmployesController extends Controller
{
    public function store(Request $request){

        Employes::create([
            'name' => $request->name,
            'categori_id' => $request->categori_id,
            'salary'=> $request->salary,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditambahkan'
        ], 200);
    }



    public function storeCategory(Request $request){
        EmployesCategory::create([
            'name' => $request->name
        ]);

        return response()->json([
            'status' => 'true',
            'message' => 'Kategori berhasil ditambahkan'
        ], 200);
    }

    public function getCategory(){
        $category = EmployesCategory::all();

        return response()->json([
            'status' => true,
            'message' => 'Data kategori employes',
            'data' => $category
        ], 200);
    }


    public function search(Request $request){
        $employes = Employes::where('name', 'LIKE', "%$request->keyword%")->paginate(10);
        return response()->json($employes, 200);
    }

    // public function get(){
    //     $lessons = Lessons::orderBy('created_at', 'desc')->paginate(10);
    //     foreach($lessons as $lesson){
    //         $lesson->image = url('upload/lessons/'.str_replace('\\', '/', $lesson->image));
    //         $parts = Part::where('lesson_id', $lesson->id)->get();
    //         $read = 0;
    //         foreach($parts as $part){
    //             $check = PartRead::where(['part_id' => $part->id, 'user_id' => auth()->user()->id])->get();
    //             if($check->count() > 0){
    //                 $read+=1;
    //             }
    //         }
    //         $lesson->part = $parts->count();
    //         $lesson->part_read = $read;
    //     }
    //     return response()->json($lessons, 200);
    // }
    // public function show($id){
    //     $employe = Employes::whereId($id)->first();
    //     $lesson->image = url('upload/lessons/'.str_replace('\\', '/', $lesson->image));
    //     $lesson->creator = json_decode($lesson->creator);
    //     $lesson->creator->photo = url('upload/creators/'.str_replace('\\', '/', $lesson->creator->photo));
    //     $nextPart = Part::where('lesson_id', $lesson->id)->orderBy('part', 'asc')->first();
    //     foreach($lesson->part as $part){
    //         $part->document = url('upload/documents/'.str_replace('\\', '/', $part->document));
    //     }
    //     $save = LessonSave::where(['lesson_id' => $lesson->id, 'user_id' => auth()->user()->id])->first();
    //     if(!empty($save)){
    //         $lesson->saved = true;
    //     }
    //     else{
    //         $lesson->saved = false;
    //     }
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Detail Materi',
    //         'data' => $lesson,
    //         'part_url' => isset($nextPart) ? url('api/lessons/parts/'.$nextPart->id) : null
    //     ], 200);
    // }

    // public function save($id){
    //     EmployesSave::create([
    //         'employes_id' => $id,
    //         'user_id' => auth()->user()->id
    //     ]);

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Employes berhasil disimpan'
    //     ], 200);
    // }

    // public function unsave($id){
    //     LessonSave::where(['lesson_id' => $id, 'user_id' => auth()->user()->id])->delete();

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Materi berhasil dihapus dari materi disimpan'
    //     ], 200);
    // }

    // public function saved(){
    //     $lessons = Lessons::orderBy('created_at', 'desc')->whereHas('simpan', function($q){
    //         $q->where('user_id', auth()->user()->id);
    //     })->paginate(10);
    //     foreach($lessons as $lesson){
    //         $lesson->image = url('upload/lessons/'.str_replace('\\', '/', $lesson->image));
    //     }

    //     return response()->json($lessons, 200);
    // }
}


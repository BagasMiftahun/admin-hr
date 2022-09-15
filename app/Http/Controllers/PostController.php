<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = Post::latest()->paginate(5);

        //render view with posts
        return view('posts.index', compact('posts'));
    }
    

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|min:10',
            'phone'    => 'required|min:5',
            'slip_gaji' => 'required'
        ]);

        //create post
        Post::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'slip_gaji'  => $request->slip_gaji
        ]);

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

     /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //validate 
        $this->validate($request, [
            'name'     => 'required|min:3',
            'email'    => 'required|min:10',
            'phone'    => 'required|min:5',
            'slip_gaji' => 'required|min:3'
        ]);

        {

            //update post without image
            $post->update([
                'name'      => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'slip_gaji'  => $request->slip_gaji

            ]);
        }

        //redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Post $post)
    {
        //delete post
        $post->delete();

        //redirect to index
        return redirect()->route('posts.index')->with(['succes' => 'Data Berhasil Dihapus!']);
    }

}

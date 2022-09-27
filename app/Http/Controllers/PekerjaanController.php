<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PekerjaanController extends Controller
{
    //
    public function index()
    {
        $pekerjaans = Pekerjaan::latest()->paginate(5);

        return view('pekerjaans.index', compact('pekerjaans'));
    }

    public function create()
    {
        return view('pekerjaans.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jabatan' => 'required|min:3'
        ]);

        Pekerjaan::create([
            'jabatan' => $request->jabatan
        ]);

        return redirect()->route('pekerjaans.index')->with(['success'=>'Data Berhasil Disimpan!']);
    }

    public function edit(Pekerjaan $pekerjaan)
    {
        return view('pekerjaans.edit', compact('pekerjaan'));
    }

    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $this->validate($request, [
            'jabatan' => 'required|min:3'
        ]);

            $pekerjaan->update([
                'jabatan' => $request->jabatan,
            ]);

        //redirect to index
        return redirect()->route('pekerjaans.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    
    public function destroy(Pekerjaan $pekerjaan)
    {

        //delete post
        $pekerjaan->delete();

        //redirect to index
        return redirect()->route('pekerjaans.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

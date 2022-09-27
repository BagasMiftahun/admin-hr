<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get absensi
        $absensi = DB::table('absensis')->get();

        //render view with absensi
        return view('absensi.index', compact('absensi'),[
            'absensi' => $absensi
        ]);
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('absensi.create');
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
            'qr'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'     => 'required',
            'waktu'   => 'required',
            'jabatan'   => 'required'
        ]);

        //upload image
        $qr = $request->file('qr');
        $qr->storeAs('public/absensi', $qr->hashName());

        //create absensi
        Absensi::create([
            'qr'     => $qr->hashName(),
            'name'     => $request->name,
            'waktu'   => $request->waktu,
            'jabatan' => $request->jabatan
        ]);

        //redirect to index
        return redirect('absensi');
    }
    /**
     * destroy
     *
     * @param  mixed $absensi
     * @return void
     */
    public function destroy(Absensi $absensi){

        DB:table('absensi')->where('id',$id)->delete();

        //redirect to index
        return redirect('absensi');
    }
}

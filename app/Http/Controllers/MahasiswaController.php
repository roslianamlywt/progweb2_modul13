<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['data_mahasiswa']=Mahasiswa::orderBy('nim','asc')->paginate(5);

        Paginator::useBootstrap();

        return view('mahasiswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required',
            'nama'=>'required',
            'angkatan'=>'required',
            'jurusan'=>'required'
        ]);

        $mahasiswa=new Mahasiswa();

        $mahasiswa->nim=$request->nim;
        $mahasiswa->nama=$request->nama;
        $mahasiswa->angkatan=$request->angkatan;
        $mahasiswa->jurusan=$request->jurusan;

        $mahasiswa->save();

        return redirect ()->route('mahasiswa.index')
            ->with ('success','Data Mahasiswa NIM:'.$request->nim. 'Berhasil dibuat!.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {

        return view('mahasiswa.edit',['mahasiswa'=>$mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nim)
    {
        $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::find($nim);

        $mahasiswa->nama = $request->nama;
        $mahasiswa->angkatan = $request->angkatan;
        $mahasiswa->jurusan = $request->jurusan;

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Nim:' . $nim . ' berhasil diperbarui!.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
        ->with('success','Data Mahasiswa NIM:'.$mahasiswa->nim.'berhasil dihapus!.');
    }
}

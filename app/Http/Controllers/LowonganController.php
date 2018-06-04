<?php

namespace App\Http\Controllers;

use App\Lowongan;
use App\Lamaran;
use App\Perusahaan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
         $k = Lowongan::with('Lamaran')->get();
        return view('lowongan.index',compact('k'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $p = Lowongan::all();
        return view('lowongan.create',compact('p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required',
            'gaji' => 'required',
            'deskripsi_iklan' => 'required',
            'pers_id'=>'required'
            
        ]);
        $k = new lowongan;
        $k->nama_low = $request->nama_low;
        $k->tgl_mulai = $request->tgl_mulai;
        $k->lokasi = $request->lokasi;
        $k->gaji = $request->gaji;
        $k->deskripsi_iklan = $request->deskripsi_iklan;
        $k->pers_id = $request->pers_id;
        
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$k->email</b>"
        ]);
        return redirect()->route('lowongan.index');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
         $k = Lowongan::findOrFail($id);
        return view('lowongan.show',compact('k'));    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
         $k = Lowongan::findOrFail($id);
      
        $selectedp = Lowongan::findOrFail($id)->user_id;
        return view('lowongan.edit',compact('k','selectedp'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $this->validate($request,[
           'nama_low' => 'required|',
            'tgl_mulai' => 'required|',
            'lokasi' => 'required',
            'gaji' => 'required',
            'deskripsi_iklan' => 'required',
            'pers_id'=>'required'
        ]);
        $k = lowongan::findOrFail($id);
       $k->nama_low = $request->nama_low;
        $k->tgl_mulai = $request->tgl_mulai;
        $k->lokasi = $request->lokasi;
        $k->gaji = $request->gaji;
        $k->deskripsi_iklan = $request->deskripsi_iklan;
        $k->pers_id = $request->pers_id;
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$k->email</b>"
        ]);
        return redirect()->route('lowongan.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
         $k = lowongan::findOrFail($id);
        $k->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lowongan.index');
        }
}

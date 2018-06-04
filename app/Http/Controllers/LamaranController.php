<?php

namespace App\Http\Controllers;

use App\Lamaran;
use App\lowongan;
use App\User;
use Illuminate\Http\Request;

class LamaranController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $k = Lamaran::with('User')->get();
        return view('lamaran.index',compact('k'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $p = User::all();
         $k = lamaran::all();
        return view('lamaran.create',compact('p','k'));    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'file_cv' => 'required|',
            'status' => 'required|',
            'user_id' => 'required',
            'low_id' => 'required'
        ]);
        $k = new Lamaran;
        $k->file_cv = $request->file_cv;
        $k->status = $request->status;
        $k->user_id = $request->user_id;
        $k->low_id = $request->low_id;
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$k->email</b>"
        ]);
        return redirect()->route('lamaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function show(Lamaran $lamaran)
    {
        $k = Lamaran::findOrFail($id);
        return view('lamaran.show',compact('k'));     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Lamaran $lamaran)
    {
         $k = Lamaran::findOrFail($id);
        $selectedp = Lamaran::findOrFail($id)->user_id;
        $selectedp = Lamaran::findOrFail($id)->low_id;
        return view('lamaran.edit',compact('k','selectedp'));     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lamaran $lamaran)
    {
         $this->validate($request,[
           'file_cv' => 'required|',
            'status' => 'required|',
            'user_id' => 'required',
            'low_id' => 'required'
        ]);
        $k = lamaran::findOrFail($id);
        $k->file_cv = $request->file_cv;
        $k->status = $request->status;
        $k->user_id = $request->user_id;
        $k->low_id = $request->low_id;
        
        $k->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$k->email</b>"
        ]);
        return redirect()->route('lamaran.index');     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lamaran  $lamaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lamaran $lamaran)
    {
         $k = Lamaran::findOrFail($id);
        $k->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('lamaran.index');    }
}

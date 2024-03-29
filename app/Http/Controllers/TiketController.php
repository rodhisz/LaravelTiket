<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('/dashboard',[
            'tiket' => Tiket::orderBy('id','desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'jumlah' => 'required'
        ]);

        $validasi['kode'] = random_int(10000000, 99999999);

        Tiket::create($validasi);
        return view('/berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function show(Tiket $tiket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(auth()->user()->role == 'user'){
        //     abort(403);
        // }
        // return view('edit',[
        //     'tiket'=> $tiket
        // ]);

        $tiket = Tiket::find($id);
        return view('edit',[
            'tiket'=> $tiket
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tiket = Tiket::find($id);
        
        $validasi = $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'jumlah' => 'required'
        ]);

        $tiket->update($validasi);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiket  $tiket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiket = Tiket::find($id);
        $tiket->delete();

        return back();
    }

    public function scan(Request $request)
    {
        $keyword = $request->search;
        $tiket = Tiket::where('kode', 'like', "%" . $keyword . "%");
        return view('scan', compact('tiket'));
    }

}

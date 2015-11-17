<?php

namespace App\Http\Controllers;

// use App\Http\Requests\FaskesRequest;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Faskes;
use App\Tipe;
use Auth;

class FaskesController extends Controller
{
    private  $faskesTipe = [
        null => 'Pilih Tipe',
        1 => "Rumah Sakit",
        2 => "Klinik",
        3 => "Puskesmas",
        4 => "Dokter Umum",
        5 => "Dokter Spesialis",
        6 => "Dokter gigi",
        7 => "Bidan"
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        //
        // $f = Auth::user()->faskes;
        //dd($this->faskesTipe);
        $f = Faskes::all();
        return $f;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(FaskesRequest $request)
    public function store(Request $request)
    {

           $faskes = Faskes::create($request->all());
           return response()->json($faskes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faskes = Faskes::findOrFail($id);
        return response()->json($faskes);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(FaskesRequest $request, $id)
    public function update(Request $request, $id)
    {
        //old way
        $faskesUpdate = $request->all();
        $f = Faskes::find($id);
        $f->update($faskesUpdate);
        return response()->json($f);

        //research in new way because it relation :(
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Faskes::find($id)->delete();
        return response()->json([
            'success' => true
        ]);
    }
}

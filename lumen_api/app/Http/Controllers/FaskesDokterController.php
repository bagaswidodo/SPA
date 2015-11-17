<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Faskes;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FaskesDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faskes = Faskes::findOrFail($id);
        $d = Dokter::lists('nama','dokter_id');
        $dokter =  $faskes->dokter->toArray();

        return $dokter;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Dokter::create($request->all());
        return $request->all();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faskes, $id)
    {

        $ubahDokter = $request->all();
        $dokter = Dokter::findOrFail($id);
        $dokter->update($ubahDokter);

        return $ubahDokter;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$dokter_id)
    {
        //
        Dokter::findOrFail($dokter_id)->delete();
       return 'success';

    }
}

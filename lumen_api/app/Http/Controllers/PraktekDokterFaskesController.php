<?php

namespace App\Http\Controllers;

use App\ODokter;
use App\Dokter;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PraktekDokterFaskesController extends Controller
{
    private $day = [
        0=>'Senin',
        1=>'Selasa',
        2=>'Rabu',
        3=>'Kamis',
        4=>'Jumat',
        5=>'Sabtu',
        6=>'Minggu'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($faskes, $dokter)
    {
        $jadwal = Dokter::find($dokter);
        $jadwal->praktek->toArray();

        $d = $this->day;
        return $jadwal;
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ODokter::create($request->all());
        return 'inserted';
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $faskes,$dokter,$hari)
    {

        $praktekDokter = ODokter::findOrFail($dokter)->praktek($faskes,$hari);
        $update['faskes_id'] = $request['faskes_id'];
        $update['dokter_id'] = $request['dokter_id'];
        $update['hari'] = $request['hari'];
        $update['jam_mulai'] = $request['jam_mulai'];
        $update['jam_selesai'] = $request['jam_selesai'];
        $praktekDokter->update($update);

        return 'udpated';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$dokter,$hari)
    {
        ODokter::find($dokter)->praktek($id,$hari)->delete();
        return 'deleted';
    }
}

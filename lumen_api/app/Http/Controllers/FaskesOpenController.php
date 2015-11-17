<?php

namespace App\Http\Controllers;

use App\Faskes;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OFaskes;

class FaskesOpenController extends Controller
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
    public function all($id)
    {
        $faskes = Faskes::find($id);
        $faskes->works->toArray();
        return $faskes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
         OFaskes::create($request->all());
         return $request->all();
       // return redirect('faskes/'.$request->faskes_id.'/open')->with('message','Berhasil ditambahkan');
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $hari)
    {
        //
        $faskes = OFaskes::kodeFaskes($id)->hari($hari);
        $faskesOpen['jam_buka'] = $request['jam_buka'];
        $faskesOpen['jam_tutup'] = $request['jam_tutup'];
        $faskesOpen['jam_mulai_istirahat'] = $request['jam_mulai_istirahat'];
        $faskesOpen['jam_selesai_istirahat'] = $request['jam_selesai_istirahat'];
        $faskes->update($faskesOpen);

        return $faskesOpen;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $hari)
    {
         OFaskes::kodeFaskes($id)->hari($hari)->delete();
        return redirect('faskes')->with('message', 'Data berhasil dihapus!');
    }
}

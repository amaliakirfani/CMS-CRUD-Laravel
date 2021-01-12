<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function show_keluarga()
    {
        $Keluarga = DB::table('Keluarga')->get();

        return view('keluarga.keluarga', ['Keluarga' => $Keluarga]);
    }

    public function create_keluarga (Request $request)
    {
        $id_status_keluarga = $request -> input('id_status_keluarga');
        $keterangan = $request -> input('keterangan');
        $tunjangan_keluarga = $request -> input('tunjangan_keluarga');

        $Keluarga = DB::table('Keluarga')->insert(
            ['id_status_keluarga' => $id_status_keluarga,
            'keterangan' => $keterangan,
            'tunjangan_keluarga' => $tunjangan_keluarga]
        );

        if($Keluarga){
            return redirect('/show_keluarga')->with('status', 'Berhasil Tambah Status Keluarga');
        }
        else{
            print('Gagal Tambah Status Keluarga');
        }
    }

    function delete_keluarga ($id_status_keluarga){
        $Keluarga=DB::table('Keluarga')->where('id_status_keluarga', '=', $id_status_keluarga)-> delete();

        if ($Keluarga){
            return redirect('/show_keluarga')->with('status', 'Berhasil Hapus Data Keluarga');
        }
        else{
            return redirect('/show_keluarga')->with('status', 'Gagal Hapus Data Keluarga');
        }
    }

    function edit_keluarga ($id_status_keluarga){
        $Keluarga = DB::table('Keluarga')->where('id_status_keluarga', '=', $id_status_keluarga)-> first();

        return view('/keluarga.edit_keluarga',['Keluarga'=>$Keluarga]);
    }

    function update_keluarga (Request $request){
        $id_status_keluarga = $request->input('id_status_keluarga');
        $keterangan = $request->input('keterangan');
        $tunjangan_keluarga = $request->input('tunjangan_keluarga');

        $Keluarga = DB::table('Keluarga')
            ->where('id_status_keluarga', $id_status_keluarga)
            ->update(
            ['id_status_keluarga' => $id_status_keluarga,
            'keterangan'=>$keterangan,
            'tunjangan_keluarga' => $tunjangan_keluarga
            ]);

        if($Keluarga){
            return redirect('/show_keluarga')->with('status', 'Berhasil Update Data Keluarga');
        }
        else{
            return redirect('/show_keluarga')->with('status', 'Gagal Update Data Keluarga');
        }
    }
}


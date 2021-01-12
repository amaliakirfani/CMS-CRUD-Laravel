<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function show_karyawan()
    {
        $Keluarga = DB::table('Keluarga')->get();
        $Karyawan = DB::table('Karyawan')
            ->join('Keluarga', 'Keluarga.id_status_keluarga', '=', 'Karyawan.id_status_keluarga')
            ->select('*')
            ->get();

        return view('karyawan.karyawan', ['Karyawan' => $Karyawan, 'Keluarga' => $Keluarga]);
    }

    public function create_karyawan (Request $request)
    {
        $NIK = $request -> input('NIK');
        $nama_karyawan = $request -> input('nama_karyawan');
        $id_status_keluarga = $request -> input('id_status_keluarga');

        $Karyawan = DB::table('Karyawan')->insert(
            ['NIK' => $NIK,
            'nama_karyawan' => $nama_karyawan,
            'id_status_keluarga' => $id_status_keluarga]
        );

        if($Karyawan){
            return redirect('/show_karyawan')->with('status', 'Berhasil Tambah Karyawan');
        }
        else{
            print('Gagal Tambah Karyawan');
        }
    }

    function delete_karyawan ($NIK){
        $Karyawan=DB::table('Karyawan')->where('NIK', '=', $NIK)-> delete();

        if ($Karyawan){
            return redirect('/show_karyawan')->with('status', 'Berhasil Hapus Data Karyawan');
        }
        else{
            return redirect('/show_karyawan')->with('status', 'Gagal Hapus Data Karyawan');
        }
    }

    function edit_karyawan ($NIK){
        $Karyawan=DB::table('Karyawan')->where('NIK', '=', $NIK)-> first();
        $Keluarga = DB::table('Keluarga')->get();

        return view('/karyawan.edit_karyawan',['Karyawan'=>$Karyawan, 'Keluarga'=>$Keluarga]);
    }

    function update_karyawan (Request $request){
        $NIK = $request->input('NIK'); 
        $nama_karyawan = $request->input('nama_karyawan');
        $id_status_keluarga = $request->input('id_status_keluarga');

        $Karyawan = DB::table('Karyawan')
            ->where('NIK', $NIK)
            ->update(
            ['NIK' => $NIK,
            'nama_karyawan'=>$nama_karyawan,
            'id_status_keluarga' => $id_status_keluarga
            ]);

        if($Karyawan){
            return redirect('/show_karyawan')->with('status', 'Berhasil Update Data Karyawan');
        }
        else{
            return redirect('/show_karyawan')->with('status', 'Gagal Update Data Karyawan');
        }
    }
}

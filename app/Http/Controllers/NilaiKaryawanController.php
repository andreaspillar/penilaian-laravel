<?php

namespace App\Http\Controllers;

use App\NilaiKaryawan;
use App\Karyawan;
use App\Kriteria;
use App\ValueNilai;
use Illuminate\Http\Request;

class NilaiKaryawanController extends Controller
{
  public function updateNilaiKaryawan(Request $request, $id_karyawan)
  {
    $requestIdKriteria = $request->id_kriteria;
    $requestNilaiKaryawan = $request->nil;
    foreach ($requestIdKriteria as $reqKr => $value1) {
      $postNilai = new NilaiKaryawan();
      $postNilai->id_kriteria = $value1;
      $postNilai->id_karyawan = $id_karyawan;
      $postNilai->nilai_karyawan = $requestNilaiKaryawan[$reqKr];
      $postNilai->save();
    }
    $putKaryawanStatus = Karyawan::find($id_karyawan);
    $putKaryawanStatus->status_nilai = 'N';
    $putKaryawanStatus->save();
    $data = 'success';
    return response()->json($data);
  }
  public function editNilaiKaryawan($id_karyawan)
  {
    $nilaiKaryawan = NilaiKaryawan::join('kriterias', 'kriterias.id_kriteria', '=', 'nilai_karyawans.id_kriteria')
                     ->where('nilai_karyawans.id_karyawan', '=', $id_karyawan)
                     ->get();
    $identitasKaryawan = NilaiKaryawan::join('karyawans', 'karyawans.id_karyawan', '=', 'nilai_karyawans.id_karyawan')
                     ->where('nilai_karyawans.id_karyawan', '=', $id_karyawan)
                     ->limit(1)
                     ->get();
    foreach ($identitasKaryawan as $iK) {
      $namaKaryawan = $iK->nama_karyawan;
    }
    $val = ValueNilai::all();
    return view('karyawan/nonadmin/editnilai',compact('nilaiKaryawan','namaKaryawan','id_karyawan', 'val'));
  }
  public function updateExistingNilai(Request $request, $id_karyawan)
  {
    $requestNilaiKaryawan = $request->nil;
    $requestIdKriteria = $request->id_kriteria;
    foreach ($requestIdKriteria as $reqKr => $value1) {
      NilaiKaryawan::where('id_karyawan', $id_karyawan)
                   ->where('id_kriteria', $value1)
                   ->update(['nilai_karyawan'=>$requestNilaiKaryawan[$reqKr]]);
    }
    $data = 'success';
    return response()->json($data);
  }

}

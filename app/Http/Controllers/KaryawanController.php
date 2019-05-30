<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\Kriteria;
use App\ValueNilai;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;

class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('disablepreventback');
    }

    public function index()
    {
      if (Auth::user()->id_jabatan==1) {
        return view('karyawan/read');
      }
      else {
        return redirect ('/nonadmin');
      }
    }

    public function nonadmin()
    {
      return view('karyawan/nonadmin/read');
    }

    public function getKaryawanNonAdmin()
    {
      if ((Auth::user()->id_jabatan)==4) {
        $karyawan = Karyawan::join('jabatans', 'karyawans.id_jabatan', '=', 'jabatans.id_jabatan')
        ->join('departemens', 'karyawans.id_departemen', '=', 'departemens.id_departemen')
        ->select('id_karyawan', 'nomor_karyawan', 'nama_karyawan', 'jabatans.role', 'departemens.departemen', 'nilai', 'status_nilai')
        ->where('jabatans.id_jabatan', '>', Auth::user()->id_jabatan)
        ->where('departemens.id_departemen',Auth::user()->id_departemen);
        return Datatables::of($karyawan)
        ->addColumn('action', function($karyawan){
          return '<button type="button" class="btn btn-xs '.(($karyawan->status_nilai=='N')?'btn-warning':'btn-primary').' updateKaryawan" data-href="'.(($karyawan->status_nilai=='N')?'nilaiKaryawan':'karyawan').'/'.$karyawan->id_karyawan.'/'.(($karyawan->status_nilai=='N')?'edit':'nilai').'/">'.(($karyawan->status_nilai == "N")?'Ubah':'Nilai').'</button>';
        })
        ->rawColumns(['action'])
        ->make(true);
      }
      else if(((Auth::user()->id_jabatan)==3)||((Auth::user()->id_jabatan)==2)) {
        $karyawan = Karyawan::join('jabatans', 'karyawans.id_jabatan', '=', 'jabatans.id_jabatan')
        ->join('departemens', 'karyawans.id_departemen', '=', 'departemens.id_departemen')
        ->select('id_karyawan', 'nomor_karyawan', 'nama_karyawan', 'jabatans.role', 'departemens.departemen', 'nilai')
        ->where('jabatans.id_jabatan', '=', (Auth::user()->id_jabatan+1))
        ->where('departemens.id_departemen',Auth::user()->id_departemen);
        return Datatables::of($karyawan)
        ->addColumn('action', function($karyawan){
          return '<button type="button" class="btn btn-xs btn-primary updateKaryawan" data-href="karyawan/'.$karyawan->id_karyawan.'/nilai/">Nilai</button>';
        })
        ->rawColumns(['action'])
        ->make(true);
      }
    }

    public function getKaryawan()
    {
      // https://stackoverflow.com/questions/42032068/return-html-content-via-ajax-laravel-datatable-using-yajrabox-package
      $karyawan = Karyawan::join('jabatans', 'karyawans.id_jabatan', '=', 'jabatans.id_jabatan')
      ->join('departemens', 'karyawans.id_departemen', '=', 'departemens.id_departemen')
      ->select('id_karyawan', 'nomor_karyawan', 'nama_karyawan', 'jabatans.role', 'departemens.departemen', 'status_nilai');
      return Datatables::of($karyawan)
      ->editColumn('status', function(Karyawan $karyawan){
          return '<span class="label '.(($karyawan->status_nilai=='N')? 'label-success':'label-danger').'">'.(($karyawan->status_nilai=='N')? 'Sudah Dinilai':'Belum Dinilai').'</span>';
      })
      ->addColumn('action', function($karyawan){
          return '<button type="button" class="btn btn-xs btn-primary updateKaryawan" data-href="karyawan/'.$karyawan->id_karyawan.'/edit/">Edit</button><button class="btn btn-xs btn-danger deleteKaryawan" data-href="karyawan/'.$karyawan->id_karyawan.'">Hapus</button>';
      })
      ->rawColumns(['status','action'])
      ->make(true);
    }

    public function create()
    {
        return view('karyawan/create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'nomor_karyawan' => 'required',
            'nama_karyawan' => 'required',
            'jabatan' => 'required',
            'departemen' => 'required',
        ]);
        $karyawan = new Karyawan();
        $karyawan->nomor_karyawan = $request->nomor_karyawan;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->id_jabatan = $request->jabatan;
        $karyawan->id_departemen = $request->departemen;
        $karyawan->nilai = 0;
        $karyawan->save();
        $data = 'success';
        return response()->json($data);
    }

    public function show(Karyawan $karyawan)
    {
    }

    public function edit($id_karyawan)
    {
        $karyawan = Karyawan::find($id_karyawan);
        return view('karyawan/edit',compact('karyawan'));
    }

    public function nilai($id_karyawan)
    {
      $karyawan = Karyawan::join('departemens', 'karyawans.id_departemen', '=', 'departemens.id_departemen')->find($id_karyawan);
      $kriteria = Kriteria::all();
      $val      = ValueNilai::all();
      return view('karyawan/nonadmin/nilai',compact('kriteria', 'karyawan', 'val'));
    }

    public function update(Request $request, $id_karyawan)
    {
        $this->validate($request,[
          'nomor_karyawan' => 'required',
          'nama_karyawan' => 'required',
          'jabatan' => 'required',
          'departemen' => 'required',
        ]);
        $karyawan = Karyawan::find($id_karyawan);
        $karyawan->nomor_karyawan = $request->nomor_karyawan;
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->id_jabatan = $request->jabatan;
        $karyawan->id_departemen = $request->departemen;
        $karyawan->save();
        return response()->json(['success'=>'OK']);
    }

    public function destroy($id)
    {
      Karyawan::find($id)->delete($id);
      return response()->json('success');
    }
}

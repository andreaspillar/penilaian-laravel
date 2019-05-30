<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Auth;

class KriteriaController extends Controller
{

  public function __construct()
  {
    $this->middleware('disablepreventback');
    $this->middleware('auth');
    $this->middleware('adminhr');
  }

    public function index()
    {
        return view('home');
    }

    public function read()
    {
      return view('kriteria/read');
    }

    // https://github.com/iamelking/laravel_crud/blob/master/app/Http/Controllers/CrudController.php
    public function getData()
    {
        $kriteria = Kriteria::select('id_kriteria','nama_kriteria','nilai_kriteria');
        return Datatables::of($kriteria)
        ->addColumn('action', function($kriteria){
            return '<button type="button" class="btn btn-xs btn-primary updateKriteria" data-href="kriteria/'.$kriteria->id_kriteria.'/edit/">Edit</button><button class="btn btn-xs btn-danger deleteKriteria" data-href="kriteria/'.$kriteria->id_kriteria.'">Hapus</button>';
        })
        ->make(true);
    }

    public function nilaiKriteria()
    {
      $kriteria = Kriteria::all();
      return view('kriteria/nilaikriteria',compact('kriteria'));
    }

    public function updateNilaiKriteria(Request $request)
    {
      $idKr = $request->id_kriteria;
      $reqNilai = $request->nk;
      $setsOfKriteria = Kriteria::get('id_kriteria','nama_kriteria');
      foreach ($reqNilai as $rK => $num) {
        $kriteria = Kriteria::find($rK);
        $kriteria->nilai_kriteria = $num;
        $kriteria->save();
      }
      $data = 'success';
      return response()->json($data);
    }

    public function create()
    {
        return view('kriteria/create');
    }

    public function store(Request $request)
    {
      $this->validate(request(),[
        'kriteria' => 'required',
      ]);
      if ((Kriteria::where('nama_kriteria', $request->kriteria)->count()) >> 0) {
        $data = 'exceed';
      }
      else {
        $kriteria = new Kriteria();
        $kriteria->nama_kriteria = $request->kriteria;
        $kriteria->nilai_kriteria = 0;
        $kriteria->save();
        $data = 'success';
      }
      return response()->json($data);
    }

    public function show(Kriteria $kriteria)
    {

    }

    public function edit($id_kriteria)
    {
        $kriteria = Kriteria::find($id_kriteria);
        return view('kriteria/edit',compact('kriteria'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kriteria' => 'required',
        ]);
        $krit = Kriteria::find($id);
        $krit->nama_kriteria = $request->kriteria;
        $krit->save();
        return response()->json(['success'=>'OK']);

    }

    public function destroy(Kriteria $kriteria, $id)
    {
        Kriteria::find($id)->delete($id);
        return response()->json('Success');
    }
}

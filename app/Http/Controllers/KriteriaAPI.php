<?php

namespace App\Http\Controllers;

use App\Kriteria;
use Illuminate\Http\Request;

class KriteriaAPI extends Controller
{

    public function index()
    {
        return Kriteria::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $kriteria = new Kriteria;
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->save();
        return "Kriteria telah ditambahkan";
    }

    public function show(Kriteria $kriteria)
    {
        //
    }

    public function edit(Kriteria $kriteria)
    {
        //
    }

    public function update(Request $request, Kriteria $kriteria)
    {
        //
    }

    public function destroy(Kriteria $kriteria)
    {
        //
    }
}

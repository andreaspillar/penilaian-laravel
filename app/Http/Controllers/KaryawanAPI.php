<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;

class KaryawanAPI extends Controller
{

    public function index()
    {
        return Karyawan::all();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Karyawan $karyawan)
    {
        //
    }

    public function edit(Karyawan $karyawan)
    {
        //
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        //
    }

    public function destroy(Karyawan $karyawan)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class InputController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->input();

        $validatedData = $request->validate([
            'nomor_peserta' => 'required',
        ], [
            'nomor_peserta.required' => 'Nomor Peserta Perlu Diisi'
        ]);


        $peserta = DB::table('examlocations')
            ->selectRaw('*')
            ->where('nomor_peserta', trim($request->nomor_peserta))
            ->first();

        if ($peserta) {
            if ($peserta->titik_lokasi) {
                $errors = [
                    'nomor_peserta' => 'Peserta dengan nomor ' . $request->nomor_peserta . ' telah mengisi tilok',
                    'sudah_isi' => true,
                    'peserta' => $peserta
                ];
                return back()->withErrors($errors);
            } else {
                return view('input', compact('peserta'));
            }
        } else {
            $errors = [
                'nomor_peserta' => 'Nomor Peserta tidak ditemukan'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }

        return back()->with('success', 'User created successfully.');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTilok(Request $request)
    {
        // return $request->input();

        $validatedData = $request->validate([
            'titik_lokasi' => 'required',
        ], [
            'titik_lokasi.required' => 'Nomor Peserta Perlu Diisi'
        ]);

        if ($request->titik_lokasi == '') {
            $errors = [
                'titik_lokasi' => 'Titik Lokasi tidak boleh kosong'
            ];
            return back()->withErrors($errors)->withInput($request->all());
        }


        DB::table('examlocations')
        ->where('id', $request->id)
        ->update(['titik_lokasi' =>  $request->titik_lokasi]);


        $peserta = DB::table('examlocations')
            ->selectRaw('*')
            ->where('id', $request->id)
            ->first();

        return redirect('/')->with('success', 'Data Tilok untuk (' . $peserta->nama .  ' - '. $peserta->nomor_peserta . ') Sudah Tersimpan');
    }
}

<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $data = [
            'totalPendapatan'   => 45750000,
            'totalTransaksi'    => 487,
            'rataRata'          => 93942,
            'pelangganBaru'     => 18,
            'bulan'             => 'Januari 2026',
            'layananTerlaris'   => 'Cuci + Setrika',
            'pendapatanHarian'  => [
                ['tanggal' => '01 Jan', 'pendapatan' => 1250000],
                ['tanggal' => '02 Jan', 'pendapatan' => 1480000],
                ['tanggal' => '03 Jan', 'pendapatan' => 1320000],
                ['tanggal' => '04 Jan', 'pendapatan' => 1650000],
                ['tanggal' => '05 Jan', 'pendapatan' => 1890000],
                ['tanggal' => '06 Jan', 'pendapatan' => 2100000],
                ['tanggal' => '07 Jan', 'pendapatan' => 1850000],
            ]
        ];

        return view('laporan', $data);
    }
}
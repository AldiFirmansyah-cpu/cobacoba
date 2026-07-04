<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data['pelanggan'] = [
            [
                'id'        => 1,
                'nama'      => 'Budi Santoso',
                'telepon'   => '081234567890',
                'alamat'    => 'Jl. Merdeka No. 10, Semarang',
                'join'      => '2025-06-15',
                'totalTx'   => 24,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 2,
                'nama'      => 'Siti Aminah',
                'telepon'   => '081298765432',
                'alamat'    => 'Jl. Diponegoro No. 25, Semarang',
                'join'      => '2025-08-20',
                'totalTx'   => 18,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 3,
                'nama'      => 'Ahmad Fauzi',
                'telepon'   => '085612345678',
                'alamat'    => 'Jl. Pandanaran No. 5, Semarang',
                'join'      => '2025-09-10',
                'totalTx'   => 12,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 4,
                'nama'      => 'Dewi Lestari',
                'telepon'   => '087812345678',
                'alamat'    => 'Jl. Gajah Mada No. 88, Semarang',
                'join'      => '2025-10-05',
                'totalTx'   => 31,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 5,
                'nama'      => 'Rudi Hermawan',
                'telepon'   => '082134567890',
                'alamat'    => 'Jl. Teuku Umar No. 17, Semarang',
                'join'      => '2025-11-12',
                'totalTx'   => 8,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 6,
                'nama'      => 'Nina Kartika',
                'telepon'   => '089876543210',
                'alamat'    => 'Jl. Imam Bonjol No. 33, Semarang',
                'join'      => '2025-12-01',
                'totalTx'   => 5,
                'status'    => 'Aktif'
            ],
            [
                'id'        => 7,
                'nama'      => 'Eko Prasetyo',
                'telepon'   => '081345678901',
                'alamat'    => 'Jl. Ahmad Yani No. 45, Semarang',
                'join'      => '2025-07-22',
                'totalTx'   => 15,
                'status'    => 'Aktif'
            ]
        ];

        return view('pelanggan', $data);
    }
}
<?php

namespace App\Controllers;

class Layanan extends BaseController
{
    public function index()
    {
        $data['layanan'] = [
            [
                'id'          => 1,
                'nama'        => 'Cuci Reguler',
                'harga'       => 7000,
                'satuan'      => 'kg',
                'estimasi'    => '2-3 hari',
                'deskripsi'   => 'Layanan cuci pakaian standar dengan pewangi premium',
                'ikon'        => 'bi-droplet',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 2,
                'nama'        => 'Cuci Express',
                'harga'       => 12000,
                'satuan'      => 'kg',
                'estimasi'    => '1 hari',
                'deskripsi'   => 'Layanan cuci cepat selesai dalam 24 jam',
                'ikon'        => 'bi-lightning-charge',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 3,
                'nama'        => 'Setrika Saja',
                'harga'       => 5000,
                'satuan'      => 'kg',
                'estimasi'    => '1 hari',
                'deskripsi'   => 'Layanan setrika untuk pakaian yang sudah dicuci',
                'ikon'        => 'bi-thermometer',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 4,
                'nama'        => 'Cuci + Setrika',
                'harga'       => 10000,
                'satuan'      => 'kg',
                'estimasi'    => '2 hari',
                'deskripsi'   => 'Paket lengkap cuci dan setrika',
                'ikon'        => 'bi-basket',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 5,
                'nama'        => 'Dry Cleaning',
                'harga'       => 25000,
                'satuan'      => 'pcs',
                'estimasi'    => '3 hari',
                'deskripsi'   => 'Cuci kering untuk bahan khusus seperti jas, gaun, dll',
                'ikon'        => 'bi-star',
                'status'      => 'Aktif'
            ],
            [
                'id'          => 6,
                'nama'        => 'Cuci Bedcover',
                'harga'       => 35000,
                'satuan'      => 'pcs',
                'estimasi'    => '3-4 hari',
                'deskripsi'   => 'Layanan cuci bedcover, selimut, dan sprei',
                'ikon'        => 'bi-house-door',
                'status'      => 'Aktif'
            ]
        ];

        return view('layanan', $data);
    }
}
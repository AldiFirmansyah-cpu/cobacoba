<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $layanan = $this->getLayananData();
        $pelanggan = $this->getPelangganData();
        $transaksi = $this->getTransaksiData();

        $data = [
            'totalPelanggan'    => count($pelanggan),
            'totalLayanan'      => count($layanan),
            'transaksiHariIni'  => count(array_filter($transaksi, fn($t) => $t['tanggal'] === date('Y-m-d'))),
            'pendapatanHariIni' => array_sum(array_column(
                array_filter($transaksi, fn($t) => $t['tanggal'] === date('Y-m-d')), 'total'
            )),
            'sedangDiproses'    => count(array_filter($transaksi, fn($t) => $t['status'] === 'Diproses')),
            'selesai'           => count(array_filter($transaksi, fn($t) => $t['status'] === 'Selesai')),
            'diambil'           => count(array_filter($transaksi, fn($t) => $t['status'] === 'Diambil')),
        ];

        return view('home', $data);
    }

    private function getLayananData()
    {
        $data = session()->get('layanan_data');
        if (!$data) {
            $data = [
                ['id' => 1, 'nama' => 'Cuci Reguler', 'harga' => 7000, 'satuan' => 'kg', 'estimasi' => '2-3 hari', 'deskripsi' => 'Layanan cuci standar dengan pewangi premium'],
                ['id' => 2, 'nama' => 'Cuci Express', 'harga' => 12000, 'satuan' => 'kg', 'estimasi' => '1 hari', 'deskripsi' => 'Layanan cuci cepat selesai 24 jam'],
                ['id' => 3, 'nama' => 'Setrika Saja', 'harga' => 5000, 'satuan' => 'kg', 'estimasi' => '1 hari', 'deskripsi' => 'Layanan setrika pakaian'],
                ['id' => 4, 'nama' => 'Cuci + Setrika', 'harga' => 10000, 'satuan' => 'kg', 'estimasi' => '2 hari', 'deskripsi' => 'Paket lengkap cuci dan setrika'],
                ['id' => 5, 'nama' => 'Dry Cleaning', 'harga' => 25000, 'satuan' => 'pcs', 'estimasi' => '3 hari', 'deskripsi' => 'Cuci kering untuk bahan khusus'],
                ['id' => 6, 'nama' => 'Cuci Bedcover', 'harga' => 35000, 'satuan' => 'pcs', 'estimasi' => '3-4 hari', 'deskripsi' => 'Layanan cuci bedcover dan selimut'],
            ];
            session()->set('layanan_data', $data);
        }
        return $data;
    }

    private function getPelangganData()
    {
        $data = session()->get('pelanggan_data');
        if (!$data) {
            $data = [
                ['id' => 1, 'nama' => 'Budi Santoso', 'telepon' => '081234567890', 'alamat' => 'Jl. Merdeka No. 10, Semarang'],
                ['id' => 2, 'nama' => 'Siti Aminah', 'telepon' => '081298765432', 'alamat' => 'Jl. Diponegoro No. 25, Semarang'],
                ['id' => 3, 'nama' => 'Ahmad Fauzi', 'telepon' => '085612345678', 'alamat' => 'Jl. Pandanaran No. 5, Semarang'],
                ['id' => 4, 'nama' => 'Dewi Lestari', 'telepon' => '087812345678', 'alamat' => 'Jl. Gajah Mada No. 88, Semarang'],
            ];
            session()->set('pelanggan_data', $data);
        }
        return $data;
    }

    private function getTransaksiData()
    {
        $data = session()->get('transaksi_data');
        if (!$data) {
            $data = [
                ['id' => 1, 'no_transaksi' => 'TRX-20260115-001', 'pelanggan' => 'Budi Santoso', 'items' => 'Cuci + Setrika (5kg)', 'total' => 50000, 'status' => 'Selesai', 'tanggal' => date('Y-m-d')],
                ['id' => 2, 'no_transaksi' => 'TRX-20260116-002', 'pelanggan' => 'Siti Aminah', 'items' => 'Cuci Express (3kg)', 'total' => 36000, 'status' => 'Diproses', 'tanggal' => date('Y-m-d')],
            ];
            session()->set('transaksi_data', $data);
        }
        return $data;
    }
}
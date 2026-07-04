<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index()
    {
        // Ambil data transaksi dari session
        $transaksi = session()->get('transaksi_data') ?? [];
        
        $data = [
            'transaksi' => $transaksi,
            'totalTransaksi' => count($transaksi),
            'totalPendapatan' => array_sum(array_column($transaksi, 'total')),
            'transaksiHariIni' => array_filter($transaksi, function($t) {
                return $t['tanggal'] === date('Y-m-d');
            })
        ];
        
        return view('transaksi/index', $data);
    }
    
    public function detail($id)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        $item = null;
        
        foreach ($transaksi as $t) {
            if ($t['id'] == $id) {
                $item = $t;
                break;
            }
        }
        
        if (!$item) {
            return redirect()->to('transaksi')->with('error', 'Transaksi tidak ditemukan');
        }
        
        return view('transaksi/detail', ['item' => $item]);
    }
    
    public function checkout()
    {
        // Proses checkout dari keranjang
        $keranjang = session()->get('keranjang') ?? [];
        
        if (empty($keranjang)) {
            return redirect()->to('keranjang')->with('error', 'Keranjang kosong');
        }
        
        // Generate nomor transaksi
        $noTransaksi = 'TRX-' . date('Ymd') . '-' . str_pad((count(session()->get('transaksi_data') ?? []) + 1), 3, '0', STR_PAD_LEFT);
        
        // Hitung total
        $total = array_sum(array_column($keranjang, 'subtotal'));
        
        // Simpan ke transaksi
        $transaksiBaru = [
            'id' => count(session()->get('transaksi_data') ?? []) + 1,
            'no_transaksi' => $noTransaksi,
            'pelanggan' => $this->request->getPost('pelanggan') ?? 'Umum',
            'items' => implode(', ', array_column($keranjang, 'nama')),
            'total' => $total,
            'status' => 'Diproses',
            'tanggal' => date('Y-m-d'),
            'waktu' => date('H:i:s')
        ];
        
        // Simpan ke session
        $transaksiData = session()->get('transaksi_data') ?? [];
        $transaksiData[] = $transaksiBaru;
        session()->set('transaksi_data', $transaksiData);
        
        // Kosongkan keranjang
        session()->remove('keranjang');
        
        return redirect()->to('transaksi')->with('success', 'Transaksi berhasil dibuat! No: ' . $noTransaksi);
    }
    
    public function updateStatus($id, $status)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        
        foreach ($transaksi as $key => $t) {
            if ($t['id'] == $id) {
                $transaksi[$key]['status'] = $status;
                break;
            }
        }
        
        session()->set('transaksi_data', $transaksi);
        
        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }
    
    public function cetak($id)
    {
        // Implementasi cetak struk
        $transaksi = session()->get('transaksi_data') ?? [];
        $item = null;
        
        foreach ($transaksi as $t) {
            if ($t['id'] == $id) {
                $item = $t;
                break;
            }
        }
        
        if (!$item) {
            return redirect()->to('transaksi')->with('error', 'Transaksi tidak ditemukan');
        }
        
        return view('transaksi/cetak', ['item' => $item]);
    }
}
<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index()
    {
        // Ambil data transaksi dari session
        $transaksi = session()->get('transaksi_data') ?? [];
        
        // Hitung total pendapatan dengan aman
        $totalPendapatan = 0;
        foreach ($transaksi as $t) {
            if (isset($t['total']) && is_numeric($t['total'])) {
                $totalPendapatan += $t['total'];
            }
        }
        
        // Filter transaksi hari ini
        $transaksiHariIni = array_filter($transaksi, function($t) {
            return isset($t['tanggal']) && $t['tanggal'] === date('Y-m-d');
        });
        
        // Hitung yang sedang diproses
        $sedangDiproses = array_filter($transaksi, function($t) {
            return isset($t['status']) && $t['status'] === 'Diproses';
        });
        
        $data = [
            'transaksi'        => $transaksi,
            'totalTransaksi'   => count($transaksi),
            'totalPendapatan'  => $totalPendapatan,
            'transaksiHariIni' => $transaksiHariIni,
            'sedangDiproses'   => $sedangDiproses,
        ];
        
        return view('transaksi/index', $data);
    }

    public function detail($id)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        $item = null;
        
        foreach ($transaksi as $t) {
            if (isset($t['id']) && $t['id'] == $id) {
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
        // ✅ PERBAIKAN 1: Baca dari session key yang BENAR ('cart' bukan 'keranjang')
        $cart = session()->get('cart') ?? [];
        $pelanggan = session()->get('cart_pelanggan') ?? 'Pelanggan Umum';
        
        // Cek apakah keranjang kosong
        if (empty($cart)) {
            return redirect()->to('keranjang')->with('error', 'Keranjang kosong! Silakan tambahkan layanan terlebih dahulu.');
        }
        
        // Ambil data transaksi yang sudah ada
        $transaksiData = session()->get('transaksi_data') ?? [];
        
        // Generate nomor transaksi
        $newId = count($transaksiData) > 0 ? max(array_column($transaksiData, 'id')) + 1 : 1;
        $noTransaksi = 'TRX-' . date('Ymd') . '-' . str_pad($newId, 3, '0', STR_PAD_LEFT);
        
        // ✅ PERBAIKAN 2: Hitung total dan items dengan benar
        $items = [];
        $total = 0;
        
        foreach ($cart as $item) {
            // Pastikan harga dan qty ada
            $harga = isset($item['harga']) ? (int)$item['harga'] : 0;
            $qty = isset($item['qty']) ? (int)$item['qty'] : 1;
            $subtotal = $harga * $qty;
            $total += $subtotal;
            
            // Format nama item dengan qty dan satuan
            $nama = isset($item['nama']) ? $item['nama'] : 'Layanan';
            $satuan = isset($item['satuan']) ? $item['satuan'] : 'pcs';
            $items[] = $nama . ' (' . $qty . $satuan . ')';
        }
        
        // Buat data transaksi baru
        $transaksiBaru = [
            'id'           => $newId,
            'no_transaksi' => $noTransaksi,
            'pelanggan'    => $pelanggan,
            'items'        => implode(', ', $items),
            'total'        => $total,
            'status'       => 'Diproses',
            'tanggal'      => date('Y-m-d'),
            'waktu'        => date('H:i:s'),
        ];
        
        // Simpan ke session
        $transaksiData[] = $transaksiBaru;
        session()->set('transaksi_data', $transaksiData);
        
        // ✅ PERBAIKAN 3: Kosongkan keranjang dengan key yang benar
        session()->remove('cart');
        session()->remove('cart_pelanggan');
        
        return redirect()->to('transaksi')->with('success', 'Transaksi berhasil dibuat! No: ' . $noTransaksi);
    }

    public function updateStatus($id, $status)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        
        foreach ($transaksi as $key => $t) {
            if (isset($t['id']) && $t['id'] == $id) {
                $transaksi[$key]['status'] = $status;
                break;
            }
        }
        
        session()->set('transaksi_data', $transaksi);
        return redirect()->back()->with('success', 'Status berhasil diupdate menjadi ' . $status);
    }

    public function delete($id)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        $found = false;
        
        foreach ($transaksi as $key => $t) {
            if (isset($t['id']) && $t['id'] == $id) {
                unset($transaksi[$key]);
                $found = true;
                break;
            }
        }
        
        if ($found) {
            $transaksi = array_values($transaksi);
            session()->set('transaksi_data', $transaksi);
            return redirect()->to('transaksi')->with('success', 'Transaksi berhasil dihapus');
        }
        
        return redirect()->to('transaksi')->with('error', 'Transaksi tidak ditemukan');
    }

    public function cetak($id)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        $item = null;
        
        foreach ($transaksi as $t) {
            if (isset($t['id']) && $t['id'] == $id) {
                $item = $t;
                break;
            }
        }
        
        if (!$item) {
            return redirect()->to('transaksi')->with('error', 'Transaksi tidak ditemukan');
        }
        
        return view('transaksi/cetak_view', ['item' => $item]);
    }
}
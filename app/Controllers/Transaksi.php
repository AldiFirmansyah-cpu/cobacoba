<?php

namespace App\Controllers;

class TransactionController extends BaseController
{
    public function index()
    {
        $data['transaksi'] = session()->get('transaksi_data') ?? [];
        return view('transaksi/index', $data);
    }

    public function checkout()
    {
        $cart = session()->get('cart') ?? [];
        $pelanggan = session()->get('cart_pelanggan') ?? 'Pelanggan Umum';

        if (empty($cart)) {
            return redirect()->to('keranjang')->with('error', 'Keranjang kosong!');
        }

        $transaksi = session()->get('transaksi_data') ?? [];
        $newId = count($transaksi) > 0 ? max(array_column($transaksi, 'id')) + 1 : 1;
        $noTrx = 'TRX-' . date('Ymd') . '-' . str_pad($newId, 3, '0', STR_PAD_LEFT);

        $items = [];
        $total = 0;
        foreach ($cart as $item) {
            $subtotal = $item['harga'] * $item['qty'];
            $total += $subtotal;
            $items[] = $item['nama'] . ' (' . $item['qty'] . $item['satuan'] . ')';
        }

        $transaksi[] = [
            'id'           => $newId,
            'no_transaksi' => $noTrx,
            'pelanggan'    => $pelanggan,
            'items'        => implode(', ', $items),
            'total'        => $total,
            'status'       => 'Diproses',
            'tanggal'      => date('Y-m-d'),
        ];

        session()->set('transaksi_data', $transaksi);
        session()->remove('cart');
        session()->remove('cart_pelanggan');

        return redirect()->to('transaksi')->with('success', 'Transaksi berhasil! No: ' . $noTrx);
    }

    public function detail($id)
    {
        $transaksi = session()->get('transaksi_data') ?? [];
        $data['item'] = null;
        foreach ($transaksi as $t) {
            if ($t['id'] == $id) {
                $data['item'] = $t;
                break;
            }
        }
        return view('transaksi/detail', $data);
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
        return redirect()->to('transaksi')->with('success', 'Status berhasil diupdate');
    }
}
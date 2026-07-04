<?php

namespace App\Controllers;

class CartController extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }
        $data['cart'] = $cart;
        $data['total'] = $total;
        return view('cart/index', $data);
    }

    public function add()
    {
        $layananId = $this->request->getPost('layanan_id');
        $qty = (int)$this->request->getPost('qty');
        $pelanggan = $this->request->getPost('pelanggan');

        $layananList = session()->get('layanan_data') ?? [];
        $layanan = null;
        foreach ($layananList as $l) {
            if ($l['id'] == $layananId) {
                $layanan = $l;
                break;
            }
        }

        if (!$layanan) {
            return redirect()->back()->with('error', 'Layanan tidak ditemukan');
        }

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$layananId])) {
            $cart[$layananId]['qty'] += $qty;
        } else {
            $cart[$layananId] = [
                'layanan_id' => $layanan['id'],
                'nama'       => $layanan['nama'],
                'harga'      => $layanan['harga'],
                'satuan'     => $layanan['satuan'],
                'qty'        => $qty,
            ];
        }

        if ($pelanggan) {
            session()->set('cart_pelanggan', $pelanggan);
        }

        session()->set('cart', $cart);
        return redirect()->to('keranjang')->with('success', 'Item ditambahkan ke keranjang');
    }

    public function update()
    {
        $layananId = $this->request->getPost('layanan_id');
        $qty = (int)$this->request->getPost('qty');

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$layananId])) {
            if ($qty > 0) {
                $cart[$layananId]['qty'] = $qty;
            } else {
                unset($cart[$layananId]);
            }
        }

        session()->set('cart', $cart);
        return redirect()->to('keranjang');
    }

    public function remove($id)
    {
        $cart = session()->get('cart') ?? [];
        unset($cart[$id]);
        session()->set('cart', $cart);
        return redirect()->to('keranjang')->with('success', 'Item dihapus dari keranjang');
    }

    public function clear()
    {
        session()->remove('cart');
        session()->remove('cart_pelanggan');
        return redirect()->to('keranjang')->with('success', 'Keranjang dikosongkan');
    }
}
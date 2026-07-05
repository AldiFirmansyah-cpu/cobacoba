<?php
namespace App\Controllers;

class CartController extends BaseController
{
    public function index()
    {
        // Pastikan data layanan ada di session
        if (!session()->get('layanan_data')) {
            $defaultLayanan = [
                ['id' => 1, 'nama' => 'Cuci Reguler', 'harga' => 7000, 'satuan' => 'kg', 'estimasi' => '2-3 hari'],
                ['id' => 2, 'nama' => 'Cuci Express', 'harga' => 12000, 'satuan' => 'kg', 'estimasi' => '1 hari'],
                ['id' => 3, 'nama' => 'Setrika Saja', 'harga' => 5000, 'satuan' => 'kg', 'estimasi' => '1 hari'],
                ['id' => 4, 'nama' => 'Cuci + Setrika', 'harga' => 10000, 'satuan' => 'kg', 'estimasi' => '2 hari'],
                ['id' => 5, 'nama' => 'Dry Cleaning', 'harga' => 25000, 'satuan' => 'pcs', 'estimasi' => '3 hari'],
                ['id' => 6, 'nama' => 'Cuci Bedcover', 'harga' => 35000, 'satuan' => 'pcs', 'estimasi' => '3-4 hari'],
            ];
            session()->set('layanan_data', $defaultLayanan);
        }
        
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
        
        if (empty($layananId) || $qty <= 0) {
            return redirect()->back()->with('error', 'Pilih layanan dan jumlah yang valid');
        }
        
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
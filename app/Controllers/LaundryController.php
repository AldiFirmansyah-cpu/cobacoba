<?php
namespace App\Controllers;

class LaundryController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $layanan = session()->get('layanan_data');
        if (!$layanan) {
            $layanan = [
                ['id' => 1, 'nama' => 'Cuci Reguler', 'harga' => 7000, 'satuan' => 'kg', 'estimasi' => '2-3 hari', 'deskripsi' => 'Layanan cuci standar'],
                ['id' => 2, 'nama' => 'Cuci Express', 'harga' => 12000, 'satuan' => 'kg', 'estimasi' => '1 hari', 'deskripsi' => 'Layanan cuci cepat'],
                ['id' => 3, 'nama' => 'Setrika Saja', 'harga' => 5000, 'satuan' => 'kg', 'estimasi' => '1 hari', 'deskripsi' => 'Layanan setrika'],
                ['id' => 4, 'nama' => 'Cuci + Setrika', 'harga' => 10000, 'satuan' => 'kg', 'estimasi' => '2 hari', 'deskripsi' => 'Paket cuci dan setrika'],
                ['id' => 5, 'nama' => 'Dry Cleaning', 'harga' => 25000, 'satuan' => 'pcs', 'estimasi' => '3 hari', 'deskripsi' => 'Cuci kering bahan khusus'],
                ['id' => 6, 'nama' => 'Cuci Bedcover', 'harga' => 35000, 'satuan' => 'pcs', 'estimasi' => '3-4 hari', 'deskripsi' => 'Cuci bedcover dan selimut'],
            ];
            session()->set('layanan_data', $layanan);
        }

        $data['layanan'] = $layanan;
        return view('layanan/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }
        return view('layanan/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $layanan = session()->get('layanan_data') ?? [];
        $newId = count($layanan) > 0 ? max(array_column($layanan, 'id')) + 1 : 1;

        $layanan[] = [
            'id'        => $newId,
            'nama'      => $this->request->getPost('nama'),
            'harga'     => (int)$this->request->getPost('harga'),
            'satuan'    => $this->request->getPost('satuan'),
            'estimasi'  => $this->request->getPost('estimasi'),
            'deskripsi' => $this->request->getPost('deskripsi') ?? '',
        ];

        session()->set('layanan_data', $layanan);
        return redirect()->to('/layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $layanan = session()->get('layanan_data') ?? [];
        $data['item'] = null;

        foreach ($layanan as $l) {
            if ($l['id'] == $id) {
                $data['item'] = $l;
                break;
            }
        }

        if (!$data['item']) {
            return redirect()->to('/layanan')->with('error', 'Layanan tidak ditemukan');
        }

        return view('layanan/edit', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $layanan = session()->get('layanan_data') ?? [];

        foreach ($layanan as $key => $l) {
            if ($l['id'] == $id) {
                $layanan[$key]['nama']      = $this->request->getPost('nama');
                $layanan[$key]['harga']     = (int)$this->request->getPost('harga');
                $layanan[$key]['satuan']    = $this->request->getPost('satuan');
                $layanan[$key]['estimasi']  = $this->request->getPost('estimasi');
                $layanan[$key]['deskripsi'] = $this->request->getPost('deskripsi') ?? '';
                break;
            }
        }

        session()->set('layanan_data', $layanan);
        return redirect()->to('/layanan')->with('success', 'Layanan berhasil diupdate');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $layanan = session()->get('layanan_data') ?? [];
        $layanan = array_values(array_filter($layanan, function($l) use ($id) {
            return $l['id'] != $id;
        }));

        session()->set('layanan_data', $layanan);
        return redirect()->to('/layanan')->with('success', 'Layanan berhasil dihapus');
    }
}
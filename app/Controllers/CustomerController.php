<?php

namespace App\Controllers;

class CustomerController extends BaseController
{
    public function index()
    {
        $data['pelanggan'] = session()->get('pelanggan_data') ?? [];
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        return view('pelanggan/create');
    }

    public function store()
    {
        $pelanggan = session()->get('pelanggan_data') ?? [];
        $newId = count($pelanggan) > 0 ? max(array_column($pelanggan, 'id')) + 1 : 1;

        $pelanggan[] = [
            'id'      => $newId,
            'nama'    => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat'  => $this->request->getPost('alamat'),
        ];

        session()->set('pelanggan_data', $pelanggan);
        return redirect()->to('pelanggan')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pelanggan = session()->get('pelanggan_data') ?? [];
        $data['item'] = null;
        foreach ($pelanggan as $p) {
            if ($p['id'] == $id) {
                $data['item'] = $p;
                break;
            }
        }
        if (!$data['item']) {
            return redirect()->to('pelanggan')->with('error', 'Pelanggan tidak ditemukan');
        }
        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        $pelanggan = session()->get('pelanggan_data') ?? [];
        foreach ($pelanggan as $key => $p) {
            if ($p['id'] == $id) {
                $pelanggan[$key]['nama']    = $this->request->getPost('nama');
                $pelanggan[$key]['telepon'] = $this->request->getPost('telepon');
                $pelanggan[$key]['alamat']  = $this->request->getPost('alamat');
                break;
            }
        }
        session()->set('pelanggan_data', $pelanggan);
        return redirect()->to('pelanggan')->with('success', 'Pelanggan berhasil diupdate');
    }

    public function delete($id)
    {
        $pelanggan = session()->get('pelanggan_data') ?? [];
        $pelanggan = array_filter($pelanggan, fn($p) => $p['id'] != $id);
        session()->set('pelanggan_data', array_values($pelanggan));
        return redirect()->to('pelanggan')->with('success', 'Pelanggan berhasil dihapus');
    }
}
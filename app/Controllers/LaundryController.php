<?php

namespace App\Controllers;

class LaundryController extends BaseController
{
    public function index()
    {
        $data['layanan'] = session()->get('layanan_data') ?? [];
        return view('layanan/index', $data);
    }

    public function create()
    {
        return view('layanan/create');
    }

    public function store()
    {
        $layanan = session()->get('layanan_data') ?? [];
        $newId = count($layanan) > 0 ? max(array_column($layanan, 'id')) + 1 : 1;

        $layanan[] = [
            'id'       => $newId,
            'nama'     => $this->request->getPost('nama'),
            'harga'    => (int)$this->request->getPost('harga'),
            'satuan'   => $this->request->getPost('satuan'),
            'estimasi' => $this->request->getPost('estimasi'),
            'deskripsi'=> $this->request->getPost('deskripsi'),
        ];

        session()->set('layanan_data', $layanan);
        return redirect()->to('layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = session()->get('layanan_data') ?? [];
        $data['item'] = null;
        foreach ($layanan as $l) {
            if ($l['id'] == $id) {
                $data['item'] = $l;
                break;
            }
        }
        if (!$data['item']) {
            return redirect()->to('layanan')->with('error', 'Layanan tidak ditemukan');
        }
        return view('layanan/edit', $data);
    }

    public function update($id)
    {
        $layanan = session()->get('layanan_data') ?? [];
        foreach ($layanan as $key => $l) {
            if ($l['id'] == $id) {
                $layanan[$key]['nama']     = $this->request->getPost('nama');
                $layanan[$key]['harga']    = (int)$this->request->getPost('harga');
                $layanan[$key]['satuan']   = $this->request->getPost('satuan');
                $layanan[$key]['estimasi'] = $this->request->getPost('estimasi');
                $layanan[$key]['deskripsi']= $this->request->getPost('deskripsi');
                break;
            }
        }
        session()->set('layanan_data', $layanan);
        return redirect()->to('layanan')->with('success', 'Layanan berhasil diupdate');
    }

    public function delete($id)
    {
        $layanan = session()->get('layanan_data') ?? [];
        $layanan = array_filter($layanan, fn($l) => $l['id'] != $id);
        session()->set('layanan_data', array_values($layanan));
        return redirect()->to('layanan')->with('success', 'Layanan berhasil dihapus');
    }
}
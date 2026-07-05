<?php
namespace App\Controllers;

class CustomerController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $pelanggan = session()->get('pelanggan_data');
        if (!$pelanggan) {
            $pelanggan = [
                ['id' => 1, 'nama' => 'Budi Santoso', 'telepon' => '081234567890', 'alamat' => 'Jl. Merdeka No. 10, Semarang'],
                ['id' => 2, 'nama' => 'Siti Aminah', 'telepon' => '081298765432', 'alamat' => 'Jl. Diponegoro No. 25, Semarang'],
                ['id' => 3, 'nama' => 'Ahmad Fauzi', 'telepon' => '085612345678', 'alamat' => 'Jl. Pandanaran No. 5, Semarang'],
                ['id' => 4, 'nama' => 'Dewi Lestari', 'telepon' => '087812345678', 'alamat' => 'Jl. Gajah Mada No. 88, Semarang'],
            ];
            session()->set('pelanggan_data', $pelanggan);
        }

        $data['pelanggan'] = $pelanggan;
        return view('pelanggan/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }
        return view('pelanggan/create');
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $pelanggan = session()->get('pelanggan_data') ?? [];
        $newId = count($pelanggan) > 0 ? max(array_column($pelanggan, 'id')) + 1 : 1;

        $pelanggan[] = [
            'id'      => $newId,
            'nama'    => $this->request->getPost('nama'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat'  => $this->request->getPost('alamat'),
        ];

        session()->set('pelanggan_data', $pelanggan);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $pelanggan = session()->get('pelanggan_data') ?? [];
        $data['item'] = null;

        foreach ($pelanggan as $p) {
            if ($p['id'] == $id) {
                $data['item'] = $p;
                break;
            }
        }

        if (!$data['item']) {
            return redirect()->to('/pelanggan')->with('error', 'Pelanggan tidak ditemukan');
        }

        return view('pelanggan/edit', $data);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

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
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil diupdate');
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $pelanggan = session()->get('pelanggan_data') ?? [];
        $pelanggan = array_values(array_filter($pelanggan, function($p) use ($id) {
            return $p['id'] != $id;
        }));

        session()->set('pelanggan_data', $pelanggan);
        return redirect()->to('/pelanggan')->with('success', 'Pelanggan berhasil dihapus');
    }
}
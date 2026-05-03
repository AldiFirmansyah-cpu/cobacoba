<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    // Data user statis (SOAL 04)
    private $users = [
        'admin' => [
            'password' => 'admin123',
            'name'     => 'Administrator Kampus',
            'role'     => 'admin'
        ]
    ];

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/');
        }
        return view('login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (isset($this->users[$username]) && $this->users[$username]['password'] === $password) {
            session()->set([
                'isLoggedIn' => true,
                'username'   => $username,
                'name'       => $this->users[$username]['name'],
                'role'       => $this->users[$username]['role']
            ]);
            return redirect()->to('/')->with('success', 'Selamat datang ' . $this->users[$username]['name']);
        }

        return redirect()->back()->with('error', 'Username atau password salah!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout');
    }
}
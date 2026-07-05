<?php
namespace App\Controllers;

class ReportController extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $transaksi = session()->get('transaksi_data') ?? [];

        $totalPendapatan = 0;
        foreach ($transaksi as $t) {
            if (isset($t['total']) && is_numeric($t['total'])) {
                $totalPendapatan += $t['total'];
            }
        }

        $totalTransaksi = count($transaksi);
        $rataRata = $totalTransaksi > 0 ? $totalPendapatan / $totalTransaksi : 0;

        $data = [
            'transaksi'       => $transaksi,
            'totalPendapatan' => $totalPendapatan,
            'totalTransaksi'  => $totalTransaksi,
            'rataRata'        => $rataRata,
        ];

        return view('laporan/index', $data);
    }

    public function generatePDF()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak');
        }

        $transaksi = session()->get('transaksi_data') ?? [];

        $totalPendapatan = 0;
        foreach ($transaksi as $t) {
            if (isset($t['total']) && is_numeric($t['total'])) {
                $totalPendapatan += $t['total'];
            }
        }

        $html = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Laporan ALLAUNDRY</title>';
        $html .= '<style>body{font-family:Arial,sans-serif;margin:20px}h1{color:#0d9488;text-align:center}';
        $html .= 'h2{color:#1e293b}table{width:100%;border-collapse:collapse;margin:20px 0}';
        $html .= 'th,td{border:1px solid #ddd;padding:8px;text-align:left}';
        $html .= 'th{background-color:#0d9488;color:white}.total{font-size:18px;font-weight:bold;color:#0d9488}</style></head><body>';
        $html .= '<h1>ALLAUNDRY</h1><p style="text-align:center">Laporan Transaksi Laundry</p>';
        $html .= '<p style="text-align:center">Tanggal: ' . date('d-m-Y H:i:s') . '</p>';
        $html .= '<h2>Ringkasan</h2>';
        $html .= '<p><strong>Total Transaksi:</strong> ' . count($transaksi) . '</p>';
        $html .= '<p class="total"><strong>Total Pendapatan:</strong> Rp ' . number_format($totalPendapatan, 0, ',', '.') . '</p>';
        $html .= '<h2>Detail Transaksi</h2><table><thead><tr>';
        $html .= '<th>No</th><th>No. Transaksi</th><th>Pelanggan</th><th>Items</th><th>Total</th><th>Status</th><th>Tanggal</th>';
        $html .= '</tr></thead><tbody>';

        $no = 1;
        foreach ($transaksi as $t) {
            $html .= '<tr>';
            $html .= '<td>' . $no++ . '</td>';
            $html .= '<td>' . ($t['no_transaksi'] ?? '-') . '</td>';
            $html .= '<td>' . ($t['pelanggan'] ?? '-') . '</td>';
            $html .= '<td>' . ($t['items'] ?? '-') . '</td>';
            $html .= '<td>Rp ' . number_format($t['total'] ?? 0, 0, ',', '.') . '</td>';
            $html .= '<td>' . ($t['status'] ?? '-') . '</td>';
            $html .= '<td>' . ($t['tanggal'] ?? '-') . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        $html .= '<div style="margin-top:50px;text-align:center"><p>Terima kasih telah menggunakan ALLAUNDRY</p></div>';
        $html .= '</body></html>';

        return $this->response
            ->setHeader('Content-Type', 'text/html')
            ->setBody($html);
    }
}
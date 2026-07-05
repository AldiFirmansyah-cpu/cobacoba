<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transaksi <?= $item['no_transaksi'] ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { text-align: center; border-bottom: 3px solid #002147; padding-bottom: 20px; margin-bottom: 30px; }
        .header h1 { color: #002147; margin: 0; }
        .info-table { width: 100%; margin-bottom: 20px; }
        .info-table td { padding: 8px; vertical-align: top; }
        .items-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .items-table th, .items-table td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        .items-table th { background-color: #002147; color: white; }
        .total { text-align: right; font-size: 1.2em; font-weight: bold; margin-top: 20px; }
        .footer { margin-top: 50px; text-align: center; font-size: 0.9em; color: #666; }
    </style>
</head>
<body>
    <div class="header">
        <h1>ALLAUNDRY</h1>
        <p>Sistem Manajemen Laundry Profesional</p>
    </div>

    <table class="info-table">
        <tr>
            <td width="200"><strong>No. Transaksi:</strong></td>
            <td><?= $item['no_transaksi'] ?></td>
            <td width="200"><strong>Tanggal:</strong></td>
            <td><?= date('d/m/Y H:i', strtotime($item['tanggal'])) ?></td>
        </tr>
        <tr>
            <td><strong>Pelanggan:</strong></td>
            <td><?= $item['pelanggan'] ?></td>
            <td><strong>Status:</strong></td>
            <td><?= $item['status'] ?></td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr><th>No</th><th>Item</th><th>Keterangan</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><?= $item['items'] ?></td>
                <td>-</td>
            </tr>
        </tbody>
    </table>

    <div class="total">Total: Rp <?= number_format($item['total'], 0, ',', '.') ?></div>

    <div class="footer">
        <p>Terima kasih telah menggunakan layanan kami</p>
    </div>
</body>
</html>
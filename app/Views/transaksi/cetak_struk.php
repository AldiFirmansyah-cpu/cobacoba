<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cetak Struk - <?= $item['no_transaksi'] ?></title>
    <style>
        @media print {
            @page {
                size: 80mm auto;
                margin: 0;
            }
            body {
                margin: 0;
                padding: 0;
                font-family: 'Courier New', monospace;
                font-size: 12px;
                width: 80mm;
            }
            .no-print {
                display: none;
            }
        }
        body {
            font-family: 'Courier New', monospace;
            font-size: 12px;
            width: 80mm;
            margin: 0 auto;
            padding: 10px;
        }
        .header {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }
        .header h2 {
            margin: 5px 0;
            font-size: 16px;
        }
        .header p {
            margin: 2px 0;
            font-size: 11px;
        }
        .info {
            margin-bottom: 10px;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            margin: 3px 0;
        }
        .items {
            margin-bottom: 10px;
        }
        .item-row {
            border-bottom: 1px dotted #ccc;
            padding: 5px 0;
        }
        .item-name {
            font-weight: bold;
        }
        .item-detail {
            font-size: 11px;
            color: #666;
        }
        .total {
            border-top: 1px dashed #000;
            border-bottom: 1px dashed #000;
            padding: 10px 0;
            margin: 10px 0;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 14px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 11px;
        }
        .barcode {
            text-align: center;
            margin: 10px 0;
            font-family: 'Libre Barcode 39 Text', cursive;
            font-size: 24px;
        }
        .btn-print {
            background: #0ea5e9;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin: 10px 5px;
        }
        .btn-print:hover {
            background: #0369a1;
        }
        .btn-close {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin: 10px 5px;
            text-decoration: none;
            display: inline-block;
        }
        .no-print {
            text-align: center;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="no-print">
        <button onclick="window.print()" class="btn-print">
            <i class="bi bi-printer"></i> Cetak Struk
        </button>
        <a href="/transaksi" class="btn-close">Tutup</a>
    </div>

    <div class="header">
        <h2>🧺 ALLAUNDRY</h2>
        <p>Jl. Pahlawan No. 123, Semarang</p>
        <p>Telp: (024) 7654321</p>
        <p>www.allalaundry.id</p>
    </div>

    <div class="info">
        <div class="info-row">
            <span>No. Transaksi:</span>
            <strong><?= $item['no_transaksi'] ?></strong>
        </div>
        <div class="info-row">
            <span>Tanggal:</span>
            <span><?= date('d/m/Y H:i', strtotime($item['tanggal'] . ' ' . ($item['waktu'] ?? '00:00:00'))) ?></span>
        </div>
        <div class="info-row">
            <span>Pelanggan:</span>
            <span><?= $item['pelanggan'] ?></span>
        </div>
        <div class="info-row">
            <span>Status:</span>
            <span><?= $item['status'] ?></span>
        </div>
    </div>

    <div class="items">
        <strong>Detail Layanan:</strong>
        <?php 
        $items = explode(', ', $item['items']);
        foreach($items as $idx => $detail): 
        ?>
        <div class="item-row">
            <div class="item-name"><?= $idx + 1 ?>. <?= $detail ?></div>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="total">
        <div class="total-row">
            <span>TOTAL:</span>
            <span>Rp <?= number_format($item['total'], 0, ',', '.') ?></span>
        </div>
    </div>

    <div class="barcode">
        *<?= $item['no_transaksi'] ?>*
    </div>

    <div class="footer">
        <p>Terima kasih telah menggunakan</p>
        <p>layanan ALLAUNDRY</p>
        <p>Pakaian bersih, hati senang!</p>
        <p style="margin-top: 20px;"><?= date('Y-m-d H:i:s') ?></p>
    </div>

    <script>
        // Auto print when page loads
        window.onload = function() {
            // Uncomment below to auto-print
            // window.print();
        }
    </script>
</body>
</html>
<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionDetailModel extends Model
{
    protected $table = 'transaksi_detail';
    protected $primaryKey = 'id';
    protected $allowedFields = ['transaksi_id', 'layanan_id', 'qty', 'harga', 'subtotal'];
    protected $useTimestamps = true;
    
    public function getDetailsByTransaction($transaksiId)
    {
        return $this->select('transaksi_detail.*, layanan.nama_layanan')
            ->join('layanan', 'layanan.id = transaksi_detail.layanan_id')
            ->where('transaksi_detail.transaksi_id', $transaksiId)
            ->findAll();
    }
}
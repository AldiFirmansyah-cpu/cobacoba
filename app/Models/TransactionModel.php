<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'no_transaksi', 'pelanggan_id', 'total_harga', 'status', 
        'tanggal_transaksi', 'tanggal_selesai', 'catatan'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function getTransactionWithDetails($id = null)
    {
        if ($id) {
            return $this->select('transaksi.*, pelanggan.nama as nama_pelanggan, pelanggan.no_telepon')
                ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
                ->find($id);
        }
        
        return $this->select('transaksi.*, pelanggan.nama as nama_pelanggan')
            ->join('pelanggan', 'pelanggan.id = transaksi.pelanggan_id')
            ->orderBy('transaksi.created_at', 'DESC')
            ->findAll();
    }
}
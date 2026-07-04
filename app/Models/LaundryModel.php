<?php

namespace App\Models;

use CodeIgniter\Model;

class LaundryModel extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_layanan', 'harga', 'keterangan', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
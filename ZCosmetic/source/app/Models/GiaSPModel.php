<?php

namespace App\Models;

use CodeIgniter\Model;

class GiaSPModel extends Model
{
    protected $table      = 'tbl_giasanpham';
    protected $primaryKey = ['MaGia', 'MaSanPham', 'NgayHieuLuc'];

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['MaGia', 'MaSanPham', 'NgayHieuLuc', 'NgayHetHieuLuc'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

    // Validation
    protected $validationRules = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    //CRUD methods
    public function getGiaSPByID($id)
    {
        return $this->find($id);
    }

    public function createGiaSP($data)
    {
        return $this->insert($data);
    }

    public function updateGiaSP($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteGiaSP($id)
    {
        return $this->delete($id);
    }
}
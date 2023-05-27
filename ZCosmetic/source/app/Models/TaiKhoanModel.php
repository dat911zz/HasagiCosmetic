<?php

namespace App\Models;

use CodeIgniter\Model;

class TaiKhoanModel extends Model
{
    protected $table      = 'tbl_taikhoan';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['TenDangNhap', 'MatKhau', 'MaNhomQuyen', 'LoaiTaiKhoan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';

    // Validation
    protected $validationRules      = [];
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
    public function getTKByID($id)
    {
        return $this->find($id);
    }

    public function createTK($data)
    {
        return $this->insert($data);
    }

    public function updateTK($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTK($id)
    {
        return $this->delete($id);
    }
}
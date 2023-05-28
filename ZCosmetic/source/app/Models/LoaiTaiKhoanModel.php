<?php

namespace App\Models;

use CodeIgniter\Model;

class LoaiTaiKhoanModel extends Model
{
    protected $table      = 'tbl_loaitaikhoan';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['MaLoai', 'TenLoai'];

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
    public function getLoaiByID($id)
    {
        return $this->find($id);
    }

    public function createLoai($data)
    {
        return $this->insert($data);
    }

    public function updateLoai($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLoai($id)
    {
        return $this->delete($id);
    }
}
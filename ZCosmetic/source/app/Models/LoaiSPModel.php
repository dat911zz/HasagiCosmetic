<?php

namespace App\Models;

use CodeIgniter\Model;

class LoaiSPModel extends Model
{
    protected $table      = 'tbl_loaisanpham';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Ten', 'MaDanhMuc'];

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
    public function getLoaiSPByID($id)
    {
        return $this->find($id);
    }

    public function createLoaiSP($data)
    {
        return $this->insert($data);
    }

    public function updateLoaiSP($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteLoaiSP($id)
    {
        return $this->delete($id);
    }
}
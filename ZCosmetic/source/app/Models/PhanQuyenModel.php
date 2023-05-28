<?php

namespace App\Models;

use CodeIgniter\Model;

class PhanQuyenModel extends Model
{
    protected $table      = 'tbl_phanquyen';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['MaQuyen', 'MaNhomQuyen'];

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
    public function getPQByID($id)
    {
        return $this->find($id);
    }

    public function createPQ($data)
    {
        return $this->insert($data);
    }

    public function updatePQ($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePQ($id)
    {
        return $this->delete($id);
    }
}
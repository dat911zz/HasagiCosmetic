<?php

namespace App\Models;

use CodeIgniter\Model;

class QuyenModel extends Model
{
    protected $table      = 'tbl_quyen';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Ma', 'Ten'];

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
    public function getQuyenByID($id)
    {
        return $this->find($id);
    }

    public function createQuyen($data)
    {
        return $this->insert($data);
    }

    public function updateQuyen($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteQuyen($id)
    {
        return $this->delete($id);
    }
}
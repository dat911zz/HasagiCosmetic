<?php

namespace App\Models;

use CodeIgniter\Model;

class DanhMucModel extends Model
{
    protected $table      = 'tbl_danhmuc';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Ten'];

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
    public function getDMByID($id)
    {
        return $this->find($id);
    }

    public function createDM($data)
    {
        return $this->insert($data);
    }

    public function updateDM($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteDM($id)
    {
        return $this->delete($id);
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class NhanVienModel extends Model
{
    protected $table      = 'tbl_nhanvien';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['HoVaTen', 'GioiTinh', 'DiaChi', 'SDT', 'CMND', 'MaLoai'];

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
    public function getNVByID($id)
    {
        return $this->find($id);
    }

    public function createNV($data)
    {
        return $this->insert($data);
    }

    public function updateNV($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteNV($id)
    {
        return $this->delete($id);
    }
}
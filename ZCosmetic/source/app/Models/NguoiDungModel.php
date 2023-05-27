<?php

namespace App\Models;

use CodeIgniter\Model;

class NguoiDungModel extends Model
{
    protected $table      = 'tbl_nguoidung';
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
    public function getNDByID($id)
    {
        return $this->find($id);
    }

    public function createND($data)
    {
        return $this->insert($data);
    }

    public function updateND($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteND($id)
    {
        return $this->delete($id);
    }
}
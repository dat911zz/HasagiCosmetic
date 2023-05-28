<?php

namespace App\Models;

use CodeIgniter\Model;

class NhanVienModel extends Model
{
    protected $table      = 'tbl_nhanvien';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = false;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Ma', 'HoVaTen', 'NgaySinh', 'GioiTinh', 'DiaChi', 'SDT', 'CMND'];

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

    public function checkUnique($sdt, $cmnd){
        foreach($this->findAll() as $tk){
            if($tk['SDT'] == $sdt || $tk['CMND'] == $cmnd){
                return false;
            }
        }
        return true;
    }
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
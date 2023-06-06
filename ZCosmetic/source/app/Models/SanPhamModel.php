<?php

namespace App\Models;

use CodeIgniter\Model;

class SanPhamModel extends Model
{
    protected $table      = 'tbl_sanpham';
    protected $primaryKey = 'Ma';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $usePagination = true;
    protected $perPage = 5;
    protected $allowedFields = ['Ma', 'TenSanPham', 'MaHinh', 'SoLuongTon', 'MaDVT', 'MaLoai', 'ThuongHieu', 'XuatXu', 'MoTa', 'GiamGia'];

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

    public function checkUnique($tenSP){
        foreach($this->findAll() as $tk){
            if($tk['TenSanPham'] == $tenSP){
                return false;
            }
        }
        return true;
    }
    //CRUD methods
    public function getSPByID($id)
    {
        return $this->find($id);
    }

    public function createSP($data)
    {
        return $this->insert($data);
    }

    public function updateSP($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSP($id)
    {
        return $this->delete($id);
    }
}
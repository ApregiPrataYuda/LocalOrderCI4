<?php

namespace App\Models;

use CodeIgniter\Model;

class PartDivisiModel extends Model
{
    protected $table            = 'ms_part_divisi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['partID','divisiID','standart_Pack','unitID_StdPack','safety_Stock','minimum_Order','UnitID_Stock','Is_Active','created_By'];

    // protected bool $allowEmptyInserts = false;
    // protected bool $updateOnlyChanged = true;

    // protected array $casts = [];
    // protected array $castHandlers = [];

    // // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks = true;
    // protected $beforeInsert   = [];
    // protected $afterInsert    = [];
    // protected $beforeUpdate   = [];
    // protected $afterUpdate    = [];
    // protected $beforeFind     = [];
    // protected $afterFind      = [];
    // protected $beforeDelete   = [];
    // protected $afterDelete    = [];

    public function getByRequest($division)
{
    $builder = $this->db->table('ms_part_divisi as a')
                       ->select('a.*, c.PartName, d.UnitName')
                       ->join('Ms_Part as c', 'a.partID = c.partID', 'left')
                       ->join('Ms_Unit as d', 'a.unitID_StdPack = d.UnitID', 'left')
                       ->where('a.divisiID', $division)
                       ->orderBy('a.id', 'DESC');
    $query = $builder->get();
    return $query->getResult();
}
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Reportsstock extends Model
{
    protected $table            = 'ms_part_divisi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

//     protected bool $allowEmptyInserts = false;
//     protected bool $updateOnlyChanged = true;

//     protected array $casts = [];
//     protected array $castHandlers = [];

//     // Dates
//     protected $useTimestamps = false;
//     protected $dateFormat    = 'datetime';
//     protected $createdField  = 'created_at';
//     protected $updatedField  = 'updated_at';
//     protected $deletedField  = 'deleted_at';

//     // Validation
//     protected $validationRules      = [];
//     protected $validationMessages   = [];
//     protected $skipValidation       = false;
//     protected $cleanValidationRules = true;

//     // Callbacks
//     protected $allowCallbacks = true;
//     protected $beforeInsert   = [];
//     protected $afterInsert    = [];
//     protected $beforeUpdate   = [];
//     protected $afterUpdate    = [];
//     protected $beforeFind     = [];
//     protected $afterFind      = [];
//     protected $beforeDelete   = [];
//     protected $afterDelete    = [];

public function getcheck($startDate, $endDate, $divisi, $group)
{
    // Set timezone
    date_default_timezone_set('Asia/Jakarta');
    
    // Format tanggal untuk nama tabel default
    $bulan = date("m");
    $yearx = date('Y');
    $yearmonth = $yearx . $bulan;
    $nametbdefault = 'buku_stock' . $yearmonth;

    // Format tanggal untuk nama tabel yang diminta
    $usingExp = explode('-', $endDate);
    $pecahLagi = implode("", $usingExp);
    $get6carakterFirstdate = substr($pecahLagi, 0, 6);
    $nametb = 'buku_stock' . $get6carakterFirstdate;

    // Query builder
    $builder = $this->db->table('ms_part_divisi a');
    $builder->select('c.partID, c.PartName, a.standart_Pack, c.OtherID, a.UnitID_Stock, c.UnitID_PO, 
        COALESCE((SELECT SUM(x.qty) 
            FROM ' . ($nametb == 'buku_stock' ? $nametbdefault : $nametb) . ' x 
            INNER JOIN Ms_WarehouseStock z ON x.locationid = z.locationid 
            INNER JOIN ms_part_divisi y ON x.partid = y.partid 
            WHERE x.partid = a.partID 
            AND z.groupcode = ' . $this->db->escape($group) . ' 
            AND z.DivisionID = ' . $this->db->escape($divisi) . ' 
            AND x.Tgl <= ' . $this->db->escape($endDate) . '), 0) AS endstock, 
        a.safety_Stock');
        
    $builder->join('ms_part c', 'c.PartID = a.partID');
    $builder->where('a.divisiID', $divisi);
    $builder->where('a.Is_Active', 1);
    $builder->groupBy('a.partID, c.PartName, a.standart_Pack, c.OtherID, a.UnitID_Stock, c.UnitID_PO, a.safety_Stock, c.PartID, a.id');
    $builder->orderBy('a.id', 'DESC');

    // Execute query
    return $builder->get();
}
}

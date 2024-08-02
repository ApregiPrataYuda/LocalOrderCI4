<?php

namespace App\Models;

use CodeIgniter\Model;

class PartsModel extends Model
{
    protected $table            = 'Ms_Part';
    protected $primaryKey       = 'PartID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

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


    //gunakan metode code ini di sql server 2012 
//     public function getDataTables($searchValue = '', $start = 0, $length = 10, $orderColumn = 'PartID', $orderDirection = 'asc')
// {
//     $builder = $this->db->table($this->table)
//                         ->select('*');
                       
    
//     if ($searchValue) {
//         $builder->groupStart()
//                 ->like('PartName', $searchValue)
//                 ->groupEnd();
//     }
    
//     $builder->orderBy($orderColumn, $orderDirection);
    
//     if ($length != -1) {
//         $builder->limit($length, $start);
//     }

//     return $builder->get()->getResultArray();
// }

// public function countAllData()
// {
//     return $this->db->table($this->table)
//                     ->countAllResults();
// }

// public function countFilteredData($searchValue = '')
// {
//     $builder = $this->db->table($this->table);
                      

//     if ($searchValue) {
//         $builder->groupStart()
//                 ->like('PartName', $searchValue)
//                 ->groupEnd();
//     }

//     return $builder->countAllResults();
// }

//gunakan metode code ini di sql server 2008 (sebab sql 2008 tidak mendukung sistem offset)
//kekurangannya pengkodeaan dilakukan menggunakan code sql biasa (not bilder)
public function getDataTables($searchValue = '', $start = 0, $length = 10, $orderColumn = 'PartID', $orderDirection = 'asc')
{
    // Menyiapkan query CTE dengan ROW_NUMBER()
    $sql = "
        WITH CTE AS (
            SELECT 
                *,
                ROW_NUMBER() OVER (ORDER BY $orderColumn $orderDirection) AS RowNum
            FROM
                $this->table
            WHERE
                1 = 1
    ";

    // Menambahkan kondisi pencarian jika ada
    if (!empty($searchValue)) {
        $sql .= " AND PartName LIKE '%" . $this->db->escapeLikeString($searchValue) . "%'";
    }
    
    $sql .= "
        )
        SELECT * 
        FROM CTE
        WHERE RowNum BETWEEN " . ($start + 1) . " AND " . ($start + $length) . ";
    ";

    // Menjalankan query dan mengembalikan hasil dalam bentuk array
    return $this->db->query($sql)->getResultArray();
}

public function countAllData()
{
    // Menghitung total jumlah data dalam tabel
    return $this->db->table($this->table)->countAllResults();
}

public function countFilteredData($searchValue = '')
{
    // Menyiapkan query CTE untuk menghitung baris yang terfilter
    $sql = "
        WITH CTE AS (
            SELECT 
                *,
                ROW_NUMBER() OVER (ORDER BY PartID) AS RowNum
            FROM
                $this->table
            WHERE
                1 = 1
    ";
    
    // Menambahkan kondisi pencarian jika ada
    if (!empty($searchValue)) {
        $sql .= " AND PartName LIKE '%" . $this->db->escapeLikeString($searchValue) . "%'";
    }

    $sql .= "
        )
        SELECT COUNT(*) AS Total
        FROM CTE;
    ";
    
    // Menjalankan query dan mengembalikan hasil
    $result = $this->db->query($sql)->getRow();
    return $result->Total;
}




}
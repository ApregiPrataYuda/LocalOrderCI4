<?php

namespace App\Models;

use CodeIgniter\Model;

class TransPAModel extends Model
{
    // protected $table            = 'Trans_PA202408';
    // protected $primaryKey       = 'Unik';
    // protected $useAutoIncrement = true;
    // protected $returnType       = 'array';
    // protected $useSoftDeletes   = false;
    // protected $protectFields    = true;
    // protected $allowedFields    = ['NoPR'];

    // public function checkNoprExists($noLocalOrder)
    // {
    //     $query = $this->db->table('Trans_PA202408')
    //                   ->getWhere(['NoPR' => $noLocalOrder]);
    //     return $query->getRow();
    // }
    
    protected $table; // Pastikan properti $table ada
    protected $primaryKey       = 'Unik';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NoPR'];

    public function __construct()
    {
        parent::__construct();
        $this->setDynamicTable(); // Ganti nama metode yang memetakan tabel secara dinamis
    }

    // Ubah nama metode menjadi setDynamicTable
    public function setDynamicTable()
    {
        // Ambil tahun dan bulan saat ini
        $yearMonth = date('Ym'); // Format: 202408
        $this->table = 'Trans_PA' . $yearMonth;

        // Cek apakah tabel ada di database
        if (!$this->db->tableExists($this->table)) {
            throw new \Exception('Tabel ' . $this->table . ' tidak ditemukan di database.');
        }
    }

    public function checkNoprExists($noLocalOrder)
    {
        $query = $this->db->table($this->table) // Gunakan nama tabel dinamis
                          ->getWhere(['NoPR' => $noLocalOrder]);
        return $query->getRow();
    }
}

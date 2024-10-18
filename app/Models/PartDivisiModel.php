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
                       ->select('a.*, c.PartName, d.UnitName, c.OtherID, c.Material')
                       ->join('Ms_Part as c', 'a.partID = c.partID', 'left')
                       ->join('Ms_Unit as d', 'a.unitID_StdPack = d.UnitID', 'left')
                       ->where('a.divisiID', $division)
                       ->orderBy('a.id', 'DESC');
    $query = $builder->get();
    return $query->getResult();
}

public function getAllPartDivisi() {
    return $this->findAll(); // Mengembalikan semua data
}

// public function getPartDivisi($namediv) {
   
//         //get Group
//         $groupBranch =  session()->get('groupBranch');
//         $bulan = date("m"); // Misalnya '08' untuk Agustus
//         $tahun = date('Y'); // Misalnya '2024'
//         // Menggabungkan tahun dan bulan menjadi format YYYYMM
//         $monthAndYearnow = $tahun . $bulan;
//         //inisialisasi date
//         $now = new \DateTime();
//         // Modifikasi untuk mendapatkan tanggal dari bulan sebelumnya
//         $previousMonth = $now->modify('first day of -1 month');
//         // Ambil bulan dan tahun dari objek DateTime yang sudah dimodifikasi
//         $monthf = $previousMonth->format('m'); // Bulan dalam format dua digit
//         $yearz = $previousMonth->format('Y');  // Tahun dalam format empat digit
//         // Gabungkan tahun dan bulan untuk mendapatkan format YYYYMM
//         $monthoneminusfromnow = $yearz . $monthf;

//             // Menggunakan Query Builder
//         $builder = $this->db->table('ms_part_divisi as a');
//         $builder->select('
//             c.partID, 
//             c.PartName, 
//             a.standart_Pack, 
//             c.OtherID, 
//             a.UnitID_Stock, 
//             c.UnitID_PO, 
//             a.minimum_Order, 
//             c.Konversi,
//             a.divisiID,
//             a.unitID_StdPack,
//             ISNULL((SELECT SUM(x.qty) 
//                     FROM buku_stock' . $monthoneminusfromnow . ' x 
//                     INNER JOIN Ms_WarehouseStock z ON x.locationid = z.locationid 
//                     INNER JOIN ms_part_divisi y ON x.partid = y.partid AND y.divisiID = z.DivisionID 
//                     WHERE x.partid = a.partID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS endstock, 
//             a.safety_Stock,
//             ISNULL((SELECT SUM(x.QtyStock) 
//                     FROM trans_BPBDT' . $monthAndYearnow . ' x 
//                     INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
//                     LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
//                     INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
//                     WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS InActual,
//             ISNULL((SELECT SUM(orderMonth2) 
//                     FROM trans_local_orderDT x 
//                     INNER JOIN ms_part_divisi y ON x.idPartDivisi = y.partid AND x.idPartDivisi = a.partID 
//                     WHERE month2 = \'' . $monthoneminusfromnow . '\' AND y.divisiID = \'' . $namediv . '\'), 0) - 
//             ISNULL((SELECT SUM(x.QtyStock) 
//                     FROM trans_BPBDT' . $monthAndYearnow . ' x 
//                     INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
//                     LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
//                     INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
//                     WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS HPO
//         ');
//         // Menyertakan join
//         $builder->join('ms_part c', 'c.PartID = a.partID');

//         // Menambahkan where condition
//         $builder->where('a.divisiID', $namediv);
//         $builder->where('a.Is_Active', 1);

//         // Menggunakan GROUP BY
//         $builder->groupBy([
//             'a.partID', 
//             'c.PartName', 
//             'a.standart_Pack', 
//             'c.OtherID', 
//             'a.UnitID_Stock', 
//             'c.UnitID_PO', 
//             'a.safety_Stock', 
//             'c.PartID', 
//             'a.id', 
//             'a.minimum_Order', 
//             'c.Konversi',
//             'a.divisiID',
//             'a.unitID_StdPack',
//         ]);
//         // Mengatur ORDER BY
//         $builder->orderBy('c.PartName', 'ASC');

//             // Menjalankan query
//             $query = $builder->get();
//             return $query->getResult();




// }




// new query
public function getPartDivisi($namediv) {
    // Get Group
    $groupBranch = session()->get('groupBranch');
    $bulan = date("m"); // Current month
    $tahun = date('Y'); // Current year
    // Combine year and month into YYYYMM format
    $monthAndYearnow = $tahun . $bulan;
    // Initialize date
    $now = new \DateTime();
    // Get the first day of the previous month
    $previousMonth = $now->modify('first day of -1 month');
    // Extract month and year
    $monthf = $previousMonth->format('m');
    $yearz = $previousMonth->format('Y');
    // Combine year and month for YYYYMM
    $monthoneminusfromnow = $yearz . $monthf;



    if ($namediv == 'W1') {
         
        $builder = $this->db->table('ms_part_divisi as a');
        $builder->select('
           c.partID, 
             c.PartName, 
             a.standart_Pack, 
             c.OtherID, 
             a.UnitID_Stock, 
             c.UnitID_PO, 
             a.minimum_Order, 
             c.Konversi,
             a.divisiID,
             a.unitID_StdPack,
            ISNULL((SELECT SUM(x.qty) 
                    FROM buku_stock' . $monthoneminusfromnow . ' x 
                    INNER JOIN Ms_WarehouseStock z ON x.locationid = z.locationid 
                    INNER JOIN ms_part_divisi y ON x.partid = y.partid AND y.divisiID = z.DivisionID 
                    WHERE x.partid = a.partID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\' AND z.LocationID IN (\'WH 1-N\', \'WH 1-AS\')), 0) AS endstock, 
            a.safety_Stock,
            ISNULL((SELECT SUM(x.QtyStock) 
                    FROM trans_BPBDT' . $monthAndYearnow . ' x 
                    INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
                    LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
                    INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
                    WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\' AND z.LocationID IN (\'WH 1-N\', \'WH 1-AS\')), 0) AS InActual,
            ISNULL((SELECT SUM(QtyHutangPO) 
                    FROM Ms_HutangPO x 
                    INNER JOIN ms_part_divisi y ON x.PartID = y.partid AND x.PartID = a.partID AND x.DivisiID = y.divisiID 
                    WHERE Periode = \'' . $monthoneminusfromnow . '\' AND y.divisiID = \'' . $namediv . '\'), 0) - 
            ISNULL((SELECT SUM(x.QtyStock) 
                    FROM trans_BPBDT' . $monthAndYearnow . ' x 
                    INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
                    LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
                    INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
                    WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\' AND z.LocationID IN (\'WH 1-N\', \'WH 1-AS\')), 0) AS HPO
        ');
    
        // Join statement
        $builder->join('ms_part c', 'c.PartID = a.partID');
    
        // Where conditions
        $builder->where('a.divisiID', $namediv);
        $builder->where('a.Is_Active', 1);
    
        // Group By
        $builder->groupBy([
            'a.partID', 
            'c.PartName', 
            'a.standart_Pack', 
            'c.OtherID', 
            'a.UnitID_Stock', 
            'c.UnitID_PO', 
            'a.safety_Stock', 
            'c.PartID', 
            'a.id', 
            'a.minimum_Order', 
            'c.Konversi',
            'a.divisiID',
            'a.unitID_StdPack',
        ]);
    
        // Order By
        $builder->orderBy('c.PartName', 'ASC');
    
        // Execute the query
        $query = $builder->get();
        return $query->getResult();


    }else {
        

         // Using Query Builder
    $builder = $this->db->table('ms_part_divisi as a');
    $builder->select('
             c.partID, 
             c.PartName, 
             a.standart_Pack, 
             c.OtherID, 
             a.UnitID_Stock, 
             c.UnitID_PO, 
             a.minimum_Order, 
             c.Konversi,
             a.divisiID,
             a.unitID_StdPack,
        ISNULL((SELECT SUM(x.qty) 
                FROM buku_stock' . $monthoneminusfromnow . ' x 
                INNER JOIN Ms_WarehouseStock z ON x.locationid = z.locationid 
                INNER JOIN ms_part_divisi y ON x.partid = y.partid AND y.divisiID = z.DivisionID 
                WHERE x.partid = a.partID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS endstock, 
        a.safety_Stock,
        ISNULL((SELECT SUM(x.QtyStock) 
                FROM trans_BPBDT' . $monthAndYearnow . ' x 
                INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
                LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
                INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
                WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS InActual,
        ISNULL((SELECT SUM(QtyHutangPO) 
                FROM Ms_HutangPO x 
                INNER JOIN ms_part_divisi y ON x.PartID = y.partid AND x.PartID = a.partID AND x.DivisiID = y.divisiID 
                WHERE Periode = \'' . $monthoneminusfromnow . '\' AND y.divisiID = \'' . $namediv . '\'), 0) - 
        ISNULL((SELECT SUM(x.QtyStock) 
                FROM trans_BPBDT' . $monthAndYearnow . ' x 
                INNER JOIN Trans_BPBHD' . $monthAndYearnow . ' v ON v.NoBukti = x.NoBukti 
                LEFT JOIN ms_part_divisi y ON x.partid = y.partid 
                INNER JOIN ms_warehousestock z ON z.DivisionID = y.divisiID AND z.LocationID = v.LocationID 
                WHERE y.partID = a.PartID AND z.groupcode = \'' . $groupBranch . '\' AND z.DivisionID = \'' . $namediv . '\'), 0) AS HPO
    ');

    // Join statement
    $builder->join('ms_part c', 'c.PartID = a.partID');
    // Where conditions
    $builder->where('a.divisiID', $namediv);
    $builder->where('a.Is_Active', 1);
    // Group By
    $builder->groupBy([
                    'a.partID', 
                    'c.PartName', 
                    'a.standart_Pack', 
                    'c.OtherID', 
                    'a.UnitID_Stock', 
                    'c.UnitID_PO', 
                    'a.safety_Stock', 
                    'c.PartID', 
                    'a.id', 
                    'a.minimum_Order', 
                    'c.Konversi',
                    'a.divisiID',
                    'a.unitID_StdPack',
                ]);

    // Order By
    $builder->orderBy('c.PartName', 'ASC');

    // Execute the query
    $query = $builder->get();
    return $query->getResult();
    }





   
}

}

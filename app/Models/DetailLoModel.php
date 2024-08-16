<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailLoModel extends Model
{
    protected $table            = 'trans_local_orderDT';
    protected $primaryKey       = 'idDetail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['localOrderNo','idPartDivisi','keterangan','month1','endStockMonth1','month2','inActualMonth2','hpoMonth2','outPlanMonth2','orderMonth2','balancePlanMonth2','planMonth2','month3','outPlanMonth3','balancePlanMonth3','planMonth3','month4','outPlanMonth4','orderMonthPO'];


    public function getDataReport($noLocalOrder, $nameDivision)
    {
        // Menyiapkan query SQL dengan binding parameter
        $sql = "SELECT a.idPartDivisi, c.OtherID, c.PartName, b.standart_Pack, b.safety_Stock, b.unitID_StdPack, b.minimum_Order,
                a.keterangan, a.endStockMonth1, a.inActualMonth2, a.hpoMonth2, a.outPlanMonth2, a.orderMonth2, a.balancePlanMonth2, a.orderMonthPO,
                a.planMonth2, a.outPlanMonth3, a.balancePlanMonth3, a.planMonth3, a.outPlanMonth4, d.formula, a.month1, a.month2, a.month3, a.month4, b.UnitID_Stock
                FROM trans_local_orderDT as a
                LEFT JOIN ms_part_divisi as b on a.idPartDivisi = b.partID
                LEFT JOIN Ms_Part as c on b.partID = c.PartID
                LEFT JOIN trans_local_orderHD AS d on a.localOrderNo = d.localOrderNo
                WHERE d.localOrderNo = ? AND d.divisiId = ?";
        
        // Menjalankan query dengan parameter binding
        $query = $this->db->query($sql, [$noLocalOrder, $nameDivision]);
    
        // Mengembalikan hasil sebagai array objek
        return $query->getResult();
    }

    public function getDataReportrow($noLocalOrder, $nameDivision)
    {
        // Menyiapkan query SQL dengan binding parameter
        $sql = "SELECT a.idPartDivisi, c.OtherID, c.PartName, b.standart_Pack, b.safety_Stock, b.unitID_StdPack, b.minimum_Order,
                a.keterangan, a.endStockMonth1, a.inActualMonth2, a.hpoMonth2, a.outPlanMonth2, a.orderMonth2, a.balancePlanMonth2, a.orderMonthPO,
                a.planMonth2, a.outPlanMonth3, a.balancePlanMonth3, a.planMonth3, a.outPlanMonth4, d.formula, a.month1, a.month2, a.month3, a.month4
                FROM trans_local_orderDT as a
                LEFT JOIN ms_part_divisi as b on a.idPartDivisi = b.partID
                LEFT JOIN Ms_Part as c on b.partID = c.PartID
                LEFT JOIN trans_local_orderHD AS d on a.localOrderNo = d.localOrderNo
                WHERE d.localOrderNo = ? AND d.divisiId = ?";
        
        // Menjalankan query dengan parameter binding
        $query = $this->db->query($sql, [$noLocalOrder, $nameDivision]);
    
        // Mengembalikan hasil sebagai array objek
        return $query->getRow();
    }
    


}

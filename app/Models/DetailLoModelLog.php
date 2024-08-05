<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailLoModelLog extends Model
{
    protected $table            = 'trans_local_orderDT_log';
    protected $primaryKey       = 'idDetail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['localOrderNo','idPartDivisi','keterangan','month1','endStockMonth1','month2','inActualMonth2','hpoMonth2','outPlanMonth2','orderMonth2','balancePlanMonth2','planMonth2','month3','outPlanMonth3','balancePlanMonth3','planMonth3','month4','outPlanMonth4','orderMonthPO'];
}

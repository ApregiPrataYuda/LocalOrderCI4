<?php

namespace App\Models;

use CodeIgniter\Model;

class PRDetailModel extends Model
{
    protected $table            = 'Trans_PRDT';
    // protected $primaryKey       = 'NoPR';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NoPR','PartID','WithDetail','NoRevisi','ExplodedID','MappingNo','ProjectID','FormulaID','SupplierID','SubSupplierID','DateNeeded',
                                  'QtyRequest_Stock','UnitID_Stock','QtyRequest_PO','UnitID_PO','QtyApprove','Notes','DetailPart','StatusPA','LastBuyDate','AlasanReject',
                                'PIC','PIC_Date','PIC_By','ApproveDate','ApplicantDT','CompanyCode'];

}

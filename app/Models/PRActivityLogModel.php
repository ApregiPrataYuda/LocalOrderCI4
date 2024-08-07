<?php

namespace App\Models;

use CodeIgniter\Model;

class PRActivityLogModel extends Model
{
    protected $table            = 'Activity_Log';
    protected $primaryKey       = 'UserID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['UserID','NoBukti','NoBuktiReff','TGL','Modul','Keterangan','CustomerOrSupplierID','JenisLog','version','KompName','UserName','CreateDate','CreateBy','CompanyCode','LogDetail'];

}

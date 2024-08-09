<?php

namespace App\Models;

use CodeIgniter\Model;

class PRHeaderModel extends Model
{
    protected $table            = 'Trans_PRHD';
    protected $primaryKey       = 'NoPR';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['NoPR','DivisionID','DatePR','Applicant','Notes','TipePR','CreateDate','CreateBy','CompanyCode'];

    public function update_data_PRH($NoPR, $header) {
        return $this->update($NoPR, $header);
    }
}

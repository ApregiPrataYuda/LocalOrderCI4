<?php

namespace App\Models;

use CodeIgniter\Model;

class HeaderLoModel extends Model
{
    protected $table            = 'trans_local_orderHD';
    protected $primaryKey       = 'idHeader';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idHeader','localOrderNo','periode','formula','divisiId','createdAt','createdBy','updatedBy','updatedAt'];

   
    public function update_data($idHeader, $header) {
        return $this->update($idHeader, $header);
    }
}

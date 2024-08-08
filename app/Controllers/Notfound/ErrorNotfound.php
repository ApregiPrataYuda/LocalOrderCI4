<?php

namespace App\Controllers\Notfound;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ErrorNotfound extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Error Notfound'
      ];
      return view('Error/Notfound',$data);
    }
}

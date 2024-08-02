<?php

namespace App\Controllers\Administrator;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Administrator extends BaseController
{
    public function Home()
    {
        $data = [
            'title' => 'Local Order'
             ];
                 return view('Administrator/Home',$data);
         }

       
}

<?php

namespace App\Helpers;

use CodeIgniter\Services;

if (! function_exists('check_already_login'))
{
    function check_already_login()
    {
        // $session = Services::session();
        $userSession = session()->get('UserID');

        if ($userSession) {
            return redirect()->to('/Local-order');
        }
    } 
}

if (! function_exists('check_not_login'))
{
    function check_not_login()
    {
        // $session = Services::session();
        $userSession = session()->get('UserID');

        if (!$userSession) {
            return redirect()->to('/');
        }
    }
}

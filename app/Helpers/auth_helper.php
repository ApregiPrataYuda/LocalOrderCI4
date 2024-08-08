<?php

if (!function_exists('check_already_login')) {
    function check_already_login()
    {
        $session = \Config\Services::session();
        $user_session = $session->get('UserID');
        
        if ($user_session) {
            return redirect()->to(base_url('Local-order')); // Pastikan return dari redirect() diproses dengan benar
        }
    }
}

if (!function_exists('check_not_login')) {
    function check_not_login()
    {
        $session = \Config\Services::session();
        $user_session = $session->get('UserID');
        
        if (!$user_session) {
            return redirect()->to(base_url('Notfound')); // Pastikan return dari redirect() diproses dengan benar
        }
    }
}

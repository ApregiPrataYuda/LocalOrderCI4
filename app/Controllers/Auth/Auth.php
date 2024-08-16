<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AuthModel;
use PhpParser\Node\Stmt\Echo_;

class Auth extends BaseController
{

    protected $AuthModel;
    public function __construct() {
        $this->AuthModel = new AuthModel();
      
    }

    public function index()
    {
        $redirect = check_already_login();
    if ($redirect) {
        return $redirect;
    }
        $data = [
            'title' => 'LOCAL ORDER - LOGIN'
      ];
      return view('Auth/Login',$data);
    }


    public function Process()  {
        if (!$this->validate('login_validation')) {

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    
        } else {
                $groupbranch =  htmlspecialchars(esc($this->request->getPost('Branch')));
                $username = htmlspecialchars(esc($this->request->getPost('username')));
                $password = htmlspecialchars(esc($this->request->getPost('password')));
                $usersData =   $this->AuthModel->select('*')->where('UserID', $username)->get()->getRowArray();
             
                if ($usersData) {
                   $DataPassword =  $usersData;
                   $passwordFromDb = $DataPassword['Password'];
                   $resultInput = md5($password);
                   $setToUpper = strtoupper($resultInput);
                   
                   if ($setToUpper === $passwordFromDb) {
                    $checkActive = $usersData['Active'];
                    if ($checkActive != 0) {
                       
                        $checkGrup = $usersData['Grup'];
                        if ($checkGrup == 'ADMINISTRATOR') {

                            $sess = [
                                'UserID' => $usersData['UserID'],
                                'UserName' => $usersData['UserName'],
                                'Grup' => $usersData['Grup'],
                                'Division' => $usersData['Division'],
                                'groupBranch' => $groupbranch,
                                'isLoggedIn' => true
                              ];
                                session()->set($sess);
                                return redirect()->to('/Local-order');
                                // return redirect()->to('/Administrator');

                        }elseif ($checkGrup == 'STAFF') {

                            $sess = [
                                'UserID' => $usersData['UserID'],
                                'UserName' => $usersData['UserName'],
                                'Grup' => $usersData['Grup'],
                                'Division' => $usersData['Division'],
                                'groupBranch' => $groupbranch,
                                'isLoggedIn' => true
                              ];
                                session()->set($sess);
                                return redirect()->to('/Local-order');

                        }else {

                            session()->setFlashdata('error','page nothing');
                             return redirect()->to('/');
                        }
                    }else {
                        session()->setFlashdata('error','Akun NonAktif');
                     return redirect()->to('/');
                    }
                } else {
                    session()->setFlashdata('error','password salah');
                     return redirect()->to('/');
                }
                }else {
                    session()->setFlashdata('error','username tidak di temukan');
                     return redirect()->to('/');
                }

        }
    }

    public function Logout()
{
    // Mendapatkan instance sesi
    $session = session();
    $session->destroy();
    $session->set('session_id', null);
    return redirect()->to('/');
}
}

<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use Config\Session;

class Api extends BaseController
{
    use ResponseTrait;

    public function register()
    {
        $model = new UserModel();
        
        $data = [
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        
        $model->insert($data);
        
        return $this->respondCreated(['message' => 'Registration successful']);
    }

    public function login()
    {
        $session = session();

        $model = new UserModel();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        $ses_data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => TRUE
        ];
 
        $session->set($ses_data);

        if ($user && password_verify($password, $user['password'])) {
            return $this->respond(['message' => 'Login successful']);
        } else {
            return $this->failUnauthorized('message', 'Login failed');
        }
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to(session()->get('role') == 'admin' ? '/admin/dashboard' : '/dashboard');
        }
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $ses_data = [
                    'id'       => $user['id'],
                    'name'     => $user['name'],
                    'email'    => $user['email'],
                    'role'     => $user['role'],
                    'is_logged_in' => true
                ];
                $session->set($ses_data);
                return redirect()->to($user['role'] == 'admin' ? '/admin/dashboard' : '/dashboard');
            }
        }
        
        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'customer' // Default role
        ];

        $model->save($data);
        return redirect()->to('/auth/login')->with('success', 'Registration successful! Please login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
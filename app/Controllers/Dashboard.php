<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('is_logged_in') || session()->get('role') != 'customer') {
            return redirect()->to('/auth/login');
        }

        return view('customer/dashboard', [
            'user' => session()->get('name')
        ]);
    }
}
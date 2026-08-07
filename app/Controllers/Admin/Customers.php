<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        
        // Fetch all users who are marked as 'customer'
        // Ordered by newest registration first
        $data['customers'] = $model->where('role', 'customer')
                                   ->orderBy('created_at', 'DESC')
                                   ->findAll();

        return view('admin/customers/index', $data);
    }
}
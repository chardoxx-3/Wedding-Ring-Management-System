<?php

namespace App\Controllers;

use App\Models\RingModel;

class Rings extends BaseController
{
    public function index()
    {
        $model = new RingModel();
        // Get all rings available
        $data['rings'] = $model->where('status', 'available')->findAll();
        
        return view('customer/rings/index', $data);
    }

    public function show($id)
    {
        $model = new RingModel();
        $data['ring'] = $model->find($id);

        if (empty($data['ring'])) {
            return redirect()->to('/rings');
        }

        return view('customer/rings/show', $data);
    }
}
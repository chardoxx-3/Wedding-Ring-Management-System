<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RingModel;

class Rings extends BaseController
{
    public function index()
    {
        $model = new RingModel();
        $data['rings'] = $model->findAll();
        return view('admin/rings/index', $data);
    }

    public function create()
    {
        return view('admin/rings/create');
    }

    public function store()
    {
        $model = new RingModel();
        
        // Handle Image Upload
        $file = $this->request->getFile('image');
        $imageName = $file->getRandomName();
        $file->move('uploads/rings', $imageName);

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'material' => $this->request->getPost('material'),
            'price' => $this->request->getPost('price'),
            'status' => 'available',
            'image' => $imageName
        ];

        $model->save($data);
        return redirect()->to('/admin/rings')->with('success', 'Ring added successfully');
    }

    public function edit($id)
    {
        $model = new RingModel();
        $data['ring'] = $model->find($id);
        return view('admin/rings/edit', $data);
    }

    public function update($id)
    {
        $model = new RingModel();
        
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'material' => $this->request->getPost('material'),
            'price' => $this->request->getPost('price'),
            'status' => $this->request->getPost('status'),
        ];

        // Only update image if a new one is uploaded
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $imageName = $file->getRandomName();
            $file->move('uploads/rings', $imageName);
            $data['image'] = $imageName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/rings')->with('success', 'Ring updated successfully');
    }

    public function delete($id)
    {
        $model = new RingModel();
        $model->delete($id);
        return redirect()->to('/admin/rings')->with('success', 'Ring deleted');
    }
}
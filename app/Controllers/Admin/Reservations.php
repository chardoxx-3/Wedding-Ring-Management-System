<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ReservationModel;

class Reservations extends BaseController
{
    public function index()
    {
        $model = new ReservationModel();
        
        // Join with Users and Rings to get readable names
        $data['reservations'] = $model->select('reservations.*, users.name as customer_name, rings.name as ring_name')
                                      ->join('users', 'users.id = reservations.user_id')
                                      ->join('rings', 'rings.id = reservations.ring_id')
                                      ->orderBy('reservations.created_at', 'DESC')
                                      ->findAll();

        return view('admin/reservations/index', $data);
    }

    public function updateStatus()
    {
        $model = new ReservationModel();
        $id = $this->request->getPost('reservation_id');
        $status = $this->request->getPost('status'); // e.g., 'completed', 'cancelled'

        $model->update($id, ['status' => $status]);

        return redirect()->to('/admin/reservations')->with('success', 'Reservation status updated');
    }
}
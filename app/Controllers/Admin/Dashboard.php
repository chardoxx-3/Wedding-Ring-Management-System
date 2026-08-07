<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RingModel;
use App\Models\ReservationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') != 'admin') {
            return redirect()->to('/auth/login');
        }

        $ringModel = new RingModel();
        $resModel = new ReservationModel();

        $data = [
            'total_rings' => $ringModel->countAll(),
            'active_reservations' => $resModel->where('status', 'paid')->countAllResults(),
            'pending_reservations' => $resModel->where('status', 'pending')->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }

    public function printReport()
{
    if (session()->get('role') != 'admin') {
        return redirect()->to('/auth/login');
    }

    $ringModel = new RingModel();
    $resModel = new ReservationModel();

    // Get more detailed data for printing
    $data = [
        'total_rings' => $ringModel->countAll(),
        'active_reservations' => $resModel->where('status', 'paid')->countAllResults(),
        'pending_reservations' => $resModel->where('status', 'pending')->countAllResults(),
        'rings_list' => $ringModel->findAll(10), // Show first 10 rings
        'reservations_list' => $resModel->findAll(10), // Show first 10 reservations
        'report_date' => date('F j, Y H:i:s'),
        'report_title' => 'Dashboard Summary Report'
    ];

    return view('admin/print_dashboard', $data);
}
}
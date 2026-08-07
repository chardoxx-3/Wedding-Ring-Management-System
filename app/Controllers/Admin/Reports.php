<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PaymentModel;
use App\Models\ReservationModel;

class Reports extends BaseController
{
    public function index()
    {
        $paymentModel = new PaymentModel();
        $resModel = new ReservationModel();

        // Calculate Total Sales
        $totalSales = $paymentModel->selectSum('amount')->first();

        // Count Reservations by Status
        $completed = $resModel->where('status', 'completed')->countAllResults();
        $pending = $resModel->where('status', 'pending')->countAllResults();
        $paid = $resModel->where('status', 'paid')->countAllResults();

        $data = [
            'total_sales' => $totalSales['amount'] ?? 0,
            'completed_orders' => $completed,
            'pending_orders' => $pending,
            'active_orders' => $paid,
            'generated_at' => date('Y-m-d H:i:s')
        ];

        return view('admin/reports/index', $data);
    }

    public function printReport()
{
    $paymentModel = new PaymentModel();
    $resModel = new ReservationModel();

    // Calculate Total Sales
    $totalSales = $paymentModel->selectSum('amount')->first();

    // Count Reservations by Status
    $completed = $resModel->where('status', 'completed')->countAllResults();
    $pending = $resModel->where('status', 'pending')->countAllResults();
    $paid = $resModel->where('status', 'paid')->countAllResults();

    $data = [
        'total_sales' => $totalSales['amount'] ?? 0,
        'completed_orders' => $completed,
        'pending_orders' => $pending,
        'active_orders' => $paid,
        'generated_at' => date('Y-m-d H:i:s')
    ];

    // Return a minimal layout view for printing
    return view('admin/reports/print_report', $data);
}
}
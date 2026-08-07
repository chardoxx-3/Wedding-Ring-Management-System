<?php

namespace App\Controllers;

use App\Models\ReservationModel;
use App\Models\RingModel;
use App\Models\PaymentModel;

class Reservations extends BaseController
{
    public function create()
    {
        // Handle form submission from the Ring Details page
        $ringModel = new RingModel();
        $reservationModel = new ReservationModel();
        
        $ringId = $this->request->getPost('ring_id');
        $ring = $ringModel->find($ringId);

        // Basic Customization Cost Logic
        $customizationCost = 0;
        if($this->request->getPost('engraving')) {
            $customizationCost += 50; // Example cost
        }

        $totalPrice = $ring['price'] + $customizationCost;

        $data = [
            'user_id' => session()->get('id'),
            'ring_id' => $ringId,
            'custom_size' => $this->request->getPost('size'),
            'custom_notes' => $this->request->getPost('notes'),
            'total_amount' => $totalPrice,
            'status' => 'pending',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $reservationId = $reservationModel->insert($data);

        // Mark ring as reserved so no one else buys it
        $ringModel->update($ringId, ['status' => 'reserved']);

        return redirect()->to('/reservations/checkout/' . $reservationId);
    }

    public function checkout($id)
    {
        $model = new ReservationModel();
        $data['reservation'] = $model->select('reservations.*, rings.name as ring_name, rings.image')
                                     ->join('rings', 'rings.id = reservations.ring_id')
                                     ->where('reservations.id', $id)
                                     ->first();

        return view('customer/reservations/checkout', $data);
    }

    public function processPayment()
    {
        $paymentModel = new PaymentModel();
        $reservationModel = new ReservationModel();

        $reservationId = $this->request->getPost('reservation_id');
        $amount = $this->request->getPost('amount');
        $method = $this->request->getPost('payment_method');

        // Record Payment
        $paymentModel->save([
            'reservation_id' => $reservationId,
            'amount' => $amount,
            'payment_method' => $method,
            'payment_date' => date('Y-m-d H:i:s')
        ]);

        // Update Reservation Status
        $reservationModel->update($reservationId, ['status' => 'paid']);

        return redirect()->to('/reservations/history')->with('success', 'Payment Successful!');
    }

    public function history()
    {
        $model = new ReservationModel();
        $userId = session()->get('id');

        $data['reservations'] = $model->select('reservations.*, rings.name as ring_name, payments.payment_date')
                                      ->join('rings', 'rings.id = reservations.ring_id')
                                      ->join('payments', 'payments.reservation_id = reservations.id', 'left')
                                      ->where('reservations.user_id', $userId)
                                      ->orderBy('reservations.created_at', 'DESC')
                                      ->findAll();

        return view('customer/reservations/history', $data);
    }

    // Add this method to your Reservations controller (Reservations.php):
public function receipt($id)
{
    $reservationModel = new ReservationModel();
    
    // Fetch reservation details with joins
    $data['reservation'] = $reservationModel->select('reservations.*, rings.name as ring_name, rings.price as ring_price, rings.description, rings.material, users.name as customer_name, users.email, payments.amount as paid_amount, payments.payment_method, payments.payment_date')
                                             ->join('rings', 'rings.id = reservations.ring_id')
                                             ->join('users', 'users.id = reservations.user_id')
                                             ->join('payments', 'payments.reservation_id = reservations.id')
                                             ->where('reservations.id', $id)
                                             ->where('reservations.user_id', session()->get('id')) // Ensure user can only view their own receipts
                                             ->first();
    
    if (!$data['reservation']) {
        return redirect()->to('/reservations/history')->with('error', 'Receipt not found');
    }
    
    // Add JavaScript to auto-trigger print dialog
    $data['autoPrint'] = true;
    
    return view('customer/reservations/receipt', $data);
}
}
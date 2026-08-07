<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table            = 'payments';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'reservation_id', 
        'amount', 
        'payment_method', 
        'payment_date'
    ];

    protected $returnType       = 'array';
    
    // We disable standard timestamps here because the controller 
    // manually sets 'payment_date' for the transaction record.
    protected $useTimestamps    = false; 
}
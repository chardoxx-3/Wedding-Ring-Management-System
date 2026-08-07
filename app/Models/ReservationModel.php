<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'user_id', 
        'ring_id', 
        'custom_size', 
        'custom_notes', 
        'total_amount', 
        'status' // 'pending', 'paid', 'completed', 'cancelled'
    ];

    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
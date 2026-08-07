<?php

namespace App\Models;

use CodeIgniter\Model;

class RingModel extends Model
{
    protected $table            = 'rings';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'name', 
        'description', 
        'material', 
        'price', 
        'image', 
        'status' // 'available', 'reserved', 'sold'
    ];

    protected $returnType       = 'array';
    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
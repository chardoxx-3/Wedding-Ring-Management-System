<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    
    // Fields that can be inserted/updated via the model
    protected $allowedFields    = [
        'name', 
        'email', 
        'password', 
        'role' // 'customer' or 'admin'
    ];

    // specific CodeIgniter settings
    protected $returnType       = 'array';
    protected $useTimestamps    = true; // Automatically fills created_at and updated_at
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';
}
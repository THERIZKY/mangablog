<?php

namespace App\Models;

use CodeIgniter\Model;

class blogModels extends Model
{
    protected function initialize()
    {
        $this->table = 'blog';
        $this->allowedFields[] = ['blogTitle', 'konten', 'rilis'];
    }
}

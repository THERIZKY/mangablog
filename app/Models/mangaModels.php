<?php

namespace App\Models;

use CodeIgniter\Model;

class mangaModels extends Model
{
    protected function initialize()
    {
        $this->table = 'manga';
        $this->allowedFields[] = ['mangaTitle', 'slug', 'cover', 'deskripsi'];
    }

    public function getManga($slug = null)
    {
        if ($slug !== null) {
            return $this->where(['slug' => $slug])->first();
        } else {
            return $this->findAll();
        }
    }
}

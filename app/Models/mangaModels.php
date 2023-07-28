<?php

namespace App\Models;

use CodeIgniter\Model;

class mangaModels extends Model
{
    protected function initialize()
    {
        $this->table = 'manga';
        $this->allowedFields[] = ['mangaTitle', 'slug', 'cover', 'deskripsi', 'rilis'];
    }

    public function getManga($slug = null)
    {
        if ($slug !== null) {
            return $this->where(['slug' => $slug])
                ->first();
        } else {
            return $this->findAll();
        }
    }

    public function latestManga()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('manga');

        return $builder->select('*')
            ->orderBy('rilis', 'DESC')
            ->get()
            ->getResultObject();
    }

    public function insertDataManga($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('manga');

        $builder->insert($data);
    }
    // Hitung total Manga yang ada
    public function countAllManga()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('manga');

        return $builder->countAllResults();
    }
}

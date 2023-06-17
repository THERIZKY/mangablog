<?php

namespace App\Models;

use CodeIgniter\Model;

class chapterModels extends Model
{
    protected function initialize()
    {
        $this->table = 'chapter';
        $this->allowedFields[] = ['idChapter', 'idManga', 'chapter', 'judul', 'image'];
    }

    public function getAllChapter($slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('chapter');

        return $builder->join('manga', 'manga.mangaId = chapter.idManga', 'inner')->where(['slug' => $slug])->orderBy("chapter", "ASC")->get()->getResultObject();
    }

    public function getChapter($slug, $chapter)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('chapter');

        return $builder->join('manga', 'manga.mangaId = chapter.idManga', 'inner')->where(['slug' => $slug, 'chapter' => $chapter])->limit(1)->get()->getResultObject();
    }

    public function countChapter($slug)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('chapter');

        return $builder->join('manga', 'manga.mangaId = chapter.idManga', 'inner')->where(['slug' => $slug,])->countAllResults();
    }
}

<?php

namespace App\Controllers;


class Manga extends BaseController
{
    public function index()
    {
        $mangas = $this->mangaModels->getManga();
        $data = [
            'title' => 'Manga List',
            'mangas' => $mangas
        ];

        return view('manga/mangalist', $data);
    }

    public function getDetailManga($slug)
    {

        // Ambil Data Manga
        $mangas = $this->mangaModels->getManga($slug);
        $cover = $mangas['cover'];
        $mangatitle = $mangas['mangaTitle'];
        $deskripsi = $mangas['deskripsi'];


        // Ambil Data Chapter
        $chapters = $this->chapterModels->getAllChapter($slug);

        $data = [
            'title' => "Manga {$mangatitle} Bahasa Indonesia",
            'mangatitle' => $mangatitle,
            'cover' => $cover,
            'deskripsi' => $deskripsi,
            'chapters' => $chapters
        ];

        return view('manga/detailManga', $data);
    }

    public function getChapter($slug, $chapter)
    {
        $chapters = $this->chapterModels->getChapter($slug, $chapter);

        foreach ($chapters as $chap) {
            $ch = $chap->chapter;
            $judul = $chap->mangaTitle;
        }
        $data = [
            'title' => "Chapter {$ch} Manga {$judul} Bahasa Indonesia",
            'chapters' => $chapters
        ];
        return view('manga/chapter', $data);
    }
}

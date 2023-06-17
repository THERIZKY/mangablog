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
        $mangatitle = $mangas['mangaTitle'];

        // Ambil Data Chapter
        $chapters = $this->chapterModels->getAllChapter($slug);

        $data = [
            'title' => "Manga {$mangatitle} Bahasa Indonesia",
            'mangatitle' => $mangatitle,
            'cover' => $mangas['cover'],
            'deskripsi' => $mangas['deskripsi'],
            'chapters' => $chapters
        ];

        return view('manga/detailManga', $data);
    }

    public function getChapter($slug, $chapter)
    {
        $chapters = $this->chapterModels->getChapter($slug, $chapter);
        $countChapter = $this->chapterModels->countChapter($slug);
        $data = [
            'title' => "Chapter {$chapters[0]->chapter} Manga {$chapters[0]->mangaTitle} Bahasa Indonesia",
            'chapters' => $chapters,
            'countChapter' => $countChapter
        ];
        return view('manga/chapter', $data);
    }
}

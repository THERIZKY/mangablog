<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

class Manga extends BaseController
{
    public function index()
    {
        $mangas = $this->getDataManga();

        $slug = [];
        $slugs = $this->mangaModels->getManga();
        foreach ($slugs as $slg) {
            $slug[] = $slg['slug'];
        }

        $data = [
            'title' => 'Manga List',
            'mangas' => $mangas,
            'slug' => $slug,
        ];

        return view('manga/mangalist', $data);
    }

    public function getDetailManga($slug)
    {
        $dataDariManga = $this->getMangaWithSlug($slug)[0];

        // -------Ambil Data Statistic Dari API---------
        $mangaStats = null;
        $mangaStats = ApiHelper::callApi($this->mangadexURL . '/statistics/manga/' . $dataDariManga->id, 'GET');

        // Ambil Data Chapter
        $chapters = $this->chapterModels->getAllChapter($slug);

        $data = [
            'title'         => "Manga " . ($dataDariManga ? $dataDariManga->title : '') . " Bahasa Indonesia",
            'mangatitle'    => $dataDariManga ? $dataDariManga->title : '',
            'cover'         => $dataDariManga->cover,
            'deskripsi'     => $dataDariManga ? $dataDariManga->deskripsi : '',
            'chapters'      => $chapters,
            'rating'        => $mangaStats ? $mangaStats->statistics->{$dataDariManga->id}->rating->average : null,
            'authorName'    => $dataDariManga->authorName,
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

<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

class Manga extends BaseController
{
    public function index()
    {
        $mangas = $this->mangaModels->getManga();

        $data = [
            'title' => 'Manga List',
            'mangas' => $mangas,
        ];

        return view('manga/mangalist', $data);
    }

    public function getDetailManga($slug)
    {

        $dataManga = $this->mangaModels->getManga($slug);
        $mangadexId = $this->getMangaId($dataManga['mangaTitle']);


        // -------Ambil Data Statistic Dari API---------
        $mangaStats = null;
        $mangaStats = ApiHelper::callApi($this->mangadexURL . '/statistics/manga/' . $mangadexId, 'GET');

        // Ambil Data Chapter
        $chapters = $this->chapterModels->getAllChapter($slug);

        $data = [
            'title'         => "Manga " . ($dataManga ? $dataManga['mangaTitle'] : '') . " Bahasa Indonesia",
            'mangas'        => $dataManga,
            'chapters'      => $chapters,
            'rating'        => $mangaStats ? $mangaStats->statistics->{$mangadexId}->rating->average : null,
            'authorName'    => $this->getAuthorName($dataManga['mangaTitle']),
        ];

        return view('manga/detailManga', $data);
    }

    public function getChapter($slug, $chapter)
    {
        $chapters = $this->chapterModels->getChapter($slug, $chapter);
        $countChapter = $this->chapterModels->countChapter($slug);
        $data = [
            'title'     => "Chapter {$chapters[0]->chapter} Manga {$chapters[0]->mangaTitle} Bahasa Indonesia",
            'chapters'  => $chapters,
            'countChapter' => $countChapter
        ];
        return view('manga/chapter', $data);
    }
}

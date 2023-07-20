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
            'mangas' => $mangas
        ];

        return view('manga/mangalist', $data);
    }

    public function getDetailManga($slug)
    {

        // Ambil Data Manga
        $mangas = $this->mangaModels->getManga($slug);
        $mangatitle = $mangas['mangaTitle'];

        /* ---------Ambil Data Manga Dari API--------- */
        $query = [
            'order[relevance]' => 'desc',
            'title' => $mangatitle,
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);


        // Ambil Data Dari Response
        if ($response) {
            $mangaAPI = array_map(function ($manga) {
                return (object) [
                    'description' => $manga->attributes->description,
                    'title' => $manga->attributes->title,
                    'mangaIds' => $manga->id,
                    'relation' => $manga->relationships
                ];
            }, $response->data);
        } else {
            $mangaAPI = null;
        }

        /* -------Ambil Data Cover Dari API----------- */
        $mangaId = $mangaAPI[0]->mangaIds;
        $authors = [];
        foreach ($mangaAPI[0]->relation as $m) {
            if ($m->type === 'cover_art') {
                $coverId = $m->id;
            }

            // Nitip Data Author
            if ($m->type === 'author') {
                $authors[] = $m->id;
            }
        }

        // Ambil Respon Dari API
        $response = ApiHelper::callApi($this->mangadexURL . '/cover/' . $coverId, 'GET');

        // Ambil Nama Cover
        $mangaName = $response->data->attributes->fileName;

        $mangaCover = "https://uploads.mangadex.org/covers/{$mangaId}/{$mangaName}";


        /* -------Ambil Data Author Dari API------- */
        $authorName = [];

        foreach ($authors as $author) {
            $response = ApiHelper::callApi($this->mangadexURL . '/author/' . $author);
            $authorName[] = $response->data->attributes->name;
        }



        /* -------Ambil Data Statistic Dari API--------- */
        $mangaStats = ApiHelper::callApi($this->mangadexURL . '/statistics/manga/' . $mangaId, 'GET', $query);

        // d($mangaCover);
        // dd($mangaAPI);

        // Ambil Data Chapter
        $chapters = $this->chapterModels->getAllChapter($slug);

        $data = [
            'title' => "Manga {$mangaAPI[0]->title->en} Bahasa Indonesia",
            'mangatitle' => $mangaAPI[0]->title->en,
            // 'cover' => $mangas['cover'],
            'cover' => $mangaCover,
            'deskripsi' => $mangaAPI[0]->description->en,
            'chapters' => $chapters,
            'rating' => $mangaStats->statistics->$mangaId->rating->average,
            'authorName' => $authorName,
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

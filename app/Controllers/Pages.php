<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

class Pages extends BaseController
{
    public function index()
    {
        $latestManga = $this->mangaModels->latestManga();

        // Array untuk menyimpan data manga
        $dataManga = [];

        foreach ($latestManga as $latest) {
            $query = [
                'order[relevance]'  => 'desc',
                'title'             => $latest->mangaTitle,
                'limit'             => 1

            ];

            $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);


            if ($response) {
                $mangaData = $response->data[0] ?? null;

                if ($mangaData) {

                    /* ----Ambil Data Manga Dari API---- */
                    $coverId = null;
                    $authors = [];

                    foreach ($mangaData->relationships as $relation) {
                        if ($relation->type === "cover_art") {
                            $coverId = $relation->id;
                        }

                        if ($relation->type === 'author') {
                            $authors[] = $relation->id;
                        }
                    }

                    // Cover
                    $mangaCover = null;
                    if ($coverId) {
                        $response   = ApiHelper::callApi($this->mangadexURL . '/cover/' . $coverId, 'GET');
                        $coverName  = $response->data->attributes->fileName;
                        $mangaCover = "https://uploads.mangadex.org/covers/{$mangaData->id}/{$coverName}";
                    }

                    // -------Ambil Data Author Dari API-------
                    $authorNames = [];
                    foreach ($authors as $author) {
                        $response = ApiHelper::callApi($this->mangadexURL . '/author/' . $author);
                        $authorNames[] = $response->data->attributes->name;
                    }



                    /* ------Masukin Data Manga Nya Ke Variable------ */
                    $dataManga[] = (object)[
                        'id'            => $mangaData->id,
                        'title'         => $mangaData->attributes->title->en,
                        'cover'         => $mangaCover,
                    ];
                }
            }
        }


        $slug = [];
        foreach ($latestManga as $latest) {
            $slug[] = $latest->slug;
        }

        $data = [
            'title'     => 'osanagoManga || Manga Bahasa Indonesia',
            'latest'    => $dataManga,
            'slug'      => $slug,
        ];

        return view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'osanagoManga || About Us'
        ];

        return view('pages/about', $data);
    }
}

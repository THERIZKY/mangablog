<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $latestManga = $this->mangaModels->latestManga();
        $data = [
            'title' => 'osanagoManga || Manga Bahasa Indonesia',
            'latest' => $latestManga
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

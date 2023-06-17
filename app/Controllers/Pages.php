<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'osanagoManga || Manga Bahasa Indonesia'
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

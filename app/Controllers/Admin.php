<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin || OsanagoManga'
        ];

        return view('admin/index', $data);
    }

    public function listmanga()
    {
        $this->mangaModels->getManga();

        $data = [
            'title' => 'List Manga Admin || OsanagoManga',
            'manga' => $this->mangaModels->getManga()
        ];

        return view('admin/mangalist', $data);
    }
}

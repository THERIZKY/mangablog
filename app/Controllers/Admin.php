<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    public function index()
    {
        //Ngambil Data Dari API
        $baseUrl = 'https://api.mangadex.org';
        $title = "Oshi No Ko";

        $query = [
            'title' => $title,
            'limit' => 1
        ];
        $response = ApiHelper::callApi($baseUrl . '/manga', 'GET', $query);
        if ($response) {
            $mangaDesc = array_map(
                function ($manga) {
                    return $manga->attributes->description;
                },
                $response->data
            );
        } else {
            $mangaDesc = null;
        }

        $data = [
            'title' => 'Dashboard Admin || OsanagoManga',
            'deskripsi' => $mangaDesc[0],
        ];

        // dd($this->mangaModels->countAllManga());
        return view('admin/index', $data);
    }

    public function API()
    {
        $baseUrl = 'https://api.mangadex.org';
        $title = "Oshi No Ko";

        $response = $this->client->request('GET', $baseUrl . '/manga', [
            'query' => [
                'title' => $title,
                'limit' => 1
            ]
        ]);

        $data = json_decode($response->getBody());

        d($data);

        $mangaDesc = array_map(function ($manga) {
            return $manga->attributes->description;
        }, $data->data);

        dd($mangaDesc[0]->en);
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

    public function addManga()
    {
        $data = ['title' => 'Tambah Manga || OsanagoManga'];

        return view('admin/tambahmanga', $data);
    }

    public function saveManga()
    {
        $mangaTitle = $this->request->getPost('mangaTitle');
        $mangaCoverLink = $this->request->getPost('mangaCover');
        $mangaDeskripsi = $this->request->getPost('mangaDeskripsi');

        //Generating Slug
        $mangaSlug = url_title($this->request->getVar('mangaTitle'), '-', true);

        // Getting Datetime
        $dateReleased = Time::now()->toDateTimeString();

        // dd($mangaSlug);

        $data = [
            'mangaTitle' => $mangaTitle,
            'slug' => $mangaSlug,
            'cover' => $mangaCoverLink,
            'deskripsi' => $mangaDeskripsi,
            'rilis' => $dateReleased
        ];

        $this->mangaModels->insertDataManga($data);

        return redirect()->to('/admin');
    }
}

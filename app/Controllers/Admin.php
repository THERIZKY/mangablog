<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin || OsanagoManga',
            'jumlahManga' => $this->mangaModels->countAllManga(),
            'jumlahChapter' => $this->chapterModels->countAllChapter(),
        ];

        return view('admin/index', $data);
    }


    /*------------- List Chapter Buat Admin ------------------- */
    public function listchapter()
    {
        $data = [
            'title' => 'List Chapter Admin || OsanagoManga',
            'chapterList' => $this->chapterModels->getChapterList(),
        ];

        return view('admin/chapterlist', $data);
    }


    /*------------- List Manga Buat Admin ----------------- */
    public function listmanga()
    {
        /* ---------Ambil Data Manga Dari API--------- */

        $mangaData = $this->getDataManga();


        $data = [
            'title' => 'List Manga Admin || OsanagoManga',
            'manga' => $mangaData
        ];

        return view('admin/mangalist', $data);
    }


    /*------------- Nambahin Manga ------------------- */
    public function addManga()
    {
        $data = ['title' => 'Tambah Manga || OsanagoManga'];

        return view('admin/tambahmanga', $data);
    }
    //Masukin Manga Ke Database
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

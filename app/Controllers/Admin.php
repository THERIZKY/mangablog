<?php

namespace App\Controllers;

use App\Helpers\ApiHelper;

use CodeIgniter\I18n\Time;
use Stichoza\GoogleTranslate\GoogleTranslate;

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

        $mangaData = $this->mangaModels->getManga();


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
        $mangaCoverLink = $this->getCoverManga($mangaTitle);
        $deskripsiInggris = $this->getDescription($mangaTitle);

        $tr = new GoogleTranslate('en');
        $tr->setSource('en');
        $tr->setTarget('in');
        $mangaDeskripsi = $tr->translate($deskripsiInggris);


        //Generating Slug
        $mangaSlug = url_title($this->request->getVar('mangaTitle'), '-', true);

        // Getting Datetime
        $dateReleased = Time::now()->toDateTimeString();

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

    public function testing()
    {
        $description = "Kyoko Hori is your average teenage girl… who has a side she wants no one else to ever discover. Then there's her classmate Izumi Miyamura, your average glasses-wearing boy — who's also a totally different person outside of school. When the two unexpectedly meet, they discover each other's secrets, and a friendship is born.";

        $tr = new GoogleTranslate('en');
        $tr->setSource('en');
        $tr->setTarget('in');
        dd($tr->translate($description));
    }
}

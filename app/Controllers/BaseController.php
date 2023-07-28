<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

// Api Helper
use App\Helpers\ApiHelper;

use function PHPUnit\Framework\isEmpty;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $mangaModels;
    protected $chapterModels;
    protected $apiModels;
    protected $client;
    protected $mangadexURL;



    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['auth'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->mangadexURL = "https://api.mangadex.org";

        // Preload any models, libraries, etc, here.
        $this->mangaModels = model('mangaModels');
        $this->chapterModels = model('chapterModels');
        $this->apiModels = model('apiModels');

        // E.g.: $this->session = \Config\Services::session();
        $this->client = \Config\Services::curlrequest();
    }

    public function getDataManga($slug = null)
    {
        if (isEmpty($slug)) {
            $mangaAPI = $this->getMangaNoSlug();
        } else {
            $mangaAPI = $this->getMangaWithSlug($slug);
        }

        return $mangaAPI;
    }

    // Buat Misahin Program Di Atas
    public function getMangaWithSlug($slug)
    {
        $manga = $this->mangaModels->getManga($slug);

        $query = [
            'order[relevance]' => 'desc',
            'title' => $manga['mangaTitle'],
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);

        $dataManga = [];

        if ($response) {
            $mangaData = $response->data[0] ?? null;
            if ($mangaData) {

                // ------Buat Nyari Author Sama Cover-----
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
                    'deskripsi'     => $mangaData->attributes->description->en,
                    'title'         => $mangaData->attributes->title->en,
                    'cover'         => $mangaCover,
                    'authorName'    => $authorNames,
                ];
            }
        }

        return $dataManga;
    }

    public function getMangaNoSlug()
    {
        $manga = $this->mangaModels->getManga();

        // Array untuk menyimpan data manga
        $dataManga = [];

        foreach ($manga as $m) {
            $query = [
                'order[relevance]'  => 'desc',
                'title'             => $m['mangaTitle'],
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
                        'deskripsi'     => $mangaData->attributes->description->en,
                        'title'         => $mangaData->attributes->title->en,
                        'cover'         => $mangaCover,
                        'authorName'    => $authorNames,
                    ];
                }
            }
        }
        return $dataManga;
    }
}

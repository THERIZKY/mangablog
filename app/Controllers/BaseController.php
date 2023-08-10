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

    public function getCoverManga($judulManga)
    {
        $query = [
            'order[relevance]' => 'desc',
            'title' => $judulManga,
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);


        $dataManga = [];
        $coverId = "";

        if ($response) {
            $dataManga = $response->data[0] ?? null;

            $relation = $dataManga->relationships;

            //Nyari Cover ID
            foreach ($relation as $relasi) {
                if ($relasi->type === "cover_art") {
                    $coverId = $relasi->id;
                }
            }

            //Baru Ngambil Cover nya
            $mangaCoverLink = "";
            if ($coverId) {
                $response   = ApiHelper::callApi($this->mangadexURL . '/cover/' . $coverId, 'GET');
                $coverName  = $response->data->attributes->fileName;
                $mangaCoverLink = "https://uploads.mangadex.org/covers/{$dataManga->id}/{$coverName}";
            }

            return $mangaCoverLink;
        }
    }

    public function getAuthorName($judulManga)
    {
        $query = [
            'order[relevance]' => 'desc',
            'title' => $judulManga,
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);

        $dataManga = [];
        $authors = [];

        if ($response) {
            $dataManga = $response->data[0] ?? null;

            $relation = $dataManga->relationships;

            //Nyari Authors Id
            foreach ($relation as $relasi) {
                if ($relasi->type === "author") {
                    $authors[] = $relasi->id;
                }
            }

            $authorNames = [];

            // Nyari Nama Author
            foreach ($authors as $author) {
                $response = ApiHelper::callApi($this->mangadexURL . '/author/' . $author);
                $authorNames[] = $response->data->attributes->name;
            }

            return $authorNames;
        }

        return null;
    }

    public function getDescription($judulManga)
    {
        $query = [
            'order[relevance]' => 'desc',
            'title' => $judulManga,
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);

        $dataManga = [];
        if ($response) {
            $dataManga = $response->data[0] ?? null;

            $deskripsi = $dataManga->attributes->description->en;

            return $deskripsi;
        }

        return null;
    }

    public function getMangaId($judulManga)
    {
        $query = [
            'order[relevance]' => 'desc',
            'title' => $judulManga,
            'limit' => 1
        ];

        $response = ApiHelper::callApi($this->mangadexURL . '/manga', 'GET', $query);

        $dataManga = [];

        if ($response) {
            $dataManga = $response->data[0] ?? null;

            $idManga = $dataManga->id;

            return $idManga;
        }

        return null;
    }
}

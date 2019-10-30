<?php

namespace App\Services;

use GuzzleHttp;
use Illuminate\Support\Facades\Cache;

class ParseJsonFile
{
    /**
     * @var string
     */
    private $jsonUrl;

    /**
     * @var integer
     */
    private $cacheLifetime = 60;

    /**
     * @return mixed
     */
    public function getJsonUrl()
    {
        return $this->jsonUrl;
    }

    /**
     * @param mixed $jsonUrl
     */
    public function setJsonUrl($jsonUrl)
    {
        $this->jsonUrl = $jsonUrl;
    }

    /**
     * ParseJsonFile constructor.
     * @param $jsonUrl string
     */
    public function __construct($jsonUrl)
    {
        $this->jsonUrl = $jsonUrl;
    }

    /**
     * @return mixed
     * @throws GuzzleHttp\Exception\GuzzleException
     */
    public function getJsonFromUrl()
    {
        $client = new GuzzleHttp\Client(['verify' => base_path() . '/cacert.pem']);
        $response = $client->request('GET', $this->jsonUrl);
        $result = json_decode(mb_convert_encoding($response->getBody()->getContents(), "UTF-8"), true);

        return $result;
    }
}

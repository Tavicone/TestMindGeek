<?php

namespace App\Services;

use GuzzleHttp;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        try {
            $client = new GuzzleHttp\Client(['verify' => base_path() . '/cacert.pem']);
            $response = $client->request('GET', $this->jsonUrl);
            if ($response->getStatusCode() == 200) {
                $result = json_decode(mb_convert_encoding($response->getBody()->getContents(), "UTF-8"), true);
            } else {
                Log::error('Json unable to be decoded!');
            }
        } catch (GuzzleHttp\Exception\ClientException $exception) {
            Log::error($exception->getMessage());
        }

        return $result;
    }
}

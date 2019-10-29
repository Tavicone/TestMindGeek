<?php

namespace App\Services;

use App\Models\Movie;
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
//        if (Cache::get('cachedJson')) {
//            return Cache::get('cachedJson');
//        } else {
            $client = new GuzzleHttp\Client(['verify' => base_path() . '/cacert.pem']);

            $response = $client->request('GET', $this->jsonUrl);
            $result = GuzzleHttp\Psr7\StreamWrapper::getResource($response->getBody());
//            $result = json_decode(mb_convert_encoding($response->getBody()->getContents(), "UTF-8"), true);

            // Save data to cache and return it
//            Cache::put('cachedJson', $result, now()->addMinutes($this->cacheLifetime));

        foreach (\JsonMachine\JsonMachine::fromStream($result) as $key => $value) {

            $movie = Movie::firstOrNew(['external_id' => $value['id']]);
            $movie->headline = $value['headline'];
            $movie->year = $value['year'];
            $movie->body = $value['body'];
            $movie->synopsis = $value['synopsis'];
            $movie->duration = $value['duration'];
            $movie->rating = $value['rating'];
            $movie->save();

            print_r($movie);
            die();
        }

            return $result;

    }

    public function saveJsonData() {
        return $this->jsonUrl;
    }
}

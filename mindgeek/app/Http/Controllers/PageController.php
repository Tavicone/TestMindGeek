<?php

namespace App\Http\Controllers;

use App\Services\ParseJsonFile;

class PageController extends Controller
{

    /**
     * Display movie list
     *
     * @param ParseJsonFile $jsonParser
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function homepage(ParseJsonFile $jsonParser)
    {
        $items = $jsonParser->getJsonFromUrl();

        return view('home', ['items' => $items]);
    }

    /**
     * Display movie details
     *
     * @param ParseJsonFile $jsonParser
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function showMovieDetails(ParseJsonFile $jsonParser)
    {
        $movieKey = request('movie_id');
        $items = $jsonParser->getJsonFromUrl();

        $transformedDuration = $this->convertToHoursMins($items[$movieKey]['duration'], '%02d hours %02d minutes');

        return view('movie', ['movieDetails' => $items[$movieKey], 'duration' => $transformedDuration]);
    }

    /**
     * Format duration time into more readable way
     *
     * @param $time
     * @param string $format
     * @return string|void
     */
    function convertToHoursMins($time, $format = '%02d:%02d')
    {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 3600);
        $minutes = (($time / 60) - ($hours * 60));
        return sprintf($format, $hours, $minutes);
    }
}

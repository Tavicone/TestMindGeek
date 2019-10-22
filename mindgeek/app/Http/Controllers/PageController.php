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

        return view('movie', ['movieDetails' => $items[$movieKey]]);
    }
}

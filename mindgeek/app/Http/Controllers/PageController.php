<?php

namespace App\Http\Controllers;

use App\Services\ParseJsonFile;
use Illuminate\Http\Request;

class PageController extends Controller
{

    function homepage(ParseJsonFile $jsonParser) {
        $items = $jsonParser->getJsonFromUrl();

        return view('home', ['items' => $items]);
    }

    function showMovieDetails(ParseJsonFile $jsonParser) {
        $movieKey = request('movie_id');
        $items = $jsonParser->getJsonFromUrl();

        $transformedDuration = $this->convertToHoursMins($items[$movieKey]['duration'], '%02d hours %02d minutes');

        return view('movie', ['movieDetails' => $items[$movieKey], 'duration' => $transformedDuration]);
    }

    function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 3600);
        $minutes = (($time / 60) - ($hours * 60));
        return sprintf($format, $hours, $minutes);
    }
}

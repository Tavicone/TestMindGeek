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
}

<?php

namespace App\Http\Controllers;

use App\Repositories\MovieRepositoryInterface;
use App\Services\ParseJsonFile;

class PageController extends Controller
{

    /**
     * Display movie list
     *
     * @param MovieRepositoryInterface $movie
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function homepage(MovieRepositoryInterface $movie)
    {
        return view('home', ['items' => $movie->all()]);
    }

    /**
     * Display movie details
     *
     * @param MovieRepositoryInterface $movie
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showMovieDetails(MovieRepositoryInterface $movie)
    {
//        dd($movie->get(request('movie_id')));
        return view('movie', ['movieDetails' => $movie->get(request('movie_id'))]);
    }
}

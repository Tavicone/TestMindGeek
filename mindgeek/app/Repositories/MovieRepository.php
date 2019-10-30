<?php

namespace App\Repositories;


namespace App\Repositories;

use App\Models\CardImage;
use App\Models\Cast;
use App\Models\Director;
use App\Models\Genre;
use App\Models\KeyArtImage;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * Get's a post by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($movie_id)
    {
        return Movie::find($movie_id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Movie::all();
    }

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($movie_id)
    {
        Movie::destroy($movie_id);
    }

    /**
     * @param array $movie_data
     * @return mixed
     */
    public function save(array $movie_data)
    {
        $movie = Movie::firstOrNew(['external_id' => $movie_data['id']]);
        $movie->headline = $movie_data['headline'] ?? null;
        $movie->year = $movie_data['year'] ?? null;
        $movie->body = $movie_data['body'] ?? null;
        $movie->synopsis = $movie_data['synopsis'] ?? null;
        $movie->duration = $movie_data['duration'] ?? null;
        $movie->rating = $movie_data['rating'] ?? null;
        $movie->save();

        // Save director
        if (isset($movie_data['directors'])) {
            foreach ($movie_data['directors'] as $director) {
                $directorDB = Director::firstOrCreate([
                    'movie_id' => $movie->id,
                    'director_name' => $director['name']
                ]);
                $directorDB->save();
            }
        }

        // Save cast
        if (isset($movie_data['cast'])) {
            foreach ($movie_data['cast'] as $cast) {
                $castDB = Cast::firstOrCreate([
                    'movie_id' => $movie->id,
                    'cast_name' => $cast['name']
                ]);
                $castDB->save();
            }
        }

        // Save Genre
        if (isset($movie_data['genres'])) {
            foreach ($movie_data['genres'] as $genre) {
                $genreDB = Genre::firstOrCreate([
                    'movie_id' => $movie->id,
                    'genre_name' => $genre
                ]);
                $genreDB->save();
            }
        }

        // Save Card images
        if (isset($movie_data['cardImages'])) {
            foreach ($movie_data['cardImages'] as $image) {
                $imageDB = CardImage::firstOrCreate([
                    'movie_id' => $movie->id,
                    'url' => $image['url']
                ]);
                $imageDB->height = $image['h'] ?? null;
                $imageDB->width = $image['w'] ?? null;
                $imageDB->save();
            }
        }

        // Save key art images
        if (isset($movie_data['keyArtImages'])) {
            foreach ($movie_data['keyArtImages'] as $artImage) {
                $artImageDB = KeyArtImage::firstOrCreate([
                    'movie_id' => $movie->id,
                    'url' => $artImage['url']
                ]);
                $artImageDB->height = $artImage['h'] ?? null;
                $artImageDB->width = $artImage['w'] ?? null;
                $artImageDB->save();
            }
        }

        return $movie->id;
    }
}

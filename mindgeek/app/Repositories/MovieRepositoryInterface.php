<?php
namespace App\Repositories;

interface MovieRepositoryInterface
{
    /**
     * Get's a movie by it's ID
     *
     * @param int
     */
    public function get($movie_id);

    /**
     * Get's all movie.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a movie.
     *
     * @param int
     */
    public function delete($movie_id);

    /**
     * Save a movie.
     *
     * @param array
     */
    public function save(array $movie_data);
}

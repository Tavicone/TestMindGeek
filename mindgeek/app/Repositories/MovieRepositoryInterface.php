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
     * Get's all posts.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post.
     *
     * @param int
     */
    public function delete($movie_id);

    /**
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($movie_id, array $movie_data);
}

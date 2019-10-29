<?php
namespace App\Repositories;


namespace App\Repositories;

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
     * Updates a post.
     *
     * @param int
     * @param array
     */
    public function update($movie_id, array $movie_data)
    {
        Movie::find($movie_id)->update($movie_data);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'movies';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['external_id', 'headline', 'year', 'body', 'synopsis', 'duration', 'rating'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the directors for that movie.
     */
    public function directors()
    {
        return $this->hasMany('App\Models\Director','movie_id', 'id');
    }

    /**
     * Get the genres for that movie.
     */
    public function genre()
    {
        return $this->hasMany('App\Models\Genre','movie_id', 'id');
    }

    /**
     * Get the casts for that movie.
     */
    public function cast()
    {
        return $this->hasMany('App\Models\Cast','movie_id');
    }

    /**
     * Get the cardImages for that movie.
     */
    public function cardImage()
    {
        return $this->hasMany('App\Models\CardImage','movie_id');
    }

    /**
     * Get the cardImages for that movie.
     */
    public function keyArtImage()
    {
        return $this->hasMany('App\Models\KeyArtImage','movie_id');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}

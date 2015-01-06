<?php
/**
 * Created by PhpStorm.
 * User: kaitlin
 * Date: 1/5/15
 * Time: 4:08 PM
 */

class Movie extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'movies';

    public function ratings()
    {
        return $this->hasMany('Rating');
    }

    public function watchlists()
    {
        return $this->hasMany('Watchlist');
    }

    public function bookmarks()
    {
        return $this->hasMany('Bookmark');
    }

    public function comments()
    {
        return $this->hasMany('Comment');
    }
}
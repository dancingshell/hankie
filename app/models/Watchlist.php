<?php

class Watchlist extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'watchlists';

    public function users()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function movies()
    {
        return $this->belongsTo('Movie', 'movie_id');
    }
}
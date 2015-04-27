<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * Do not use timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'name', 'comment' ];

    /**
     *  One tag can be used for many posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post(){

        return $this->belongsToMany('App\Post', 'post_tag', 'tag_id', 'post_id');
    }

    /**
     *  One tag can be used for many posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function store()
    {

        return $this->belongsToMany('App\Store', 'store_tag', 'tag_id', 'store_id');
    }

}

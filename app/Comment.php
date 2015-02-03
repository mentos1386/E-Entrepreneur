<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'body' ];

    /**
     *  One Comment belongs to One Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(){

        return $this->belongsTo('App\Post');
    }

}

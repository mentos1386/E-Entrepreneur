<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];


    /**
     *  One Post Belong to One User/Author
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(){

        return $this->belongsTo('App\User');
    }

    /**
     *  One Post can have Many Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment(){

        return $this->hasMany('App\Comment');
    }

    /**
     *  One Post can have Many Tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tag(){

        return $this->hasMany('App\Tag');
    }

    /**
     *  One Post can have Many Categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category(){

        return $this->hasMany('App\Categories');
    }

}

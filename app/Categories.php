<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'comment', 'parent'];

    /**
     *  One Category can belong to Many Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post(){

        return $this->belongsToMany('App\Post', 'post_category', 'post_id', 'category_id');
    }

}

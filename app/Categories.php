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
    protected $fillable = ['name', 'comment', 'parent'];

    /**
     *  One Category can belong to Many Posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function post(){

        return $this->belongsToMany('App\Post', 'post_category', 'category_id', 'post_id');
    }

    /**
     *  One Category can belong to Many Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function store()
    {

        return $this->belongsToMany('App\Store', 'store_category', 'category_id', 'store_id');
    }

}

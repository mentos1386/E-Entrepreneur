<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagetypes extends Model {

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pagetypes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'dashboard', 'view'];

    /**
     *  One pagetype can be assigned to many pages
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {

        return $this->belongsToMany('App\Page');
    }

}

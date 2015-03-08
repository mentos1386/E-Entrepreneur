<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model {

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
    protected $table = 'links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'url', 'icon', 'drop_down', 'parent', 'menu_id'];

    /**
     *  Many links belongs to one menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {

        return $this->belongsTo('App\Menu');
    }

}

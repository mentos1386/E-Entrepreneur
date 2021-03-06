<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'role_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 *  User can have many posts
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function posts(){
		return $this->hasMany('App\Post');
	}

	/**
	 *  User can have many posts
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function comments(){
		return $this->hasMany('App\Comment');
	}

	/**
	 *  User has One Role
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
	public function role(){
		return $this->belongsTo('App\Role');
	}

	/**
	 *  One User can be Assigned to Many Pages [Permission to access page]
	 *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function page()
	{

		return $this->hasMany('App\Page', 'page_user', 'page_id', 'user_id');
	}

    /**
     *  One User Has many Orders(bought stuff)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orders()
    {
        return $this->hasMany('App\Order', 'orders', 'order_id', 'user_id');
    }

}

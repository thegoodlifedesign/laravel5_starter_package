<?php namespace TGL\Users\Entities;

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
	protected $table = 'members';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'full_name', 'password', 'slug'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**********************************/
	/*
     * MISCELLANEOUS METHODS
     */
	/**********************************/






	/**********************************/
	/*
     * COMMANDS METHODS
     */
	/**********************************/

	/**
	 * @param $username
	 * @param $email
	 * @param $full_name
	 * @param $password
	 * @param $slug
	 * @return static
	 */
	public static function register($username, $email, $full_name, $password, $slug)
	{
		return new static(compact('username', 'email', 'full_name', 'password', 'slug'));
	}





	/**********************************/
	/*
     * RELATIONSHIP METHODS
     */
	/**********************************/


}

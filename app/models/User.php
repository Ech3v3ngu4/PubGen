<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'usuarios';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        public function validate($input)
        {
            $rules = array(
                'nome'                  => 'required|max:255',
                'email'                 => 'required|email|unique:usuarios,email|max:255',
                'password'              => 'required|alphaNum|min:6|max:60',
                'password_confirmation' => 'required|same:password',
            );
             
            return Validator::make($input, $rules);
        }

}

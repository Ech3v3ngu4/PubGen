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
                'username'              => 'required|max:255',
                'email'                 => 'required|email|unique:usuarios,email|max:255',
                'password'              => 'required|alphaNum|min:6|max:60',
                'password_confirmation' => 'required|same:password',
            );
            
            $messages = array(
                'nome.required' => 'O campo Nome deve ser preenchido.',
                'username.required' => 'O campo Nome de Usuário deve ser preenchido.',
                'email.required'     => 'O campo Email deve ser preenchido.',
                'email.email'     => 'O Email deve ser um email válido.',
                'email.unique'     => 'Este email já existe.',
                'password.required'              => 'O campo Senha deve ser preenchido.',
                'password_confirmation.required'          => 'O campo de Confirmação de Senha deve ser preenchido.',
                'password_confirmation.same'          => 'O campo Senha deve ser igual a Confirmação de Senha.',
            );
            return Validator::make($input, $rules, $messages);
        }

}

<?php

class UserController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function new()
	{
		$user = new User;
		$user->email = Input::get("email");
		$user->password = Input::get("password");
		$user->password_confirmation = Input::get("password_confirmation");
		if($user->validate())
		{
			$user = new User;
			$user->email = Input::get("email");
			$user->password = Hash::make(Input::get("password"));
			if($user->forceSave()) // the data has been already validated
			{
				return Response::json(array('result' => 'OK', 'missatge' => 'The user has been signed up.'));
			}
			else
			{
				return Response::json(array('result' => 'KO', 'errors' => $user->errors()->all()));
			}
		}
		else
		{
			return Response::json(array('result' => 'KO', 'errors' => $user->errors()->all()));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function save()
	{
		// here has reached the auth, so the user will exist, lets retrieve it
		$email = Input::get("email");
		$password = Input::get("password");
		$email_new = Input::get("email_new");
		$password_new = Input::get("password_new");
		$password_new_confirmation = Input::get("password_new_confirmation");
		$users = User::where('email','=',$email)->get();
		$user = $users[0];

		// redefinim les regles pq el plugin no permet no comprovar l'unique de l'element actual
		$rules = array(
	    'email_new' 				=> 'required|unique:users,email,'.$user->id,
	    'password_new'              => 'required|alpha_num|between:6,12|confirmed',
	    'password_new_confirmation' => 'required|alpha_num|between:6,12'
	    );
		
		$validator = Validator::make(array('email_new'=>$email_new,'password_new'=>$password_new,'password_new_confirmation'=>$password_new_confirmation), $rules);

        if ($validator->passes())
        {
        	$user->email = Input::get("email_new");
			$user->password = Hash::make(Input::get("password_new"));
			unset($user->password_confirmation);
			if($user->forceSave()) // the data has been already validated
			{
				return Response::json(array('result' => 'OK', 'missatge' => 'The user credentials has been updated.'));
			}
			else
			{
				return Response::json(array('result' => 'KO', 'errors' => $user->errors()->all()));
			}
        }
        else
        {
        	$messall = $validator->messages();
        	return Response::json(array('result' => 'KO1', 'errors' => $messall->all()));
        }
        /*
		if($user->validate(10))
		{
			$user->email = Input::get("email");
			$user->password = Hash::make(Input::get("password"));
			$user->password_confirmation = NULL;
			if($user->forceSave()) // the data has been already validated
			{
				return Response::json(array('result' => 'OK', 'missatge' => 'The user credentials has been updated.'));
			}
			else
			{
				return Response::json(array('result' => 'KO', 'errors' => $user->errors()->all()));
			}
		}
		else
		{
			return Response::json(array('result' => 'KO', 'errors' => $user->errors()->all()));
		}
		*/
	}

}
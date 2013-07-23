<?php

class UserController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
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
				return Response::json(array('result' => 'OK', 'missatge' => 'The user has been signed in.'));
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

}
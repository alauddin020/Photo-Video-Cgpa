<?php
	namespace App\Traits;
	/**
	 * 
	 */
	use App\User;
	trait Alauddin 
	{
		public function getValue($id)
		{
			return User::find($id);
		}
	}
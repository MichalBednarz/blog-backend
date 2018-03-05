<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

class AuthenticateController extends Controller {

	public function __construct() {
		$this->middleware('jwt.auth', ['except' => ['authenticate']]);
	}

	public function index() {
		$users = User::all();
		return $users;
	}

	public function authenticate(Request $request) {
		$credentials = $request->only('email', 'password');

		try {
			if (!$token = JWTAuth::attempt($credentials)) {
				return response()->json(['error' => 'invalid_credentials'], 401);
			}
		} catch (JWTException $e) {
			return response()->json(['error' => 'could_not_create_token'], 500);
		}

		return response()->json(compact('token'));
	}
}

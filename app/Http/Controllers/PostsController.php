<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller {

	public function __construct() {
		//$this->middleware('jwt.auth', ['except' => ['index', 'show', 'update']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//$posts = Post::all();
		$posts = Post::with("Comments")->get();

		return $posts;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$post = new Post();
		$post->title = $request->input('title') ?: '';
		$post->leadSentence = $request->input('leadSentence') ?: '';
		$post->author = $request->input('author') ?: '';
		$post->text = $request->input('text') ?: '';
		$post->imageUrl = $request->input('imageUrl') ?: '';
		$post->save();

		return $post;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$post = Post::findOrFail($id);

		return $post;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Post $post) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$post = Post::find($id);

		if ($request->has('title')) {
			$post->title = $request->input('title');
		}
		if ($request->has('leadSentence')) {
			$post->leadSentence = $request->input('leadSentence');
		}
		if ($request->has('author')) {
			$post->author = $request->input('author');
		}
		if ($request->has('text')) {
			$post->text = $request->input('text');
		}
		if ($request->has('imageUrl')) {
			$post->imageUrl = $request->input('imageUrl');
		}

		$post->save();

		return $post;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Post $post) {
		//
	}
}

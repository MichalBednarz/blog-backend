<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$posts = factory(App\Post::class, 50)->create()->each(function (App\Post $post) {
			factory(App\Comment::class, 10)->create([
				'post_id' => $post->id]);
		});

	}
}

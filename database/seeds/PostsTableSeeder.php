<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Post::class, 30)
        ->create()
        ->each(function (App\Models\Post $post) {
            $created_at = $post->created_at->addDays(1)->format('Y-m-d H:i:s');
            $updated_at = new Carbon\Carbon($created_at);
            $post->comments()->saveMany(factory(App\Models\Comment::class, rand(3, 8))->make([
                'commentable_id' => $post->id,
                'commentable_type' => 'App\Models\Post',
                'created_at' => $created_at,
                'updated_at' => $updated_at->addDays(2)->format('Y-m-d H:i:s')
            ]));
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(50)->create([
                'author_id' => User::all()->first()->id,
                'category_id' => PostCategory::all()->first()->id,
        ])->each(function (Post $post) {
            $users = User::all()->random(rand(1, 5))
                ->each(
                    fn($user) => $post->likes()->create(['user_id' => $user->id])
                );
            User::all()->random(rand(1, 5))
                ->each(
                    fn($user) => $post->comments()->create(['user_id' => $user->id, 'content' => fake()->sentence()])
                );
            Comment::all()->random(3)
                ->each(
                    fn($comment) =>
                    $comment->replyComments()
                        ->create(['user_id' => $users->random()->id, 'content' => fake()->sentence()])
                );
            $post->tags()->attach(Tag::all()->random(rand(1, 5)));
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = App\BlogPost::all();
        //display message in case if theres no any BlogPost
        if ($posts->count() === 0) {
            $this->command->info('Theres no any BlogPosts, no option to add comments');
            return;
        }
        //If there are BlogPosts then ask how many comments should be added
        $commentsCount = (int)$this->command->ask('How many comments do you want?', 150);


        factory(App\Comment::class, $commentsCount)->make()->each(function ($comment) use ($posts) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->save();
        });
    }
}

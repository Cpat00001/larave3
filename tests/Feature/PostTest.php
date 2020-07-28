<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\BlogPost;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $response = $this->get('/posts');
        $response->assertSeetext('No blogPosts');
    }
    public function testSee1PostWhenThereIs1()
    {
        //Arrange Part
        $post = new BlogPost();
        $post->title = 'New BlogPost';
        $post->content = 'Content of the BlogPost';
        $post->save();

        //Act Part
        $response = $this->get('/posts');
        //Assert part
        $response->assertSeeText('New BlogPost');
        $this->assertDatabaseHas('blogposts', [
            'title' => 'New BlogPost',
        ]);
    }
    //check if flash method shows up and new post exists
    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'Some random text here',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Post was creatED Successfully');
    }
}

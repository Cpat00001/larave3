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
        //Arrange Part -> wolaj private method z dolu pliku/classy
        //Arrange
        $post = new BlogPost();
        $post->title = 'New BlogPost';
        $post->content = 'Content of the BlogPost test';
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
    public function testStoreFail()
    {
        $params = [
            'title' => 'x',
            'content' => 'x'
        ];
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();
        $this->assertEquals($messages['title'][0], 'The title must be at least 5  characters.');
        $this->assertEquals($messages['content'][0], 'The content must be at least 10  characters.');
    }

    public function testUpdateValid()
    {
        //Arrange
        //Arrange
        $post = new BlogPost();
        $post->title = 'New BlogPost test';
        $post->content = 'Content of the BlogPost test';
        $post->save();


        $this->assertDatabaseHas('blogposts', [
            'title' => 'New BlogPost test',
        ]);
        //request with parameters
        $params = [
            'title' => 'Overwrite a title',
            'content' => 'overwrite a content',
        ];
        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        //verify status message
        $this->assertEquals(session('status'), 'Post UPDATED successfully');
        $this->assertDatabaseMissing('blogposts', [
            'title' => 'New BlogPost test',
        ]);
    }
    //DELETE BlogPost
    public function testDelete()
    {
        //Assert - wolaj private method z dolu pliku createDummyBlogPost()
        // $post = $this->createDummyBlogPost();
        //Arrange
        $post = new BlogPost();
        $post->title = 'New BlogPost test';
        $post->content = 'Content of the BlogPost test';
        $post->save();

        //zrob HTTP Request do endpointu 
        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');
        //check if displayed text on page is equals to the text in test
        $this->assertEquals(session('status'), 'Post was DELETED');
    }
}

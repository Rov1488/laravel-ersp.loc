<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_create_post_returns_a_successful_response(): void
    {
        Storage::fake('local');
        $file = UploadedFile::fake()->image('test_image.jpg');
        $this->assertNotNull($file, 'Failed to create a fake uploaded file.');

        $admin = User::first()->id;
        $this->assertNotNull($admin, 'No user found in the database.');

        $category = Category::first();
        $this->assertNotNull($category, 'No category found in the database.');
        $categoryId = $category->id;

        $title = 'Test Title';
        $slug = str_replace(' ', '-', $title);

        $response = $this->post('posts/create', [
            'title' => $title,
            'slug' => $slug,
            'category_id' => $categoryId,
            'language' => 'uz',
            'description' => 'asdasdasdasdsad',
            'content' => 'adadwdadwadawdawdwadw',
            'image' => $file,
            'user_id' => 2,
            'author_id' => 2,
        ]);

           $response->assertStatus(200);

        //$response->assertRedirect('/');

    }
}

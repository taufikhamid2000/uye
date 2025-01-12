<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile; // Correct namespace
use Tests\TestCase;

class ListingTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_listing_pages()
    {
        $response = $this->get('/listings');
        $response->assertRedirect('/login');

        $response = $this->get('/listings/create');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_view_own_listings()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $listing = Listing::factory()->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $response = $this->actingAs($user)->get('/listings');

        $response->assertSee($listing->title);
    }

    public function test_user_can_create_listing()
    {
        $user = User::factory()->create();

        // Create a valid category
        $category = Category::factory()->create();

        // Act as the user and create a listing
        $response = $this->actingAs($user)->post('/listings', [
            'title' => 'Test Listing',
            'description' => 'This is a test description.',
            'price' => 100.50,
            'category_id' => $category->id, // Use the valid category ID
            'availability' => true,
            'photos' => [UploadedFile::fake()->image('photo1.jpg')], // Simulate an image upload
        ]);

        $response->assertRedirect('/listings'); // Assert redirection after creation
        $this->assertDatabaseHas('listings', [
            'title' => 'Test Listing',
            'description' => 'This is a test description.',
            'price' => 100.50,
            'category_id' => $category->id,
        ]);
    }

    public function test_user_can_edit_own_listing()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->create([
            'user_id' => $user->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $response = $this->actingAs($user)->patch("/listings/{$listing->id}", [
            'title' => 'Updated Title',
            'description' => $listing->description,
            'price' => $listing->price,
            'category_id' => $listing->category_id,
            'availability' => $listing->availability,
        ]);

        $response->assertRedirect('/listings');
        $this->assertDatabaseHas('listings', ['id' => $listing->id, 'title' => 'Updated Title']);
    }

    public function test_user_cannot_edit_others_listing()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $listing = Listing::factory()->create([
            'user_id' => $otherUser->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $response = $this->actingAs($user)->patch("/listings/{$listing->id}", [
            'title' => 'Malicious Update',
        ]);

        $response->assertStatus(403); // Forbidden
        $this->assertDatabaseMissing('listings', ['title' => 'Malicious Update']);
    }

    public function test_user_can_delete_own_listing()
    {
        $user = User::factory()->create();
        $listing = Listing::factory()->create([
            'user_id' => $user->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $response = $this->actingAs($user)->delete("/listings/{$listing->id}");

        $response->assertRedirect('/listings');
        $this->assertDatabaseMissing('listings', ['id' => $listing->id]);
    }

    public function test_user_cannot_delete_others_listing()
    {
        $user = User::factory()->create();
        $otherUser = User::factory()->create();
        $listing = Listing::factory()->create([
            'user_id' => $otherUser->id,
            'category_id' => Category::factory()->create()->id,
        ]);

        $response = $this->actingAs($user)->delete("/listings/{$listing->id}");
        $response->assertStatus(403);

        $this->assertDatabaseHas('listings', ['id' => $listing->id]);
    }
}

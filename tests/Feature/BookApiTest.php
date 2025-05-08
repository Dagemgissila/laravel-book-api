<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_list_books()
    {
        Book::factory()->count(3)->create();

        $response = $this->getJson('/api/books');

        $response->assertStatus(200)
            ->assertJsonCount(3, "data");
    }

    public function test_can_get_single_book()
    {
        $book = Book::factory()->create();

        $response = $this->getJson("/api/books/{$book->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'title' => $book->title,
                'author' => $book->author,
            ]);
    }

    public function test_can_create_book()
    {
        $data = [
            'title' => 'New Book',
            'author' => 'John Smith',
            'publication_year' => 2021,
        ];

        $response = $this->postJson('/api/books', $data);

        $response->assertStatus(201)
            ->assertJsonFragment($data);

        $this->assertDatabaseHas('books', $data);
    }

    public function test_validation_error_on_create()
    {
        $response = $this->postJson('/api/books', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['title', 'author', 'publication_year']);
    }

    public function test_can_update_book()
    {
        $book = Book::factory()->create();

        $updateData = ['title' => 'Updated Title'];

        $response = $this->putJson("/api/books/{$book->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment($updateData);

        $this->assertDatabaseHas('books', $updateData);
    }

    public function test_validation_error_on_update()
    {
        $book = Book::factory()->create();

        $response = $this->putJson("/api/books/{$book->id}", ['publication_year' => 1000]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['publication_year']);
    }

    public function test_can_delete_book()
    {
        $book = Book::factory()->create();

        $response = $this->deleteJson("/api/books/{$book->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}

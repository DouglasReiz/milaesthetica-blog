<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function user_can_create_a_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();

        $response = $this->actingAs($user)->post("/posts/{$post->id}/comments", [
            'post_id' => $post->id,
            'name' => 'Usuário Teste',
            'comment' => 'Este é um comentário de teste.',
        ]);

        $response->assertRedirect(); // espera redirecionamento
        $this->assertDatabaseHas('comments', [
            'post_id' => $post->id,
            'comment' => 'Este é um comentário de teste.'
        ]);
    }

    /** @test */
    public function user_can_delete_a_comment()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $comment = Comment::factory()->create([
            'user_id' => $user->id,
            'post_id' => $post->id,
            'comment' => 'Comentário para deletar'
        ]);

        $response = $this->actingAs($user)->delete("/comments/{$comment->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('comments', [
            'id' => $comment->id
        ]);
    }
}

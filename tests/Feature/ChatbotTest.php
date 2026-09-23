<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChatbotTest extends TestCase
{
    public function test_chatbot_api_returns_reply_with_conversation_context(): void
    {
        $response = $this->postJson('/api/chatbot', [
            'message' => 'Which membership is best for me?',
            'conversation' => [
                ['role' => 'user', 'content' => 'Hi'],
                ['role' => 'assistant', 'content' => 'Hi! I can help with memberships, classes, gym hours, and general questions about Infliction.'],
            ],
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'reply',
            ]);
    }
}

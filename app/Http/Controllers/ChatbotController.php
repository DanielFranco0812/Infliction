<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $message = trim((string) $request->input('message', ''));

        if ($message === '') {
            return response()->json([
                'reply' => 'Please type a question about our gym, memberships, classes, or hours.',
            ]);
        }

        $conversation = $request->input('conversation', []);
        $history = is_array($conversation) ? $conversation : [];

        $faqReply = $this->answerFromFaq($message);
        if ($faqReply) {
            return response()->json(['reply' => $faqReply]);
        }

        $gymContext = <<<'TEXT'
You are a friendly, natural-sounding assistant for Infliction Gym.
Your job is to help website visitors like a helpful front-desk assistant.
Speak casually and warmly, as if chatting with a customer.
Use this information when answering:
- Basic Membership: ₱1,500/month
- Premium Membership: ₱2,500/month
- Gym is open 24/7 for members
- Staffed hours are 6:00 AM to 10:00 PM
- Location: Baliwag, Bulacan
- Contact: (044) 766-0000
- Classes: cardio, cycling, HIIT, dance, yoga, strength, personal training
- Brand: Infliction Gym
- You should answer in simple, conversational English, not robotic text.
- If the user asks a general question, reply naturally and briefly.
- If they ask about pricing, membership, classes, hours, or location, answer clearly and directly.
- Do not invent facts or mention anything not in the provided information.
- Keep the conversation natural, like a real assistant talking with a customer.
TEXT;

        $apiKey = env('XAI_API_KEY', env('GROK_API_KEY'));

        if (!$apiKey) {
            return response()->json([
                'reply' => 'Our Basic Membership is ₱1,500/month. Premium is ₱2,500/month. We are open 24/7 for members and staffed from 6:00 AM to 10:00 PM. Call (044) 766-0000 for help.',
            ]);
        }

        $messages = [
            ['role' => 'system', 'content' => $gymContext],
        ];

        foreach ($history as $entry) {
            if (!is_array($entry)) {
                continue;
            }

            $role = isset($entry['role']) ? (string) $entry['role'] : null;
            $content = isset($entry['content']) ? (string) $entry['content'] : null;

            if ($role && $content && in_array($role, ['user', 'assistant'], true)) {
                $messages[] = ['role' => $role, 'content' => $content];
            }
        }

        $messages[] = ['role' => 'user', 'content' => $message];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.x.ai/v1/chat/completions', [
            'model' => 'grok-2-latest',
            'messages' => $messages,
            'temperature' => 0.7,
            'max_tokens' => 250,
        ]);

        if ($response->failed()) {
            return response()->json([
                'reply' => 'I am having trouble reaching the assistant right now. Please call our front desk at (044) 766-0000.',
            ], 200);
        }

        $content = data_get($response->json(), 'choices.0.message.content');

        if (is_string($content) && trim($content) !== '') {
            return response()->json([
                'reply' => trim($content),
            ]);
        }

        return response()->json([
            'reply' => 'Our Basic Membership is ₱1,500/month. Premium is ₱2,500/month. We are open 24/7 for members and staffed from 6:00 AM to 10:00 PM. Call (044) 766-0000 for help.',
        ]);
    }

    protected function answerFromFaq(string $message): ?string
    {
        $lower = strtolower($message);

        if (str_contains($lower, 'price') || str_contains($lower, 'membership') || str_contains($lower, 'cost') || str_contains($lower, 'how much')) {
            return 'Our Basic Membership is ₱1,500 per month, and the Premium Membership is ₱2,500 per month.';
        }

        if (str_contains($lower, 'open') || str_contains($lower, 'hours') || str_contains($lower, 'time') || str_contains($lower, 'when')) {
            return 'Infliction is open 24/7 for members, and our staffed hours are from 6:00 AM to 10:00 PM.';
        }

        if (str_contains($lower, 'class') || str_contains($lower, 'schedule') || str_contains($lower, 'workout') || str_contains($lower, 'training')) {
            return 'We offer cardio, cycling, HIIT, dance, yoga, strength training, and personal training sessions.';
        }

        if (str_contains($lower, 'location') || str_contains($lower, 'address') || str_contains($lower, 'where') || str_contains($lower, 'located')) {
            return 'Infliction is located in Baliwag, Bulacan.';
        }

        if (str_contains($lower, 'contact') || str_contains($lower, 'call') || str_contains($lower, 'phone') || str_contains($lower, 'number')) {
            return 'You can reach us at (044) 766-0000.';
        }

        if (str_contains($lower, 'recommend') || str_contains($lower, 'best') || str_contains($lower, 'choose') || str_contains($lower, 'suggest')) {
            return 'If you want more access and added perks, the Premium Membership is the better value. If you just need a solid base plan, the Basic Membership is a great start.';
        }

        if (str_contains($lower, 'hello') || str_contains($lower, 'hi') || str_contains($lower, 'hey') || str_contains($lower, 'good morning') || str_contains($lower, 'good afternoon')) {
            return 'Hi! I can help with memberships, classes, gym hours, and general questions about Infliction.';
        }

        if (str_contains($lower, 'thanks') || str_contains($lower, 'thank you')) {
            return 'You’re welcome! Let me know if you need anything else about memberships or classes.';
        }

        return null;
    }
}

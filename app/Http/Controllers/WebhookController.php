<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handleFacebook(Request $request)
    {
        if ($request->isMethod('get')) {
            $verifyToken = $request->query('hub_verify_token');
            $challenge = $request->query('hub_challenge');

            if ($verifyToken === env('META_VERIFY_TOKEN')) {
                return response($challenge, 200)->header('Content-Type', 'text/plain');
            }

            return response('Forbidden', 403);
        }

        Log::info('Facebook webhook payload', ['payload' => $request->all()]);

        return response()->json(['status' => 'received'], 200);
    }
}

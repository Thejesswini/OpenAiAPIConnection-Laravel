<?php

namespace App\Http\Controllers;
use League\CommonMark\CommonMarkConverter;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class OpenAiController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('message', 'who are you'); // Get user input
    $data = Http::withHeaders([
        'Content-type' => 'application/json',
        'Authorization' => 'Bearer ' . env('OPEN_AI_API'),
    ])
    ->withoutVerifying()
    ->post("https://api.openai.com/v1/chat/completions", [
        "model" => "gpt-4o-mini",
        "messages" => [
            ["role" => "user", "content" => $query]
        ],
    ])
    ->json();

    $response = $data['choices'][0]['message']['content'] ?? 'No response from AI';

    $converter = new CommonMarkConverter();
    $formattedResponse = $converter->convert($response);

    return view('welcome', compact('formattedResponse'));
}

}


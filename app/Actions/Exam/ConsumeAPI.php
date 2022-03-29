<?php

namespace App\Actions\Exam;

use Illuminate\Support\Facades\Http;

class ConsumeAPI
{
    public static function execute()
    {
        $token = Http::post(config(__('services.exam.endpoint')) . '/oauth/token', [
            'grant_type'    => 'password',
            'client_id'    => '3',
            'client_secret' => 'Fql3okYQbbzDtlmhBXdLE2eWy3OR9MR9x3n9NwqL',
            'username'      => 'joe@doe.com',
            'password'      => 'secret',
            'scope'         => '*',
        ]);

        $response = Http::accept('application/json')
            ->contentType('application/json')
            ->withToken($token->json('access_token'))
            ->get(config(__('services.exam.endpoint')) . '/api/me');
        return $response->json();
    }
}

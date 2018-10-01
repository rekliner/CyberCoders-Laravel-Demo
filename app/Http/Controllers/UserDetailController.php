<?php

namespace App\Http\Controllers;

use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class UserDetailController extends Controller {
    public function index(Request $request) {
        $git_endpoint = '/users/'. $request['user'];
        $client = new Client(['base_uri' => 'https://api.github.com/']); //GuzzleHttp\Client
        $response = $client->get($git_endpoint,[            
            'auth' => [
                env('GIT_USER'),
                env('GIT_PW')
            ]
        ]); 
        return $response->getBody()->getContents();
    }
}
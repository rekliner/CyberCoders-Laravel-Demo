<?php

namespace App\Http\Controllers;

use App\Followers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class FollowersController extends Controller {
    public function index(Request $request) {
        $git_endpoint = '/users/'. $request['user'] .'/followers';
        isset($request['page']) ? $page = $request['page'] : $page = 1;

        $client = new Client(['base_uri' => 'https://api.github.com/']); //GuzzleHttp\Client
        $response = $client->get($git_endpoint,[
            'query' => [
                'page' => $page
            ],
                
            'auth' => [
                env('GIT_USER'),
                env('GIT_PW')
            ]
        ]); 
        return $response->getBody()->getContents();
    }
}
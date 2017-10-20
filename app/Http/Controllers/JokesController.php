<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class JokesController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function index()
    {
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('https://api.chucknorris.io/jokes/random', []);

        if($result->getStatusCode() == 200){  
            $obj = json_decode($result->getBody());
            return response()->json(['data' => [
                'type' => 'text',
                'text' => $obj->value
            ]]);
        }else{
            return response()->json(['data' => [
                'type' => 'text',
                'text' => 'Sorry i am not feeling funny.'
            ]]);            
        }



    }
}
?>
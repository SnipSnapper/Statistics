<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
require('vendor/autoload.php');

class HomeController extends Controller
{

	function create()
    {
        $client = new Client();
        $rooms = $client->get(env('API_ROUTE') . 'rooms');
        return view('Statistics', [
            'rooms' => json_decode($rooms->getBody()),
        ]);
    }

    function SentData(Request $request){
		
		try {
            $client = new Client();
            $result = $client->request('POST', env('API_ROUTE') . 'test', [
                'form_params' => [
                    'checkboxID' => $request->input('checkboxID'),
                    'IDValue' => $request->input('IDValue'),
                    'checkboxPeople' => $request->input('checkboxPeople'),
                    'amountOfPeople' => $request->input('amountOfPeople'),
                    'date' => $request->input('date'),

                ]
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            dd($e->getResponse()->getBody()->getContents());
        }
        return json_decode($result->getBody());
    }
}
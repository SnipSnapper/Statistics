<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{

        function create()
    {
        $client = new Client();
        $rooms = $client->get(env('API_ROUTE') . 'rooms');
        return view('/Statistics', [
            'rooms' => json_decode($rooms->getBody()),
        ]);
    }


	/*private $client;
	private $response;
	private $reservations;

	function __construct(){
		$this->client = new Client();
		$this->response = $this->client->get(env('API_TEST') . 'calendar_items');
		$this->reservations = json_decode($this->response->getBody());
	}*/

    function SentData(Request $request){
		
		try {
            $client = new Client();
            $result = $client->request('POST', env('API_ROUTE') . 'test', [
                'form_params' => [
                    'checkboxID' => $request->input('checkboxID'),
                    'IDValue' => $request->input('IDValue'),
                    'checkboxPeople' => $request->input('checkboxPeople'),
                    'amountOfPeople' => $request->input('amountOfPeople'),
                ]
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            dd($e->getResponse()->getBody()->getContents());
        }
        return json_decode($result->getBody());
    }
}
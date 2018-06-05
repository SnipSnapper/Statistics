<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{

	/*private $client;
	private $response;
	private $reservations;

	function __construct(){
		$this->client = new Client();
		$this->response = $this->client->get(env('API_TEST') . 'calendar_items');
		$this->reservations = json_decode($this->response->getBody());
	}*/

    function SentData2(Request $request){

    	try {
            $client = new Client();
            $result = $client->request('POST', env('API_ROUTE') . 'test', [
                'form_params' => [
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                ]
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            dd($e->getResponse()->getBody()->getContents());
        }
        return json_decode($result->getBody());
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
                ]
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            dd($e->getResponse()->getBody()->getContents());
        }
        return json_decode($result->getBody());
    }
}
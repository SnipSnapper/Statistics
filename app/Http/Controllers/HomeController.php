<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;



class HomeController extends Controller
{

    function __construct(){

        $rooms;
    }


	function create()
    {
        $client = new Client();
        $this->rooms = $client->get(env('API_ROUTE') . 'rooms');
        return view('Statistics', [
            'rooms' => json_decode($this->rooms->getBody()),
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
                    'date' => $request->input('date'),

                ]
            ]);
        } catch (\GuzzleHttp\Exception\BadResponseException $e)
        {
            dd($e->getResponse()->getBody()->getContents());
        }
        $homecontroller = new HomeController;
        $homecontroller->makeGraph($result, $request);

        //return json_decode($result->getBody());

        return view("graph");
    }

    function makeGraph($result, $request){
        $client = new Client();
        $this->rooms = $client->get(env('API_ROUTE') . 'rooms');
        $room_name = "";

        $rooms = json_decode($this->rooms->getBody());
        foreach($rooms as $room)
        {
            if($room->id == $request->input('IDValue'))
            {
                $room_name = $room->name;
            }
        }

        $usage = json_decode($result->getbody());

        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow(['used', $usage])
                ->addRow(['not used', 100 - $usage]);
              
            \Lava::DonutChart('IMDB', $reasons, [
            'title' => 'percentage of usage of room ' . $room_name
        ]);

    }
}
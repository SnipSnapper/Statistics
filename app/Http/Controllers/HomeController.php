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
        return view('home', [
            'rooms' => json_decode($this->rooms->getBody()),
        ]);


    }

    function SentData(Request $request){
		
		try {
            $client = new Client();
            $result = $client->request('POST', env('API_ROUTE') . 'test', [
                'form_params' => [
                    'IDValue' => $request->input('IDValue'),
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
        $room_names = $_POST['IDValue'];
        $i = 0;

        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent');

        $usage = json_decode($result->getbody());
        
        foreach ($usage as $value) {
            if (isset($value[0])) {
                $reasons->addRow([$room_names[$i], $value[0]]);
            }else{
                $reasons->addRow([$room_names[$i], 0]);
            }
            
            $i++;
        }
              
            \Lava::BarChart('IMDB', $reasons, [
                'hAxis'=> [
                    'minValue' => '0',
                    'maxValue'=> '100'
                ]
            ]);

    }
}
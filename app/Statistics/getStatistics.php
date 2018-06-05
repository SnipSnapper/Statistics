<?php  

use GuzzleHttp\Client;
	
class GetStatistics {
	private $client;
	private $response;
	private $reservations;

	function __construct(){
		$this->client = new Client();
		$this->response = $this->client->get(env('API_TEST') . 'calendar_items');
		$this->reservations = json_decode($this->response->getBody());
	}

	function PrintTime() {

	foreach ($this->reservations as $reservation) {
		$begin_time = $reservation->begin_time;
		$end_time = $reservation->end_time;
		$RoomID = $reservation->room_id;

		echo "Begin time: ";
		echo $begin_time = date("H:i:s",strtotime($begin_time));

		echo " End time: ";
		echo $end_time = date("H:i:s",strtotime($end_time));

		echo " Room ID = ";
		echo $RoomID;

		echo "<br>";

		echo "Begin time: ";
		echo $begin_time = date("H:i:s",strtotime($begin_time));
		echo " End time: ";
		echo $end_time = date("H:i:s",strtotime($end_time));
		echo "<br>";
	}
}
}



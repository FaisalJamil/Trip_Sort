<?php

	require_once 'src/autoload.php';
	use \SortedJourneyNS\BoardingPass;
	use \SortedJourneyNS\Journey;
	use SortedJourneyNS\BoardingPass_Type_Abstract;

/**
 * This file is actual implementation of the application, sample data is used to get the sorted output from unsorted stack of
 * boarding passes. 
 */	
	
	try{
	$boardingpasses = array(
		BoardingPass_Type_Abstract::make_BoardingPass(array(
			'start_of_journey' => 'Gerona Airport',
			'end_of_journey' => 'Stockholm',
			'transport_type' => 'flight SK455',
			'seat_info' => '3A',
			'gate_info' => '45B',
			'extra_info' => 'Baggage drop at ticket counter 344'
		)),
		BoardingPass_Type_Abstract::make_BoardingPass(array(
			'start_of_journey' => 'Madrid',
			'end_of_journey' => 'Barcelona',
			'transport_type' => 'train 78A',
			'seat_info' => '45B',
			'gate_info' => null,
			'extra_info' => null
		)),
		BoardingPass_Type_Abstract::make_BoardingPass(array(
		'start_of_journey' => 'Stockholm',
		'end_of_journey' => 'New York',
		'transport_type' => 'flight SK22',
		'seat_info' => '7B',
		'gate_info' => '22',
		'extra_info' => null
		)),
		BoardingPass_Type_Abstract::make_BoardingPass(array(
		'start_of_journey' => 'Barcelona',
		'end_of_journey' => 'Gerona Airport',
		'transport_type' => 'airport bus',
		'seat_info' => null,
		'gate_info' => null,
		'extra_info' => null
		))
	);
	
	$journey = new Journey($boardingpasses);
	$sorted = $journey->sort_Passes()->get_Passes();
	
 	$count = 1;
	foreach ($sorted as $pass){
		echo $count.	" Take ".$pass->transport_type.
					 	" From ".$pass->start_of_journey.
						" To ".$pass->end_of_journey.
						" Use ";
		echo $pass->seat_info ? $pass->seat_info." Seat" :"Any Seat ";
		echo $pass->gate_info ? ", ".$pass->gate_info." Gate" :", Any Gate ";
		echo $pass->extra_info ? " ".$pass->extra_info :" ";
		echo "\n<br>";   
		$count++;
	}
	echo $count. " You've reached the destination";
  	
	}catch(Exception $e){
		echo $e->getMessage();
}
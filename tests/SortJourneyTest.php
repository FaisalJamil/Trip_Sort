<?php

use SortedJourneyNS\Journey;
use SortedJourneyNS\BoardingPass_Type_Abstract;
class SortJourneyTest extends PHPUnit_Framework_TestCase
{
	// ...
	private $testPasses = array();

	public function test_sample_data(){
		$sample_data = array(
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
		
		$journey = new Journey($sample_data);
		$sorted = $journey->sort_Passes()->get_Passes();
		
		$this->assertNotEmpty($sorted);
	}

	public function testemptysample (){ 
		$sample_data = array();
		$journey = new Journey($sample_data);
		$sorted = $journey->sort_Passes()->get_Passes();
		
		$this->assertEmpty($sorted);
	}
	public function testsinglesample (){
		$sample_data = array(
				BoardingPass_Type_Abstract::make_BoardingPass(array(
						'start_of_journey' => 'Gerona Airport',
						'end_of_journey' => 'Stockholm',
						'transport_type' => 'flight SK455',
						'seat_info' => '3A',
						'gate_info' => '45B',
						'extra_info' => 'Baggage drop at ticket counter 344'
				)));
		$journey = new Journey($sample_data);
		$sorted = $journey->sort_Passes()->get_Passes();
		
		$this->assertNotEmpty($sorted);
	}
	// ...
}
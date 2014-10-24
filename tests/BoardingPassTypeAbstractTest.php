<?php
use SortedJourneyNS\BoardingPass;
use SortedJourneyNS\BoardingPass_Type_Abstract;
class BoardingPassTypeAbstractTest extends PHPUnit_Framework_TestCase
{
	// ...
	public function testBoardingPassType()
	{
		$testPass = array(
				'start_of_journey' => 'Gerona Airport',
				'end_of_journey' => 'Stockholm',
				'transport_type' => 'flight SK455',
				'seat_info' => '3A',
				'gate_info' => '45B',
				'extra_info' => 'Baggage drop at ticket counter 344'
		);
		$bp = BoardingPass_Type_Abstract::make_BoardingPass($testPass);
		$this->assertNotEmpty($bp);
	}
	// ...
}
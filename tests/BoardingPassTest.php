<?php
use SortedJourneyNS\BoardingPass;
class BoardingPassTest extends PHPUnit_Framework_TestCase
{
	// ...
	public function testBoardingPass()
	{
		$testPass = array(
						'start_of_journey' => 'Gerona Airport',
						'end_of_journey' => 'Stockholm',
						'transport_type' => 'flight SK455',
						'seat_info' => '3A',
						'gate_info' => '45B',
						'extra_info' => 'Baggage drop at ticket counter 344'
					);
		$bp = new BoardingPass($testPass);
		$this->assertNotEmpty($bp);
	}

	// ...
}
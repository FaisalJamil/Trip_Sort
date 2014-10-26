<?php
namespace SortedJourneyNS;
use \SortedJourneyNS\Sort_Journey_Interface;
use \Exception;

/**
 * 
 * @author faisal
 *
 *	This class is resposible to get an unsorted stack of Boarding Passes and sort them out. Sorting
 *	is done so that it makes a chain/stack of passes, where end_of_journey of each preceding pass is
 *	same as end_of_journey of the following one. 
 *	The implementation of sorting algorithm works with any set of boarding passes, as long as there
 *	is always an unbroken chain between all the legs of the trip. i.e. it's one continuous trip with
 *	no interruptions.
 * 		
 */
class Sort_Journey implements Sort_Journey_Interface{

	protected static $sorted_passes = array();
	protected static $unsorted_passes;
	protected static $buffer = array();

	public static function sort_journey($unsorted_passes){
		
	 	self::$unsorted_passes = $unsorted_passes;
		if(empty($unsorted_passes))
			return self::$unsorted_passes;
		
		if (count(self::$sorted_passes) == 0) {
			array_push(self::$sorted_passes, array_shift(self::$unsorted_passes));
		}
		foreach (self::$unsorted_passes as $key => $pass) {
			if (!$pass->start_of_journey || !$pass->end_of_journey) {
				throw new Exception("start_of_journey and end_of_journey members are mandatory");
			}
			$start_of_journey = reset(self::$sorted_passes);
			$start_of_journey = $start_of_journey->start_of_journey;
		
			$end_of_journey = end(self::$sorted_passes);
			$end_of_journey = $end_of_journey->end_of_journey;
			if ($end_of_journey == $pass->start_of_journey || $start_of_journey == $pass->end_of_journey) {
		
				if ($pass->start_of_journey == $end_of_journey)
					array_push(self::$sorted_passes, $pass);
				if ($pass->end_of_journey == $start_of_journey) 
					array_unshift(self::$sorted_passes, $pass);
				if (isset(self::$buffer[$key])) 
					unset(self::$buffer[$key]);
			}
			else {
				array_push(self::$buffer, $pass);
			}
		}
		if (count(self::$buffer) > 0) {
			self::sort_journey(self::$buffer);
		}
			
 		
		return self::$sorted_passes;
 	}
}
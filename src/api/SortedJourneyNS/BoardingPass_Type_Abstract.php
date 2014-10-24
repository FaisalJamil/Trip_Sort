<?php
namespace SortedJourneyNS;
use \SortedJourneyNS\BoardingPass;
use \Exception;

/**
 * 
 * @author faisal
 *
 *	This class enables to define any type of BoardingPass. There was a possibility to deal with 
 *	different types of transports therefore this class can be used for future development.
 *
 */
abstract class BoardingPass_Type_Abstract{

	public static function make_BoardingPass($boardingpass) {

		if (!isset($boardingpass['type'])) {
			return new BoardingPass($boardingpass);
		}
		else {
			try {
				return new $boardingpass['type'] . 'Pass';
			}
			catch (Exception $e) {
				throw new Exception($boardingpass['type'] . 'Pass' . ' class not found! ' . $e);
			}
		}
	}
}


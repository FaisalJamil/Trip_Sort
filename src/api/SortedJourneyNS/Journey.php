<?php
namespace SortedJourneyNS;
use \SortedJourneyNS\Sort_Journey;
use \SortedJourneyNS\BoardingPass_Abstract;
use \Exception;
/**
 * 
 * @author faisal
 *	
 *	This class gives shape to this application, it prepares the BoardingPasses and their 
 *	is functionality to reveal them when needed to inspect. Also it servers as a container to 
 *	use sort function used on unsorted stack of Passes.  
 * 
 */
class Journey {

	public $boarding_passes = null;

	function __construct($passes) {
		$this->set_Passes($passes);
		return $this;
	}

	public function get_Passes() {
		return $this->boarding_passes;
	}

	public function set_Passes(array $passes){

		foreach ($passes as $pass) {
			if (!$pass instanceof BoardingPass_Abstract) {
				throw new Exception("Passes should be an instance of BoardingPass_Abstract class");
			}
		}

		$this->boarding_passes = $passes;
		return $this;
	}

	public function add_BoardingPass(BoardingPass $pass){
		if(is_array($this->boarding_passes)) {
			array_push($this->boarding_passes, $pass);
		}

		if (is_null($this->boarding_passes)) {
			$this->boarding_passes = array($pass);
		}
		return $this;
	}

	public function sort_Passes() {
		$this->boarding_passes = Sort_Journey::sort_journey($this->boarding_passes);
		return $this;
	}
}

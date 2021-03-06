<?php
/**
 * 
 * @author faisal
 *
 *	This class gives the possibility of replacing an common implementation of sorting boarding passes 
 *	with an alternate implementation. This class will also be used to layout rules that implementing
 *	class Sort_Journey will follow. If in case it is decided to implement a special case of sorting
 *	that class will have some rules already declared here.
 *
 */
namespace SortedJourneyNS;

interface Sort_Journey_Interface {
	public static function sort_journey($boardingPasses);
}
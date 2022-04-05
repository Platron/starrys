<?php

namespace Platron\Starrys\data_objects;

class Date extends BaseDataObject
{
	/** @var int */
	protected $Day;
	/** @var int */
	protected $Month;
	/** @var int */
	protected $Year;

	/**
	 * @param int $day
	 * @param int $month
	 * @param int $year
	 */
	public function __construct($day, $month, $year)
	{
		$this->Day = $day;
		$this->Month = $month;
		$this->Year = $year;
	}
}
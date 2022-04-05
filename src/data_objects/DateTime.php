<?php

namespace Platron\Starrys\data_objects;

class DateTime extends BaseDataObject
{
	/** @var Date */
	protected $Date;
	/** @var Time */
	protected $Time;

	/**
	 * @param Date $date
	 * @param Time $time
	 */
	public function __construct($date, $time)
	{
		$this->Date = $date;
		$this->Time = $time;
	}
}
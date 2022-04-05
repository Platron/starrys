<?php

namespace Platron\Starrys\data_objects;

class Time extends BaseDataObject
{
	/** @var int */
	protected $Hour;
	/** @var int */
	protected $Minute;
	/** @var int */
	protected $Second;

	/**
	 * @param int $hour
	 * @param int $minute
	 * @param int $second
	 */
	public function __construct($hour, $minute, $second)
	{
		$this->Hour = $hour;
		$this->Minute = $minute;
		$this->Second = $second;
	}
}
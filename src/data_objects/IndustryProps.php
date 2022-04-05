<?php

namespace Platron\Starrys\data_objects;

class IndustryProps extends BaseDataObject
{
	/** @var string */
	protected $Id;
	/** @var Date */
	protected $Date;
	/** @var string */
	protected $Number;
	/** @var string */
	protected $Value;

	/**
	 * @param string $id
	 * @param Date $date
	 * @param string $number
	 * @param string $value
	 */
	public function __construct($id, $date, $number, $value)
	{
		$this->Id = (string)$id;
		$this->Date = $date;
		$this->Number = (string)$number;
		$this->Value = (string)$value;
	}
}
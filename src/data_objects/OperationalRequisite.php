<?php

namespace Platron\Starrys\data_objects;

class OperationalRequisite extends BaseDataObject
{
	/** @var DateTime */
	protected $DateTime;
	/** @var int */
	protected $Operation;
	/** @var string */
	protected $Data;

	/**
	 * @param DateTime $dateTime
	 */
	public function addDateTime($dateTime)
	{
		$this->DateTime = $dateTime;
	}

	/**
	 * @param int $operation
	 */
	public function addOperation($operation)
	{
		$this->Operation = (int)$operation;
	}

	/**
	 * @param string $data
	 */
	public function addData($data)
	{
		$this->Data = (string)$data;
	}

}
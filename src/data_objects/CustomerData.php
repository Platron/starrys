<?php

namespace Platron\Starrys\data_objects;

class CustomerData extends BaseDataObject
{

	/** @var  string */
	protected $Customer;
	/** @var  string */
	protected $INN;
	/** @var  string */
	protected $Birthday;
	/** @var  string */
	protected $Citizenship;
	/** @var  string */
	protected $Document;
	/** @var  string */
	protected $DocumentData;
	/** @var  string */
	protected $Address;

	/** @param string $customer */
	public function addCustomer($customer)
	{
		$this->Customer = (string)$customer;
	}

	/** @param string $inn */
	public function addINN($inn)
	{
		$this->INN = (string)$inn;
	}

	/** @param Date $birthday */
	public function addBirthday($birthday)
	{
		$this->Birthday = $birthday;
	}

	/** @param string $citizenship */
	public function addCitizenship($citizenship)
	{
		$this->Citizenship = (string)$citizenship;
	}

	/** @param string $document */
	public function addDocument($document)
	{
		$this->Document = (string)$document;
	}

	/** @param string $documentData */
	public function addDocumentData($documentData)
	{
		$this->DocumentData = (string)$documentData;
	}

	/** @param string $address */
	public function addAddress($address)
	{
		$this->Address = (string)$address;
	}

}
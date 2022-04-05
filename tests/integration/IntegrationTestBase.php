<?php

namespace Platron\Starrys\tests\integration;

class IntegrationTestBase extends \PHPUnit_Framework_TestCase
{

	/** @var int */
	protected $taxMode;
	/** @var string Адрес для запросов */
	protected $starrysApiUrl;
	/** @var string Путь до приватного ключа */
	protected $secretKeyPath;
	/** @var string Путь до сертифката */
	protected $certPath;

	public function __construct()
	{
		parent::__construct();

		$this->taxMode = MerchantSettings::TAX_MODE;
		$this->starrysApiUrl = MerchantSettings::API_STARRYS_URL;

	}
}

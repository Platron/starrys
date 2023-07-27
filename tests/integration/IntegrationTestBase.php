<?php

namespace Platron\Starrys\tests\integration;

use PHPUnit\Framework\TestCase;

class IntegrationTestBase extends TestCase
{

	/** @var int */
	protected $taxMode;
	/** @var string Адрес для запросов */
	protected $starrysApiUrl;
	/** @var string Путь до приватного ключа */
	protected $secretKeyPath;
	/** @var string Путь до сертифката */
	protected $certPath;

	public function setUp(): void
	{
		$this->taxMode = MerchantSettings::TAX_MODE;
		$this->starrysApiUrl = MerchantSettings::API_STARRYS_URL;
		$this->secretKeyPath = 'tests/integration/merchant_data/' . MerchantSettings::SECRET_KEY_NAME;
		$this->certPath = 'tests/integration/merchant_data/' . MerchantSettings::CERT_NAME;
	}
}

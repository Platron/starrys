<?php

namespace Platron\Starrys\tests\integration;

use Platron\Starrys\handbooks\TaxModes;

class MerchantSettings
{
	const
		TAX_MODE = TaxModes::OSN,
		SECRET_KEY_NAME = 'client.key',
		CERT_NAME = 'client.crt',
		API_STARRYS_URL = 'https://kkt4.chekonline.ru',
		// Для версии ФФД 1.2
		SECRET_KEY_NAME_V12 = 'client_v12.key',
		CERT_NAME_V12 = 'client_v12.crt';
}

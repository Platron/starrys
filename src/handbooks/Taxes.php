<?php

namespace Platron\Starrys\handbooks;

use MyCLabs\Enum\Enum;

class Taxes extends Enum
{
	const
		NONE = 4,
		VAT0 = 3,
		VAT5 = 7,
		VAT7 = 8,
		VAT10 = 2,
		VAT20 = 1,
		VAT105 = 9,
		VAT107 = 10,
		VAT110 = 6,
		VAT120 = 5;
}
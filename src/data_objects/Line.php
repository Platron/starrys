<?php

namespace Platron\Starrys\data_objects;

use Platron\Starrys\handbooks\AgentModes;
use Platron\Starrys\handbooks\LineAttributeTypes;
use Platron\Starrys\handbooks\PayAttributeTypes;
use Platron\Starrys\handbooks\Taxes;

class Line extends BaseDataObject
{

	/** @var int */
	protected $Qty;
	/** @var float */
	protected $QtyDecimal;
	/** @var float */
	protected $Price;
	/** @var int */
	protected $PayAttribute;
	/** @var int */
	protected $LineAttribute;
	/** @var int */
	protected $TaxId;
	/** @var string */
	protected $Description;
	/** @var float */
	protected $SubTotal;
	/** @var string */
	protected $AgentModes;
	/** @var TransferOperatorData */
	protected $TransferOperatorData;
	/** @var GetPaymentOperatorData */
	protected $GetPaymentOperatorData;
	/** @var AgentData */
	protected $AgentData;
	/** @var ProviderData */
	protected $ProviderData;
	/** @var string */
	protected $CGNFloat;
	/** @var string $MarkingCode */
	protected $MarkingCode;
	/** @var int $Unit */
	protected $Unit;

	/**
	 * @param string $description Наименование товарной позиции
	 * @param float $qty Количество. Указывается в штуках. До 3 знаков после запятой
	 * @param int $price Цена указывается в копейках
	 * @param Taxes $taxId Процент налога на позицию
	 * @param float $qtyDecimal
	 */
	public function __construct($description, $qty, $price, Taxes $taxId)
	{
		$this->Qty = (int)($qty * 1000);
		$this->Price = (int)$price;
		$this->TaxId = $taxId->getValue();
		$this->Description = $description;
	}

	/**
	 * Признак способа расчета. Задается из констант. Не обязателен при БСО
	 * @param PayAttributeTypes $payAttributeType
	 */
	public function addPayAttribute(PayAttributeTypes $payAttributeType)
	{
		$this->PayAttribute = $payAttributeType->getValue();
	}

	/**
	 * Признак предмета расчёта.
	 * @param LineAttributeTypes $lineAttributeType
	 */
	public function addLineAttribute(LineAttributeTypes $lineAttributeType)
	{
		$this->LineAttribute = $lineAttributeType->getValue();
	}

	/**
	 * @param $subTotal
	 */
	protected function addSubTotal($subTotal)
	{
		$this->SubTotal = $subTotal;
	}

	/**
	 * @param AgentModes $agentMode
	 */
	public function addAgentModes(AgentModes $agentMode)
	{
		$this->AgentModes = $agentMode->getValue();
	}

	/**
	 * @param TransferOperatorData $transferOperatorData
	 */
	public function addTransferOperatorData(TransferOperatorData $transferOperatorData)
	{
		$this->TransferOperatorData = $transferOperatorData;
	}

	/**
	 * @param GetPaymentOperatorData $getPaymentOperatorData
	 */
	public function addGetPaymentOperatorData(GetPaymentOperatorData $getPaymentOperatorData)
	{
		$this->GetPaymentOperatorData = $getPaymentOperatorData;
	}

	/**
	 * @param AgentData $agentData
	 */
	public function addAgentData(AgentData $agentData)
	{
		$this->AgentData = $agentData;
	}

	/**
	 * @param ProviderData $providerData
	 */
	public function addProviderData(ProviderData $providerData)
	{
		$this->ProviderData = $providerData;
	}

	/**
	 * @param $nomenclatureCode
	 */
	public function addNomenclatureCode($nomenclatureCode)
	{
		$this->CGNFloat = $nomenclatureCode;
	}

	/**
	 * @param string $markingCode
	 */
	public function addMarkingCode($markingCode)
	{
		$this->MarkingCode = (string)$markingCode;
	}

	/**
	 * @param int $unit
	 */
	public function addUnit($unit)
	{
		$this->Unit = (int)$unit;
	}

	/**
	 * @param float $qtyDecimal
	 */
	public function addQtyDecimal($qtyDecimal)
	{
		$this->QtyDecimal = (float)$qtyDecimal;
	}
}

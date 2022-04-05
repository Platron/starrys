<?php

namespace Platron\Starrys\tests\integration;

use Platron\Starrys\clients\PostClient;
use Platron\Starrys\data_objects\AgentData;
use Platron\Starrys\data_objects\Date;
use Platron\Starrys\data_objects\Time;
use Platron\Starrys\data_objects\DateTime;
use Platron\Starrys\data_objects\GetPaymentOperatorData;
use Platron\Starrys\data_objects\Line;
use Platron\Starrys\data_objects\ProviderData;
use Platron\Starrys\data_objects\TransferOperatorData;
use Platron\Starrys\data_objects\OperationalRequisite;
use Platron\Starrys\data_objects\IndustryProps;
use Platron\Starrys\data_objects\CustomerData;
use Platron\Starrys\handbooks\AgentModes;
use Platron\Starrys\handbooks\DocumentTypes;
use Platron\Starrys\handbooks\LineAttributeTypes;
use Platron\Starrys\handbooks\PayAttributeTypes;
use Platron\Starrys\handbooks\Taxes;
use Platron\Starrys\handbooks\TaxModes;
use Platron\Starrys\services\ComplexRequest;
use Platron\Starrys\services\ComplexResponse;


class ComplexV12Test extends IntegrationTestBase
{
	public function __construct()
	{
		parent::__construct();
		$this->secretKeyPath = 'tests/integration/merchant_data/' . MerchantSettings::SECRET_KEY_NAME_V12;
		$this->certPath = 'tests/integration/merchant_data/' . MerchantSettings::CERT_NAME_V12;
	}

	public function testComplex()
	{
		$client = new PostClient($this->starrysApiUrl, $this->secretKeyPath, $this->certPath);
		$client->setLogger(new TestLogger());
		$complexRequest = $this->createComplexRequest();
		$response = new ComplexResponse($client->sendRequest($complexRequest));
		$this->assertTrue($response->isValid());
	}

	/**
	 * @return Line
	 */
	private function createLine()
	{
		$line = new Line('Test product', 1, 10.00, new Taxes(Taxes::VAT10), 1.00);
		$line->addPayAttribute(new PayAttributeTypes(PayAttributeTypes::FULL_PAID_WITH_GET_PRODUCT));
		$line->addLineAttribute(new LineAttributeTypes(LineAttributeTypes::PRODUCT));
		$agentData = new AgentData('Test operation', '79050000000');
		$line->addAgentData($agentData);


		$markingCode = "46198532";
		$line->addMarkingCode($markingCode);
		$line->addUnit(0);
		$line->addAgentModes(new AgentModes(AgentModes::PAYMENT_AGENT));
		$getPaymentOperatorData = new GetPaymentOperatorData('79050000001');
		$line->addGetPaymentOperatorData($getPaymentOperatorData);
		$providerData = new ProviderData('Test provider data', '7123456789', '79050000002');
		$line->addProviderData($providerData);
		$transferOperatorData = new TransferOperatorData(
			'Test transfer operator',
			'7123456781',
			'Test transfer operator address',
			'79050000003'
		);
		$line->addTransferOperatorData($transferOperatorData);
		return $line;
	}

	/**
	 * @return ComplexRequest
	 */
	private function createComplexRequest()
	{
		$line = $this->createLine();
		$industryProps = $this->createIndustryProps();
		$customerData = $this->createCustomerData();
		$operationalRequisite = $this->createOperationalRequisite();

		$complexRequest = new ComplexRequest(time()+100);
		$complexRequest->addClientId('testClientId');
		$complexRequest->addDocumentType(new DocumentTypes(DocumentTypes::BUY));
		$complexRequest->addEmail('test@test.ru');
		$complexRequest->addPhone('79050000000');
		$complexRequest->addPlace('www.test.ru');
		$complexRequest->addTaxMode(new TaxModes($this->taxMode));
		$complexRequest->addLine($line);
		$complexRequest->addIndustryProps($industryProps);
		$complexRequest->addCustomerData($customerData);
		$complexRequest->addOperationalRequisite($operationalRequisite);
		$complexRequest->addNonCash(10.00);
		$complexRequest->addAdditionalRequisite('mdlp&1000');
		$complexRequest->addUnit(0);

		return $complexRequest;
	}

	/**
	 * @return OperationalRequisite
	 */
	private function createOperationalRequisite()
	{
		$operationalRequisite = new OperationalRequisite;
		$operationalRequisite->addData("theoperational");
		$dateTime = new DateTime(new Date(12, 8, 21), new Time(18, 36, 16));
		$operationalRequisite->addDateTime($dateTime);
		$operationalRequisite->addOperation(0);
		return $operationalRequisite;
	}

	/**
	 * @return CustomerData
	 */
	private function createCustomerData()
	{
		$customerData = new CustomerData();
		$customerData->addCustomer("Кузнецов Иван Петрович");
		$customerData->addAddress("Басеенная 36");
		$customerData->addINN("7725327863");
		$birthday = new Date(15,9,1988);
		$customerData->addBirthday($birthday);
		$customerData->addCitizenship("643");
		$customerData->addDocument("21");
		$customerData->addDocumentData("multipassport");
		return $customerData;
	}

	/**
	 * @return IndustryProps
	 */
	private function createIndustryProps()
	{
		$date = new Date(28, 2, 17);
		return new IndustryProps("010", $date, "999", "id1=val1");
	}

}

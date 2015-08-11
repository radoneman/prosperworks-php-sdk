<?php
namespace Prosperworks\Tests;

use Prosperworks\Prosperworks;
use Prosperworks\Exceptions\ProsperworksException;

class ProsperworksTest extends \PHPUnit_Framework_TestCase
{
	private $app;

	public function setUp()
	{
		$config = array(
			'access_token' => '', // place your Prosperworks access_token
			'user_email' => '', // your Prosperworks email address
			// 'client_http' => 'guzzle' // if you want to use guzzle 5.0
		);

		foreach ($config as $key => $val) {
			if (empty($val)) {
				throw new ProsperworksException('You must set your ' . $key . ' on config array');
			}
		}

		$this->app = new Prosperworks($config);
	}

	public function testCompaniesSearch()
	{
		$result = $this->app->post('companies/search');
		$this->assertArrayHasKey(0, $result);
	}

	public function testAccount()
	{
		$result = $this->app->get('account');
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);
	}

	// other test with POST
	/*
	public function testAddCompanyPeopleOpportunity()
	{
		// add company
		$result = $this->app->post('companies', array(
			'name' => 'Company Super New ' . time() . ' Company',
			'address' => array(
				'street' => '221 Main Street Suite 1350',
				'city' => 'San Francisco',
				'state' => 'CA',
				'postal_code' => '94107',
				'country' => 'US'
			),
			'details' => 'I have this great idea'
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);

		$company_id = $result['id'];
		$company_name = $result['name'];

		// add a person
		$result = $this->app->post('people', array(
			'name' => 'Superjohn Superdoe' . time(),
			'emails' => array(
				array(
					'email' => 'johndoe' . time() . '@test.com',
					'category' => 'work'
				)
			),
			'company_id' => $company_id,
			'company_name' => $company_name
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);

		$primary_contact_id = $result['id'];

		// add opportunity
		$result = $this->app->post('opportunities', array(
			'name' => ' Opportunity to sell ' . time() . ' machines',
			'primary_contact_id' => $primary_contact_id,
			'company_id' => $company_id,
			'company_name' => $company_name
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);
	}
	public function testCreateAPerson()
	{
		$result = $this->app->post('people', array(
			'name' => 'John Doe' . time(),
			'emails' => array(
				array(
					'email' => 'johndoe' . time() . '@test.com',
					'category' => 'work'
				)
			)
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);
	}

	public function testCreateCompany()
	{
		$result = $this->app->post('companies', array(
			'name' => 'A new ' . time() . ' Company',
			'address' => array(
				'street' => '221 Main Street Suite 1350',
				'city' => 'San Francisco',
				'state' => 'CA',
				'postal_code' => '94107',
				'country' => 'US'
			),
			'details' => 'I have this great idea'
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);
	}

	public function testCreateOpportunity()
	{
		$result = $this->app->post('opportunities', array(
			'name' => 'Sell ' . time() . ' machines',
			'primary_contact_id' => 1
		));
		$this->assertArrayHasKey('id', $result);
		$this->assertArrayHasKey('name', $result);
	}
	*/

}

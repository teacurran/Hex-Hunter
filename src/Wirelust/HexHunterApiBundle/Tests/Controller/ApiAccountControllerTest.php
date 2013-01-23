<?php
namespace Wirelust\HexHunterApiBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;

/**
 * User: T. Curran
 * Date: 1/22/13
 */

class ApiAccountControllerTest extends BaseTestCase
{


	public function setUp()
	{
		$this->populateVariables();
	}

	public static function setUpBeforeClass()
    {
		static::initialize();
    }

	public function testRegister()
	{
		$client = static::createClient();

		// Method not allowed.
		$crawler = $client->request('GET', '/api/account/register');
		$this->assertEquals(405, $client->getResponse()->getStatusCode());

		// Register
		$crawler = $client->request('POST', '/api/account/register');
		echo "TEST: " . $client->getResponse()->getContent();

		$this->assertEquals(405, $client->getResponse()->getStatusCode());
	}
}

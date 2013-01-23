<?php
namespace Wirelust\HexHunterApiBundle\Tests\Controller;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;


/**
 * User: T. Curran
 * Date: 1/22/13
 */
 
class BaseTestCase extends WebTestCase {
	protected static function initialize()
	{
		self::createClient();
		$application = new Application(static::$kernel);
		$application->setAutoExit(false);

		self::createDatabase($application);
	}

	private static function createDatabase($application)
	{
		self::executeCommand($application, "doctrine:schema:drop", array("--force" => true));
		self::executeCommand($application, "doctrine:schema:create");
		//self::executeCommand($application, "doctrine:fixtures:load", array("--fixtures" => __DIR__ . "/../DataFixtures/ORM/test"));
	}

	private static function executeCommand($application, $command, Array $options = array())
	{
		$options["-e"] = "test";
		$options["-q"] = null;
		$options = array_merge($options, array('command' => $command));
		return $application->run(new ArrayInput($options));
	}

	protected function populateVariables()
	{
		$this->client = static::createClient();
		$container = static::$kernel->getContainer();
		$this->entityManager = $container->get('doctrine')->getEntityManager();
	}

}

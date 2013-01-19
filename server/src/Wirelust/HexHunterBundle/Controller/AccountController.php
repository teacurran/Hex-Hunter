<?php
/**
 * User: T. Curran
 * Date: 1/18/13
 */

namespace Wirelust\HexHunterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AccountController extends Controller
{
	/**
	 * @Rest\View
	 */
	public function registerAction($name)
	{
		return array('name' => $name);
	}
}

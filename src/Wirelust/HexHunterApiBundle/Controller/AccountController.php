<?php
/**
 * User: T. Curran
 * Date: 1/18/13
 */

namespace Wirelust\HexHunterApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Wirelust\HexHunterBundle\Entity\Account;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use Wirelust\HexHunterApiBundle\Form\ApiAccountType;

/**
 * @Route("/account")
 */
class AccountController extends Controller
{
	/**
	 * @Route("/register", name="api_account_register")
	 * @Method({"POST", "GET"})
	 * @Rest\View
	 */
	public function registerAction()
	{
		return $this->processForm(new Account());
	}

	/**
	 * @Route("/{id}/info", name="api_account_info")
	 * @Method({"GET"})
	 * @Rest\View
	 */
	public function infoAction($id)
	{
		return array("account" => $id);
	}


	private function processForm(Account $account)
	{
		$entityManager = $this->get('doctrine.orm.entity_manager');

		$statusCode = $account->getId() == null ? 201 : 204;

		$form = $this->createForm(new ApiAccountType(), $account);
		$form->bind($this->getRequest());

		if ($form->isValid()) {
			$entityManager->persist($account);

			$response = new Response();
			$response->setStatusCode($statusCode);
			$response->headers->set('Location',
				$this->generateUrl(
					'api_account_info', array('id' => $account->getId()),
					true // absolute
				)
			);

			return $response;
		}

		$entityManager->flush();

		return View::create($form, 400);
	}
}

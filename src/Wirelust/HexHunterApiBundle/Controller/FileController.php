<?php
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
 * User: T. Curran
 * Date: 1/21/13
 */

/**
 * @Route("/file")
 */
class FileController extends Controller {

	/**
	 * @Route("/comment", name="api_file_comment")
	 * @Method({"POST"})
	 * @Rest\View
	 */
	public function commentAction()
	{
		// TODO: implement
		return null;
	}

	/**
	 * @Route("/delette", name="api_file_delete")
	 * @Method({"POST"})
	 * @Rest\View
	 */
	public function deleteAction()
	{
		// TODO: implement
		return null;
	}

	/**
	 * @Route("/{id}/comments", name="api_file_id_comments")
	 * @Method({"GET"})
	 * @Rest\View
	 */
	public function commentsAction($id)
	{
		// TODO: Implement

		return null;
	}

	/**
	 * @Route("/{id}/info", name="api_file_id_info")
	 * @Method({"GET"})
	 * @Rest\View
	 */
	public function infoAction($id)
	{
		// TODO: Implement

		return null;
	}

	/**
	 * @Route("/upload", name="api_file_upload")
	 * @Method({"POST"})
	 * @Rest\View
	 */
	public function uploadAction()
	{
		// TODO: implement
		return null;
	}
}

<?php
namespace Wirelust\HexHunterApiBundle\Form;

use Wirelust\HexHunterBundle\Entity\Account;
use Wirelust\HexHunterBundle\Form\AccountType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * User: T. Curran
 * Date: 1/19/13
 */
class ApiAccountType extends AccountType
{

	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults(array(
			'data_class' => 'Wirelust\HexHunterBundle\Entity\Account',
			'csrf_protection' => false,
		));
	}
}

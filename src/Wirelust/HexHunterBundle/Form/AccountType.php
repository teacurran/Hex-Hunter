<?php

namespace Wirelust\HexHunterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('full_name')
            ->add('website')
            ->add('location')
            ->add('bio')
            ->add('email')
            ->add('password')
            ->add('password_salt')
            ->add('created')
            ->add('updated')
            ->add('date_login')
            ->add('starred_files')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Wirelust\HexHunterBundle\Entity\Account'
        ));
    }

    public function getName()
    {
        return '';
    }
}

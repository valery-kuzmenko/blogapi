<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType,
	Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewComment extends AbstractType {
  
  public function buildForm(FormBuilderInterface $builder, array $options) {
	$builder
		  ->add('user')
		  ->add('comment');
  }
  
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
	$resolver->setDefaults(array(
		'data_class' => 'Blogger\BlogBundle\Entity\Comment',
		'csrf_protection' => false,
		'allow_extra_fields' => true
	));
  }
  
  public function getName() {
	return '';
  }
}


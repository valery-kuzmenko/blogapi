<?php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType,
	Symfony\Component\Form\FormBuilderInterface,
	Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewBlog extends AbstractType {

  public function buildForm(FormBuilderInterface $builder, array $options) {
	$builder
		  ->add('keywords')
		  ->add('permalink')
		  ->add('tags')
		  ->add('title')
		  ->add('author')
		  ->add('content');
  }
  
  public function setDefaultOptions(OptionsResolverInterface $resolver) {
	$resolver->setDefaults(array(
		'data_class' => 'Blogger\BlogBundle\Entity\Blog',
		'csrf_protection'   => false,
		'allow_extra_fields' => true
	));
  }
  
  public function getName() {
	return '';
  }  
}


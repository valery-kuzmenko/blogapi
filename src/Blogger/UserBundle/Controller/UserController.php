<?php

namespace Blogger\UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\View\View,
	FOS\RestBundle\Controller\Annotations\Route,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController {

  public function postUserAction(Request $request) {
	$form = $this->container->get('fos_user.registration.form');
	$formHandler = $this->container->get('fos_user.registration.form.handler');

	$process = $formHandler->process(false);
	if ($process) {
	  $user = $form->getData();

	  return $user;
	} else {

	  return $this->view($form, 400);
	}
  }
}

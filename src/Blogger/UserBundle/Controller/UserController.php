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
	  $user = (array) $form->getData();

	  return $this->view(array('code' => '200', 'success' => TRUE, 'data' => $user), 200);
	} else {

	  return $this->view($form, 400);
	}
  }

  public function getUsersAction(){
	$userManager = $this->get('fos_user.user_manager');
	$users = $userManager->findUsers();
	
	return $this->view($users);
  }
  
  /**
   *  Action for CORS requests
   * 
   *  @Route("/users/{param}", defaults={"param" = false})
   */
  public function optionsUsersAction($param) {}  
}

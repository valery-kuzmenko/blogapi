<?php

namespace Blogger\UserBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\Controller\Annotations\Route,
	FOS\RestBundle\Controller\Annotations\View,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\Response;

class UserController extends FOSRestController {
  
  /**
   * @View(serializerGroups={"user_detail"})
   */
  public function postUserAction(Request $request) {
	$form = $this->container->get('fos_user.registration.form');
	$formHandler = $this->container->get('fos_user.registration.form.handler');

	$process = $formHandler->process(false);
	
	if ($process) {
	  $user = $form->getData();
	  
	  return array('code' => '200', 'success' => TRUE, 'data' => $user);
	} else {

	  return $form;
	}
  }
  /**
   * @View(serializerGroups={"user_list"})
   */
  public function getUsersAction(){
	$userManager = $this->get('fos_user.user_manager');
	$users = $userManager->findUsers();
	
	return $users;
  }
  
  /**
   *  Action for CORS requests
   * 
   *  @Route("/users/{param}", defaults={"param" = false})
   */
  public function optionsUsersAction($param) {}  
}

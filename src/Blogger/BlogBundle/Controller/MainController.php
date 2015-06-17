<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\View\View,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\Form\AbstractType,
	Symfony\Component\HttpFoundation\Response;

class MainController extends FOSRestController {
  
  /**
   * Main function to handle form submission
   * @param Symfony\Component\HttpFoundation\Request $request
   * @param Symfony\Component\Form\AbstractType $formObject
   * @param Blogger\BlogBundle\Entity $object
   * @param int $sucessCode http code that will be returned in case of success message
   * @param callable $successCallback custom success function
   */
  public function processForm(Request $request, AbstractType $formObject, $object = NULL, $sucessCode = 200, $successCallback = NULL, $options = array()) {
	$form = $this->createForm($formObject, $object, $options);
	$form->handleRequest($request);	
	
	if ($form->isValid()) {
	  if ($successCallback) {
		$successCallback();
	  } 

	  return new Response(json_encode(array('code' => $sucessCode, 'success' => TRUE)), $sucessCode);	  
	} else {
	  return $this->view($form, 400);
	}
  }
}

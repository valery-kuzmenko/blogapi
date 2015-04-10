<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;

class MainController extends FOSRestController {

  public function processForm($request, $formObject, $successCallback = NULL, $errorCallback = NULL) {
	$form = $this->createForm($formObject);
	$form->bind($request);
	
	if ($form->isValid()) {
	  return $form->getData();
	} else {
	  return $this->view($form, 400);
	}
  }
}

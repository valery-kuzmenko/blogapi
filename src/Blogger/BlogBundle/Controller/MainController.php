<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class MainController extends FOSRestController {

  public function processForm($request, $form, $successCallback = NULL, $errorCallback = NULL) {
	$form = $this->createForm($form);
	$form->bind($request);
	
	return $form->getErrors();
	
	if ($form->isValid()) {
	  return $successCallback ? $successCallback() : TRUE;
	} else {
	  return $errorCallback ? $errorCallback() : FALSE;
	}
  }
}

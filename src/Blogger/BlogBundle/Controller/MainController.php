<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class MainController extends FOSRestController {

  public function processForm($request, $formName, $successCallback = NULL, $errorCallback = NULL) {
	$form = $this->createForm($formName);
	$form->bind($request);
	
	if ($form->isValid()) {
	  return $successCallback ? $successCallback() : TRUE;
	} else {
	  return $errorCallback ? $errorCallback() : FALSE;
	}
  }
}

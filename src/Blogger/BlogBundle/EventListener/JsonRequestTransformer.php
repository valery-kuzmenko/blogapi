<?php
namespace Blogger\BlogBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernel;


class JsonRequestTransformer {
  public function onKernelRequest(GetResponseEvent $event) {
	if(!$event->isMasterRequest()) {
	  return;
	}

	$request = $event->getRequest();
	if($request->getRequestFormat() !== 'json') {
	  return;
	}

	$data = json_decode($request->getContent(), true);
	if(json_last_error() !== JSON_ERROR_NONE) {
	  return false;
	}

	if($data == NULL) {
	  return true;
	}

	$request->request->replace($data);
	
	return true;
  }
}

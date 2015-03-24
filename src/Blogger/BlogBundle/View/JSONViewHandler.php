<?php
namespace Blogger\BlogBundle\View;

use FOS\RestBundle\View\View, 
	FOS\RestBundle\View\ViewHandler,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\Response;


class JSONViewHandler{
  /**
  * @param ViewHandler $ViewHandler
  */
  public function createResponse(ViewHandler $handler, View $view, Request $request, $format) {
	$content = json_encode(array('status' => $view->getStatusCode(), 'data' => $view->getData()));
	
	return new Response($content, 200, $view->getHeaders());
  }
}
<?php
namespace Blogger\BlogBundle\View;

use FOS\RestBundle\View, 
	FOS\RestBundle\View\ViewHandler,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\Response;


class JSONViewHandler{
  /**
  * @param ViewHandler $ViewHandler
  */
  public function createResponse(ViewHandler $handler, View $view, Request $request, $format) {
	echo '<pre>'; print_r(array($view));  echo '</pre>';
	
	return new Response($view, 200, $view->getHeaders());
  }
}
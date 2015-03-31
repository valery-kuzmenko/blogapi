<?php
namespace Blogger\BlogBundle\View;

use FOS\RestBundle\View\View, 
	FOS\RestBundle\View\ViewHandler,
	Symfony\Component\HttpFoundation\Request,
	Symfony\Component\HttpFoundation\Response,
	JMS\Serializer\SerializerBuilder;


class JSONViewHandler{
  /**
  * @param ViewHandler $ViewHandler
  */
  public function __construct() {
	$this->serializer = SerializerBuilder::create()->build();
  }
  
  public function createResponse(ViewHandler $handler, View $view, Request $request, $format) {  
	  if ($view->getData() instanceof  \FOS\RestBundle\Util\ExceptionWrapper) {
		return new Response($this->serializer->serialize($view->getData(), 'json'), $view->getStatusCode(), $view->getHeaders());
	  } else {
		$content = $this->serializer->serialize(array('success' => true, 'status' => 200, 'data' => $view->getData()), 'json');
		return new Response($content, 200, $view->getHeaders());
	  }  
  }
}
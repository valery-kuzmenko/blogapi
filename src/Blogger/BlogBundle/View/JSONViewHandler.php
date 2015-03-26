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
      
//      try{
//          $content = json_encode(array('status' => 200, 'data' => $view->getData()));
//          
//          return new Response($content, 200, $view->getHeaders());
//      }catch(\Exception $e){
//          
//      }
      
      
	
	
  }
}
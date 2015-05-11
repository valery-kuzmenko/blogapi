<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request,
	FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\Controller\Annotations\Route;
	
class CommentController extends FOSRestController{
  public function getCommentsAction($blogPostId) {
	return $this->get('blogger_blog.comment_manager')->getRepository()->findByBlog($blogPostId);
  }
  
  public function getCommentAction($blogPostId, $commentId){
	$comment = $this->get('blogger_blog.comment_manager')->getRepository()->findBy(array('id' => $commentId, 'blog' => $blogPostId));
	
	if(!$comment) {	  
	  throw $this->createNotFoundException('This comment is not exist!');
	}
	
	return $comment;
  }
  
  public function postCommentsAction($blogPostId) {
	
  }
}

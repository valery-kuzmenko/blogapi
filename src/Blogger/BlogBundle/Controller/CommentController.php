<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request,
	FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\Controller\Annotations\Route,
	Doctrine\ORM\Tools\Pagination\Paginator;
	
class CommentController extends FOSRestController{
  public function getCommentsAction($blogPostId, Request $request) {
	$em =  $this->get('blogger_blog.comment_manager')->getEntityManager();
	
	$page = $request->query->get('page') - 1;
	$rpp = $request->query->get('rpp');
	
	$query = $em->createQuery('SELECT c FROM Blogger\BlogBundle\Entity\Comment c WHERE c.blog = :blog_post_id')
							  ->setParameter('blog_post_id', $blogPostId)
							  ->setFirstResult($page * $rpp)
							  ->setMaxResults($rpp);
	$paginator = new Paginator($query);
	
	$comments = array();
	foreach($paginator as $comment) {
	  $comments[] = $comment;
	}
	
	$view = $this
	  ->view($comments, 200)
	  ->setHeader('Access-Control-Expose-Headers', 'blogger-pages-count')
	  ->setHeader('blogger-pages-count' , ceil(count($paginator)/$rpp), 'blogger-comments-count');
	
	return $this->handleView($view);
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

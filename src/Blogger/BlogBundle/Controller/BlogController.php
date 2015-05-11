<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request,
	FOS\RestBundle\Controller\FOSRestController,
	FOS\RestBundle\Controller\Annotations\Route,
	Blogger\BlogBundle\Services\BlogManager,
	Blogger\BlogBundle\Form\NewBlog,
	Blogger\BlogBundle\Entity\Blog;

class BlogController extends MainController {

  public function getBlogsAction() {
	return $this->get('blogger_blog.blog_manager')->all();
  }
  
  public function getBlogAction($id) {
	$blog = $this->get('blogger_blog.blog_manager')->get($id);

	if (!$blog) {
	  throw $this->createNotFoundException('This post is not exist!');
	}

	return $blog;
  }

  public function postBlogsAction(Request $request) {
	$blogPost = new Blog();
	$self = $this;
	return $this->processForm($request, new NewBlog(), $blogPost, 200, function() use ($self, $blogPost){
		$self->get('blogger_blog.blog_manager')->save($blogPost, TRUE);
	});
  }
  
  public function deleteBlogsAction(Blog $blogPost) {
	$this->get('blogger_blog.blog_manager')->delete($blogPost, TRUE);
  }
  
  public function putBlogsAction(Blog $blogPost, Request $request){
	$self = $this;

	return $this->processForm($request, new NewBlog(), $blogPost, 200, function() use ($self, $blogPost){
		//on success
		$self->get('blogger_blog.blog_manager')->save($blogPost, TRUE);
	}, array('method' => 'PUT'));	
  }
  
  /**
   *  Action for CORS requests
   * 
   *  @Route("/blogs/{param}", defaults={"param" = false})
   */
  public function optionsBlogsAction($param) {}  
}

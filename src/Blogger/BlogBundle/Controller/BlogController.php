<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	Blogger\BlogBundle\Services\Blog,
	Blogger\BlogBundle\Form\NewBlog,
	Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request;

use Blogger\BlogBundle\Entity\Blog as BlogEntity;

class BlogController extends MainController {

  public function getBlogAction($id) {
	$blog = $this->get('blogger_blog.blog_manager')->get($id);

	if (!$blog) {
	  throw $this->createNotFoundException('This post is not exist!');
	}

	return $blog;
  }

  public function getBlogsAction() {
	return $this->get('blogger_blog.blog_manager')->all();
  }

  public function optionsBlogsAction() {

  }

  public function postBlogsAction(Request $request) {
	$blogPost = new BlogEntity();
	$self = $this;
	return $this->processForm($request, new NewBlog(), $blogPost, 200, function() use ($self, $blogPost){
		$self->get('blogger_blog.blog_manager')->save($blogPost, TRUE);
	});
  }
}

<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	Blogger\BlogBundle\Services\Blog,
	Blogger\BlogBundle\Form\NewBlog,
	Symfony\Component\HttpFoundation\Response,
	Symfony\Component\HttpFoundation\Request;

class BlogController extends MainController {

  public function getBlogAction($id) {
	$blog = $this->get('blogger_blog.blog_manager')->getBlogPostById($id);

	if (!$blog) {
	  throw $this->createNotFoundException('This post is not exist!');
	}

	return $blog;
  }

  public function getBlogsAction() {
	return $this->get('blogger_blog.blog_manager')->getBlogs();
  }

  public function optionsBlogsAction() {

  }

  public function postBlogsAction(Request $request) {
	return $this->processForm($request, new NewBlog());
  }
}

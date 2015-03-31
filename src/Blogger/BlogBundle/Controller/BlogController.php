<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	Blogger\BlogBundle\Services\Blog;

class BlogController extends FOSRestController {

  public function getBlogsAction($id) {
	$blog = $this->get('blogger_blog.blog_manager')->getBlogPostById($id);
	
	if (!$blog) {
	  throw $this->createNotFoundException('This post is not exist!');
	}

	return $this->view($blog);
  }
}

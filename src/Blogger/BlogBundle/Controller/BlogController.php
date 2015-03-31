<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController,
	Blogger\BlogBundle\Services\Blog;

class BlogController extends FOSRestController {

  public function getBlogAction($id) {
	$blog = $this->get('blogger_blog.blog_manager')->getBlogPostById($id);
	
	if (!$blog) {
	  throw $this->createNotFoundException('This post is not exist!');
	}

	return $this->view($blog);
  }
  
  public function getBlogsAction(){
      return $this->get('blogger_blog.blog_manager')->getBlogs();
  }
}

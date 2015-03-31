<?php

namespace Blogger\BlogBundle\Services;

use Blogger\BlogBundle\Repository\BlogRepository;

class Blog{
  /**
   * @var Blogger\BlogBundle\Repository\BlogRepository
   */
  public $repository;
  
  public function __construct(BlogRepository $blogRepository) {
	$this->repository = $blogRepository;
  }
  
  public function getBlogPostById($id){
	return $this->repository->find($id);
  }
  
  
}
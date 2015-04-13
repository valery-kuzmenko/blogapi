<?php

namespace Blogger\BlogBundle\Services;

use Blogger\BlogBundle\Repository\BlogRepository;

class BlogManager extends CommonEntityManager {
 
 
  public function getBlogPostById($id){
	return $this->repository->find($id);
  }
  
  public function getBlogs(){
      return $this->repository->findAll();
  }
}
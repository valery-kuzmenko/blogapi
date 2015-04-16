<?php

namespace Blogger\BlogBundle\Services;

class BlogManager extends CommonEntityManager {
 
 
  public function getBlogPostById($id){
	return $this->repository->find($id);
  }
  
  public function getBlogs(){
      return $this->repository->findAll();
  }
}
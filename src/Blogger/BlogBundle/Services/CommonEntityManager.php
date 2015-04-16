<?php
namespace Blogger\BlogBundle\Services;

abstract class CommonEntityManager {
  
  /**
   * The Entity Manager
   * 
   *  @var \Doctrine\ORM\EntityManager The doctrine Enity Manager
   */
  protected $em;
  
  /**
   * The repository for the manager
   * 
   * @var \Doctrine\ORM\EntityRepository
   */
  protected $repository;
  
  /**
   * Entity class path
   */
  protected $class;
  
  /**
   * Create new instance of enity class
   */
  public function create(){
	return new $this->class();
  }
  
  /**
   * Save entity
   * @param Blogger\BlogBundle\Entity $object
   * @param bool  $flush is run doctrine flush	
   */
  public function save($object, $flush = FALSE) {
	$this->em->persist($object);
	
	if($flush === TRUE) {
	  $this->flush();
	}
	
	return $object;
  }
  
  /**
   * Delete entity
   * @param Blogger\BlogBundle\Entity $object
   * @param bool  $flush is run doctrine flush	
   */
  public function delete($object, $flush = FALSE) {
	$this->em->remove($object);
	
	if($flush === TRUE) {
	  $this->flush();
	}
	
	return true;
  }
  
  /**
   * Runs entity manager flush method
   */
  public function flush() {
	$this->em->flush();
  }
  
  /**
   * Set class. <br>
   * Setter for dependency injection
   * 
   * @param string $class  a class related to this manager
   */
  public function setClass($class) {
	$this->class = $class;
  }
  
  /**
   * Set entity manager. Setter for dependency injection
   * 
   * @param \Doctrine\ORM\EntityManager $entityManager
   */
  public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager) {
	$this->em = $entityManager;
  }
  
  /**
   * Returns the repository
   * 
   * @return Doctrine\ORM\EntityRepository
   */
  public function getRepository() {
	if (!$this->repository) {
	  $this->repository = $this->em->getRepository($this->class);
	}
	
	return $this->repository;
  }
  
  /**
   * Shortcut for find method of repository
   * @param int $id
   */
  public function get($id) {
	return $this->getRepository()->find($id);
  }
  
  /**
   * Shortcut for findAll method of repository
   */
  public function all(){
	return $this->getRepository()->findAll();
  }
}

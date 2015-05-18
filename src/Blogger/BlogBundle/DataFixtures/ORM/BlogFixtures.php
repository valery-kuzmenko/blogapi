<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
	Doctrine\Common\Persistence\ObjectManager,
	Blogger\BlogBundle\Entity\Blog,
	Blogger\BlogBundle\Entity\Comment;

class BlogFixtures implements FixtureInterface{
  public function load(ObjectManager $manager){
	$dataPosts = array(
		'title' => array('A day with Symfony2', 'The pool on the roof must have a leak', 'Misdirection. What the eyes see and the ears hear, the mind believes'),
		'content' => array(
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.',
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi.',
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.'
						  ),
		'image' => array('beach.jpg', 'pool_leak.jpg', 'misdirection.jpg'),
		'author' => array('dsyph3r', 'Zero Cool', 'Gabriel'),
		'tags' => array('pool', 'leaky', 'hacked', 'movie', 'hacking', 'symblog', 'misdirection', 'magic'),
		'keywords' => array('pool', 'leaky', 'hacked', 'movie', 'hacking', 'symblog', 'misdirection', 'magic')
	);
	
	$dataComents = array(
		'user' => array('John Dow', 'Luk', 'Mike Wu'),
		'comment' => array(
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.',
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi.',
							'Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.'
						  ),
	);
	
	foreach($dataPosts['title'] as $key => $value){  
	  $blog = new Blog();	  
		$blog->setTitle($dataPosts['title'][$key]);
		$blog->setImage($dataPosts['image'][$key]);
		$blog->setContent($dataPosts['content'][$key]);
		$blog->setAuthor($dataPosts['author'][$key]);
		$blog->setTags($dataPosts['tags'][rand(0, 7)] . ',' . $dataPosts['tags'][rand(0, 7)] . ',' . $dataPosts['tags'][rand(0, 7)]);
		$blog->setKeywords($dataPosts['keywords'][rand(0, 7)] . ',' . $dataPosts['keywords'][rand(0, 7)] . ',' . $dataPosts['keywords'][rand(0, 7)]);
		$blog->setCreated(new \DateTime());
		$blog->setUpdated($blog->getCreated());
		$blog->setPermalink('permalink' + $key);
	  $manager->persist($blog);
	  
	  // set comments
	  $commentsCount = rand(15,20);
	  for($i=1; $i<=$commentsCount;$i++) {
		$comment = new Comment();		
		  $comment->setComment($dataComents['comment'][rand(0,2)]);
		  $comment->setUser($dataComents['user'][rand(0,2)]);
		  $comment->setBlog($blog);
		  $comment->setApproved(true);
		$manager->persist($comment);
	  };
	}
	
	$manager->flush();
  }
}

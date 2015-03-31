<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface,
	Doctrine\Common\Persistence\ObjectManager,
	Blogger\BlogBundle\Entity\Blog;

class BlogFixtures implements FixtureInterface{
  public function load(ObjectManager $manager){
	$data = array(
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
	
	foreach($data['title'] as $key => $value){
	  
	  $blog = new Blog();
	  $blog->setTitle($data['title'][$key]);
	  $blog->setImage($data['image'][$key]);
	  $blog->setContent($data['content'][$key]);
	  $blog->setAuthor($data['author'][$key]);
	  $blog->setTags($data['tags'][rand(0, 7)] . ',' . $data['tags'][rand(0, 7)] . ',' . $data['tags'][rand(0, 7)]);
	  $blog->setKeywords($data['keywords'][rand(0, 7)] . ',' . $data['keywords'][rand(0, 7)] . ',' . $data['keywords'][rand(0, 7)]);
	  $blog->setCreated(new \DateTime());
	  $blog->setUpdated($blog->getCreated());
	  
	  $manager->persist($blog);
	}
	$manager->flush();
  }
}

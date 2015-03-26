<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class BlogController extends FOSRestController
{	
    /**
     * 
     */
    public function getAction($id)
    {
       $em = $this->getDoctrine()->getManager(); 
       $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($id);
       
       if(!$blog){
           throw $this->createNotFoundException('This post is not exist!');
       }
       
       return $this->view($blog, 200);
//        
//        $blogPost = array(
//            'title' => 'Funny Cats',
//            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
//                        . 'Quisque fringilla congue vehicula. Curabitur rhoncus est lobortis lacus convallis lacinia in eu mi.'
//                        . 'Donec interdum sodales lacus, sit amet pellentesque lacus. '
//                        . 'Aliquam eget lorem feugiat, hendrerit ante vitae, aliquet nibh.',
//            'tags'  => array('cats', 'happy'),
//            'keywords' => array('cats', 'pets', 'animals')
//        );
        
		return $this->view($blogPost);
    }
}

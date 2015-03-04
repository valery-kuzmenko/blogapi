<?php

namespace Blogger\BlogBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;

class BlogController extends FOSRestController
{
    public function getPostAction($name)
    {
        $blogPost = array(
            'title' => 'Funny Cats',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '
                        . 'Quisque fringilla congue vehicula. Curabitur rhoncus est lobortis lacus convallis lacinia in eu mi.'
                        . 'Donec interdum sodales lacus, sit amet pellentesque lacus. '
                        . 'Aliquam eget lorem feugiat, hendrerit ante vitae, aliquet nibh.',
            'tags'  => array('cats', 'happy'),
            'keywords' => array('cats', 'pets', 'animals')
        );
        
        $view = $this->view($blogPost, 200)->setTemplate("BloggerBlogBundle:getPost.html.twig")->setTemplateVar('posts');
        
        return $this->handleView($view);
    }
}

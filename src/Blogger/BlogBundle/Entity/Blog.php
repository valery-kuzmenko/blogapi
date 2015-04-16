<?php

namespace Blogger\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\ExclusionPolicy;

/**
 * @ORM\Entity(repositoryClass="Blogger\BlogBundle\Repository\BlogRepository")
 * @ORM\Table(name="blog")
 * @ExclusionPolicy("all")
 */
class Blog {

  /**
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   * @Expose
   */
  protected $id;

  /**
   * @ORM\Column(type="string", length=50)
   * @Assert\NotBlank()
   * @Assert\Length(max=50)
   * @Type("string")
   * @Expose
   */
  protected $title;

  /**
   * @ORM\Column(type="string", length=50)
   * @Type("string")
   * @Expose
   */
  protected $author;

  /**
   * @ORM\Column(type="text", nullable=true)
   * @Assert\NotBlank()
   * @Type("string")
   * @Expose
   */
  protected $content;

  /**
   * @ORM\Column(type="text")
   * @Expose
   */
  protected $tags;

  /**
   * @ORM\Column(type="text")
   * @Expose
   */
  protected $keywords;

  /**
   * @ORM\Column(type="string", length=50)
   */
  protected $image;

  /**
   * @ORM\Column(type="datetime")
   * @Expose
   */
  protected $created;

  /**
   * @ORM\Column(type="datetime")
   */
  protected $updated;
  
  protected $comments;

  /**
   * @ORM\Column(type="string", length=100) 
   */
  protected $permalink;

  public function __construct() {
	$this->setCreated(new \DateTime());
	$this->setUpdated(new \DateTime());
  }

  /**
   * @ORM\PreUpdate
   */
  public function setUpdatedValue() {
	$this->setUpdated(new \DateTime());
  }

  /**
   * Get id
   *
   * @return integer 
   */
  public function getId() {
	return $this->id;
  }

  /**
   * Set title
   *
   * @param string $title
   * @return Blog
   */
  public function setTitle($title) {
	$this->title = $title;

	return $this;
  }

  /**
   * Get title
   *
   * @return string 
   */
  public function getTitle() {
	return $this->title;
  }

  /**
   * Set author
   *
   * @param string $author
   * @return Blog
   */
  public function setAuthor($author) {
	$this->author = $author;

	return $this;
  }

  /**
   * Get author
   *
   * @return string 
   */
  public function getAuthor() {
	return $this->author;
  }

  /**
   * Set content
   *
   * @param string $content
   * @return Blog
   */
  public function setContent($content) {
	$this->content = $content;

	return $this;
  }

  /**
   * Get content
   *
   * @return string 
   */
  public function getContent() {
	return $this->content;
  }

  /**
   * Set tags
   *
   * @param string $tags
   * @return Blog
   */
  public function setTags($tags) {
	$this->tags = $tags;

	return $this;
  }

  /**
   * Get tags
   *
   * @return string 
   */
  public function getTags() {
	return $this->tags;
  }

  /**
   * Set keywords
   *
   * @param string $keywords
   * @return Blog
   */
  public function setKeywords($keywords) {
	$this->keywords = $keywords;

	return $this;
  }

  /**
   * Get keywords
   *
   * @return string 
   */
  public function getKeywords() {
	return $this->keywords;
  }

  /**
   * Set image
   *
   * @param string $image
   * @return Blog
   */
  public function setImage($image) {
	$this->image = $image;

	return $this;
  }

  /**
   * Get image
   *
   * @return string 
   */
  public function getImage() {
	return $this->image;
  }

  /**
   * Set created
   *
   * @param \DateTime $created
   * @return Blog
   */
  public function setCreated($created) {
	$this->created = $created;

	return $this;
  }

  /**
   * Get created
   *
   * @return \DateTime 
   */
  public function getCreated() {
	return $this->created;
  }

  /**
   * Set updated
   *
   * @param \DateTime $updated
   * @return Blog
   */
  public function setUpdated($updated) {
	$this->updated = $updated;

	return $this;
  }

  /**
   * Get updated
   *
   * @return \DateTime 
   */
  public function getUpdated() {
	return $this->updated;
  }

  /**
   * Set permalink
   *
   * @param string $permalink
   * @return Blog
   */
  public function setPermalink($permalink) {
	$this->permalink = $permalink;

	return $this;
  }

  /**
   * Get permalink
   *
   * @return string 
   */
  public function getPermalink() {
	return $this->permalink;
  }

}

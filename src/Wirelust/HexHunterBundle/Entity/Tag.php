<?php
/**
 * User: T. Curran
 * Date: 1/18/13
 */

namespace Wirelust\HexHunterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="tags")
 */
class Tag {

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Account", inversedBy="notes")
	 */
	private $account;

	/**
	 * @ORM\ManyToOne(targetEntity="File", inversedBy="tags")
	 */
	private $file;

	/**
	 * @var datetime $created
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime")
	 */
	protected $created;

	/**
	 * @var datetime $updated
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime")
	 */
	protected $updated;

	/**
	 * @ORM\Column(type="string", length=100)
	 */
	protected $tag;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Note
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Note
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set start_position
     *
     * @param integer $startPosition
     * @return Note
     */
    public function setStartPosition($startPosition)
    {
        $this->start_position = $startPosition;
    
        return $this;
    }

    /**
     * Get start_position
     *
     * @return integer 
     */
    public function getStartPosition()
    {
        return $this->start_position;
    }

    /**
     * Set end_position
     *
     * @param integer $endPosition
     * @return Note
     */
    public function setEndPosition($endPosition)
    {
        $this->end_position = $endPosition;
    
        return $this;
    }

    /**
     * Get end_position
     *
     * @return integer 
     */
    public function getEndPosition()
    {
        return $this->end_position;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Note
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    
        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set detail
     *
     * @param string $detail
     * @return Note
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    
        return $this;
    }

    /**
     * Get detail
     *
     * @return string 
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * Set account
     *
     * @param \Wirelust\HexHunterBundle\Entity\Account $account
     * @return Note
     */
    public function setAccount(\Wirelust\HexHunterBundle\Entity\Account $account = null)
    {
        $this->account = $account;
    
        return $this;
    }

    /**
     * Get account
     *
     * @return \Wirelust\HexHunterBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set file
     *
     * @param \Wirelust\HexHunterBundle\Entity\File $file
     * @return Note
     */
    public function setFile(\Wirelust\HexHunterBundle\Entity\File $file = null)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return \Wirelust\HexHunterBundle\Entity\File 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set tag
     *
     * @param string $tag
     * @return Tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    
        return $this;
    }

    /**
     * Get tag
     *
     * @return string 
     */
    public function getTag()
    {
        return $this->tag;
    }
}
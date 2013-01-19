<?php
/**
 * User: T. Curran
 * Date: 1/18/13
 */

namespace Wirelust\HexHunterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 * @ORM\Table(name="files")
 */
class File
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\ManyToOne(targetEntity="Account", inversedBy="files")
	 */
	private $account;

	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $name;

	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $name_original;

	/**
	 * @ORM\Column(type="string", length=200)
	 */
	protected $location;

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
	 * @ORM\Column(type="boolean")
	 */
	protected $is_public;

	/**
	 * @ORM\OneToMany(targetEntity="Note", mappedBy="file")
	 */
	private $notes;

	/**
	 * @ORM\OneToMany(targetEntity="Account", mappedBy="starred_files")
	 **/
	protected $accounts_starred;

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
     * Set name
     *
     * @param string $name
     * @return File
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name_original
     *
     * @param string $nameOriginal
     * @return File
     */
    public function setNameOriginal($nameOriginal)
    {
        $this->name_original = $nameOriginal;
    
        return $this;
    }

    /**
     * Get name_original
     *
     * @return string 
     */
    public function getNameOriginal()
    {
        return $this->name_original;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return File
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
     * @return File
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
     * Set is_public
     *
     * @param boolean $isPublic
     * @return File
     */
    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;
    
        return $this;
    }

    /**
     * Get is_public
     *
     * @return boolean 
     */
    public function getIsPublic()
    {
        return $this->is_public;
    }

    /**
     * Set account
     *
     * @param \Wirelust\HexHunterBundle\Entity\Account $account
     * @return File
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
     * Set location
     *
     * @param string $location
     * @return File
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add notes
     *
     * @param \Wirelust\HexHunterBundle\Entity\Note $notes
     * @return File
     */
    public function addNote(\Wirelust\HexHunterBundle\Entity\Note $notes)
    {
        $this->notes[] = $notes;
    
        return $this;
    }

    /**
     * Remove notes
     *
     * @param \Wirelust\HexHunterBundle\Entity\Note $notes
     */
    public function removeNote(\Wirelust\HexHunterBundle\Entity\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add accounts_starred
     *
     * @param \Wirelust\HexHunterBundle\Entity\Account $accountsStarred
     * @return File
     */
    public function addAccountsStarred(\Wirelust\HexHunterBundle\Entity\Account $accountsStarred)
    {
        $this->accounts_starred[] = $accountsStarred;
    
        return $this;
    }

    /**
     * Remove accounts_starred
     *
     * @param \Wirelust\HexHunterBundle\Entity\Account $accountsStarred
     */
    public function removeAccountsStarred(\Wirelust\HexHunterBundle\Entity\Account $accountsStarred)
    {
        $this->accounts_starred->removeElement($accountsStarred);
    }

    /**
     * Get accounts_starred
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccountsStarred()
    {
        return $this->accounts_starred;
    }
}
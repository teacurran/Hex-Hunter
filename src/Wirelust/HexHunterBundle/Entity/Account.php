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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="accounts")
 */
class Account
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(type="string", length=100, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\Length(
	 *         min="3",
	 *         max="20"
	 * )
	 * @Assert\Regex(
	 *     pattern="/^[A-Za-z0-9][A-Za-z0-9\x22]*$/"
	 * )
	 * */
	protected $username;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $full_name;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $website;

	/**
	 * @ORM\OneToMany(targetEntity="File", mappedBy="account")
	 */
	protected $files;


	/**
	 * @ORM\ManyToMany(targetEntity="Account")
	 * @JoinTable(name="account_following",
	 *      joinColumns={@JoinColumn(name="account_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="account_following_id", referencedColumnName="id")}
	 *      )
	 **/
	protected $following;

	/**
	 * @ORM\OneToMany(targetEntity="Account", mappedBy="following")
	 **/
	protected $followers;

	/**
	 * @ORM\ManyToMany(targetEntity="File")
	 * @JoinTable(name="accounts_files",
	 *      joinColumns={@JoinColumn(name="account_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="file_id", referencedColumnName="id")}
	 *      )
	 **/
	protected $starred_files;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $location;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 */
	protected $bio;

	/**
	 * @ORM\Column(type="string", length=100, unique=true)
	 * @Assert\NotBlank()
	 * @Assert\email()
	 */
	protected $email;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $email_verification_code;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $email_verified = false;

	/**
	 * @ORM\Column(type="string", length=100)
	 * @Assert\NotBlank()
	 */
	protected $password;

	/**
	 * @ORM\Column(type="string", length=100, nullable=true)
	 */
	protected $password_salt;

	/**
	 * @ORM\OneToMany(targetEntity="Note", mappedBy="account")
	 */
	private $notes;

	// TODO: figure out why Timestampable isn't populating
	/**
	 * @var datetime $created
	 *
	 * @Gedmo\Timestampable(on="create")
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $created;

	// TODO: figure out why Timestampable isn't populating
	/**
	 * @var datetime $updated
	 *
	 * @Gedmo\Timestampable(on="update")
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $updated;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $date_login;


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
	 * Set username
	 *
	 * @param string $username
	 * @return Account
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * Set full_name
	 *
	 * @param string $fullName
	 * @return Account
	 */
	public function setFullName($fullName)
	{
		$this->full_name = $fullName;

		return $this;
	}

	/**
	 * Get full_name
	 *
	 * @return string
	 */
	public function getFullName()
	{
		return $this->full_name;
	}

	/**
	 * Set website
	 *
	 * @param string $website
	 * @return Account
	 */
	public function setWebsite($website)
	{
		$this->website = $website;

		return $this;
	}

	/**
	 * Get website
	 *
	 * @return string
	 */
	public function getWebsite()
	{
		return $this->website;
	}

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->files = new \Doctrine\Common\Collections\ArrayCollection();
	}

	/**
	 * Set location
	 *
	 * @param string $location
	 * @return Account
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
	 * Set bio
	 *
	 * @param string $bio
	 * @return Account
	 */
	public function setBio($bio)
	{
		$this->bio = $bio;

		return $this;
	}

	/**
	 * Get bio
	 *
	 * @return string
	 */
	public function getBio()
	{
		return $this->bio;
	}

	/**
	 * Set email
	 *
	 * @param string $email
	 * @return Account
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 * @return Account
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set password_salt
	 *
	 * @param string $passwordSalt
	 * @return Account
	 */
	public function setPasswordSalt($passwordSalt)
	{
		$this->password_salt = $passwordSalt;

		return $this;
	}

	/**
	 * Get password_salt
	 *
	 * @return string
	 */
	public function getPasswordSalt()
	{
		return $this->password_salt;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 * @return Account
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
	 * @return Account
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
	 * Set date_login
	 *
	 * @param \DateTime $dateLogin
	 * @return Account
	 */
	public function setDateLogin($dateLogin)
	{
		$this->date_login = $dateLogin;

		return $this;
	}

	/**
	 * Get date_login
	 *
	 * @return \DateTime
	 */
	public function getDateLogin()
	{
		return $this->date_login;
	}

	/**
	 * Add files
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\File $files
	 * @return Account
	 */
	public function addFile(\Wirelust\HexHunterBundle\Entity\File $files)
	{
		$this->files[] = $files;

		return $this;
	}

	/**
	 * Remove files
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\File $files
	 */
	public function removeFile(\Wirelust\HexHunterBundle\Entity\File $files)
	{
		$this->files->removeElement($files);
	}

	/**
	 * Get files
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFiles()
	{
		return $this->files;
	}

	/**
	 * Add notes
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\Note $notes
	 * @return Account
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
	 * Add starred_files
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\File $starredFiles
	 * @return Account
	 */
	public function addStarredFile(\Wirelust\HexHunterBundle\Entity\File $starredFiles)
	{
		$this->starred_files[] = $starredFiles;

		return $this;
	}

	/**
	 * Remove starred_files
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\File $starredFiles
	 */
	public function removeStarredFile(\Wirelust\HexHunterBundle\Entity\File $starredFiles)
	{
		$this->starred_files->removeElement($starredFiles);
	}

	/**
	 * Get starred_files
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getStarredFiles()
	{
		return $this->starred_files;
	}

	/**
	 * Set email_verification_code
	 *
	 * @param string $emailVerificationCode
	 * @return Account
	 */
	public function setEmailVerificationCode($emailVerificationCode)
	{
		$this->email_verification_code = $emailVerificationCode;

		return $this;
	}

	/**
	 * Get email_verification_code
	 *
	 * @return string
	 */
	public function getEmailVerificationCode()
	{
		return $this->email_verification_code;
	}

	/**
	 * Set email_verified
	 *
	 * @param boolean $emailVerified
	 * @return Account
	 */
	public function setEmailVerified($emailVerified)
	{
		$this->email_verified = $emailVerified;

		return $this;
	}

	/**
	 * Get email_verified
	 *
	 * @return boolean
	 */
	public function getEmailVerified()
	{
		return $this->email_verified;
	}

	/**
	 * Add following
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\Account $following
	 * @return Account
	 */
	public function addFollowing(\Wirelust\HexHunterBundle\Entity\Account $following)
	{
		$this->following[] = $following;

		return $this;
	}

	/**
	 * Remove following
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\Account $following
	 */
	public function removeFollowing(\Wirelust\HexHunterBundle\Entity\Account $following)
	{
		$this->following->removeElement($following);
	}

	/**
	 * Get following
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFollowing()
	{
		return $this->following;
	}

	/**
	 * Add followers
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\Account $followers
	 * @return Account
	 */
	public function addFollower(\Wirelust\HexHunterBundle\Entity\Account $followers)
	{
		$this->followers[] = $followers;

		return $this;
	}

	/**
	 * Remove followers
	 *
	 * @param \Wirelust\HexHunterBundle\Entity\Account $followers
	 */
	public function removeFollower(\Wirelust\HexHunterBundle\Entity\Account $followers)
	{
		$this->followers->removeElement($followers);
	}

	/**
	 * Get followers
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getFollowers()
	{
		return $this->followers;
	}
}
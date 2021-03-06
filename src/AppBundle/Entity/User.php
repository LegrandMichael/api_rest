<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="function", type="string", length=255)
     */
    protected $function;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=14, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=14, unique=true, nullable=true)
     */
    protected $cellphone;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=100, unique=true)
     * @Assert\NotBlank()
     */
    protected $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="organization", type="string", length=255)
     */
    protected $organization;

    /**
     * -------------
     * -- Mapping --
     * -------------
    */

    /**
     * One User has Many Tasks to treat.
     * @ORM\OneToMany(targetEntity="Task", mappedBy="userConcerned")
     */
    protected $fullName;

    /**
     * One User has Many Tasks treated.
     * @ORM\OneToMany(targetEntity="Task", mappedBy="treatedBy")
    */
    protected $initial;



    public function __construct()
    {
        $this->fullName = new ArrayCollection();
        $this->initial = new ArrayCollection();
    }

    public function __toString()
    {
        
    }

    /**
     * -------------
     * -- Getters -- 
     * -------------
    */

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get function
     *
     * @return string
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Get cellphone
     *
     * @return string
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }
    
    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Get organization
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }
    
    /**
     * -------------
     * -- Setters --
     * -------------
     */

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        
        return $this;
    }

    /**
     * Set function
     *
     * @param string $function
     *
     * @return User
     */
    public function setFunction($function)
    {
        $this->function = $function;
        
        return $this;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     *
     * @return User
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return User
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
        
        return $this;
    }
    
    /**
     * Set organization
     *
     * @param string $organization
     *
     * @return User
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        
        return $this;
    }

    /**
     * Add fullName
     *
     * @param \AppBundle\Entity\Task $fullName
     *
     * @return User
     */
    public function addFullName(\AppBundle\Entity\Task $fullName)
    {
        $this->fullName[] = $fullName;

        return $this;
    }

    /**
     * Remove fullName
     *
     * @param \AppBundle\Entity\Task $fullName
     */
    public function removeFullName(\AppBundle\Entity\Task $fullName)
    {
        $this->fullName->removeElement($fullName);
    }

    /**
     * Get fullName
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Add initial
     *
     * @param \AppBundle\Entity\Task $initial
     *
     * @return User
     */
    public function addInitial(\AppBundle\Entity\Task $initial)
    {
        $this->initial[] = $initial;

        return $this;
    }

    /**
     * Remove initial
     *
     * @param \AppBundle\Entity\Task $initial
     */
    public function removeInitial(\AppBundle\Entity\Task $initial)
    {
        $this->initial->removeElement($initial);
    }

    /**
     * Get initial
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInitial()
    {
        return $this->initial;
    }
}

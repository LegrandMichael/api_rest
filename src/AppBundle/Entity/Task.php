<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Task
 *
 * @ORM\Table(name="tasks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaskRepository")
*/
class Task
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
     * @var \Datetime
     * 
     * @ORM\Column(name="date_receipt", type="datetime")
     * @Assert\Type(type="\DateTime")
    */
    protected $dateReceipt;

    /**
     * @var string
     * 
     * @ORM\Column(name="theme", type="string", length=30, nullable=true)
    */
    protected $theme;

    /**
     * @var string
     * 
     * @ORM\Column(name="priority_level", type="string", length=7, nullable=true)
    */
    protected $priorityLevel;

    /**
     * @var \Datetime
     * 
     * @ORM\Column(name="deadline", type="datetime", nullable=true)
     * @Assert\Type(type="\DateTime")
    */
    protected $deadline;

    /**
     * @var string
     * 
     * @ORM\Column(name="public_concerned", type="string", length=10, nullable=true)
    */
    protected $publicConcerned;

    /**
     * @var string
     * 
     * @ORM\Column(name="goal", type="text")
    */
    protected $goal;

    /**
     * @var string
     * 
     * @ORM\Column(name="broadcasting", type="string", length=10, nullable=true) 
    */
    protected $broadcasting;

    /**
     * @var string
     * 
     * @ORM\Column(name="answer", type="text", nullable=true)
    */
    protected $answer;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="state", type="string", length=15, nullable=true)
    */
    protected $state;

    /**
     * -------------
     * -- Mapping --
     * -------------
    */

    /**
     * Many Tasks have One User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="fullName")
     * @ORM\JoinColumn(name="user_concerned", referencedColumnName="id")
     */
    protected $userConcerned;

    /**
     * Many Tasks have One User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="initial")
     * @ORM\JoinColumn(name="treated_by", referencedColumnName="id")
     */
    protected $treatedBy;

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
     * Get date of receipt
     * 
     * @return datetime
    */
    public function getDateReceipt()
    {
        return $this->dateReceipt;
    }

    /**
     * Get userConcerned
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserConcerned()
    {
        return $this->userConcerned;
    }

    /**
     * Get theme
     * 
     * @return string
    */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Get priority
     * 
     * @return string
    */
    public function getPriorityLevel()
    {
        return $this->priorityLevel;
    }

    /**
     * Get deadline
     * 
     * @return datetime
    */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Get public concerned
     * 
     * @return string
    */
    public function getPublicConcerned()
    {
        return $this->publicConcerned;
    }

    /**
     * Get goal
     * 
     * @return string
    */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * Get broadcasting
     * 
     * @return string
    */
    public function getBroadcasting()
    {
        return $this->broadcasting;
    }

    /**
     * Get answer
     * 
     * @return string
    */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Get treatedBy
     *
     * @return \AppBundle\Entity\User
     */
    public function getTreatedBy()
    {
        return $this->treatedBy;
    }

    /**
     * Get state
     * 
     * @return string
    */
    public function getState()
    {
        return $this->state;
    }

    /**
     * -------------
     * -- Setters --
     * -------------
    */

    /**
     * Set Date of receipt
    */
    public function setDateReceipt($dateReceipt)
    { 
        $this->dateReceipt = $dateReceipt;
    }

    /**
     * Set userConcerned
     *
     * @param \AppBundle\Entity\User $userConcerned
     *
     * @return Task
     */
    public function setUserConcerned(\AppBundle\Entity\User $userConcerned = null)
    {
        $this->userConcerned = $userConcerned;

        return $this;
    }

    /**
     * Set theme
    */
    public function setTheme($theme)
    {
        $this->theme = $theme;
    }

    /**
     * Set priority level
    */
    public function setPriorityLevel($priorityLevel)
    {
        $this->priorityLevel = $priorityLevel;
    }

    /**
     * Set deadline
    */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * Set public concerned
    */
    public function setPublicConcerned($publicConcerned)
    {
        $this->publicConcerned = $publicConcerned;
    }

    /**
     * Set goal
    */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }

    /**
     * Set broadcasting
    */
    public function setBroadcasting($broadcasting)
    {
        $this->broadcasting = $broadcasting;
    }

    /**
     * Set answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    /**
     * Set treatedBy
     *
     * @param \AppBundle\Entity\User $treatedBy
     *
     * @return Task
     */
    public function setTreatedBy(\AppBundle\Entity\User $treatedBy = null)
    {
        $this->treatedBy = $treatedBy;

        return $this;
    }

    /**
     * Set state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}

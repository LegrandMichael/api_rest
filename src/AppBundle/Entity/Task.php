<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var datetime
     * 
     * @ORM\Column(name="date_receipt", type="datetime")
    */
    protected $dateReceipt;

    /**
     * DO NOT FORGET TO JOIN TABLE WITH USERS
     * 
     * name="user_concerned"
    */
    //protected $userConcerned;

    /**
     * @var string
     * 
     * @ORM\Column(name="theme", type="string", length=30)
    */
    protected $theme;

    /**
     * @var string
     * 
     * @ORM\Column(name="priority_level", type="string", length=7)
    */
    protected $priorityLevel;

    /**
     * @var datetime
     * 
     * @ORM\Column(name="deadline", type="datetime")
    */
    protected $deadline;

    /**
     * @var string
     * 
     * @ORM\Column(name="public_concerned", type="string", length=10)
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
     * @ORM\Column(name="broadcasting", type="string", length=10) 
    */
    protected $broadcasting;

    /**
     * @var string
     * 
     * @ORM\Column(name="answer", type="text")
    */
    protected $answer;

    /**
     * DO NOT FORGET TO JOIN TABLE WITH USERS
     * name="treated_by"
    */
    //protected $treatedBy;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="state", type="string", length=12)
    */
    protected $state;

    /**
     * Functions to get all necessaries data
     * -------------------------------------
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
     * Get user concerned
    */
    //public function getUserConcerned [...]

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
     * Get treated by
     *
     * 
    */
    //public function getTreatedBy()[...]

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
     * Function to set all data needed to fill the database
     * ----------------------------------------------------
    */

    /**
     * Set Date of receipt
    */
    public function setDateReceipt($dateReceipt)
    {
        $this->dateReceipt = $dateReceipt;
    }

    /**
     * Set user concerned 
    */
    // __contruct ?? TO DO

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
     * Set treated by
     */
    // TO DO

    /**
     * Set state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

   
}

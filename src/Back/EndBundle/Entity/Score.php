<?php

namespace Back\EndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity(repositoryClass="Back\EndBundle\Repository\ScoreRepository")
 */
class Score
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="score"  )
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id",nullable=false ,onDelete="CASCADE")
     */
    protected $student;

    /**
     * @ORM\ManyToOne(targetEntity="Element", inversedBy="score"  )
     * @ORM\JoinColumn(name="element_id", referencedColumnName="id",nullable=false ,onDelete="CASCADE")
     */
    protected $element;

    /**
     * @var float
     *
     * @ORM\Column(name="testScore", type="float", nullable=true, unique=false)
     */
    private $testScore;


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
     * Set testScore
     *
     * @param integer $testScore
     * @return Score
     */
    public function setTestScore($testScore)
    {
        $this->testScore = $testScore;

        return $this;
    }

    /**
     * Get testScore
     *
     * @return integer 
     */
    public function getTestScore()
    {
        return $this->testScore;
    }

    /**
     * Set student
     *
     * @param \Back\EndBundle\Entity\Student $student
     * @return Score
     */
    public function setStudent(\Back\EndBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \Back\EndBundle\Entity\Student 
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set element
     *
     * @param \Back\EndBundle\Entity\Element $element
     * @return Score
     */
    public function setElement(\Back\EndBundle\Entity\Element $element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * Get element
     *
     * @return \Back\EndBundle\Entity\Element 
     */
    public function getElement()
    {
        return $this->element;
    }
}

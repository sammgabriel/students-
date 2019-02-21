<?php

class Student
{
    private $_sid;
    private $_last;
    private $_first;
    private $_birthdate;
    private $_gpa;
    private $_advisor;

    function __construct($sid, $last, $first, $birthdate, $gpa, $advisor)
    {
        $this->_sid = $sid;
        $this->_last = $last;
        $this->_first = $first;
        $this->_birthdate = $birthdate;
        $this->_gpa = $gpa;
        $this->_advisor = $advisor;
    }

    /**
     * @return mixed
     */
    public function getSid()
    {
        return $this->_sid;
    }

    /**
     * @param mixed $sid
     */
    public function setSid($sid)
    {
        $this->_sid = $sid;
    }

    /**
     * @return mixed
     */
    public function getLast()
    {
        return $this->_last;
    }

    /**
     * @param mixed $last
     */
    public function setLast($last)
    {
        $this->_last = $last;
    }

    /**
     * @return mixed
     */
    public function getFirst()
    {
        return $this->_first;
    }

    /**
     * @param mixed $first
     */
    public function setFirst($first)
    {
        $this->_first = $first;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->_birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->_birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getGpa()
    {
        return $this->_gpa;
    }

    /**
     * @param mixed $gpa
     */
    public function setGpa($gpa)
    {
        $this->_gpa = $gpa;
    }

    /**
     * @return mixed
     */
    public function getAdvisor()
    {
        return $this->_advisor;
    }

    /**
     * @param mixed $advisor
     */
    public function setAdvisor($advisor)
    {
        $this->_advisor = $advisor;
    }

    function toString()
    {
        return $this->_first . " " . $this->_last;
    }
}
<?php

namespace OCMybooks\Domain;

class Author
{

	/**
	* Author id;
	*
	* @var integer
	*/
	private $id;

	/**
	* Author First Name;
	*
	* @var varchar
	*/
	private $firstname;

	/**
	* Author Last Name;
	*
	* @var varchar
	*/
	private $lastname;

	/**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return varchar
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param varchar $firstname
     *
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return varchar
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param varchar $lastname
     *
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

} 
<?php

class Contact {

  private $id;
  private $name;
  private $business;
  private $email;
  private $tel;
  private $city;
  private $state;
  private $jotting;


  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of business
   */ 
  public function getBusiness()
  {
    return $this->business;
  }

  /**
   * Set the value of business
   *
   * @return  self
   */ 
  public function setBusiness($business)
  {
    $this->business = $business;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of tel
   */ 
  public function getTel()
  {
    return $this->tel;
  }

  /**
   * Set the value of tel
   *
   * @return  self
   */ 
  public function setTel($tel)
  {
    $this->tel = $tel;

    return $this;
  }

  /**
   * Get the value of city
   */ 
  public function getCity()
  {
    return $this->city;
  }

  /**
   * Set the value of city
   *
   * @return  self
   */ 
  public function setCity($city)
  {
    $this->city = $city;

    return $this;
  }

  /**
   * Get the value of state
   */ 
  public function getState()
  {
    return $this->state;
  }

  /**
   * Set the value of state
   *
   * @return  self
   */ 
  public function setState($state)
  {
    $this->state = $state;

    return $this;
  }

  /**
   * Get the value of jotting
   */ 
  public function getJotting()
  {
    return $this->jotting;
  }

  /**
   * Set the value of jotting
   *
   * @return  self
   */ 
  public function setJotting($jotting)
  {
    $this->jotting = $jotting;

    return $this;
  }
}
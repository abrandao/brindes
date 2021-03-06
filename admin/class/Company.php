<?php

  class Company {

    private $id = 1;
    private $cnpj;
    private $address;
    private $tel1;
    private $tel2;
    private $tel3;
    private $email1;
    private $email2;
    private $email3;    

    /**
     * Get the value of cnpj
     */ 
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set the value of cnpj
     *
     * @return  self
     */ 
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of tel1
     */ 
    public function getTel1()
    {
        return $this->tel1;
    }

    /**
     * Set the value of tel1
     *
     * @return  self
     */ 
    public function setTel1($tel1)
    {
        $this->tel1 = $tel1;

        return $this;
    }

    /**
     * Get the value of tel2
     */ 
    public function getTel2()
    {
        return $this->tel2;
    }

    /**
     * Set the value of tel2
     *
     * @return  self
     */ 
    public function setTel2($tel2)
    {
        $this->tel2 = $tel2;

        return $this;
    }

    /**
     * Get the value of tel3
     */ 
    public function getTel3()
    {
        return $this->tel3;
    }

    /**
     * Set the value of tel3
     *
     * @return  self
     */ 
    public function setTel3($tel3)
    {
        $this->tel3 = $tel3;

        return $this;
    }

    /**
     * Get the value of email1
     */ 
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * Set the value of email1
     *
     * @return  self
     */ 
    public function setEmail1($email1)
    {
        $this->email1 = $email1;

        return $this;
    }

    /**
     * Get the value of email2
     */ 
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Set the value of email2
     *
     * @return  self
     */ 
    public function setEmail2($email2)
    {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get the value of email3
     */ 
    public function getEmail3()
    {
        return $this->email3;
    }

    /**
     * Set the value of email3
     *
     * @return  self
     */ 
    public function setEmail3($email3)
    {
        $this->email3 = $email3;

        return $this;
    }

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

    public function update($cnpj, $address, $tel1, $tel2, $tel3, $email1, $email2, $email3){
      
      $this->setCNPJ($cnpj);
      $this->setAddress($address);
      $this->setTel1($tel1);
      $this->setTel2($tel2);
      $this->setTel3($tel3);
      $this->setEmail1($email1);
      $this->setEmail2($email2);
      $this->setEmail3($email3);
      
      $sql = new Sql();
      $sql->query("UPDATE business SET cnpj = :CNPJ, address = :ADDRESS, tel1 = :TEL1, tel2 = :TEL2, tel3 = :TEL3, email1 = :EMAIL1, email2 = :EMAIL2, email3 = :EMAIL3 WHERE id = :ID", array(

        ':CNPJ'=>$this->getCnpj(),
        ':ADDRESS'=>$this->getAddress(),
        ':TEL1'=>$this->getTel1(),
        ':TEL2'=>$this->getTel2(),
        ':TEL3'=>$this->getTel3(),
        ':EMAIL1'=>$this->getEmail1(),
        ':EMAIL2'=>$this->getEmail2(),
        ':EMAIL3'=>$this->getEmail3(),
        ':ID'=>$this->getId()            
       
      ));
    }
  }

<?php

namespace Grip\PakketdienstQls\Model;

class Contact
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $companyname;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $housenumber;

    /**
     * @var string
     */
    private $address2;

    /**
     * @var string
     */
    private $postalcode;

    /**
     * @var string
     */
    private $locality;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var string
     */
    private $eori;

    /**
     * @var string
     */
    private $oss;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getCompanyname()
    {
        return $this->companyname;
    }

    /**
     * @param string $companyname
     */
    public function setCompanyname($companyname)
    {
        $this->companyname = $companyname;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHousenumber()
    {
        return $this->housenumber;
    }

    /**
     * @param string $housenumber
     */
    public function setHousenumber($housenumber)
    {
        $this->housenumber = $housenumber;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param string $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return string
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @param string $locality
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param string $vat
     */
    public function setVat($vat)
    {
        $this->vat = $vat;
    }

    /**
     * @return string
     */
    public function getEori()
    {
        return $this->eori;
    }

    /**
     * @param string $eori
     */
    public function setEori($eori)
    {
        $this->eori = $eori;
    }

    /**
     * @return string
     */
    public function getOss()
    {
        return $this->oss;
    }

    /**
     * @param string $oss
     */
    public function setOss($oss)
    {
        $this->oss = $oss;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}

<?php

namespace GSB\Domain;

class Visitor
{
    /**
     * Visitor id.
     *
     * @var integer
     */
    private $id;

    /**
     * Sector id.
     *
     * @var integer
     */
    private $sector;

    /**
     * Laboratory Id.
     *
     * @var integer
     */
    private $laboratoryId;

    /**
     * Last Name Visitor.
     *
     * @var string
     */
    private $lastName;

    /**
     * First Name Visitor.
     *
     * @var string
     */
    private $firstName;

    /**
     * Address Visitor.
     *
     * @var string
     */
    private $address;

    /**
     * Zipcode Visitor.
     *
     * @var string
     */
    private $zipCode;

    /**
     * City Visitor.
     *
     * @var string
     */
    private $city;
    
    /**
     * Date Hiring.
     *
     * @var Date
     */
    private $dateHiring;

    /**
     * User Name Visitor.
     *
     * @var string
     */
    private $userName;

    /**
     * Password Visitor.
     *
     * @var string
     */
    private $password;
    
    /**
     * Salt.
     *
     * @var string
     */
    private $salt;

    /**
     * Role.
     *
     * @var string
     */
    private $role;

     /**
     * Type Visitor.
     *
     * @var string
     */
    private $type;

    public function getId() {
        return $this->id;
    }

    public function getSector() {
        return $this->sector;
    }

    public function getLaboratoryId() {
        return $this->laboratoryId;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function getCity() {
        return $this->city;
    }

    public function getDateHiring() {
        return $this->dateHiring;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function getType() {
        return $this->type;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function setLaboratoryId($laboratoryId) {
        $this->laboratoryId = $laboratoryId;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setDateHiring(Date $dateHiring) {
        $this->dateHiring = $dateHiring;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setType($type) {
        $this->type = $type;
    }


}
    
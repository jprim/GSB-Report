<?php

namespace GSB\Domain;

class Practitioner
{
    /**
     * Practitioner id.
     *
     * @var integer
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     */
    private $name;

    /**
     * First name.
     *
     * @var string
     */
    private $first_name;

    /**
     * Address.
     *
     * @var string
     */
    private $address;

    /**
     * zip code.
     *
     * @var int
     */
    private $zip_code;

    /**
     * city.
     *
     * @var string
     */
    private $city;
    
    /**
     * notoriety coefficient.
     *
     * @var float
     */
    private $coefficient;

    /**
     * Type.
     *
     * @var \GSB\Domaine\Type
     */
    private $type;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($fisrt_name) {
        $this->first_name = $fisrt_name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getZip_code() {
        return $this->zip_code;
    }

    public function setZip_code($zip_code) {
        $this->zip_code = $zip_code;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCoefficient() {
        return $this->coefficient;
    }

    public function setCoefficient($coefficient) {
        $this->coefficient = $coefficient;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}
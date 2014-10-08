<?php

namespace GSB\DAO;

use GSB\Domain\Practitioner;

class PractitionerDAO extends DAO
{
    /**
     * @var \GSB\DAO\Practitioner_TypeDAO
     */
    private $practitionerTypeDAO;

    public function setPractitionerTypeDAO($practitionerTypeDAO) {
        $this->practitionerTypeDAO = $practitionerTypeDAO;
    }

    /**
     * Returns the list of all practitioners, sorted by trade name.
     *
     * @return array The list of all practitioners.
     */
    public function findAll() {
        $sql = "select * from practitioner order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerId = $row['practitioner_id'];
            $practitioners[$practitionerId] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the list of all practitioners for a given type, sorted by trade name.
     *
     * @param integer $practitionersDd The type id.
     *
     * @return array The list of practitioners.
     */
    public function findAllByType($practitioner_id) {
        $sql = "select * from practitioner where practitioner_type_id=? order by practitioner_name";
        $result = $this->getDb()->fetchAll($sql, array($practitioner_id));
        $practitioners = array();
        foreach ($result as $row) {
            $practitioner_id = $row['practitioner_id'];
            $practitioners[$practitioner_id] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }

    /**
     * Returns the practitioner matching a given id.
     *
     * @param integer $id The practitioner id.
     *
     * @return \GSB\Domain\Practitioner|throws an exception if no practitioner is found.
     */
    public function find($id) {
        $sql = "select * from practitioner where practitioner_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No practitioner found for id " . $id);
    }

    /**
     * Creates a practitioner instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Practitioner
     */
    protected function buildDomainObject($row) {
        $typeId = $row['practitioner_type_id'];
        $type = $this->practitionerTypeDAO->find($typeId);

        $practitioner = new Practitioner();
        $practitioner->setId($row['practitioner_id']);
        $practitioner->setName($row['practitioner_name']);
        $practitioner->setFirst_name($row['practitioner_first_name']);
        $practitioner->setAddress($row['practitioner_address']);
        $practitioner->setZip_code($row['practitioner_zip_code']);
        $practitioner->setCity($row['practitioner_city']);
        $practitioner->setCoefficient($row['notoriety_coefficient']);
        $practitioner->setType($type);
        return $practitioner;
    }
}
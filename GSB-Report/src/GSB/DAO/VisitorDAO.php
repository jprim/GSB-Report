<?php

namespace GSB\DAO;

use GSB\Domain\Visitor;

class VisitorDAO extends DAO
{
    
    
    /**
     * Creates a Visitor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\Visitor
     */
    protected function buildDomainObject($row) {
        $visitor = new Visitor();
        $visitor->setId($row['visitor_id']);
        $visitor->setSector($row['sector']);
        $visitor->setLaboratoryId($row['laboratory_id']);
        $visitor->setLastName($row['visitor_last_name']);
        $visitor->setFirstName($row['visitor_first_name']);
        $visitor->setAddress($row['visitor_address']);
        $visitor->setZipCode($row['visitor_zip_code']);
        $visitor->setCity($row['visitor_city']);
        $visitor->setDateHiring($row['date_hiring']);
        $visitor->setUserName($row['visitor_username']);
        $visitor->setPassword($row['visitor_password']);
        $visitor->setSalt($row['salt']);
        $visitor->setRole($row['role']);
        $visitor->setType($row['visitor_type']);
        return $visitor;
    }

}
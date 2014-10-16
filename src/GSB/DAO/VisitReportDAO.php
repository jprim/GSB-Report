<?php

namespace GSB\DAO;

use GSB\Domain\VisitReport;

class VisitReportDAO extends DAO
{
    private $familyDAO;

    public function setPractitionerId($practitionerDAO) {
        $this->practitionerDAO = $practitionerDAO;
    }
    
    private $practitionerDAO;

    public function setVisitorId($visitorDAO) {
        $this->visitorDAO = $visitorDAO;
    }
    
 
     /**
     * Returns the list of all drugs, sorted by trade name.
     *
     * @return array The list of all drugs.
     */
    public function findAll() {
        $sql = "select * from visit_report";
        $result = $this->getDb()->fetchAll($sql);
        
        // Converts query result to an array of domain objects
        $reports = array();
        foreach ($result as $row) {
            $reportId = $row['report_id'];
            $reports[$reportId] = $this->buildDomainObject($row);
        }
        return $reports;
    }
    
   
    
    public function findPractioner($practitionerId) {
        $sql = "select * from practitioner where practitioner_id=?";
        $result = $this->getDb()->fetchAll($sql, array($practitionerId));
        
        // Convert query result to an array of domain objects
        $practitioners = array();
        foreach ($result as $row) {
            $practitionerName = $row['practitioner_name'];
            $practitioners[$practitionerName] = $this->buildDomainObject($row);
        }
        return $practitioners;
    }
    
    public function findVisitor($visitorId) {
        $sql = "select * from visitor where visitor_id=?";
        $result = $this->getDb()->fetchAll($sql, array($visitorId));
        
        // Convert query result to an array of domain objects
        $visitors = array();
        foreach ($result as $row) {
            $visitorName = $row['visitor_last_name'];
            $visitors[$visitorName] = $this->buildDomainObject($row);
        }
        return $visitors;
    }
    
    
    /**
     * Creates a VisitRepor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\VisitReport
     */
    protected function buildDomainObject($row) {
        $practitionerId = $row['practitioner_id'];
        $practitioner = $this->practitionerDAO->findPractioner($practitionerId);
        
        $visitorId = $row['visitor_id'];
        $visitor = $this->visitorDAO->findVisitor($visitorId);
        
        $report = new VisitReport();
        $report->setId($row['report_id']);
        
        $report->setPractionerId(practitioner_id);
        
        $report->setVisitorId(visitor_id);
        
        $report->setReportingDate($row['reporting_date']);
        $report->setAssessment($row['assessment']);
        $report->setPurpose($row['purpose']);
        
        return $report;
    }
}
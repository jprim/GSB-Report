<?php

namespace GSB\DAO;

use GSB\Domain\VisitReport;

class VisitReportDAO extends DAO
{
 
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
    
    
    /**
     * Creates a VisitRepor instance from a DB query result row.
     *
     * @param array $row The DB query result row.
     *
     * @return \GSB\Domain\VisitReport
     */
    protected function buildDomainObject($row) {
        $practitionerId = $row['practitioner_id'];
        $practitioner = $this->PractitionerDAO->find($practitionerId);
        
        $visitorId = $row['visitor_id'];
        $visitor = $this->VisitorDAO->find($visitorId);
        
        $report = new Drug();
        $report->setId($row['report_id']);
        
        $report->setPractionerId($practitioner);
        
        $report->setVisitorId($visitor);
        
        $report->setReportingDate($row['reporting_date']);
        $report->setAssessment($row['assessment']);
        $report->setPurpose($row['purpose']);
        
        return $report;
    }
}
<?php

namespace GSB\Domain;

class VisitReport 
{
    private $id;
    private $practitionerId;
    private $visitorId;
    private $reportingDate;
    private $assessment;
    private $purpose;
    
    public function getId() {
    return $this->id;
    }

    public function getPractitionerId() {
    return $this->practitionerId;
    }

    public function getVisitorId() {
    return $this->visitorId;
    }

    public function getReportingDate() {
    return $this->reportingDate;
    }

    public function getAssessment() {
    return $this->assessment;
    }

    public function getPurpose() {
    return $this->purpose;
    }

    public function setId($id) {
    $this->id = $id;
    }

    public function setPractitionerId($practitionerId) {
    $this->practitionerId = $practitionerId;
    }

    public function setVisitorId($visitorId) {
    $this->visitorId = $visitorId;
    }

    public function setReportingDate($reportingDate) {
    $this->reportingDate = $reportingDate;
    }

    public function setAssessment($assessment) {
    $this->assessment = $assessment;
    }

    public function setPurpose($purpose) {
    $this->purpose = $purpose;
    }


}


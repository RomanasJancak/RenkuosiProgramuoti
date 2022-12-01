<?php
// include "utilities/DatabaseManager.php";

class ProductLine {

    private $cols = array(
        "productLine" => "ID",
        "htmlDescription" => "Job Title",
        "image" => "Min Salary",
        "textDescription" => "Max Salary"
    );
    
    //paims visus darbus
    public function index() {

        $databaseManager = new DatabaseManager();
        $jobs = $databaseManager->select('productlines');
        return $jobs;

    }

    public function cols() {
        return $this->cols;
    }

    //sukurs nauja darba
    public function createJob() {

    }


    //atnaujins darba
    public function updateJob() {

    }

    //istrinti darba
    public function deleteJob() {

    }


}

$ProductLineObject = new ProductLine();
<?php 

include "utilities/DatabaseManager.php";


class Employee {



    private $cols = array(
        /*"employee_id" => "ID",*/
        "productCode" => "ID",
        "buyPrice" => "First Name",
        "MSRP" => "Last Name",
        "productDescription" => "Email",
        "productLine" => "Phone Number",
        "productName" => "Hire Date",
        "productScale" => "Job ID",
        "productVendor" => "Salary",
        "quantityInStock" => "Department ID"
    );

    //uz duomenu gavima
    public function index() {
        //1. select uzklausa i duomenu baze
        //2. grazina rezultata
        //3. atvaizduojamas pages/employees.php

        //prie duombazes atsidaro
        $databaseManager = new DatabaseManager();
        //B1
        // $employees = $databaseManager->select('employees');
        //R1
        $employees = $databaseManager->select('products');
        //E1
        // $jobs = new Job;
        // $jobs = $jobs->index();
        
        return $employees;
    }

    public function cols() {
        return $this->cols;
    }


    //uz duomenu sukurima
    public function createEmployee() {
        //visus kintamuosius kuriuos paduoda POST metodas
        if(isset($_POST["create"])) {
            $data = $_POST;
            unset($data["create"]);
            unset($data["page"]);

            $cols = array_keys($data);
            $values = array_values($data);

            $databaseManager = new DatabaseManager();
            $databaseManager->insert('employees', $cols, $values);

            header("Location: index.php?page=employees");
            exit();
        }
        
    }

    //uz duomenu redagavima
    public function updateEmployee() {

    }

    //uz duomenu istrynima
    public function deleteEmployee() {
        if(isset($_POST["page"]) && $_POST["page"] == "employees") {
            if(isset($_POST["delete"])) {
                $databaseManager = new DatabaseManager();
                $databaseManager->delete('employees', 'employee_id', $_POST["delete"]);//mygtuko reiksme
                header("Location: index.php?page=employees");
                exit();
            }
        }
    }

}

$employeesObject = new Employee();
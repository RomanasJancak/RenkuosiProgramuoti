<?php if(isset($_POST["create"])) { 
    
}?>
<form method="post" action="index.php">
    <div>
        <label for="pirkinio_data">Data</label>
        <input type="date" name="pirkinio_data" class="form-control" data-date-format="DD MMMM YYYY" id="pirkinio_data" placeholder="">
    </div>
    <div class="form-group">
        <label for="first_name">Parduotuve</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
    </div>
    <div class="form-group">
        <label for="last_name">Adresas</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name">
    </div>
    <div class="form-group">
        <label for="email">Pavadinimas</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="phone_number">Kiekis</label>
        <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number">
    </div>

    <div class="form-group">
        <label for="job_id">Kaina</label>
        <!-- <input type="text" name="job_id" class="form-control" id="job_id" placeholder="Job ID"> -->

        <select name="job_id" class="form-select">
                <!-- masyva kuri gavome is duomenu bazes  -->
                <?php foreach($jobs as $job) { ?>
                        <option value="<?php echo $job["job_id"] ?>"><?php echo $job["job_title"] ?></option>
                <?php } ?>    
        </select>
    </div>
    <div class="form-group">
        <label for="salary">Nuolaida</label>
        <input type="text" name="salary" class="form-control" id="salary" placeholder="Salary">
    </div>
    <div class="form-group">
        <label for="manager_id">Depozitas</label>
        <input type="text" name="manager_id" class="form-control" id="manager_id" placeholder="Manager ID">
    </div>
    <div class="form-group">
        <label for="department_id">Proga</label>
        <!-- <input type="text" name="department_id" class="form-control" id="department_id" placeholder="Department ID"> -->
        <select name="department_id" class="form-select">
                <!-- masyva kuri gavome is duomenu bazes  -->
                <?php foreach($departments as $department) { ?>
                        <option value="<?php echo $department["department_id"] ?>"><?php echo $department["department_name"] ?></option>
                <?php } ?>
        </select>
    </div>        
    <div class="form-group">
        <label for="manager_id">Kat. svarba</label>
        <input type="text" name="manager_id" class="form-control" id="manager_id" placeholder="Manager ID">
    </div>   
    <button type="submit" name="create" class="btn btn-primary">Create</button>
</form>
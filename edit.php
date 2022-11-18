<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $result = $crud->getSpecialities();

    if(!isset($_GET['id'])){

        echo 'error';

    }else{

    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);


?>
    <h1 class="text-center">Edit Record </h1>
    
    <form method = "post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
    <div class="mb-3">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth'] ?>" id="dob" name="dob">
        </div>
        <!-- <select class="form-select" id="speciality" name="speciality" aria-label="Default select example">
            <option selected>Open this select menu</option>
            <option value="DatabaseAdmin">Database Admin</option>
                <option value="SoftwareDeveloper">Software Developer</option>
                <option value="WebAdministrator">Web Administrator</option>
        </select> -->
        <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" value="<?php echo $attendee['name'] ?>" id="speciality" name="speciality" >
                <?php while($r = $result->fetch(PDO::FETCH_ASSOC)) {?>
                    <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id'] == $attendee['speciality_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php } ?>
            </select>
         </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber'] ?>" id="phone" name="phone" aria-describedby="phoneHelp" >
            <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
        </div>
        <br/>
        
        <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>

    <?php } ?>

<?php require_once 'includes/footer.php'?>
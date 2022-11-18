<?php 
    $title = 'Index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $speciality = $_POST['speciality'];


        //call function and track it success or not
        $isSuccess = $crud->insert($fname, $lname, $dob, $email, $contact, $speciality);
            
        if($isSuccess){
                echo '<h1 class = "text-center text-success">You have been Registered</h1>';
        }else{
                echo '<h1 class = "text-center text-danger">There was an error in processing</h1>';
        }

    }
?>

    

   <!--  <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">
                <?php //echo $_GET['firstname'] .' ' . $_GET['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['speciality']; ?>
            </h6>

            <p class="card-text">
            <?php// echo $_GET['dob']; ?>
            </p>
            <p class="card-text">
            <?php //echo $_GET['email']; ?>
            </p>
            <p class="card-text">
            <?php// echo $_GET['dob']; ?>
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div> -->

    <div class="card" style="width: 18rem;">
           <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST['firstname'] . ' ' . $_POST['lastname']; ?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST['speciality']; ?>
            </h6>

            <p class="card-text">
            <?php echo $_POST['dob']; ?>
            </p>
            <p class="card-text">
            <?php echo $_POST['email']; ?>
            </p>
            <p class="card-text">
            <?php echo $_POST['phone']; ?>
            </p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
        


<?php require_once 'includes/footer.php'?>
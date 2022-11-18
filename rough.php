<?php 
    $title = 'Index';
    require_once 'includes/header.php'
?>

<form>
    <div class="mb-3">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="mb-3">
            <label for="dob">Date Of Birth</label>
            <input type="text" class="form-control" id="dob" name="dob">
    </div>
    <div class="mb-3">
            <label for="speciality" class="form-label">Area of Expertise</label>
            <select class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="Database Admin">Database Admin</option>
                <option value="SOftware Developer">SOftware Developer</option>
                <option value="Web Administrator">Web Administrator</option>
            </select>
         </div>

</form?

<?php require_once 'includes/footer.php'?>
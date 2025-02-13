<?php
    include("sidebar.php");
?>
      <div class="container-fluid">
        <div class="col-12">
            <h1>Add Student</h1>
        </div>
        <div class="col-12 " >
            <div class="col-8 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">First name</label>
                    <input type="text" name="first_name" id="" class="my-2 form-control" placeholder="First Name">
                    <label for="">Last name</label>
                    <input type="text" name="last_name" id="" class="my-2 form-control" placeholder="Last Name">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="my-2 form-select">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="my-2 form-control" placeholder="Email Address">
                    <label for="">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="" class="my-2 form-control" placeholder="Date Of Birth">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" id="" class="my-2 form-control" placeholder="Phone Number">
                    <label for="">Teacher</label>
                    <select name="teacher" id="" class="form-select">
                        <option value="" disabled selected>Select Teacher</option>
                        <?php 
                            getTeacherOption();
                        ?>
                    </select>
                    <label for="">Profile</label>
                    <input type="file" name="profile" id="" class="my-2 form-control"> 
                    <button class="btn btn-success" name="btn-submit-student">Submit</button>
                </form>
            </div>
        </div>
      </div>
    
<?php
    include("footer.php")
?>
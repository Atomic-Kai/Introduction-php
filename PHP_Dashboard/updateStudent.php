<?php
    include("sidebar.php");

    $id = $_GET['id'];
    $sql ="SELECT * FROM `db_student` WHERE `id`= $id";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
?>
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Update student</h1>
            </div>
            <div class="col-12 " >
            <div class="col-8 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_id" value="<?php echo $row['id']?>">
                    <input type="hidden" name="old_profile" value="<?php echo $row['profile']?>">
                    <label for="">First name</label>
                    <input type="text" name="first_name" id="" value="<?php echo $row['first_name']?>" class="my-2 form-control" placeholder="First Name">
                    <label for="">Last name</label>
                    <input type="text" name="last_name" id="" value="<?php echo $row['last_name']?>" class="my-2 form-control" placeholder="Last Name">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="my-2 form-select">
                        <option value="Male" <?php if($row['gender']=="Male") echo "Selected" ?>>Male</option>
                        <option value="Female" <?php if($row['gender']=="Female") echo "Selected" ?>>Female</option>
                    </select>
                    <label for="">Email</label>
                    <input type="email" name="email" id="" value="<?php echo $row['email']?>" class="my-2 form-control" placeholder="Email Address">
                    <label for="">Date of Birth</label>
                    <input type="date" name="date_of_birth" value="<?php echo $row['date_of_birth']?>" id="" class="my-2 form-control" placeholder="Date Of Birth">
                    <label for="">Phone Number</label>
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number']?>" id="" class="my-2 form-control" placeholder="Phone Number">
                    <label for="">Teacher</label>
                    <select name="teacher" id=""  class="form-select">
                        <option value="" disabled selected>Select Teacher</option>
                        <?php 
                            getTeacherOption($row['teacher_id']);
                        ?>
                    </select>
                    <label for="">Profile</label>
                    <input type="file" name="profile" id="" class="my-2 form-control"> 
                    <div class="my-2">
                        <img src="assets/profile/<?php echo $row['profile'] ?>" alt="" width="50px" height="100%">
                    </div>
                    <button class="btn btn-success" name="btn-update-student">Update</button>
                    <a href="viewStudent.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
        </div>
      </div>

<?php
    include("footer.php")
?>
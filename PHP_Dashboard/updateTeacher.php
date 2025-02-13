<?php
    include("sidebar.php");
    $id = $_GET['id'];
    $sql = "SELECT * FROM `db_teacher` WHERE `id`=$id";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
     
?>
      <div class="container-fluid">
        <div class="col-12">
            <h1>Update Teacher</h1>
            <div class="col-8 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_update_teacher" value="<?php echo $id?>">
                    <input type="hidden" name="old_profile_teacher" value="<?php echo $row['profile']?>">
                    <label for="">First name</label>
                    <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" id="" class="my-2 form-control" placeholder="First Name">
                    <label for="">Last name</label>
                    <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" id="" class="my-2 form-control" placeholder="Last Name">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="my-2 form-select">
                        <option value="Male" <?php if($row['gender']=="Male") echo "selected" ?>>Male</option>
                        <option value="Female" <?php if($row['gender']=="Female") echo "selected" ?>>Female</option>
                    </select>
                    <label for="">Department</label>
                    <select name="department" id="" class="my-2 form-select">
                        <option value="IT Department" <?php echo $row['department']=='IT Department'?"selected":'' ?>>IT Department</option>
                        <option value="ITE Department" <?php echo $row['department']=="ITE Department"?"selected":'' ?>>ITE Department</option>
                        <option value="Cs Department" <?php echo $row['department']=="Cs Department"?"selected":'' ?>>Cs Department</option>
                    </select>
                    <label for="">Profile</label>
                    <input type="file" name="profile" id="" class="my-2 form-control">
                    <div class="my-2">
                        <img src="assets/profile/<?php echo $row['profile'] ?>" alt="" width="50px" height="100%">
                    </div>
                    <button class="btn btn-success" name="btn-update-teacher">Update</button>
                    <a href="viewTeacher.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
      </div>
    
<?php
    include("footer.php")
?>
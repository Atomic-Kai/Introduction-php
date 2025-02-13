
<?php
    $hostname = 'localhost'; #127.0.0.1;
    $username = 'root';
    $password = '';
    $database = 'employee';
    
    $connection = new mysqli($hostname, $username, $password, $database);

    function showSweetAlert($title, $text, $icon){
        echo '
            <script>
            Swal.fire({
                title: "'.$title.'",
                text: "'.$text.'",
                icon: "'.$icon.'"
            });
            </script>
        ';
    }
    function createTeacher()
{
    global $connection;
    if (isset($_POST['btn-submit-teacher'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $department = $_POST['department'];
        $profile = $_FILES['profile']['name'];
        
        if(!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($department) && !empty($profile)){
            $profile = date('d-m-y h-i-s') . '-' . $profile;
            $path = 'assets/profile/' . $profile;
            move_uploaded_file($_FILES['profile']['tmp_name'], $path); //move upload file to folder

            $query = "INSERT INTO `db_teacher`(`first_name`, `last_name`, `gender`, `department`, `profile`)
                        VALUES ('$first_name','$last_name','$gender','$department','$profile')";
            $rs = $connection->query($query);
            if($rs){
                showSweetAlert("Create Success","Teacher Add Successfully","success");
            }
        }
        else{
            showSweetAlert("Create Error","Please Input all Field","error");
        }
        
    }
}
createTeacher();

    function getTeacher(){
        global $connection;

        $sql = "SELECT * FROM db_teacher";

        $rs = $connection->query($sql);

        while( $row = mysqli_fetch_assoc($rs)){
            echo'
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['first_name'].'</td>
                    <td>'.$row['last_name'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['department'].'</td>
                    <td>
                        <img src="assets/profile/'.$row['profile'].'" width="50px" height="auto">
                    </td>
                    <td>
                        <a href="updateTeacher.php?id='.$row['id'].'" class="btn btn-warning">Update</a>
                        <button class="btn btn-danger" id="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteTeacher">Delete</button>
                    </td>
                </tr>
            ';
        }
    }

    function updateTeacher(){
        global $connection;
        if(isset($_POST['btn-update-teacher'])){
            $update_id = $_POST['id_update_teacher'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $profile = $_FILES['profile']['name'];
            if(empty($profile)){
                $profile = $_POST['old_profile_teacher'];
            }else {
                $profile = date('d-m-y h-i-s')."-".$profile;
                $path = 'assets/profile/'.$profile;
                move_uploaded_file($_FILES['profile']['tmp_name'],$path);
            }
            if(!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($department) && !empty($profile)){
                $sql = "UPDATE `db_teacher` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`department`='$department',`profile`='$profile' WHERE `id`='$update_id'";
                $rs = $connection->query($sql);
                if($rs){
                    showSweetAlert("Update Success","Teacher Update Successfully","success");
                }
            }
            else {
                showSweetAlert("Update Error","Teacher Update Error","error");
            }
        }
    }
    updateTeacher();

    function removeTeacher(){
        global $connection;
        if(isset($_POST['btn-remove-teacher'])){
            $id = $_POST['remove_value'];

            $rs = $connection->query("DELETE FROM `db_teacher` WHERE `id`=$id");
            if ($rs) {
                showSweetAlert("Remove Success","Teacher Remove Successfully","success");
            }
        }
    }
    removeTeacher();
//get all teacher full name and id to display as option for adding student
    function getTeacherOption($teacher_id=0){
        global $connection;
        //get the last teacher on top of option
        $sql = "SELECT `id`, `first_name`, `last_name`, `gender` FROM  `db_teacher` ORDER BY `id` DESC";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)) {
            $prefix = $row['gender'] == "Male" ? "Mr. ": "Ms. ";
            $selected = $row['id'] == $teacher_id ? "selected" : "";
            echo '
                <option value="'.$row['id'].'" '.$selected.'>'.$prefix.$row['first_name'].' '.$row['last_name'].'</option>
            ';
        }
    }
//add student to database
    function createStudent(){
        global $connection;
        // print_r($_POST);

        if(isset($_POST['btn-submit-student'])){
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $date_of_birth = $_POST['date_of_birth'];
            $phone_number = $_POST['phone_number'];
            $teacher = $_POST['teacher'];
            $profile = $_FILES['profile']['name'];

            if(!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($email) && !empty($date_of_birth) && !empty($phone_number) && !empty($profile)) {

                $profile = rand(1,99999).'-'.$profile;
                $path = 'assets/profile/' . $profile;
                move_uploaded_file($_FILES['profile']['tmp_name'], $path); 
                
                $sql = "INSERT INTO `db_student`( `first_name`, `last_name`, `gender`, `email`, `date_of_birth`, `phone_number`, `profile`, `teacher_id`) 
                VALUES ('$first_name','$last_name','$gender','$email','$date_of_birth','$phone_number','$profile','$teacher')";

                $rs = $connection->query($sql);
                if ($rs) {
                    showSweetAlert("Create Success","Student Create Successfully","success");
                }
            }
            else {
                showSweetAlert('Create Error','Please input all Field','error');
            }
        }
    }

    createStudent();

    function getStudent(){
        global $connection;
        $sql = "SELECT `t_s`. *,`t_t`.`first_name` AS `t_first_name` ,`t_t`.`last_name` AS `t_last_name` FROM `db_student` AS `t_s` 
                INNER JOIN `db_teacher` AS `t_t` ON `t_s`.`teacher_id` = `t_t`.`id` ORDER BY `t_s`.`id` DESC";
        $rs = $connection->query($sql);

        while($row = mysqli_fetch_assoc($rs)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['first_name'].'</td>
                    <td>'.$row['last_name'].'</td>
                    <td>'.$row['gender'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['phone_number'].'</td>
                    <td>'.$row['t_first_name'].' '.$row['t_last_name'].'</td>
                    <td>'.$row['date_of_birth'].'</td>
                    <td>
                        <img src="assets/profile/'.$row['profile'].'" width="50px" height="auto">
                    </td>
                    <td>
                        <a href="updateStudent.php?id='.$row['id'].'" class="btn btn-warning" name="btn-update-student">Update</a>
                        <button class="btn btn-danger" remove-id="'.$row['id'].'" id="btn-delete-student" data-bs-toggle="modal" data-bs-target="#deleteStudent">Delete</button>
                    </td>
                </tr>
            ';
        }
    }

    function removeStudent(){
        global $connection;
        if(isset($_POST['btn-remove-student'])) {
            $id = $_POST['remove_value'];
        
            $rs = $connection->query("DELETE FROM `db_student` WHERE `id`= '$id'");
            if ($rs) {
                showSweetAlert("Remove Succes","Remove Student Successfully","success");
            }
        }
    }
    removeStudent();

    function updateStudent(){
        global $connection;
        if(isset($_POST['btn-update-student'])) {
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $date_of_birth = $_POST['date_of_birth'];
                $phone_number = $_POST['phone_number'];
                $teacher = $_POST['teacher'];
                $profile = $_FILES['profile']['name'];
                $update_id = $_POST['update_id'];

                if(empty($profile)){
                    $profile = $_POST['old_profile'];
                } else {
                    $profile = rand(1,99999).'-'.$profile;
                    $path = 'assets/profile/' . $profile;
                    move_uploaded_file($_FILES['profile']['tmp_name'], $path); 
                }
                
                if(!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($email) && !empty($date_of_birth) && !empty($phone_number) && !empty($profile)) { 
                    
                    $sql = "UPDATE `db_student` SET `first_name`='$first_name',`last_name`='$last_name',`gender`='$gender',`email`='$email',`date_of_birth`='$date_of_birth',`phone_number`='$phone_number',`profile`='$profile',`teacher_id`='$teacher' WHERE `id`=$update_id";
    
                    $rs = $connection->query($sql);
                    if ($rs) {
                        showSweetAlert("Update Success","Student Update Successfully","success");
                    }
                }
                else {
                    showSweetAlert('Update Error','Please input all Field','error');
                }
        }
    }
    updateStudent();
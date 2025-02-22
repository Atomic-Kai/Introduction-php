<?php
    include('sidebar.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tbl_supplier` WHERE `id`='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
?>
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="text-center"><u>Update Supplier</u></h1>
            <div class="col-6 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST">
                    <input type="hidden" name="id_update_supplier" value="<?php echo $id?>">
                    <label for="">Name</label>
                    <input type="text" name="name" value="<?php echo $row['name'] ?>" placeholder="Name" class="my-2 form-control" >
                    <label for="">Email</label>
                    <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="Email" class="my-2 form-control" >
                    <label for="">Phone_Number</label>
                    <input type="text" name="phone_number" value="<?php echo $row['phone_number'] ?>" placeholder="Phone Number" class="my-2 form-control" >
                    <label for="">Address</label>
                    <input type="text" name="address" value="<?php echo $row['address'] ?>" placeholder="Address" class="my-2 form-control" >
                    <button class="btn btn-success" name="btn-update-supplier">Submit</button>
                    <a href="viewSupplier.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
      </div>
<?php
    include('footer.php');
?>
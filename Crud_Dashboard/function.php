<?php

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db-product';

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
    function addSupplier() {
        global $connection;
        if(isset($_POST['btn-submit-supplier'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];

            if(!empty($name) && !empty($email) && !empty($phone_number) && !empty($address)){
                $sql = "INSERT INTO `tbl_supplier`( `name`, `email`, `phone_number`, `address`) VALUES ('$name','$email','$phone_number','$address')";

                $rs = $connection->query($sql);
                if($rs){
                    showSweetAlert("Add Success","Add Supplier Successfully","success");
                }
            }
            else{
                showSweetAlert("Add Error","Please Input all Field","error");
            }
        }
    }
    addSupplier();

    function getSupplier(){
        global $connection;
        $sql = "SELECT * FROM `tbl_supplier`";

        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
                <tr>
                      <td>'.$row['id'].'</td>
                      <td>'.$row['name'].'</td>
                      <td>'.$row['email'].'</td>
                      <td>'.$row['phone_number'].'</td>
                      <td>'.$row['address'].'</td>
                      <td>
                        <a href="updateSupplier.php?id='.$row['id'].'" class="btn btn-success">Update</a>
                        <button type="button" class="btn btn-danger" id="btn-delete-supplier" data-bs-toggle="modal" data-bs-target="#deleteSupplier">Delete</button>
                      </td>
                </tr>
            ';
        }
    }

    function updateSupplier(){
        global $connection;
        if(isset($_POST['btn-update-supplier'])){
            $update_id = $_POST['id_update_supplier'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            if(!empty($name) && !empty($email) && !empty($phone_number) && !empty($address)){
                $sql = "UPDATE `tbl_supplier` SET `name`='$name',`email`='$email',`phone_number`='$phone_number',`address`='$address' WHERE `id`='$update_id'";
                $rs = $connection->query($sql);
                if($rs){
                    showSweetAlert("Update Success","Update Supplier Successfully","success");
                }
            }
            else {
                showSweetAlert("Update Error","Update Supplier Error","error");
            }
        }
    }
    updateSupplier();

    function removeSupplier(){
        global $connection;
        if(isset($_POST['btn-remove-supplier'])){
            $id = $_POST['remove_value'];

            $rs = $connection->query("DELETE FROM `tbl_supplier` WHERE `id`='$id'");
            if ($rs) {
                showSweetAlert("Remove Success","Supplier Remove Successfully","success");
            }
        }
    }
    removeSupplier();

    function getSupplierOption($supplier_id=0){
        global $connection; 
        $sql = "SELECT `id`, `name` FROM  `tbl_supplier` ORDER BY `id` DESC";
        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)) {
            $seleted = $row['id'] == $supplier_id ? "seleted" : "";
            echo '
                <option value="'.$row['id'].'" '.$seleted.'>'.$row['name'].' </option>
            ';
        }
    }


    function addProduct(){
        global $connection;
        if(isset($_POST['btn-submit-product'])){
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $total = $price * $quantity;
            $supplier = $_POST['supplier'];
            $image = $_FILES['image']['name'];
            
            if(!empty($name) && !empty($category) && !empty($price) && !empty($quantity) && !empty($image)) {
                $image = rand(1,99999).'-'.$image;
                $path = 'assets/Image/' . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $path); 
                $sql = "INSERT INTO `tbl_product`( `name`, `category`, `price`, `qty`, `total`, `image`, `supplier_id`) 
                        VALUES ('$name','$category','$price','$quantity','$total','$image','$supplier')";

                $rs = $connection->query($sql);
                if ($rs) {
                    showSweetAlert("Add Success","Product Add Successfully","success");
                }
                else{
                    showSweetAlert("Add Error","Please Input all Field","error");
                }
            }
        }
    }
    addProduct();

    function getProduct(){
        global $connection;

        $sql = "SELECT `t_p`. *,`t_s`.`name` AS `t_name`FROM `tbl_product` AS `t_p` 
                INNER JOIN `tbl_supplier` AS `t_s` ON `t_p`.`supplier_id` = `t_s`.`id` ORDER BY `t_p`.`id` DESC";

        $rs = $connection->query($sql);
        while($row = mysqli_fetch_assoc($rs)){
            echo '
                <tr>
                      <td>'.$row['id'].'</td>
                      <td>'.$row['name'].'</td>
                      <td>'.$row['category'].'</td>
                      <td>'.$row['price'].'</td>
                      <td>'.$row['qty'].'</td>
                      <td>'.$row['total'].'</td>
                      <td>
                        <img src="assets/Image/'.$row['image'].'" width="100px" height="auto">
                      </td>
                      <td>'.$row['t_name'].'</td>
                      <td>
                        <a href="updateProduct.php?id='.$row['id'].'" class="btn btn-success">Update</a>
                        <button type="button" class="btn btn-danger" remove-id="'.$row['id'].'" id="btn-delete-product" data-bs-toggle="modal" data-bs-target="#deleteProduct">Delete</button>
                      </td>
                </tr>
            ';
        }
    }
    function removeProduct(){
        global $connection;
        if(isset($_POST['btn-remove-product'])) {
            $id = $_POST['remove_value'];
        
            $rs = $connection->query("DELETE FROM `tbl_product` WHERE `id`= '$id'");
            if ($rs) {
                showSweetAlert("Remove Succes","Remove Product Successfully","success");
            }
        }
    }
    removeProduct();

    function updateProduct(){
        global $connection;
        if(isset($_POST['btn-update-product'])){
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $total = $price * $quantity;
            $supplier = $_POST['supplier'];
            $image = $_FILES['image']['name'];
            $update_id = $_POST['update_id'];

            if(empty($image)){
                $image = $_POST['old_image'];
            } else {
                $image = rand(1,99999).'-'.$image;
                $path = 'assets/Image/' . $image;
                move_uploaded_file($_FILES['image']['tmp_name'], $path); 
            }
            
            if(!empty($name) && !empty($category) && !empty($price) && !empty($quantity) && !empty($image)) {
                $sql = "UPDATE `tbl_product` SET `name`='$name',`category`='$category',`price`='$price',`qty`='$quantity',`total`='$total',`image`='$image',`supplier_id`='$supplier' WHERE `id`='$update_id'";

                    $rs = $connection->query($sql);
                    if ($rs) {
                        showSweetAlert("Update Success","Product Update Successfully","success");
                    }
                else{
                    showSweetAlert("Update Error","Please Input all Field","error");
                }
            }
        }
    }
    updateProduct();
<?php

$hostname = 'localhost'; #127.0.0.1;
$username = 'root';
$password = '';
$database = 'employee';

$connection = new mysqli($hostname, $username, $password, $database);

// print_r($connection); //test connection

function orderProduct()
{
    global $connection;
    if (isset($_POST['btn-save'])) {
        $name = $_POST['name'];
        $email_address = $_POST['email_address'];
        $phone_number = $_POST['phone_number'];
        $location = $_POST['location'];
        $product = $_POST['product'];

        $sql = "INSERT INTO `productcrud`(`name`, `email_address`, `phone_number`, `location`, `product`)
                VALUES ('$name','$email_address','$phone_number','$location','$product')";

        $rs = $connection->query($sql); // execute query
        if($rs){
            echo'
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Success",
                            text: "Order Product Successfully",
                            icon: "success"
                        });
                    })
                </script>
            ';
        }
    }
}
orderProduct();

function getProduct()
{
    global $connection;

    $sql = "SELECT * FROM `productcrud`";

    $rs = $connection->query($sql);
    if ($rs) {
        while ($row = mysqli_fetch_assoc($rs)) {
            // print_r($row);
            echo '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td>' . $row['email_address'] . '</td>
                    <td>' . $row['phone_number'] . '</td>
                    <td>' . $row['location'] . '</td>
                    <td>' . $row['product'] . '</td>
                    <td class="d-flex justify-content-center">
                        <button type="button" id="btn-open-update" class="btn btn-outline-secondary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Update
                        </button>
                        <form action="" method="POST">
                            <input type="hidden" name="removeID" value="'.$row['id'].'">
                            <button class="btn btn-outline-danger mb-2" name="btn-delete"><i class="bi bi-trash3"></i>Delete</button>
                        </form>
                    </td>
                </tr>
            ';
        }
    }
}

function deleteProduct() {
    global $connection;
    if(isset($_POST['btn-delete'])) {
        $removeID = $_POST['removeID'];

        $sql = "DELETE FROM `productcrud` WHERE id = $removeID";

        $rs = $connection->query($sql);
    }
    if($rs){
            echo'
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Delete!",
                            text: "Delete Successfully",
                            imageUrl: "https://imgs.search.brave.com/YzoM0LNT5PwBFdh6J-yEvXHJ405cMtavwNv0YD4MlTc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9oaXBz/LmhlYXJzdGFwcHMu/Y29tL2htZy1wcm9k/L2ltYWdlcy9jdXRl/LXBob3Rvcy1vZi1j/YXRzLWV4Y2l0ZWQt/MTU5MzE4NDc3Ny5q/cGc_Y3JvcD0xeHc6/MXhoO2NlbnRlcix0/b3AmcmVzaXplPTk4/MDoq",
                            imageWidth: 400,
                            imageHeight: 200,
                            imageAlt: "Custom image"
                        });
                    })
                </script>
            ';
    }
}
deleteProduct();

function updateProduct(){
    global $connection;
    if(isset($_POST['btn-update'])){
        $name = $_POST['name'];
        $email_address = $_POST['email_address'];
        $phone_number = $_POST['phone_number'];
        $location = $_POST['location'];
        $product = $_POST['product'];
        $id = $_POST['updateID'];

        $sql = "UPDATE `productcrud` SET `name`='$name',`email_address`='$email_address',`phone_number`='$phone_number',`location`='$location',`product`='$product' WHERE `id`='$id'";
    
        $rs = $connection->query($sql); // execute query
        if($rs){
            echo'
                <script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: "Success",
                            text: "Order Update Successfully",
                            icon: "success"
                        });
                    })
                </script>
            ';
        }
    }
}
updateProduct();
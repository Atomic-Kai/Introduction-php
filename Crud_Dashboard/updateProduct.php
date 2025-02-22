<?php
    include('sidebar.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM `tbl_product` WHERE `id`='$id'";
    $rs = $connection->query($sql);
    $row = mysqli_fetch_assoc($rs);
?>
    <div class="container-fluid">
        <div class="col-12">
            <h1 class="text-center"><u>Update Product</u></h1>
            <div class="col-6 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="update_id" value="<?php echo $row['id']?>">
                    <input type="hidden" name="old_image" value="<?php echo $row['image']?>">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" value="<?php echo $row['name']?>" class="my-2 form-control" placeholder="Name">
                    <label for="">Category</label>
                    <input type="text" name="category" id="" value="<?php echo $row['category']?>" class="my-2 form-control" placeholder="Category">
                    <label for="">Price</label>
                    <input type="text" name="price" id="" value="<?php echo $row['price']?>" class="my-2 form-control" placeholder="Price">
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" id="" value="<?php echo $row['qty']?>" class="my-2 form-control" placeholder="Price">
                    <label for="">Supplier</label>
                    <select name="supplier" id="" class="form-select">
                        <?php 
                            getSupplierOption($row['supplier_id']);
                        ?>
                    </select>
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="my-2 form-control"> 
                    <div class="my-2">
                        <img src="assets/Image/<?php echo $row['image'] ?>" alt="" width="50px" height="100%">
                    </div>
                    <button class="btn btn-success" name="btn-update-product">Update</button>
                    <a href="viewProduct.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
      </div>
<?php
    include('footer.php');
?>
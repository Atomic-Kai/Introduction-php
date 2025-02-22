<?php
    include("sidebar.php");
?>

      <div class="container-fluid">
        <div class="col-12">
            <h1 class="text-center"><u>Add Product</u></h1>
            <div class="col-6 mx-auto bg-light p-4 mt-5" style="height:500px">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Name" class="my-2 form-control" >
                    <label for="">Category</label>
                    <input type="text" name="category" placeholder="Category" class="my-2 form-control" >
                    <label for="">Price</label>
                    <input type="text" name="price" placeholder="Price" class="my-2 form-control" >
                    <label for="">Quantity</label>
                    <input type="text" name="quantity" placeholder="Quantity" class="my-2 form-control" >
                    <label for="">Supplier</label>
                    <select name="supplier" id="" class="form-select">
                        <?php 
                            getSupplierOption();
                        ?>
                    </select>
                    <label for="">Image</label>
                    <input type="file" name="image" id="" class="my-2 form-control">
                    <button class="btn btn-success" name="btn-submit-product">Submit</button>
                </form>
            </div>
        </div>
      </div>
    
<?php
    include("footer.php");
?>
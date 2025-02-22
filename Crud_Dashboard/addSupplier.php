<?php
    include("sidebar.php");
?>

      <div class="container-fluid">
        <div class="col-12">
            <h1 class="text-center"><u>Add Supplier</u></h1>
            <div class="col-6 mx-auto bg-light p-4 mt-5">
                <form action="" method="POST">
                    <label for="">Name</label>
                    <input type="text" name="name" placeholder="Name" class="my-2 form-control" >
                    <label for="">Email</label>
                    <input type="text" name="email" placeholder="Email" class="my-2 form-control" >
                    <label for="">Phone_Number</label>
                    <input type="text" name="phone_number" placeholder="Phone Number" class="my-2 form-control" >
                    <label for="">Address</label>
                    <input type="text" name="address" placeholder="Address" class="my-2 form-control" >
                    <button class="btn btn-success" name="btn-submit-supplier">Submit</button>
                </form>
            </div>
        </div>
      </div>
    
<?php
    include("footer.php");
?>
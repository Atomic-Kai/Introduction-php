<?php
include('sidebar.php');

?>
<div class="page-inner">

  <div class="row">
    <div class="col-md-12">
      <div class="card card-round">
        <div class="card-header">
          <div class="card-head-row card-tools-still-right">
            <h4 class="card-title">View Product</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive table-hover table-sales text-center">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>id</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                      <th>Image</th>
                      <th>Supplier</th>
                      <th>Action</th>
                    </tr>
                    <?php 
                        getProduct();
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>
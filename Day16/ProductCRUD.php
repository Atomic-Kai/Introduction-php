
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
include('ProductFunction.php')
?>
    <div class="container bg-info my-2">
        <h1 class="text-center text-muted"><u>CRUD Product</u></h1>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Order
        </button>
        <table class="table table-hover table-info text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Phone Number</th>
                <th>Location</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
            <?php getProduct();
            ?>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ordering</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email_address" class="form-control" placeholder="Email" aria-label="Email">
                            </div>
                            <div class="col-12">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_number" class="form-control" placeholder="PhoneNumber" aria-label="PhoneNumber">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Location" aria-label="Location">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Product</label>
                                <input type="text" name="product" class="form-control" placeholder="Product" aria-label="Product">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btn-save" class="btn btn-success">Order</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
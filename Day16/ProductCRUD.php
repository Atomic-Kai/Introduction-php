
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
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-dark mb-2" id="btn-open-order" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Order
            </button>
            <form action="" class="d-flex ">
                <input type="text" class="form-control" placeholder="Search">
                <button class="btn btn-outline-success">Search</button>
            </form>
        </div>
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
                        <input type="hidden" name="updateID" id="updateID_txt">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name_txt" class="form-control" placeholder="Name" aria-label="Name">
                            </div>
                            <div class="col-12 mt-3">
                                <label for="">Email Address</label>
                                <input type="text" name="email_address" id="email_address_txt" class="form-control" placeholder="Email" aria-label="Email">
                            </div>
                            <div class="col-12">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number_txt" class="form-control" placeholder="PhoneNumber" aria-label="PhoneNumber">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Location</label>
                                <input type="text" name="location" id="location_txt" class="form-control" placeholder="Location" aria-label="Location">
                            </div>
                            <div class="col-6 mt-3">
                                <label for="">Product</label>
                                <input type="text" name="product" id="product_txt" class="form-control" placeholder="Product" aria-label="Product">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="btn-save" id="btn-save" class="btn btn-success">Order</button>
                    <button type="submit" name="btn-update" id="btn-update" class="btn btn-warning">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#btn-open-order').click(function(){
            $('#btn-update').addClass('d-none');
            $('#btn-save').removeClass('d-none');

            $('#name_txt').val('');
            $('#email_address_txt').val('');
            $('#phone_number_txt').val('');
            $('#location_txt').val('');
            $('#product_txt').val('');
            $('.modal-title').text('Ordering');
        });
        $('body').on('click','#btn-open-update',function(){
            $('#btn-save').addClass('d-none'); 
            $('#btn-update').removeClass('d-none'); 
            $('.modal-title').text('Update Ordering');

            var row = $(this).parents('tr');
            console.log(row);

            var id = $(this).parents('tr').find('td').eq(0).text();
            var name = $(this).parents('tr').find('td').eq(1).text();
            var email_address = $(this).parents('tr').find('td').eq(2).text();
            var phone_number = $(this).parents('tr').find('td').eq(3).text();
            var location = $(this).parents('tr').find('td').eq(4).text();
            var product = $(this).parents('tr').find('td').eq(5).text();

            console.log(id+" " +name+" "+email_address+" " +phone_number+" "+location+""+product);
            
            $('#updateID_txt').val(id);
            $('#name_txt').val(name);
            $('#email_address_txt').val(email_address);
            $('#phone_number_txt').val(phone_number);
            $('#location_txt').val(location);
            $('#product_txt').val(product);

        })
    });
</script>
</html>
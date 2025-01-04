<?php
    //isset() use for check if value set or not 
    //unset() use for unset value


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="col-6 mx-auto border border-2 p-4 text-black">
        <form action="" method="POST">
            <label for="">Number A</label>
            <input type="text" name="txt-a" placeholder="Value A" class="form-control my-2">
            <label for="">Number B</label>
            <input type="text" name="txt-b" placeholder="Value B" class="form-control my-2">
            <button class="btn btn-primary mt-2" name="btn-submit">
                submit
            </button>
        </form>
    </div>
    <div>
        <div class="col-8 mx-auto mt-3">
            <table class="table table-hover table-danger text-center">
                <tr>
                    <th>Number A</th>
                    <th>Number B</th>
                    <th>Maximun Number</th>
                </tr>
                <?php
                    if(isset($_POST['btn-submit'])){
                        $a = $_POST['txt-a'];
                        $b = $_POST['txt-b'];
                        $max_txt = '';
                        if($a>$b){
                            $max_txt = "A is Greeter than B";
                        }
                        elseif($a==$b){
                            $max_txt = "A is Equal to B";
                        }
                        else{
                            $max_txt = "B is Greeter than A";
                        }

                        echo '
                            <tr>
                                <td>'.$a.'</td>
                                <td>'.$b.'</td>
                                <td>'.$max_txt.'</td>
                            </tr>
                        ';
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
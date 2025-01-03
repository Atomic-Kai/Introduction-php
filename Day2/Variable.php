<?php
    $id = '101';
    $name = 'SuLi';
    $gender = 'Male';
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
    <div class="col-5 mx-auto mt-3">
        <table class="table table-hover table-primary text-center">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
            </tr>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $gender ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Member List</h2>

        <div class="row">
            <div class="col-md-12 head">
                <div class="float-right">

                <form method="POST" action="code.php">
                <button style="display:block;margin:auto" name="submit" type="submit" class="btn btn-primary">Submit</button>                  
                
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th><input type="checkbox" onclick="toggle(this)"> </th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Country</th>
                    </tr>
                </thead>
                <tbody>
                    <script>

                        function toggle(source) {
                            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i] != source)
                                    checkboxes[i].checked = source.checked;
                            }
                            
                        }
                    </script>
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'php-reg') or die('Unable To connect');
                    $show = "SELECT * from login_user";
                    $result = mysqli_query($con, $show);
                    if (mysqli_num_rows($result) > 0) {

                        while ($tbl = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><input type="checkbox" id="data" name="data[]" value="<?php echo $tbl['id']; ?>"></td>
                                <td><?php {
                                        echo  $tbl['id'];
                                    } ?></td>
                                <td><?php {
                                        echo $tbl['name'];
                                    } ?></td>
                                <td><?php {
                                        echo $tbl['email'];
                                    } ?></td>
                                <td><?php {
                                        echo $tbl['age'];
                                    } ?></td>
                                <td><?php {
                                        echo $tbl['gender'];
                                    } ?></td>
                                <td><?php {
                                        echo $tbl['country'];
                                    } ?></td>

                            </tr>

                            
                    <?php }
                    } else {
                        echo "NO record Found";
                    } ?>

                </tbody>

            </table>
            </form>
        </div>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
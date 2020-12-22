<?php 
require_once 'db.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
         <script src="https://kit.fontawesome.com/659cea9ef1.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <title>Locator</title>
    </head>
    <body>
        <?php 
        if (isset($_SESSION['message'])):  ?> 
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
        <?php            endif;?>
        <?php 
        $mysqli= new mysqli('localhost','root','','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT* FROM data") or die($mysqli->error);
        //pre_r($result);
        //pre_r($result->fetch_assoc());
        ?>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-pen-alt"></i> LOCATOR</h1></div>
            <div class="container">
        <div class="row justify-content-center">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()):
                 ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id']; ?>"
                           class="btn btn-info">Edit</a>
                           <a href="db.php?delete=<?php echo $row['id']; ?>"
                              class="btn btn-danger">Delete</a>
                    </td>
                </tr>
              <?php endwhile;
              ?>
        </table>
       </div>
        <?php
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
        <div class="row justify-text-center">
        <form action="db.php" method="POST">
            <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
            </div>
            <div class="form-group">
            <label>Location</label>
            <input type="text" name="location" class="form-control" value ="<?php echo $location; ?>" placeholder="Enter your location">
            </div>
            <div class="py-4 form-group">
                <button type="submit" name="save"class="btn btn-primary"name="save" >Save</button>
            </div>
        </form>
        </div>
        </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>

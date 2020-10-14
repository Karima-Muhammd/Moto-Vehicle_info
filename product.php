<?php require_once 'inc/navbar.php';
require_once 'db.php';
if(!isset($_SESSION['email']))
{
    header('location:index.php');

}
?>

<div class="container">
<div class="row">
    <div class="col-md-8 mt-5 offset-md-2">
        <h5  class="text-center" style="font-family: 'Agency FB',monospace; font-size: 35px">Rest Quantity in Stock </h5>

                <form action="" method="post">
                    <div class="form-group " >
                        <input  type="text" name="pro_name" class="form-control" placeholder="Enter Car or Bus  Motocycle name">
                    </div>
                    <button  type="submit" name="quan_btn" class="btn btn-primary mb-5"># of  Quantity In Stock </button>
                </form>
                <?php
                if(isset($_POST['quan_btn']))
                {
                    $name=$_POST['pro_name'];
                    if(!is_numeric($name)){
                        $query="select * from products where productName like '%$name%'";
                        $data=SelectFunc($query);
                        if($data==true)
                        {
                            ?>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantity</th>
                            </tr>
                            </thead>

                    <?php
                            foreach ($data as $datum )
                            {
                                ?>
                                <tbody>
                                <tr>
                                    <th scope="row"><?php echo $datum['productName']?></th>
                                    <td><?php echo $datum['quantityInStock']?></td>
                                </tr>
                                </tbody>

                                <?php
                            }
                            ?>
                        </table>
                        <?php
                        }
                        else
                            echo 'this Product not Exist';
                    }
                    else
                        echo "Enter String Value";


                }
                ?>
            </div>


</div>
</div>

<?php require_once 'inc/footer.php'?>
</body>
</html>




<?php
require_once 'inc/footer.php';
?>
<?php
require_once 'inc/navbar.php';
if(!isset($_SESSION['email']))
{
    header('location:home.php');

}
?>
<div class="container">
<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h5  class="text-center" style="font-family: 'Agency FB',monospace; font-size: 35px">What all orders For This Customer ?</h5>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter Customer ID to show his Orders" name="custmNo" class="form-control" >
            </div>
            <button name="btn_id" type="submit" class="btn btn-primary mb-4">Search By ID</button>

        </form>
        <?php

            if( isset($_POST['btn_id'])):


                $numb=$_POST['custmNo'];
                $query="SELECT customers.customerName as name, COUNT(orderNumber) as total FROM orders 
                JOIN customers where orders.customerNumber=customers.customerNumber and customers.customerNumber='$numb'
                GROUP by(customers.customerNumber)
                 ";
                $data=SelectFunc($query);
                if($data):?>
                        <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Total Orders</th>
                        </tr>
                        </thead>
                            <tbody>

                            <?php
                        foreach ($data as $datum):
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $datum['name']?></th>
                                    <td><?php echo $datum['total']?></td>
                                </tr>

                        <?php endforeach;
                        ?>
                            </tbody>
                        </table>
               <?php
                else:
                    $error_message="No Customer With this ID";
                endif;
                require_once 'function/message.php';
            endif;

       ?>



    </div>
</div>



<?php
require_once 'inc/footer.php';
?>


<?php
require_once 'inc/navbar.php';
if(!isset($_SESSION['email']))
{
    header('location:index.php');

}
?>

<div class="container">

<div class="row">
        <div class="col-md-8 offset-md-2 mt-5">
            <h2 class="text-center" style="font-family: 'Agency FB',fantasy; font-size: 35px">Best Sale</h2>
            <?php
            $query="SELECT products.productName as pro_name ,orderdetails.quantityOrdered as quantity, SUM(orderdetails.priceEach*orderdetails.quantityOrdered) as earn FROM products  
                JOIN orderdetails on orderdetails.productCode=products.productCode
                GROUP BY  pro_name
                order by  quantity  desc
                limit 10 ";
            $data=SelectFunc($query);
            if($data):?>
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Total Quantity</th>
                        <th scope="col">Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data as $datum):
                        ?>
                        <tr>
                            <th scope="row"><?php echo $datum['pro_name']?></th>
                            <td><?php echo $datum['quantity']?></td>
                            <td><?php echo $datum['earn']?></td>
                        </tr>


                    <?php endforeach;?>
                        </tbody>
                      </table>
                <?php endif;?>
        </div>

</div>








<?php
require_once 'inc/footer.php';
?>



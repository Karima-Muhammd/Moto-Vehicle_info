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
            <h2 class="text-center" style="font-family: 'Agency FB',fantasy; font-size: 30px">Search Customer</h2>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" placeholder="Enter Customer Name or ID" name="custmNo" class="form-control" >
                </div>
                <button name="btn_id" type="submit" class="btn btn-primary">Search By ID</button>
                <button name="btn_name" type="submit" class="btn btn-primary">Search By Name</button>
                <button name="btn_country"  type="submit" style="margin-left: 17%" class="btn btn-primary ">Search By Country</button>
                <select style="width:25%; display: inline-block" class="form-control" name="country">
                    <?php
                    $query="select distinct country from customers ";
                    $data=SelectFunc($query);
                    foreach ($data as $datum):?>
                        <option value="<?php echo $datum['country']?>"><?php echo $datum['country']?></option>
                    <?php endforeach; ?>
                </select>

            </form>



        </div>
        <div class="col-md-8 offset-md-2 mt-5">
            <?php
            if(isset($_POST['btn_id'])):

                $number=$_POST['custmNo'];
                if(is_numeric($number) and ifExist('customers','customerNumber',$number)):?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Customer Number</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Country</th>
                            <th scope="col">Credit Limit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query="select * from customers where customerNumber=$number";
                        $data=SelectFunc($query);
                        foreach ($data as $datum):
                            ?>
                            <tr>
                                <th scope="row"><?php echo $datum['customerNumber']?></th>
                                <td><?php echo $datum['customerName']?></td>
                                <td><?php echo $datum['phone']?></td>
                                <td><?php echo $datum['country']?></td>
                                <td><?php echo $datum['creditLimit']?></td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                <?php  else:
                    $error_message="Please ,Enter Valid ID";
                endif;
                require_once 'function/message.php';
            endif;
            ?>

            <?php
            if(isset($_POST['btn_country'])):
                $county=$_POST['country'];
                if(!empty($county)):

                    $query="select * from customers where country= '$county' order  by customerName ";
                    $data=SelectFunc($query);
                    if($data):?>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Customer Number</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Credit Limit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data as $datum):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $datum['customerNumber']?></th>
                                    <td><?php echo $datum['customerName']?></td>
                                    <td><?php echo $datum['phone']?></td>
                                    <td><?php echo $datum['creditLimit']?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>

                    <?php
                    endif;
                endif;
            endif;
            ?>

            <?php
            if(isset($_POST['btn_name'])):

                $name=$_POST['custmNo'];

                if( ifExist('customers','customerName',$name) && empty($name)==false):?>


                    <?php
                    $query="select * from customers where customerName like '%$name%' ";
                    $data=SelectFunc($query);
                    if($data):?>
                        <table class="table table-striped">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Customer Number</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Country</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($data as $datum):
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $datum['customerNumber']?></th>
                                    <td><?php echo $datum['customerName']?></td>
                                    <td><?php echo $datum['country']?></td>
                                </tr>
                            <?php endforeach;
                            ?>
                            </tbody>
                        </table>

                    <?php
                    else:
                        $error_message="No Customer With This Name";
                    endif;
                endif;
                require_once 'function/message.php';
            endif;
            ?>
        </div>

    </div>







    <?php
    require_once 'inc/footer.php';
    ?>
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
        <h2 class="text-center" style="font-family: 'Agency FB',fantasy; font-size: 35px">Who 's Manger ?! </h2>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" placeholder="Enter Employee ID or Name to show Who's Manger" name="custmNo" class="form-control" >
            </div>
            <button name="btn_id" type="submit" class="btn btn-primary mb-4">Search By ID</button>


        </form>

        <?php

        if(isset($_POST['btn_id'])):?>
            <?php
            $cn=$_POST['custmNo'];
            $query="SELECT  concat(emp.firstName,' ',emp.lastName) as Employee ,
                 concat(mang.firstName,' ',mang.lastName) as Manger FROM employees as emp
                  JOIN employees as mang WHERE emp.employeeNumber=mang.reportsTo and  (emp.employeeNumber = '$cn' or concat(emp.firstName,' ',emp.lastName)  like '%$cn%')  ";
            $data=SelectFunc($query);
            if($data):?>
                     <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Employee</th>
                        <th scope="col">Manger</th>
                    </tr>
                    </thead>
                      <?php  foreach ($data as $datum):
                            ?>
                            <tbody>
                            <tr>
                                <th scope="row"><?php echo $datum['Employee']?></th>
                                <td><?php echo $datum['Manger']?></td>
                            </tr>
                            </tbody>

                        <?php endforeach;
            else:
                $error_message= "There is'nt no employees with this ID or Name";
            endif;
            require_once 'function/message.php';
            endif;?>
        </table>
    </div>

</div>









<?php
require_once 'inc/footer.php';
?>

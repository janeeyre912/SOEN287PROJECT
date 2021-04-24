<?php
$message = '';  
$error = '';
$datafile = '../datas/orders.json';

 if(isset($_POST["add_order"]))  
 {  

      if(empty($_POST["date"]))  
      {  
           $error = "<label class='text-danger'>Enter Order Date</label>";  
      }  
      else if(empty($_POST["user"]))  
      {  
           $error = "<label class='text-danger'>Enter Order Name</label>";  
      }
      else  
      {  
           if(file_exists($datafile))  
           {  
                $orderfile = file_get_contents($datafile);
                $arrayOrder = json_decode($orderfile, true);
                $last_item = max($arrayOrder);
                $last_item_id = $last_item['id'];
                $orderElements = array(
                    'items' => array(
                    ),
                    'id' => ++$last_item_id,
                    'itemAmount' => "0",
                    'totalPrice' => "0",
                    'user' => $_POST['user'],
                    'date' => $_POST["date"]
                );  
                $arrayOrder[] = $orderElements;  
                $final_data = json_encode($arrayOrder);
                if(file_put_contents($datafile, $final_data))  
                {  
                     $message = "<label class='text-success'>File added Successfully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  



?>
<!DOCTYPE html>  
<html>
    <body>
        <div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?orders">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order information</li>
                </ol>
            </nav>
            <!--  Order information-->
            <h4>add order</h4>
            <form class="addorder_info" action="" method="post" enctype="multipart/form-data">
                <?php   
                     if(isset($error))  
                     {  
                          echo $error;
                     }  
                ?>  
                <div class="form-row">

                    <div class="col-lg-4 mb-3">
                        <label for="orderdate">Order Date</label>
                        <input type="text"  name="date" placeholder="date"  required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-lg-4 mb-3">
                        <label for="orderby">Order by</label>
                        <input type="text" name="user" placeholder="user" required>
                    </div>
                </div>

                <!--    confirm button-->
                <div class="form-row">
                    <div class="confirm_button col-lg-12">
                        <input type="submit" name="add_order" class="btn btn-dark pull-right" value="Add Order" >
                    </div>
                </div>
                    <?php  
                        if(isset($message))  
                        {  
                            echo $message;  
                        }  
                    ?>  
            </form>
        </div>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <title>TSF BANKING</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/logo_small.png" type="image/png">
</head>
<body>
    <div class="header">
        <div class="container">

            <div class="navbar">
                <div class="logo cursor">
                  <a href="index.php"><img src="images/logo_small.png" width="50px" height="70px"></a>
                </div>
                <nav>
                    <ul class="design" id="Menu">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="view.php">View Customers</a></li>
                      <li><a href="history.php">Transactions</a></li>
                      <li><a href="https://www.thesparksfoundationsingapore.org/contact-us/">Contact Us</a></li>
                    </ul>
                </nav> 
             <img src="images/menu.png" class="icon" onclick="toggle()" >
            </div>
            <hr>
            <hr>
            <br>

            <div class="new">
                <h1>Complete Your Transaction!!!!</h1>
            </div>
        </div>
    
            <?php
                include 'connection.php';
                if (isset($_REQUEST['c_id'])) {
                $id = $_GET['c_id'];
                $sql = "SELECT * FROM  clients WHERE c_id=$id";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                echo "Query is not correct : " . $sql . "<br />" . mysqli_error($connect);
                }
                $rows = mysqli_fetch_assoc($result);
                }
            ?>
        
        <form method="post" name="tcredit" class="tabletext"><br>
            <div class="contain">
                <table>
                    <tr>
                        <th class="text">Client Id</th>
                        <th class="text">Name</th>
                        <th class="text">E-mail</th>
                        <th class="text">Bank Balance</th>
                    </tr>
                    <tr>
                          <td class="centre"><?php echo (isset($rows['c_id']) ? $rows['c_id'] : ''); ?></td>
                          <td class="centre"><?php echo (isset($rows['c_name']) ? $rows['c_name'] : ''); ?></td>
                          <td class="centre"><?php echo (isset($rows['c_email']) ? $rows['c_email'] : ''); ?></td>
                          <td class="centre"><?php echo (isset($rows['c_balance']) ? $rows['c_balance'] : ''); ?></td>
                    </tr>
                </table>
            </div>

            <div class="container">
              <br>
              <br>
              <br>
              <label for="to" class="para">Transfer To :-</label>
              <br>
                <select id="to" name="to" class="form" required>
                    <option value="" disabled selected>Choose</option>
                    <?php
                    include 'connection.php';
                    $id = $_REQUEST['c_id'];
                    $sql = "SELECT * FROM clients where c_id!=$id";
                    $result = mysqli_query($connect, $sql);
                    if (!$result) {
                        echo "Query is not correct " . $sql . "<br />" . mysqli_error($connect);
                    }
                    while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $rows['c_id']; ?>">

                            <?php echo $rows['c_name']; ?> (Current Balance:
                            <?php echo $rows['c_balance']; ?> )
                        </option>
                    <?php
                    }
                    ?>
                </select>
                <br>
                <br>
                <label for="amount" class="para">Amount :-</label>
                <input type="number" class="form1" name="amount" id="amount" placeholder="Enter the required Amount" required>
                <div class="wrapper">
                  <button class="btn mid" name="submit" type="submit"><p class="complete">Transfer Now</p></button>
                </div>
                <br>
            </div>
        </form>
    </div>
    
    <div class="footer">
     <p class="bottom">Copyright &copy;Designed By SARTHAK  RAJPUT</p>
    </div>

    <script>
      var Items = document.getElementById("Menu");

      function toggle(){
   
      if(Menu.style.maxHeight == "0px")
       {
        Menu.style.maxHeight = "200px";
       }
      else{
         Menu.style.maxHeight = "0px";
       }
      } 
    </script>
    
</body>
</html>

<?php
include 'connection.php';
if (isset($_POST['submit'])) {

    $from = $_GET['c_id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * FROM clients WHERE c_id=$from";
    $query = mysqli_query($connect, $sql);
    $sql_1 = mysqli_fetch_array($query); 

    
    if (($amount) < 0) {
        echo '<script>';
        echo 'swal("Error!", "", "error")';  
        echo '</script>';
    }
    else if ($amount > $sql_1['c_balance']) {
        echo '<script>';
        echo 'swal("Error!", "Insufficient Balance!", "warning")';
        echo '</script>';
    }
    else if ($amount == 0) {

        echo "<script>";
        echo 'swal("Error!", "", "error")';
        echo "</script>";
    }
    else{
        $sql = "SELECT * FROM clients WHERE c_id=$to";
        $query = mysqli_query($connect, $sql);
        $sql_2 = mysqli_fetch_array($query);

        $sender = $sql_1['c_name'];
        $receiver = $sql_2['c_name'];

        $balance = $sql_1['c_balance'] - $amount;
        $sql = "UPDATE clients SET c_balance=$balance WHERE c_id=$from";
        $update = mysqli_query($connect,$sql);

        $balance = $sql_2['c_balance'] + $amount;
        $sql = "UPDATE clients SET c_balance=$balance WHERE c_id=$to";
        $update_1 = mysqli_query($connect,$sql);


        $sql = "INSERT INTO transaction(t_sender,t_receiver,t_amount) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($connect, $sql);

        if ($query) {
?>
        
        <script>
           swal({
                title: "Done!",
                text: "Transaction completed!",
                icon: "success",
            }).then(function(){
              window.location='history.php';
            });
        </script>
    <?php
        }
        
    }

}
?>



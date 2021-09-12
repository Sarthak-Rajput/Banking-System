<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    

            <div class="row">
                <div class="col">
                  <h1>Welcome to the <br>TSF Bank</h1>
                  <p>Taking Banking Technology to Common Man, Your Tech-friendly bank, <br> Your Own Bank.....</p>
                  <a href="view.php" class="btn">Transfer Money &#8594</a>
            
                  <a href="history.php" class="btn">Transaction History &#8594</a>
                </div>
                <div class="col">
                <img src="images/image1.png">
                </div>
            </div>
        </div>
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
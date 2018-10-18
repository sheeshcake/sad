<?php
    session_start();
    $_SESSION['run'] = false;
    include 'connect.php';
    if(!isset($_SESSION['name'])){
        header("location: login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>FUCKING POS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="pos_style.css" />
    <link rel="stylesheet" type="text/css" href="button_style.css" />
    <script type="text/javascript" src="jquery-3.3.1.js"></script>
    <link rel="stylesheet" type="text/css" href="inputbox_style.css" />
    <script src="pos_script.js"></script>
</head>
<body>



<!--     side nav  -->


    <div id="mySidenav" class="sidenav"style="margin-top: 77px;">
      <center>
        <button onclick="closeNav()">x</button>
        <h2 style="color: white;">SECTIONS</h2>
        <a href="#" onclick="getProducts()">Candies</a>
        <a href="#">Canned Goods</a>
        <a href="#">Cleaning</a>
        <a href="#">Office</a>
        <h6 style="color: white;">By: HalfByte</h6>
      </center>
    </div>
    <div>
        <ul>
            <li><a href="main_menu.php" style="padding: 0;"><img src="logo.png"></a></li>
            <li id="menu"><a href="javascript:void(0)" onclick="openNav()">Sections</a></li>
            <li id="inventory"><a href="inventory.php">Inventory</a></li>
            <li style="float: right;"><a href="logout.php">Logout</a></li>
            <li style="float: right;"><a href="history.php"><?php echo $_SESSION['name']; ?></a></li>
        </ul>
    </div>

<!--     main POS ui -->
    <div id="overlay" class="overlay">
        <center>
            <form action="javascript: off();">
                <input type="number " id="quantity" placeholder="Input Quantity" autofocus>
            </form>
            <button class="btn" onclick="javascript:off('overlay');"><span>GO</span></button>
        </center>
    </div>
    <!-- <div id="delete" class="delete">
        <center>
            <form action="javascript: off();">
                <input type="text " id="delete" placeholder="Input Product Name or ID" autofocus>
            </form>
            <button class="btn" onclick="javascript:off('delete');"><span>GO</span></button>
        </center>
    </div> -->
    <div class="grid-container" id="main"> 
        <div class="item1" id="purchased" style="font-size: 20px;">
            <table class="table" id="table" border="0" style="width: 400px;">
                <thead>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </thead>
                <tfoot>
                    <th colspan="4">Total</th>
                    <th id="total">
                    </th>
                </tfoot>
            </table>
        </div>
        <div class="item2" id="prod">
                <?php
                    $sql = 'SELECT * from products';
                    $query = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($query) > 0){
                        if($_SESSION['run'] == false){
                            while ($row  = mysqli_fetch_array($query)) {
                                // $quantity = (string)$row['product_quanity'];
                                echo "<script>getProducts('". $row['product_name'] ."', '". $row['product_price']."', '". $row['product_id']."' , " . $row['product_quanity']. ");</script>";
                                }
                                $_SESSION['run']= true;
                        }
                    }
                    else{
                        echo "Empty Database!";
                    }
                ?>
        </div>
        <div class="item3">
            <button style="width: 100%" onclick ="javascript: change(0); on();">
                Done Transaction
            </button>
            <button style="width:100%;" onclick="javascript: change(2); on();">
                Delete item
            </button>
        </div>
        <div class="item4">
            <input size="100" type="text" oninput="searchProduct()" name="search" id="search" placeholder="Search..(name or id)">
        </div>
    </div>


</body>
</html>
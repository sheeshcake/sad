<?php
    session_start();
    include 'connect.php';
    if(isset($_SESSION['name'])){
    }
    else{
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
    <link rel="stylesheet" type="text/css" href="inventory_style.css" />
    <link rel="stylesheet" type="text/css" href="inputbox_style.css" />
    <script src="inventory_script.js"></script>
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
            <li id="inventory"><a href="pos.php">POS</a></li>
            <li style="float: right;"><a href="logout.php">Logout</a></li>
            <li style="float: right;"><a href="history.php"><?php echo $_SESSION['name']; ?></a></li>
        </ul>
    </div>

<!--     main INVENTORY ui -->
    <div id="overlay" class="overlay" onclick="off('overlay')">
        <center>
            <div class="prompt" style="padding: 2%;">
                <h3>Save Changes?</h3>
                <button>Yes</button><button>No</button>
            </div>
        </center>
    </div>
    <div id="add" class="add">
        <center>
            <div class="prompt" style="padding: 2%;>
                <button onclick="off('add')">close</button>
                add
            </div>            
        </center>
    </div>
    <center>
        <div class="grid-container"> 
            <div class="item1" id="menu" style="font-size: 20px;">
                <center>
                    <button class="btn" onclick="on('add')">Add Product</button><br>
                    <button class="btn">Button2</button><br>
                    <button class="btn">Button3</button><br>
                    <button class="btn">Button4</button><br>
                    <button class="btn">Button5</button><br>
                </center>
            </div>
            <div class="item2" id="products" style="width: 100%;">
              <table class="table" id="table" border="0">
                    <thead>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                    </thead>
                    <?php
                        $sql = 'SELECT * from products';
                        $query = mysqli_query($conn, $sql);
                        while ($row  = mysqli_fetch_array($query)) {
                            echo "<script>getProducts('" . $row['product_name'] . "', '" . $row['product_price'] . "', '" . $row['product_id'] . "' , '" . $row['product_quanity'] . "');</script>";
                        }
                    ?>
                    <tfoot>
                        <th>Add Product:</th>
                        <th onfocusout="on('add')" contenteditable="true"></th>
                        <th onfocusout="on('add')" contenteditable="true"></th>
                        <th onfocusout="on('overlay')" contenteditable="true"></th>
                    </tfoot>
                </table>
            </div>
            <div class="item4">
                <form method="POST" action="search.php">
                    <input size="80" type="text" name="search" placeholder="Search..">
                </form>
            </div>
        </div>
    </center>


</body>
</html>
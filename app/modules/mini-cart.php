<?php    
    //////////////////////////
    //  CART ITEMS DISPLAY  //
    //////////////////////////
    $cartDisplayList = ""; // Initialize the variable for displaying a list of items in the cart
    $cartDisplayNone = ""; // Initialize the variable for displaying message when cart is empty
    $cartDisplayLink = ""; // Initialize the variable for displaying the link to the cart page

    if(isset($_SESSION['cart'])) {
        $sqlCart = "SELECT * FROM mmi_products WHERE id IN (";
            foreach($_SESSION['cart'] as $id => $value) {
                $sqlCart .= $id . ",";
            }
            $sqlCart = substr($sqlCart, 0, -1) . "
        ) ORDER BY id ASC";
        $queryCart = mysql_query($sqlCart);  
        while($row = mysql_fetch_array($queryCart)){
            $id = $row["id"];
            $artist = $row["artist"];
            $title = $row["title"];
            $cat_num = $row["cat_num"];
            $description = $row["description"];
            $img = $row["img"];
            $content = $row["content"];
            $physical = $row["physical"];
            $digital = $row["digital"];
            $third_party = $row["third_party"];
            $cartDisplayList .='
                <p class="cart-sidebar">' . $title . ' ' . $_SESSION['cart'][$id]['format'] . '<span class="small"> x ' . $_SESSION['cart'][$id]['quantity'] . '</span></p>
            ';
        }
    } else {
        $cartDisplayNone .='
            <p class="cart-sidebar">Your cart is empty.</p>
        ';
    }
    if(!empty($cartDisplayList)) {
        $cartDisplayLink .='
            <a href="index.php?page=cart">Go to Cart</a>
        '; 
    } else {
        $cartDisplayLink .= '
            <p class="cart-sidebar">Add something to the cart!</p>
        ';
    }
?>

<h2>Your Cart</h2>
<div class="well well-lg"> 
    <div class="row">
        <div class="col-sm-12">
            <?php print "$cartDisplayList"; ?>
            <?php print "$cartDisplayNone"; ?>
            <?php print "$cartDisplayLink"; ?>
        </div>
    </div>
</div>
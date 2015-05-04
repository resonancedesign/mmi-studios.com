<?php
    require_once('app/config.php');
    /////////////////////////
    //  VIEW CART DISPLAY  //
    /////////////////////////
    $fullCartDisplay = ""; // Initialize the variable for displaying an itemized shopping cart
    $subTotalDisplay = ""; // Initialize the variable for displaying the sub total
    $stripeButtonDisplay = ""; // Initialize the variable for displaying the Strip button
    $shippingList = ""; // Initialize the variable for displaying shipping options

    // Add or remove from the quantity of an item already in the cart
    if(isset($_POST['submit'])) {
        foreach ($_POST as $key => $value) {
            $key = explode("-",$key);
            $key = end($key);
            $key = explode("submit", $key);
            $key = end($key);
            if ($_POST['quantity-'.$key] <= 0) {
                unset($_SESSION['cart'][$key]);
            } else {
                $_SESSION['cart'][$key]['quantity'] = $value;
            }
        }
    }
    // Query of items stored in session variables to build itemized cart view
    $sqlViewCart = "SELECT * FROM mmi_products WHERE id IN (";
        foreach($_SESSION['cart'] as $id => $value) {
            $sqlViewCart .= $id . ",";
        }
        $sqlViewCart = substr($sqlViewCart, 0, -1) . "
    ) ORDER BY cat_num ASC";
    $queryViewCart = mysql_query($sqlViewCart);
    // Make sure total price always start at 0
    $totalPrice = 0;
    if(empty($queryViewCart)) {
        // Displayed when the cart is empty
        $fullCartDisplay .= '
            <p class="cart-sidebar">You must add items to the cart before you can view anything in the shopping cart.</p>
        ';
    } else {
        while($row = mysql_fetch_array($queryViewCart)){
            $id = $row["id"];
            $title = $row["title"];
            $cat_num = $row["cat_num"];
            $price = $row["price"];
            // Calculate the price totals
            $subTotal = $_SESSION['cart'][$row['id']]['quantity']*$_SESSION['cart'][$id]['price'];
            $totalPrice += $subTotal;
            // Displayed when items are in the cart
            $fullCartDisplay .='
                <tr>
                    <td>' . $title . ' ' . $_SESSION['format'] . '</td>
                    <td><input type="text" class="form-control" name="quantity-' . $id . '" value="' . $_SESSION['cart'][$id]['quantity'] . '" /></td>
                    <td>$' . $_SESSION['cart'][$id]['price'] . '</td>
                    <td>$' . $_SESSION['cart'][$id]['quantity']*$_SESSION['cart'][$id]['price'] . '</td>
                </tr>
            ';
        }
    }
    // Display the subtotal
    if(!empty($totalPrice)) {
        $subTotalDisplay .= '
            $' . $totalPrice . '
        ';
    } else {
        $subTotalDisplay .= '
            Nothing in your cart!
        ';
    }
    // Removes decimal in total to calculate proper integer for Stripe
    $removeDecimal = array(".");
    $stripeTotal = str_replace($removeDecimal, "", $totalPrice);

    // Display the Stripe payment button when items are in cart
    if (!empty($queryViewCart)) {
        $stripeButtonDisplay .= '
            <div class="form-group">
                <label for="stripeButton" class="col-sm-2"></label>
                <div class="col-sm-8">
                    <script 
                        src="https://checkout.stripe.com/checkout.js" 
                        class="stripe-button"
                        data-key="' . $stripe['publishable_key'] . '"
                        data-amount="' . $stripeTotal . '"
                        data-name="Gross National Produkt"
                        data-description="Your Cart Total ($' . $totalPrice . ')"
                        data-currency="usd"
                        data-label="Checkout - $' . $totalPrice . '">
                    </script>
                    <input type="hidden" name="stripeTotal" value="' . $stripeTotal . '">
                    <input type="hidden" name="totalPrice" value="' . $totalPrice . '">
                </div>
            </div>
        ';
    } else {
        // Display link to Produkts page if no items are in the cart
        $stripeButtonDisplay .= '
            <p>Browse the <a href="index.php?page=produkts">Produkts</a> section to add items to the cart.</p>
        ';
    }
    ////////////////////////////
    //  ADD SHIPPING TO CART  //
    ////////////////////////////
    if(isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        $sqlAdd = "SELECT * FROM mmi_products WHERE id={$id}";
        $queryAdd = mysql_query($sqlAdd);

        if(mysql_num_rows($queryAdd) != 0) {
            $rowAdd = mysql_fetch_array($queryAdd);
            $_SESSION['cart'][$rowAdd['id']] = array("quantity" => 1, "price" => $rowAdd['price']);
        } else {
            $message = "This product ID is invalid.";
        }
    }

    ////////////////////////
    //  SHIPPING OPTIONS  //
    ////////////////////////
    $sqlShipping = mysql_query("SELECT * FROM mmi_products WHERE category = 'Shipping'");

    $shippingList = ""; // Initialize the variable to display the list of products

    while($row = mysql_fetch_array($sqlShipping)){
        $id = $row["id"];
        $title = $row["title"];
        $price = $row["price"];
        $shippingList .='
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="shippingSelector" class="col-sm-3">Choose Shipping:</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="shippingSelector" onchange="if (this.value) window.location.href=this.value">
                            <option value="">Select One...</option>
                            <option value="#">USPS First Class Domestic - Included</option>
                            <option value="index.php?page=products&action=add&id=' . $id . '">USPS First Class International - $' . $price . '</option>
                        </select>
                    </div>
                </div>
            </form>
        ';
    }
?>

<div class="col-sm-12">
    <h3>View Cart</h3>
    <div class="table-responsive">
        <!-- Cart itemization and quantity update form -->
        <p>To remove an item from the cart, change it's quantity to 0.</p>
        <form method="post" action="index.php?page=cart" role="form">
            <table class="table">
                <thead class="orange-group">
                    <tr>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price Per Unit</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php print "$fullCartDisplay"; ?>
                    <tr class="orange-group">
                        <td></td>
                        <td></td>
                        <td><strong>Subtotal:</strong></td>
                        <td><strong><?php print "$subTotalDisplay"; ?></strong></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="submit" class="btn btn-primary pull-right">Update Cart</button>
        </form>
        <?php print "$shippingList"; ?>
        <!-- Stripe charge form -->
        <h4>Shipping Address</h4>
        <p><span class="orange-group">*</span> Denotes a required field.</p>
        <form action="index.php?page=charge" method="POST" class="form-horizontal" role="form" id="shipping-form" >
            <div class="form-group">
                <label for="customerName" class="col-sm-2">Full Name <span class="orange-group">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customerName" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
            </div>
            <div class="form-group">
                <label for="customerEmail" class="col-sm-2">Email <span class="orange-group">*</span></label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="customerEmail" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
            </div>
            <div class="form-group">
                <label for="customerAddress1" class="col-sm-2">Address 1 <span class="orange-group">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customerAddress1" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
            </div>
            <div class="form-group">
                <label for="customerAddress2" class="col-sm-2">Address 2</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customerAddress2" />
                </div>
            </div>
            <div class="form-group">
                <label for="customerCity" class="col-sm-2">City <span class="orange-group">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="customerCity" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
            </div>
            <div class="form-group">
                <label for="customerState" class="col-sm-2">State/Province <span class="orange-group">*</span></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="customerState" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
                <label for="customerZip" class="col-sm-2">Postal Code <span class="orange-group">*</span></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="customerZip" data-parsley-group="reqFields" data-parsley-trigger="change" required />
                </div>
            </div>
            <div class="form-group">
                <label for="customerCountry" class="col-sm-2">Country <span class="orange-group">*</span></label>
                <div class="col-sm-8">
                    <select class="form-control" name="customerCountry">
                        <?php include_once('app/includes/content/data/country_codes.php') ?>
                    </select>
                </div>
            </div>
            <div class="invalid-form-error-message"></div>
            <?php print "$stripeButtonDisplay"; ?>
        </form>
    </div>
</div>
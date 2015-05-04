<?php
    $stripeTotal = $_POST['stripeTotal'];
    $totalPrice = $_POST['totalPrice'];

    // Initialize variables for error messages
    $nameErr = $emailErr = $addressErr = $cityErr = $stateErr = $zipErr = $countryErr = "";

    // Server side validation and error messages
    if(empty($_POST['customerName'])) {
        $nameErr = "Name is required<br>";
    } else {
        $customerName = $_POST['customerName'];
    }
    if(empty($_POST['customerEmail'])) {
        $emailErr = "Email is required<br>";
    } else {
        $customerEmail = $_POST['customerEmail'];
    }
    if(empty($_POST['customerAddress1'])) {
        $addressErr = "Address is required<br>";
    } else {
        $customerAddress1 = $_POST['customerAddress1'];
    }
    if(empty($_POST['customerCity'])) {
        $cityErr = "City is required<br>";
    } else {
        $customerCity = $_POST['customerCity'];
    }
    if(empty($_POST['customerState'])) {
        $stateErr = "State/Province is required<br>";
    } else {
        $customerState = $_POST['customerState'];
    }
    if(empty($_POST['customerZip'])) {
        $zipErr = "Postal code is required<br>";
    } else {
        $customerZip = $_POST['customerZip'];
    }
    if(empty($_POST['customerCountry'])) {
        $countryErr = "Country is required<br>";
    } else {
        $customerCountry = $_POST['customerCountry'];
    }
    $customerAddress2 = $_POST['customerAddress2'];

    // Format error messages and display them if any errors were found
    if(!empty($nameErr) || !empty($emailErr) || !empty($addressErr) || !empty($cityErr) || !empty($stateErr) || !empty($zipErr) || !empty($countryErr)) {
        echo '
            <h1>Errors!<small class="orange-group"> Your card was not charged...</small></h1>
            <h2>The following errors were detected:</h2>
            <p class="orange-group">' . $nameErr . $emailErr . $addressErr . $cityErr . $stateErr . $zipErr . $countryErr . '</p>
            <p>Return to the <a href="index.php?page=cart">cart</a> to correct these errors and finish submitting your order.</p>
            </div>
        ';
        include_once('app/includes/layout/sidebar.php');
        echo '</div></div>';

        include_once('app/includes/layout/footer.php');
        echo '</div></div></div></div>';
        include_once('app/includes/content/data/javascripts.php');
        echo '
            </body>
            </html>
        ';
        exit();
    }

    // Stripe variables
    $token = $_POST['stripeToken'];

    $customer = Stripe_Customer::create(array(
        'email' => $customer->email,
        'card'  => $token
    ));

    $charge = Stripe_Charge::create(array(
        'customer'        => $customer->id,
        'amount'          => $stripeTotal,
        'currency'        => 'usd',
        'shipping'        => array(
            'name'    => $customerName,
            'address' => array(
                'line1'       => $customerAddress1,
                'line2'       => $customerAddress2,
                'city'        => $customerCity,
                'state'       => $customerState,
                'postal_code' => $customerZip,
                'country'     => $customerCountry
            )
        )
    ));

    $orderSummary = ""; // Initialize the variable for displaying the successful order summary

    // Format the subtotal
    $subTotalDisplay .= '
        $' . $totalPrice . '
    ';

    // Query of items stored in session variables to build order summary
    $sqlViewCart = "SELECT * FROM mmi_products WHERE id IN (";
        foreach($_SESSION['cart'] as $id => $value) {
            $sqlViewCart .= $id . ",";
        }
        $sqlViewCart = substr($sqlViewCart, 0, -1) . "
    ) ORDER BY cat_num ASC";
    $queryViewCart = mysql_query($sqlViewCart);
    // Make sure total price always start at 0 before calculating final total
    $totalPrice = 0;
    while($row = mysql_fetch_array($queryViewCart)){
        $id = $row["id"];
        $title = $row["title"];
        $cat_num = $row["cat_num"];
        $price = $row["price"];
        // Calculate the price totals
        $subTotal = $_SESSION['cart'][$row['id']]['quantity']*$_SESSION['cart'][$id]['price'];
        $totalPrice += $subTotal;
        // Build the itemized list for the order summary
        $orderSummary .='
            <tr>
                <td>' . $title . ' ' . $_SESSION['format'] . '</td>
                <td>' . $_SESSION['cart'][$id]['quantity'] . '</td>
                <td>$' . $_SESSION['cart'][$id]['price'] . '</td>
                <td>$' . $_SESSION['cart'][$id]['quantity']*$_SESSION['cart'][$id]['price'] . '</td>
            </tr>      
        ';
    }
    // Create an entry in orders table of the database
    require_once('app/connect-store-mysqli.php');

    $query = mysqli_query($myConnection, "INSERT INTO mmi_orders (customerName, customerEmail, customerAddress1, customerAddress2, customerCity, customerState, customerZip, customerCountry, customerStripe, orderSummary) 
        VALUES('$customerName','$customerEmail','$customerAddress1','$customerAddress2','$customerCity','$customerState','$customerZip','$customerCountry','$customer->id','$orderSummary')") or die (mysqli_error($myConnection));

    // Format address line 2 for order summary
    if (!empty($customerAddress2)) {
        $customerAddress2 = $customerAddress2 . '<br>';
    } else {
        $customerAddress2 = '';
    }

    // Build submitted shipping address to display at end of order summary
    $addressDisplay .='
        <h4>The items listed above will be shipped to the following location:</h4>
        ' . $customerName . '<br>
        ' . $customerAddress1 . '<br>
        ' . $customerAddress2 . '
        ' . $customerCity . ', ' . $customerState .' ' . $customerZip . '<br>
        ' . $customerCountry . '<br>
    ';

    // Display order completion page
    echo '
        <h1>Your Order Summary</h1>
        <h2>Successfully charged $' . $totalPrice . '</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Quantity</th>
                        <th>Price Per Unit</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
    ';
    print "$orderSummary";
    echo '
                    <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Subtotal:</strong></td>
                        <td><strong>' . $subTotalDisplay . '</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    ';
    print "$addressDisplay";
    
    // Unset session variables to empty cart
    unset($_SESSION['cart']);
?>
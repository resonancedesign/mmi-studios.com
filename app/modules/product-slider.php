<?php
    //////////////////////////////
    //  PRODUCT SLIDER DISPLAY  //
    //////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM mmi_products WHERE featured = 'yes' ORDER BY id DESC");
    $productsSlider = ""; // Initialize the variable to display the produkt slider
    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $category = $row["category"];
        $artist = $row["artist"];
        $title = $row["title"];
        $cat_num = $row["cat_num"];
        $description = $row["description"];
        $img = $row["img"];
        $content = $row["content"];
        $price = $row["price"];
        $third_party = $row["third_party"];
        $productsSlider .='
            <li>
                <div class="products-side">
                    <a href="javascript:RequestContent(' . $content . ')" class="product-button">
                        <img src="imgs/albums/' . $img . '" alt="' . $title . '" class="img-responsive img-thumbnail center-block product-side">
                    </a>
                    <a href="javascript:RequestContent(' . $artist_page . ')" class="product-button">
                        <h5 class="product-items">' . $artist . '</h5>
                    </a>
                    <a href="javascript:RequestContent(' . $content . ')" class="product-title">
                        <h5>' . $title . '</h5>
                    </a>
                    <a href="index.php?page=products&action=add&id=' . $id . '" class="btn btn-mmi btn-block pull-right">Add To Cart - $' . $price . ' (' . $category . ')</a>
                    <h4 class="product-items text-center">Or Via 3rd Party:</h4>
                    <p class="text-center" style="font-size: 1.1em;">' . $third_party . '</p>
                </div>
            </li>
        ';
    }
?>
<!-- product slider -->
<h2>Products</h2>
<div class="ajax-loader">
    <img src="imgs/ajax-loader.gif" alt="Loading..." class="img-responsive center-block loading-graphic">
</div>
<ul id="shop-slider" class="hidden-content">
    <?php print "$productsSlider"; ?>
</ul>
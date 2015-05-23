<?php
    // Local connection (comment out when deploying to live server)
    mysql_connect("localhost","mmistudioscom","DrJ0n3s1!") or die(mysql_error());
    mysql_select_db("mmistudioscom") or die(mysql_error());

    ///////////////////////////
    //  ADD PRODUCT TO CART  //
    ///////////////////////////
    if(isset($_GET['action']) && $_GET['action'] == "add") {
        $id = intval($_GET['id']);
        if(isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity']++;
        } else {
            $sqlAdd = "SELECT * FROM mmi_products WHERE id={$id}";
            $queryAdd = mysql_query($sqlAdd);

            if(mysql_num_rows($queryAdd) != 0) {
                $rowAdd = mysql_fetch_array($queryAdd);
                $_SESSION['cart'][$rowAdd['id']] = array("quantity" => 1, "price" => $rowAdd['price'], "format" => "(CD)");
            } else {
                $message = "This product ID is invalid.";
            }
        }
    }

    //////////////////////
    //  LATEST DISPLAY  //
    //////////////////////
    $sqlTalks = mysql_query("SELECT * FROM mmi_products WHERE featured = 'yes' ORDER BY id DESC");
    $latestDisplayList = ""; // Initialize the variable to display the list of latest products
    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $category = $row["category"];
        $artist = $row["artist"];
        $artist_page = $row["artist_page"];
        $title = $row["title"];
        $cat_num = $row["cat_num"];
        $description = $row["description"];
        $img = $row["img"];
        $content = $row["content"];
        $price = $row["price"];
        $third_party = $row["third_party"];
        $featured = $row["featured"];
        $latestDisplayList .='
            <div class="col-sm-4 product-item">
                <a href="javascript:RequestContent(' . $content . ')" class="mmi-title">
                    <img src="imgs/albums/' . $img . '" class="img-responsive img-thumbnail" alt="' . $title . '">
                </a>
                <a href="javascript:RequestContent(' . $artist_page . ')" class="product-title">
                    <h5>' . $artist . '</h5>
                </a>
                <a href="javascript:RequestContent(' . $content . ')" class="product-title">
                    <h5 class="product-items">' . $title . '</h5>
                </a>
                <a href="index.php?page=products&action=add&id=' . $id . '" class="btn btn-mmi center-block">Add To Cart - $' . $price . ' (' . $category . ')</a>
                <h4 class="product-items third-party">Or Via 3rd Party:</h4>
                <p class="product-items">' . $third_party . '</p>
            </div>
        ';
    }

    /////////////////////
    //  MUSIC DISPLAY  //
    /////////////////////
    $sqlTalks = mysql_query("SELECT * FROM mmi_products WHERE category = 'CD' ORDER BY id DESC");
    $musicDisplayList = ""; // Initialize the variable to display the list of music products
    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $category = $row["category"];
        $artist = $row["artist"];
        $artist_page = $row["artist_page"];
        $title = $row["title"];
        $cat_num = $row["cat_num"];
        $description = $row["description"];
        $img = $row["img"];
        $content = $row["content"];
        $price = $row["price"];
        $third_party = $row["third_party"];
        $musicDisplayList .='
            <div class="col-sm-4 product-item">
                <a href="javascript:RequestContent(' . $content . ')" class="mmi-title">
                    <img src="imgs/albums/' . $img . '" class="img-responsive img-thumbnail" alt="' . $title . '">
                </a>
                <a href="javascript:RequestContent(' . $artist_page . ')" class="product-title">
                    <h5>' . $artist . '</h5>
                </a>
                <a href="javascript:RequestContent(' . $content . ')" class="product-title">
                    <h5 class="product-items">' . $title . '</h5>
                </a>
                <a href="index.php?page=products&action=add&id=' . $id . '" class="btn btn-mmi center-block">Add To Cart - $' . $price . ' (' . $category . ')</a>
                <h4 class="product-items third-party">Or Via 3rd Party:</h4>
                <p class="product-items">' . $third_party . '</p>
            </div>
        ';
    }
?>

<!--stories-->
<div class="row" id="products-page" role="pillpanel">
    <!-- Nav tabs -->
    <div class="col-sm-12">
        <ul class="nav nav-pills nav-justified" role="pilllist">
            <li role="presentation" class="active">
                <a href="#latest" aria-controls="latest" role="pill" data-toggle="pill" title="The latest products MMI Studios has to offer.">Latest</a>
            </li>
            <li role="presentation">
                <a href="#music" aria-controls="music" role="pill" data-toggle="pill" title="All audio releases from MMI Studios artists.">Music</a>
            </li>
            <li role="presentation">
                <a href="#sample-kits" aria-controls="sample-kits" role="pill" data-toggle="pill" title="Audio samples to use in your sound design and music projects.">Samples</a>
            </li>
            <li role="presentation">
                <a href="#preset-banks" aria-controls="preset-banks" role="pill" data-toggle="pill" title="Preset packs for various software synths and effects">Presets</a>
            </li>
            <li role="presentation" class="dropdown">
                <a href="#" class="dropdown-toggle" aria-controls="software" data-toggle="dropdown" role="button" aria-expanded="false" title="Software synthesizers and effects from MMI Studios">Software <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#sound-generators" aria-controls="sound-generators" role="pill" data-toggle="pill" title="Software synths">Sound Generators</a></li>
                    <li><a href="#sound-effectors" aria-controls="sound-effectors" role="pill" data-toggle="pill" title="Software effects">Sound Effectors</a></li>
                </ul>
            </li>
            <li role="presentation">
                <a href="#graphics" aria-controls="graphics" role="pill" data-toggle="pill" title="Graphic assets to use in your 3D, design, and illustration projects.">Graphix</a>
            </li>
            <li role="presentation">
                <a href="#misc" aria-controls="misc" role="pill" data-toggle="pill" title="Clothing and other various apparel from MMI Studios and MMI Studios artists">Merch</a>
            </li>
        </ul>
        <hr>
        <h1 class="error-msg"><?php if(isset($message)) { echo $message; } ?></h1>
    </div>
    <!-- Tab panes -->
    <div class="col-sm-12 tab-content">
        <div role="pillpanel" class="tab-pane fade in active" id="latest">
            <p>Shipping is included in price of CD's and all orders are sent USPS First Class if within the United States. Unforunately, for all international orders we must add an additional $9.13 USPS First Class International shipping fee.</p>
            <div class="col-sm-4 product-item">
                <a href="#" class="mmi-title">
                    <img src="http://placehold.it/400x400" class="img-responsive img-thumbnail" alt="Retro Dark">
                </a>
                <a href="#" class="product-title">
                    <h5>MMI Studios</h5>
                </a>
                <a href="#" class="product-title">
                    <h5 class="product-items">Retro Dark</h5>
                </a>
                <a href="#" class="btn btn-mmi center-block">Add To Cart - $9.99 (Sample Kit)</a>
            </div>
            <?php print "$latestDisplayList"; ?>
        </div>
        <div role="pillpanel" class="tab-pane fade" id="music">
            <p>Shipping is included in price of CD's and all orders are sent USPS First Class if within the United States. Unforunately, for all international orders we must add an additional $9.13 USPS First Class International shipping fee.</p>
            <?php print "$musicDisplayList"; ?>
        </div>
        <div role="pillpanel" class="tab-pane fade" id="sample-kits">
            <div class="row">
                <div class="col-sm-12">
                    <div class="samples-holder col-sm-4">
                        <img src="http://placehold.it/400x400" class="img-responsive img-thumbnail" alt="">
                    </div>
                    <div class="col-sm-8">
                        <h2 style="margin-top: 0;">Retro Dark</h2>
                        <p>A collection of 100 retro sounding loop samples with a cold, dark electronic vibe. Created using equipment and software with a retro feel such the C64, Impulse Tracker, Roland Juno-6, and many more.</p>
                        <h3>Specifications:</h3>
                        <ul>
                            <li>Format: 32Bit/44.1Khz Wave</li>
                            <li>Royalty/License Free</li>
                            <li>File names include BPM and Type (percussion, sfx, synth, etc)</li>
                        </ul>
                        <a href="#" class="btn btn-mmi center-block">Add To Cart - $9.99 (Download)</a>
                    </div>
                </div>
            </div>
        </div>
        <div role="pillpanel" class="tab-pane fade" id="preset-banks">
            Preset Banks...
        </div>
        <div role="pillpanel" class="tab-pane fade" id="sound-generators">
            Sound Generators...
        </div>
        <div role="pillpanel" class="tab-pane fade" id="sound-effectors">
            Sound Effectors...
        </div>
        <div role="pillpanel" class="tab-pane fade" id="graphics">
            Graphic Assets...
        </div>
        <div role="pillpanel" class="tab-pane fade" id="misc">
            <div class="spreadshirt-container">
                <iframe width="100%" src="http://mmi-studios-embed.spreadshirt.com/" name="Spreadshop" id="Spreadshop" frameborder="0" onload="window.scrollTo(0, 0);" scrolling="yes"></iframe>
            </div>
            <hr>
            <p>The products in this online shop are created by <a href="http://www.spreadshirt.com">Spreadshirt</a>, your source for custom tees, aprons and other accessories.</p>
        </div>
    </div>
</div>
<!--/stories-->
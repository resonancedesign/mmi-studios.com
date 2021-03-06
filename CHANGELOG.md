### HEAD

### 0.0.9 (July 23rd, 2015)
*   Typo fixes, and edits to copy and meta data
        - (index.html)
        - (index.php)
        - (app/includes/content/data/javascripts.php)
        - (app/includes/content/general/about.php)
*   Added icon font file
        - (fonts/glyphicons-halflings-regular.woff2)

### 0.0.8 (May 22nd, 2015)

*   Made formating edits to changelog file for readability
        - (CHANGELOG.md)
*   Increased line-height of labels to make for adequate spacing when labels stack on top of one another
        - (css/custom.css)
*   Added placeholder for upcoming sample-kit "Retro Dark" to products page
        - (app/includes/content/general/products.php)
        - (css/custom.css)
*   Added some content to services page
        - (app/includes/content/general/services.php) 
*   Changed id's and targeting elements of products page
        - (app/includes/content/general/products.php)

### 0.0.7 (May 20th, 2015)

*   Made spreadshirt integration responsive
        - (app/includes/content/general/products.php)
        - (css/custom.css)
*   Additional styling for anchors and headers on products page and products-slider module
        - (app/includes/content/general/products.php)
        - (app/modules/product-slider.php)
        - (css/custom.css)

### 0.0.6 (May 18th, 2015)

*   Embeded spreadshirt store into merch section of product page (app/includes/content/general/products.php)
        - TODO: Make the integration responsive to the design

### 0.0.5 (May 11th, 2015)

*   Styling edits to product anchor and heading elements for product slider and products page
        - (css/custom.css)
*   Changed classes used by anchor elements in product slider module
        - (app/modules/product-slider.php)
*   Changed classes used by anchor elements in prducts page
        - (app/includes/content/general/products.php)
*   Added title attributes to all menu items of products page
        - (app/includes/content/general/products.php)
*   Moved Google Analytics asynchronous tracking code to the header of offline page
        - (off.html)
*   Added PHP implementation of Google Analytics asynchronous tracking code to index page
        - (index.php)
*   Created Google Analytics PHP implementation file
        - (js/analyticstracking.php)
*   Moved error messages underneath products navigation
        - (app/includes/content/general/products.php)
*   Removed old database connection script from products page
        - (app/includes/content/general/products.php)
*   Commented out the Filament app in javasctrips include
        - (app/includes/content/data/javascripts.php)
        - NOTE: Not sure we want to use this 3rd party app yet.
*   Added dynamic "latest" section to and edited text content of the products page
        - (app/includes/content/general/products.php)
*   Slight edit to text content of "about" page
        - (app/includes/content/general/about.php)
*   Added "contact" menu item to footer menu
        - (app/includes/layout/footer.php)
*   Created "contact" page
        - (app/includes/content/general/contact.php)
*   Updates to documentation
        - (humans.txt, LICENSE.md, CONTRIBUTING.md)

### 0.0.4 (May 4th, 2015)

*	Edits to the readme file
        - (README.md)

### 0.0.3 (May 1st, 2015)

*	Removed "apparel" and "misc" categories from menu and added "graphic assets" and "merch" categories to menu on products page
        - (app/includes/content/general/products.php)
*	Adjusted twitter feed container width
        - (css/custom.css)
*	Moved social icons in footer to bottom of column
        - (app/includes/layout/footer.php)
*	Various styling edits to the mini cart and product slider modules
        - (css/custom.css)
*	Changed inline styling to product slider module
        - (app/modules/product-slider.php)

### 0.0.2 (April 30th, 2015)

*	Created module system (app/modules/) and two modules:
		- Mini Cart: (app/modules/mini-cart.php)
		- Product Slider: (app/modules/product-slider.php)
*	NOTE: Seriously set back because many changes, including ones made to this CHANGELOG.md file were lost due to a symbolic linking error.

### 0.0.1 (April 7th, 2015)

*	Created offline/maintenance mode page
        - (off.html)
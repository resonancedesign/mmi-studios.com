<div class="fullscreen background-header banner-150to300 lr-borders" id="mmi-header" style="background-image:url('imgs/header_nav.png');" data-img-width="1920" data-img-height="300">
    <div class="content-150to300">
        <div class="header-content">
            <div id="mmi-login">
                <a href="#" data-toggle="modal" data-target="#logIn">Log-In</a> | 
                <a href="#" data-toggle="modal" data-target="#register">Register</a>
                <!-- Log-In Modal -->
                <div class="modal fade" id="logIn" tabindex="-1" role="dialog" aria-labelledby="logInLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="logInLabel">Log-In</h4>
                            </div>
                            <div class="modal-body lr-borders">
                                <p>Log-in form goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-mmi">Log-In</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Register Modal -->
                <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="registerLabel">Register</h4>
                            </div>
                            <div class="modal-body">
                                <p>Registration form goes here.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-mmi">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="css/imgs/logoHeader.png" class="img-responsive pull-right mmi-logo">
        </div>
    </div>
</div>
<nav class="navbar navbar-default mmi-navbar" role="navigation" style="z-index: 1;">
    <div class="lr-borders">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img height="40" src="imgs/mmi_logo.png" alt="MMI Studios">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="header-button active" id="header-recent">
                    <a href="javascript:RequestContent('app/includes/content/general/updates.php','content-swapper')">
                        <span class="nav-button">Recent</span>
                    </a>
                </li>
                <li class="header-button" id="header-artists">
                    <a href="javascript:RequestContent('app/includes/content/general/artists.php','content-swapper')">
                        <span class="nav-button">Artists</span>
                    </a>
                </li>
                <li class="header-button" id="header-products">
                    <a href="javascript:RequestContent('app/includes/content/general/products.php','content-swapper')">
                        <span class="nav-button">Products</span>
                    </a>
                </li>
                <li class="header-button" id="header-services">
                    <a href="javascript:RequestContent('app/includes/content/general/services.php','content-swapper')">
                        <span class="nav-button">Services</span>
                    </a>
                </li>
                <li class="header-button" id="header-events">
                    <a href="javascript:RequestContent('app/includes/content/general/events.php','content-swapper')">
                        <span class="nav-button">Events</span>
                    </a>
                </li>
                <!-- <li class="header-button" id="header-media">
                    <a href="javascript:RequestContent('app/includes/content/general/media.php','content-swapper')">
                        <span class="nav-button">Media</span>
                    </a>
                </li> -->
                <li class="header-button" id="header-community">
                    <a href="javascript:RequestContent('app/includes/content/general/community.php','content-swapper')">
                        <span class="nav-button">Community</span>
                    </a>
                </li>
                <li class="header-button" id="header-classifieds">
                    <a href="javascript:RequestContent('app/includes/content/general/classifieds.php','content-swapper')">
                        <span class="nav-button">Classifieds</span>
                    </a>
                </li>
                <li class="header-button" id="header-about">
                    <a href="javascript:RequestContent('app/includes/content/general/about.php','content-swapper')">
                        <span class="nav-button">About</span>
                    </a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
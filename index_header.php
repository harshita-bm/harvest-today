    <!-- Start Navbar Area -->
    <div class="navbar-area" style="background-color: #CCC7BE;">
        <div class="patoi-responsive-nav">
            <div class="container">
                <div class="patoi-responsive-menu">
                    <div class="logo">
                        <a href="index.html"><img src="logo.png" alt="logo"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="patoi-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.php">
                    <img src="logo.png" alt="logo" width="50px" height="50px"> 
                    </a>
                    <h4>Harvest Today</h4>
                    
                    <div class="collapse navbar-collapse mean-menu">
                        <ul class="navbar-nav">

                        
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="feedback.php" class="nav-link">feedback</a></li>
                        <li class="nav-item"><a href="view_blog.php" class="nav-link">Blogs</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About us</a></li>
                    
                        
                            <li class="nav-item"><a href="#" class="dropdown-toggle nav-link">User</a>
                                <ul class="dropdown-menu">
                                <?php if (!isset($_SESSION['user_id'])) { ?>
                                    <li class="nav-item"><a href="user/reg_front.php" class="nav-link">Registration</a></li>
                                    <li class="nav-item"><a href="user/login_front.php" class="nav-link">Login</a></li>
                                    <?php } else { ?>
                                    <li class="nav-item"><a href="user/logout.php" class="nav-link">Logout</a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li class="nav-item"><a href="index.php" class="nav-link">Products</a></li>

                            <?php if (isset($_SESSION['user_id'])) { ?>
                                <li class="nav-item"><a href="cart.php" class="nav-link">cart</a></li>
                                <li class="nav-item"><a href="order_status.php" class="nav-link">order status</a></li>
                            <?php } ?>
                        </ul>
                        <div class="others-option">
                            <div class="d-flex align-items-center">
                                <ul>
                                    <!-- <li>
                                        <div class="search-icon">
                                            <i class='bx bx-search'></i>
                                        </div>
                                    </li> -->

                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="others-option-for-responsive">
            <div class="container">
                <div class="dot-menu">
                    <div class="inner">
                        <div class="circle circle-one"></div>
                        <div class="circle circle-two"></div>
                        <div class="circle circle-three"></div>
                    </div>
                </div>
                <div class="container">
                    <div class="option-inner">
                        <div class="others-option">
                            <ul>
                                <li>
                                    <select class="form-select">
                                        <option selected>English</option>
                                        <option value="1">Spanish</option>
                                        <option value="2">Chinese</option>
                                    </select>
                                </li>
                                <li>
                                    <div class="search-icon">
                                        <i class='bx bx-search'></i>
                                    </div>
                                </li>
                                <li><a href="profile-authentication.html"><i class='bx bx-user-circle'></i></a></li>
                                <li><a href="cart.html"><i class='bx bx-cart'></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Search Overlay -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Enter your keywords...">
                        <button type="submit"><i class='bx bx-search'></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Overlay -->
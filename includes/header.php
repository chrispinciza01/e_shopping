<script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>

<header>

    <div class="container-fluid">
        <div class="row">
            <div class="top-header col-md-12">
                <div class="top-header-content">
                    <section class="langform text pull-left" id="google_element" >
                        <select class="form-control-lang" >
                            <option selected="" >English</option>
                            <!--<option>Frensh</option>
                            <option class="form">Swahili</option>
                            <option>Spanish</option>-->
                        </select>
                    </section>

                    <ul class="text pull-right">


                        <li>

                            <a href="#" class="links" data-toggle="dropdown">

                                <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo "Account";
    
                                }else{
    
                                $customer_session = $_SESSION['customer_email'];
    
                                $get_customer = "select * from customers where customer_email='$customer_session'";
        
                                $run_customer = mysqli_query($db,$get_customer);
        
                                $row_customer = mysqli_fetch_array($run_customer);
        
                                $customer_id = $row_customer['customer_id'];
        
                                $customer_name = $row_customer['customer_name'];
        
                                $customer_email = $row_customer['customer_email'];
    
                                echo "Hi,"." "."$customer_name"; 

                                }
                                
                                ?>
                            </a>

                            <div class="dropdown-menu">

                                <!-----profile--->

                                <?php if (!isset($_SESSION['customer_email'])){
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-user-o'></i> Account</a>";
                                             
                                                                      
                               }else{
                                   
                                   echo " <a class='dropdown-item' href='../e_shopping/customer/customer_account.php?customer_profile'><i class='fa fa-user-o'></i> Account </a>";
                                   
                               }
                                 
                               
                             ?>


                                <!-----Message--->

                                <?php if (!isset($_SESSION['customer_email'])){
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-fw fa-envelope'></i> Message</a>";
                                             
                                                                      
                               }else{
                                   
                                   echo " <a href='../e_shopping/customer/customer_account.php?message' class='dropdown-item'> <i class='fa fa-fw fa-envelope'></i> Message</a>";
                                   
                               }
                                 
                               
                             ?>

                                <!-----order--->

                                <?php
                               if (!isset($_SESSION['customer_email'])) {
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-fw fa-book'></i> order</a>";
                                                                      
                               }else{
                                   
                                   echo " <a href='../e_shopping/customer/customer_account.php?my_orders' class='dropdown-item'><i class='fa fa-fw fa-book'></i> order</a>";
                                   
                               }
                                 
                               
                             ?>



                                <div class="dropdown-divider"></div>

                                <!-----log in, log out--->


                                <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo " <a class='login' href='checkout.php'><i class='fa fa-fw fa-power-off'></i>Login </a>
                                  
                                  <p class='or'>OR</p><br>
                                  
                                  <a class='register' href='register.php'>REGISTER</a> 

                                  "
       
                                  ;
    
                             }else{
    
                                   echo " <a class='logout' href='logout.php'><i class='fa fa-fw fa-power-off'></i>Logout </a>"; 
    
                                    }
                             
                             ?>


                            </div>
                        </li>

                        <li><a class="links" href="contact_us.php" target="_blank">Help</a></li>

                        <li class="icons">
                            <span>
                                <a class="links" href="cart.php"> Cart</a>
                                <small class="count d-flex"><?php items(); ?></small>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!--- Navigation--->
    <nav class="nav bg-white">
        <div class="container-fluid">
            <div class="wrapper">

                <a class="" href="home.php"><img src="images/logo_images/LOGO1.jpg"></a>
                <div class="col-sm">
                    <form class="input-group mr-auto ml-3 " method="get" action="shop_products.php" enctype="multipart/form-data">
                        <input type="text" required name="user_query" class="form-control-sm mr-sm-2 shadow-none" placeholder="What Are You looking For..." />

                        <input class="imputbutton" name="search" value="SEARCH" type="submit" />
                    </form>
                </div>

                <ul class="nav-list mr-auto ml-3">
                    <li><a class="link" href="products.php"> Products</a></li>

                    <li>
                        <a href="" class="desktop-item link"> <i class="fa fa-bars"></i> ALL CATEGORIES<span> </span></a>
                        <div class="mega-box">
                            <div class="content">
                            <div class="col-md-12">
                            <div class="row">


                            <?php
    // Get main categories
    $get_cat_query = "SELECT * FROM categories";
    $run_cat_query = mysqli_query($db, $get_cat_query);
    
    while ($row_cat = mysqli_fetch_array($run_cat_query)) {
        $cat_id = $row_cat['cat_id'];
        $cat_title = $row_cat['cat_title'];
        
        // Get subcategories for current main category
        $get_p_cat_query = "SELECT * FROM product_categories WHERE cat_id = $cat_id";
        $run_p_cat_query = mysqli_query($db, $get_p_cat_query);
        
        // Output main category title and subcategories in a single row
        //echo "<div class='col-md-12'>";
        echo "<div class='col-md-3'>";
        echo "<h6>$cat_title</h6>";
        echo "<ul>";
        while ($row_p_cat = mysqli_fetch_array($run_p_cat_query)) {
            $p_cat_id = $row_p_cat['p_cat_id'];
            $p_cat_title = $row_p_cat['p_cat_title'];
            echo "<li><a href='shop_products.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
        }
        echo "</ul>";
        echo "</div>"; // Close col-md-12
        //echo "</div>"; // Close row
    }
?>
                            

                            
                            </div>
                            </div>
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


</header>

<script>
    function loadGoogleTranslate(){
        new google.translate.TranslateElement("google_element");
    }
</script>



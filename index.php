<?php

$host = 'localhost';
$port = '5432';
$dbname = 'GymStore';
$user = 'postgres';
$password = 'aaditya';


$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
try {
    $pdo = new PDO($dsn);
 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to the PostgreSQL database successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    try {

        $stmt = $pdo->prepare("INSERT INTO contact_messages (email, message) VALUES (:email, :message)");

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
    
        $stmt->execute();

        echo "Message sent successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>The Fitness Store</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" defer></script>


        <!-- Custom CSS File Link -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/convo.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"><!-- font awesome cdn link -->
        <link rel="icon" type="image/x-icon" href="assets/images/LOGO.webp"><!-- Favicon / Icon -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><!-- Google font cdn link -->
    </head>

    <body>
        <!-- HEADER SECTION -->
        <header class="header">
            <a href="#" class="logo">
                <img src="assets/images/LOGO.webp" class="img-logo" alt="The Fitness Store Logo">
            </a>

            <!-- MAIN MENU FOR SMALLER DEVICES -->
            <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a href="#home" class="text-decoration-none">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="text-decoration-none">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#menu" class="text-decoration-none">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="#gallery"class="text-decoration-none">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a href="#blogs" class="text-decoration-none">Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="text-decoration-none">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="users/login.php" class="text-decoration-none">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="icons">
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn" onclick="redirectCart()"></div>
                <div class="fas fa-bars" id="menu-btn"></div>
            </div>

            <!-- SEARCH TEXT BOX -->
            <div class="search-form">
                <input type="search" id="search-box" class="form-control" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </div>

            <!-- CART SECTION -->
            <div class="cart">
                <h2 class="cart-title">Your Cart:</h2>
                <div class="cart-content">
                    
                </div>
                <div class="total">
                    <div class="total-title">Total: </div>
                    <div class="total-price">Rs.</div>
                </div>
                <!-- BUY BUTTON -->
                <button type="button" class="btn-buy">Checkout Now</button>
            </div>
        </header>

        <!-- HERO SECTION -->
        <section class="home" id="home">
            <div class="content">
                <h3>Welcome to The Fitness Store!</h3>
                <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
            </div>
        </section>

        <!-- ABOUT US SECTION -->
        <section class="about" id="about">
            <h1 class="heading"> <span>About</span> Us</h1>
            <div class="row g-0">
                <div class="image">
                <img src="assets/images/hero.webp" class="img-hero" alt="Hero Image">
                </div>
                <div class="content">
                <h3>Welcome to The Fitness Store!</h3>
                    <p>
                    At The Fitness Store, we are dedicated to empowering fitness enthusiasts on their journey to wellness. Our mission is to provide a comprehensive platform that serves as a haven for fitness aficionados, offering a wide array of top-notch gym equipment, premium fitness products, stylish workout attire, and essential supplements like protein shakes.
                    </p>
                    <p>
                    Our platform isn't just about selling products; it's about building a vibrant community of like-minded individuals. Integrated discussion forums will enable users to connect, share their fitness experiences, seek advice, and inspire one another on their fitness odyssey.
                    </p>
                    <a href="#menu" class="btn btn-dark text-decoration-none">Order Now!</a>
                </div>
            </div>
        </section>

        <!-- MENU SECTION -->
        <section class="menu" id="menu">
            <h1 class="heading">Our <span>Products</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/Tanktops.webp" alt="Tanktops" class="product-img">
                                <h3 class="product-title">MALE TANKTOPS</h3>
                                <div class="price">Rs.450.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/MuscleTech.webp" alt="MuscleTech">
                                <h3 class="product-title">MUSCLETECH SUPPLEMENT</h3>
                                <div class="price">Rs. 900.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/FemaleT.webp" alt="FemaleT">
                                <h3 class="product-title">WOMEN T-SHIRT</h3>
                                <div class="price">Rs.450.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/Dumbells.webp" alt="Dumbells">
                                <h3 class="product-title">ADJUSTABLE DUMBELLS</h3>
                                <div class="price">Rs 750.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/GymBag.webp" alt="GymBag">
                                <h3 class="product-title">GYMBAG</h3>
                                <div class="price">Rs 300.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/Whey.webp" alt="Whey">
                                <h3 class="product-title">WHEY PROTEIN</h3>
                                <div class="price">Rs 1055.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/PreWorkout.webp" alt="PreWorkout">
                                <h3 class="product-title">PREWORKOUT</h3>
                                <div class="price">Rs 835.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/resistance.webp" alt="Resistance Bands">
                                <h3 class="product-title">RESISTANCE BANDS</h3>
                                <div class="price">Rs 585.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/kettlebells.webp" alt="Kettlebells">
                                <h3 class="product-title">KETTLEBELLS</h3>
                                <div class="price">Rs. 680.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <div class="row row-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/BoySet.webp" alt="Boy Set">
                                <h3 class="product-title">BOYS SET</h3>
                                <div class="price">Rs 950.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/WomenWear.webp" alt="Women's Wear">
                                <h3 class="product-title">WOMEN SET</h3>
                                <div class="price">Rs. 635.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div><br />
                        <div class="col-md-4">
                            <div class="box">
                            <img src="assets/images/BCCA.webp" alt="Branched-Chain Amino Acids (BCAA)">
                                <h3 class="product-title">BCCA SUPPLEMENT</h3>
                                <div class="price">Rs. 955.00</div>
                                <a class="btn add-cart" onclick="redirectCart()">Add to Cart</a>
                            </div>
                        </div>
                    </div><br />
                    <center>
                        <button id="showHideBtn" class="btn btn-dark">SHOW MORE</button>
                    </center> 
                </div>
            </div>
        </section>

        <!-- GALLERY SECTION -->
        <section class="gallery" id="gallery">
            <h1 class="heading">The <span>Gallery</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery1.webp" alt="gallery1">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 1</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery2.webp" alt="gallery2">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 2</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery3.webp" alt="gallery3">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 3</h3>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <div class="row pic-to-hide">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery4.webp" alt="gallery4">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 4</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery5.webp" alt="gallery5">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 5</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/gallery6.webp" alt="gallery6">
                                </div>
                                <div class="content">
                                    <div class="stars">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <h3 class="gallery-title">Picture 6</h3>
                                </div>
                            </div>
                        </div>
                    </div><br />
                    <center>
                        <button id="showBtn" class="btn btn-dark">SHOW MORE</button>
                    </center> 
                </div> 
            </div>
        </section>

        <!-- BLOGS SECTION -->
        <section class="blogs" id="blogs">
            <h1 class="heading">Our <span>Blogs</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/blog1.webp" alt="">
                                </div>
                                <div class="content">
                                    <a href="https://www.nerdfitness.com/blog/protein-shakes-for-newbies-what-to-buy-when-to-drink/" target="_blank" class="title text-decoration-none">The Ultimate Protein Shake Guide | When To Drink, What To Buy, And Best Recipes</a>
                                    <span>By Steve Kamb </span>
                                    <p>You’re in luck, because I’ve been drinking protein shakes for years and today I’m sharing with you all my secrets...</p>
                                    <center>
                                    <a href="https://www.nerdfitness.com/blog/protein-shakes-for-newbies-what-to-buy-when-to-drink/" target="_blank" class="btn">Read More</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/blog2.webp" alt="">
                                </div>
                                <div class="content">
                                    <a href="https://www.setforset.com/blogs/news/best-workout-splits" target="_blank" class="title text-decoration-none">THE 5 ALL-TIME BEST WORKOUT SPLITS (WITH FULL ROUTINES)</a>
                                    <span>By Sam Coleman</span>
                                    <p>One of the most crucial parts of a lifter's training involves their workout split, which is essential for tracking progress and...</p>
                                    <center>
                                        <a href="https://www.setforset.com/blogs/news/best-workout-splits" target="_blank" class="btn">Read More</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <div class="image">
                                    <img src="assets/images/blog3.jpg" alt="">
                                </div>
                                <div class="content">
                                    <a href="https://sweat.com/blogs/fitness/how-to-use-gym-equipment" target="_blank" class="title text-decoration-none">How To Use Gym Equipment- Compound Excercises</a>
                                    <br>
                                    <span>By Sweat</span>
                                    <p>o, you've just started training in a gym. Good for you! Maybe you’ve changed your Sweat strength training program to one that uses more equipment and machines, or perhaps...</p>
                                    <center>
                                        <a href="https://sweat.com/blogs/fitness/how-to-use-gym-equipment" target="_blank" class="btn">Read More</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </section>

        <!-- TESTIMONIALS SECTION -->
        <section class="review" id="review">
            <h1 class="heading"><span>Testimonials</span></h1>
            <div class="box-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                I've been shopping at The Fitness Store for all my workout needs, and I couldn't be happier with their service! 
                            Their range of products is extensive, and the quality is top-notch. Highly recommended!
                                </p>
                                <img src="assets/images/pic-1.png" alt="" class="user">
                                <h3>Jane Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                As a fitness enthusiast, I've tried numerous online stores, but The Fitness Store stands out for its exceptional 
                            customer service and speedy delivery. Plus, their selection of supplements is fantastic!
                                </p>
                                <img src="assets/images/pic-2.png" alt="" class="user">
                                <h3>John Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box">
                                <img src="assets/images/quote-img.png" alt="" class="quote">
                                <p>
                                The Fitness Store is my go-to destination for all my fitness apparel needs. Their collection is trendy, 
                            comfortable, and affordable. Plus, their website is easy to navigate, making shopping a breeze!
                                </p>
                                <img src="assets/images/pic-3.png" alt="" class="user">
                                <h3>Jane Doe</h3>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </section>

        <!-- CONTACT US SECTION -->
        <section class="contact" id="contact">
                <h1 class="heading"><span>Contact</span> Us</h1>
                <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.7926506302797!2d72.89735127593626!3d19.07285205206993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c627a20bcaa9%3A0xb2fd3bcfeac0052a!2sK.%20J.%20Somaiya%20College%20of%20Engineering!5e0!3m2!1sen!2sin!4v1711996533423!5m2!1sen!2sin" width="300" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <form id="contactForm" name="contact" method="POST" action="index.php">

                        <h3> Get in touch with us!</h3>
                        <div class="inputBox">
                            <span class="fas fa-envelope"></span>
                            <input type="email" name="email" placeholder="Email Address">
                        </div>
                        <div class="inputBox">
                            <textarea name="message" placeholder="Enter your message..."></textarea>
                        </div>
                        <button type="submit" class="btn">Contact Now</button>
                    </form>
                </div>
            </section>
            
        <!-- FOOTER SECTION -->
        <section class="footer">
            <div class="footer-container">
            <div class="logo">
              <img src="assets/images/LOGO.webp" class="img"><br />
              <a href="mailto:TheFitnessStore@gmail.com">
              <i class="fas fa-envelope"></i>
              <p>TheFitnessStore@gmail.com</p>
              </a><br />
              <a href="tel:+919869461489">
              <i class="fas fa-phone"></i>
              <p>+91 9869461489</p>
              </a><br />
              <i class="fab fa-facebook-messenger"></i>
              <p>@TheFitnessStore</p><br />
            </div>

                <div class="support">
                    <h2>Support</h2>
                    <br /> 
                    <a href="#contact">Contact Us</a>
                    <a href="#">Chatbot Inquiry</a>
                    <a href="#">FAQ</a>
                </div>
                <div class="company">
                    <h2>Company</h2>
                    <br /> 
                    <a href="#about">About Us</a>
                    <a href="#menu">Our Products</a>
                    <a href="#gallery">Gallery</a>
                    <a href="#blogs">Blog</a>
                    <a href="#review">Reviews</a>
                </div>
                <div class="newsletters">
                    <h2>Newsletters</h2>
                    <br /> 
                    <p>Subscribe to our newsletter for news and updates!</p>
                    <div class="input-wrapper">
                        <input type="email" class="newsletter" placeholder="Your email address">
                        <i id="paper-plane-icon" class="fas fa-paper-plane"></i>
                    </div>
                </div>
                <div class="credit">
                    <hr /><br/>
                    <h2>The Fitness Store © 2023 | All Rights Reserved.</h2>
                </div>
            </div>
        </section>

        <!-- CHAT BAR BLOCK -->
        <div class="chat-bar-collapsible">
            <button id="chat-button" type="button" class="collapsible">Chat with us! &nbsp;
                <i id="chat-icon" style="color: #fff;" class="fas fa-comments"></i>
            </button>
            <div class="content">
                <div class="full-chat-block">
                    <!-- Message Container -->
                    <div class="outer-container">
                        <div class="chat-container">
                            <!-- Messages -->
                            <div id="chatbox">
                                <h5 id="chat-timestamp"></h5>
                                <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            </div>
                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg"
                                        placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>
                                <div class="chat-bar-icons">
                                    <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-paper-plane"
                                        onclick="sendButton()"></i>
                                </div>
                            </div>
                            <div id="chat-bar-bottom">
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS File Link -->
        <script src="assets/js/responses.js"></script>
        <script src="assets/js/convo.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script>
            // CODE FOR THE FORMSPREE
            window.onbeforeunload = () => {
                for(const form of document.getElementsByTagName('form')) {
                    form.reset();
                }
            }

            


            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN MENU
            $(document).ready(function() {
                $(".row-to-hide").hide();
                $("#showHideBtn").text("SHOW MORE");
                $("#showHideBtn").click(function() {
                    $(".row-to-hide").toggle();
                    if ($(".row-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });

            // CODE FOR THE SHOW MORE & SHOW LESS BUTTON IN GALLERY
            $(document).ready(function() {
                $(".pic-to-hide").hide();
                $("#showBtn").text("SHOW MORE");
                $("#showBtn").click(function() {
                    $(".pic-to-hide").toggle();
                    if ($(".pic-to-hide").is(":visible")) {
                        $(this).text("SHOW LESS");
                    } else {
                        $(this).text("SHOW MORE");
                    }
                });
            });

            // CODE FOR THE REDIRECT CART
            function redirectCart() {
                // Check if the user is logged in
                if(!"<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : '' ?>") {
                    // Redirect the user to the login page
                    alert("You are not logged in. Please log into your account and try again.");
                    window.location.href = "users/login.php";
                }
            }
        </script> 
    </body>
</html>

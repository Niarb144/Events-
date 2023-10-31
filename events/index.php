<?php
  // MySQL database configuration
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "events_db";
  
  // Create database connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }?>
  
  <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imaara Events</title>
    <link rel="icon" type="image" href="./assets/img/imaaralogo.png" style= "height: 100px; width: 100px;">

    <!--CSS-->
    <link rel="stylesheet" href="./assets/css/style.css">

    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!--Boxicons-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<!--Navigation-->
<style>
/* Import Google font - Poppins */
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500&family=Indie+Flower&family=Outfit:wght@300;500&family=Poppins:wght@200;400&family=Potta+One&family=Ysabeau+Office:ital,wght@0,400;1,300&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Comfortaa';
}

.top-bar{
   display: flex;
    height: 150px;
    border-bottom: 1px solid #e2e2e2;
background-color: #ffff;
   background-image: url('https://theimaara.co.ke/assets/img/petals4.svg');
    background-size: cover;
    background-position: bottom;
    background-repeat: no-repeat;
}

.socials-container{
    display: block;
    width: 20%;
    background-image: url('https://theimaara.co.ke/assets/img/petal.svg');
    background-size: cover;
    background-position: bottom;
    background-repeat: no-repeat;
   
}

#clock {
position: absolute;

    font-size: 1.5rem;
    color: #333;
margin: auto;
margin-top: 1rem;
margin-left: 3rem;
}
/*Open-Closed status*/
.socials-container .status {
    margin: 50px;
}

.socials-container .status h1 {
    font-size: 24px;
}

.socials-container .status p {
    font-size: 18px;
    font-weight: bold;
    color: #333;
}
.logo-container{
  display: flex;
    width: 100%;
    justify-content: center;
}

.logo-container .logo{
   margin-top: 5px;
    margin-bottom: 5px;
}

.logo-container .logo img{
   height: 150px;
    width: 150px;
}

/*Search -container*/
.search-container {
    margin: auto;
    width: 20%;
}

#search-input {
    padding: 10px;
    width: 200px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

#search-button {
    padding: 10px 20px;
    background-color: #000000;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Style the navbar */
.navbar-white {
   background-color: #ffffff;
    color: #000000;
    display: flex;
    justify-content: center;
    padding: 5px 10px;
    height: 50px;
}

.navbar-white .links {
    list-style: none;
    display: inline-flex;
    gap: 4rem;
}

.navbar-white .links a{
    color: #000;
    text-decoration: none;
}

.navbar-white .links a:hover{
    transition: all ease-in-out .4s;
    color: #f540a4;
}

/* Style the dropdown container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Style the dropdown content (hidden by default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 99;
}

/* Style the dropdown links */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change the color of links on hover */
.dropdown-content a:hover {
    background-color: #000000;
    color: white;
}

/* Show the dropdown content when the button is hovered over */
.dropdown:hover .dropdown-content {
    display: block;
}

.nav-container{
    background-color: #000;
    width: auto;
    height: 40px;
    display: flex;
    justify-content: center;
}

.nav-container .links{
    list-style: none;
    display: inline-flex;
    margin: auto;
    gap: 4rem;
}

.nav-container .links a{
    text-decoration: none;
    color: #ffffff;
}

.nav-container .links a:hover{
    color: #f540a4;
    transition: all ease 0.5s;
}
/* Style the navbar */
.navbar-mobile {
    background-color: #fff;
    color: #fff;
    display: none;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    margin-bottom: 1rem;
}

/* Style the menu items */
.menu {
    list-style-type: none;
    display: flex;
}

.menu li {
    margin-right: 20px;
}

.menu li:last-child {
    margin-right: 0;
}

.menu a {
    color: #fff;
    text-decoration: none;
}

.menu a:hover{
    color: #f540a4;
    transition: all ease .4s;
}

.sub-menu{
    list-style: none;
    display: flex;
}

.sub-menu li{
    margin-right: 20px;
}

.sub-menu a{
    color: #fff;
    text-decoration: none;
}

.sub-menu a:hover{
    color: #f540a4;
    transition: all ease .4s;
}
/* Style the menu toggle button */
.menu-toggle {
    display: none;
    flex-direction: column;
    cursor: pointer;
}

.bar {
    width: 25px;
    height: 3px;
    background-color: #050505;
    margin: 3px 0;
    transition: 0.4s;
}

.bar:nth-child(2){
    width: 20px;
}

/* Media query for mobile view */
@media screen and (max-width: 768px) {
    .top-bar{
        display: none;
    }
    .socials-container{
        display: none;
    }

    .logo-container .logo img{
        height: 80px;
        width: 80px;
    }

    .search-container{
        display: none;
    }

    .navbar-white .links{
        display: none;
    }

    .nav-container{
        display: none;
    }

    .navbar-mobile{
        display: flex;
        position: fixed;
        width: 100%;
        z-index: 999;
        
    }

    .navbar-mobile .mobile-logo img{
        height: 60px;
        width: auto;
    }

    .menu {
        display: none;
        flex-direction: column;
        align-items: flex-start;
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        background-color: #333;
        z-index: 1;
    }

    .menu.active {
        display: flex;
        
        transition: all ease .4s;
    }

    .menu li {
        margin: 10px 20px;
    }

    .menu-toggle {
        display: flex;
        margin-left: auto;
    }

    .menu-toggle.active .bar:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
        background-color: #f540a4;
    }

    .menu-toggle.active .bar:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active .bar:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }

    .menu .sub-menu{
        display: flex;
        flex-wrap: wrap;
        width: 80%;
        border-top: 2px solid #f540a4;
    }

    .carousel-item{
        height: 40vh;
    }
}
</style>

<!--Header-->
<nav class="navbar-mobile">
        <div class="mobile-logo">
            <a href = "https://theimaara.co.ke/sp/"><img src="https://theimaara.co.ke/assets/Logos/imaaralogo.png" alt="logo" /></a>
        </div>
        <div class="menu-toggle">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <ul class="menu">
            <li><a href="/sp/stores">Stores</a></li>
            <li><a href="https://theimaara.co.ke/entertainment">Entertainment</a></li>
            <li><a href="/sp/dine">Dine</a></li>
            <li><a href="https://theimaara.co.ke/services">Services</a></li>
            
            <ul class="sub-menu">
                <li><a href="">Offers</a></li>
                <li><a href="">Events</a></li>
                <li><a href="https://theimaara.co.ke/gallery">Gallery</a></li>
                <li><a href="https://theimaara.co.ke/map/">Map</a></li>
                <li><a href="https://theimaara.co.ke/parking">Parking</a></li>
            </ul>
            
        </ul>
        <ul class="sub-menu">
            
        </ul>
    </nav>
    <!--Top Navbar-->
    <div class="top-bar">
        <div class="socials-container">
<div id="clock"></div>
            <div class="status">
        <p id="status-text"></p>
    </div>
           
        </div>

        <div class = "logo-container">
            <!--Logo-->
            <div class = "logo">
                <a href = "https://theimaara.co.ke/sp/"><img src="https://theimaara.co.ke/assets/Logos/imaaralogo.png" alt="logo" /></a>
            </div>
            <!--Logo-end-->
        </div>

        <!--Search-->
        <div class="search-container">
            
            
        </div>

    </div>
    
    <!--White Navbar-->
    <nav class="navbar-white">
        <ul class="links">
            <!--Shopping-->
            <li class="dropdown">
                <a href = "/sp/stores">Stores</a>
                <div class="dropdown-content">
                   <!--
 <a href="#">Naivas</a>
                    <a href="#">Littlemore</a>
                    <a href="#">Hotpoint</a>
                    <a href="#">Silentnight</a>
                    <a href="#">Bata</a>
                     <a href="#">Umoja</a>
-->
                </div>
            </li>

            <li class="dropdown">
                <a href = "https://theimaara.co.ke/entertainment">Entertainment</a>
                <div class="dropdown-content">
<!--
<a href="#">The Manhattan</a>
                    <a href="#">Art Club</a>
                    <a href="#">Fantasy World</a>
                    <a href="#">TWS</a>
                </div>
-->
                    
            </li>

            <li class="dropdown">
                <a href = "/sp/dine">Dine</a>
                <div class="dropdown-content">
<!--
<a href="#">CJ's</a>
                    <a href="#">Big Knife</a>
                    <a href="#">Chicken Inn</a>
                    <a href="#">Pizza Inn</a>
                    <a href="#">Galitos</a>
                    <a href="#">Boba Cafe</a>
-->
                    
                </div>
            </li>
            <li class="dropdown">
                <a href = "https://theimaara.co.ke/services" >Services</a>
                <div class="dropdown-content">
<!--
 <a href="#">KCB Bank</a>
                    <a href="#">Stanbic Bank</a>
                    <a href="#">DTB Bank</a>
                    <a href="#">Equity Bank</a>
                    <a href="#">Bank of Baroda</a>
                    <a href="#">TenderCare</a>
                    <a href="#">Optica</a>
                    <a href="#">V Spa</a>
-->
                   
                </div>
            </li>
        </ul>
        
    </nav>

    <!--black navbar-->
    <div class="nav-container">
        <ul class="links">
            <li><a href="">Offers</a></li>
            <li><a href="">Events</a></li>
            <li><a href="">Gallery</a></li>
            <li><a href="https://theimaara.co.ke/map/">Map</a></li>
            <li><a href="https://theimaara.co.ke/parking">Parking</a></li>
        </ul>
    </div>
    <!--Header-end-->

<script>
document.addEventListener("DOMContentLoaded", function () {
    const statusText = document.getElementById("status-text");
    const openTime = 8; // 8:00 AM
    const closeTime = 23; // 11:00 PM

    function updateStatus() {
        const now = new Date();
        const currentHour = now.getHours();

        if (currentHour >= openTime && currentHour < closeTime) {
            statusText.textContent = "Open till 11PM";
            statusText.style.color = "black";
        } else {
            statusText.textContent = "We are Closed";
            statusText.style.color = "red";
        }
    }

    updateStatus(); // Initial check
    setInterval(updateStatus, 1000 * 60); // Update status every minute
});
</script>

<script>
function updateClock() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('clock').textContent = timeString;
}

// Update the clock every second
setInterval(updateClock, 1000);

// Initial update
updateClock();
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.querySelector(".menu-toggle");
    const menu = document.querySelector(".menu");

    menuToggle.addEventListener("click", function () {
        menu.classList.toggle("active");
       
        menuToggle.classList.toggle("active");
    });
});
</script>
<div class="title">
    <h2>Upcoming Events</h2>
</div>
<div class="media">
<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "events_db";

// Create a connection to the database
$mysqli = new mysqli($host, $username, $password, $database);

// Check if the connection was successful
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

//Get current date
$currentDate= date("Y-m-d");

// Query to retrieve data from the "events" table
$query = "SELECT event_id, media_url,event_type, description, event_date FROM events ORDER BY ABS(DATEDIFF(event_date, '$currentDate'))";

// Execute the query
$result = $mysqli->query($query);

// Check if the query was successful
if ($result) {
    // Loop through the results and fetch each row as an associative array
    while ($row = $result->fetch_assoc()) {
        $event_id = $row['event_id'];
        $event_type = $row['event_type'];
        $media_url = $row['media_url'];
        $description = $row['description'];
        $event_date = $row['event_date'];

        // Use the retrieved data as needed
        if($event_type == 'Image'){
            echo "<div class = 'event-data'>";
        
            echo "<img src='./src/php/$media_url' $media_url>";
            echo "<div class = 'text'>";
            echo "<div class = 'description'><span>Title:</span> $description</div>";
            echo "<div class = 'date'>";
            echo "Event Date: $event_date";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        else{
            echo "<div class = 'event-data'>";
        
            echo "<video autoplay loop muted controls src='./src/php/$media_url' $media_url></video>";
            echo "<div class = 'text'>";
            echo "<div class = 'description'><span>Title: </span>$description</div>";
            echo "<div class = 'date'>";
            echo "Event Date: $event_date";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
       
        
    }

    // Free the result set
    $result->free();
} else {
    echo "<h1 style='text-align: center; align-items:center;'>There are no Events coming soon</h1>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
</div>

<!--Footer-->
<style>
            /*footer*/
            .footer{
                background-image: url('../img/petals.png');
                background-size: cover;
               
            
            }
            
            .newsletter .logo{
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }
            
            .newsletter .logo img{
                width: 80px;
                height: 80px;
            }
            
            .newsletter .form{
                display: block;
            }
            
            .newsletter .form p{
                font-size: 24px;
            }
            
            .newsletter [type="email"], input[type="text"]{
                width: 100% !important;
                height: 50px;
                border: 2px solid #000;
                border-radius: 8px;
                margin: 5px;
            }
            
            
            .links{
                
            }
            
            .links p{
                margin-top: 2rem;
                font-size: 28px;
                font-weight: 300;
            }
            
            .links .line{
                width: 60%;
                height: 2px;
                background-color: rgb(226, 43, 195);
                margin-bottom: 1rem;
            }
            
            .links ul{
                list-style: none;
            }
            
            .links ul li a{
                text-decoration: none;
                color: black;
                font-size: 20px;
                font-weight: 300;
                line-height: 2;
            }
            
            .links ul li a:hover{
                color: rgb(226, 43, 195);
                transition: all ease .4s;
            }
            
            .contacts{
                
            }
            
            .contacts p{
                margin-top: 2rem;
                font-size: 28px;
                font-weight: 300;
            }
            
            .contacts .line{
                width: 60%;
                height: 2px;
                background-color: rgb(226, 43, 195);
                margin-bottom: 1rem;
            }
            
            .contacts ul{
                list-style: none;
            }
            
            .contacts ul li{
                text-decoration: none;
                color: black;
                font-size: 20px;
                font-weight: 300;
                line-height: 2;
            }
            
            .contacts ul li:hover{
                color: rgb(226, 43, 195);
                transition: all ease .4s;
                cursor: auto;
            }
            
            .contacts ul li i{
                color: rgb(226, 43, 195);
            }
            
            .contacts .socials{
                display: flex;
                gap: 2rem;
            }
            
            .contacts .socials .ig:hover{
                color: blueviolet;
                transition: all ease .5s;
            }
            
            .contacts .socials .tx:hover{
                color: rgb(43, 144, 226);
                transition: all ease .5s;
            }
            
            .contacts .socials .fb:hover{
                color: cornflowerblue;
                transition: all ease .5s;
            }
            
            .contacts .socials .wa:hover{
                color: rgb(43, 226, 83);
                transition: all ease .5s;
            }
            
            .directions p{
                margin-top: 2rem;
                font-size: 28px;
                font-weight: 300;
            }
            
            .directions .line{
                width: 60%;
                height: 2px;
                background-color: rgb(226, 43, 195);
                margin-bottom: 1rem;
            }
            
            .directions h3{
                font-weight: 300;
                font-size: 20px;
            }
            
            .bottom{
                background: #000;
                color: #fff !important;
            }
            .bottom p{
                margin-top: 1rem;
            }
            </style>
            <div class="container-fluid ">
                    <div class="row footer">
                      <div class="col-lg-3 col-md-6 col-sm-12 newsletter">
                        <div class="logo">
                           <a href = "https://sitepad.local/"><img src="https://theimaara.co.ke/assets/Logos/imaaralogo.png" alt="logo" /></a>
                        </div>
            
                        <div class="form">
                            <p>Subscribe to our Newsletter</p>
                            <input type="email" placeholder="Email" name="email">
                            <input type="text" placeholder="Name" name="name" id="name">
            
                            <button type="submit" class="btn btn-dark btn-submit">Subscribe</button>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 links">
                        <p>Useful Links</p>
                        <div class="line"></div>
            
                        <ul>
                            <li><a href="">About Us</a></li>
                            <li><a href="">Events & Offers</a></li>
                            <li><a href="">Gallery</a></li>
                            <li><a href="">Tenants</a></li>
                            <li><a href="">Stores</a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6 contacts">
                        <p>Contacts</p>
                        <div class="line"></div>
                        <ul>
                            <li> <i class="bi bi-telephone-fill"></i>  : 0714 800 800</li>
                            <li><i class="bi bi-envelope-at-fill"></i>  : imaara@tuffsteel.co.ke</li>
                            <li><i class="bi bi-envelope-paper-fill"></i>  : P.O. BOX. XXX-XXX</li>
                        </ul>
            
                        <p>Socials</p>
                        <div class="line"></div>
                        <ul class="socials">
                            <li><a href=""><i class="bi bi-instagram ig" style="font-size: 2rem;"></i></a></li>
                            <li><a href=""><i class="bi bi-twitter-x tx" style="font-size: 2rem;"></i></a></li>
                            <li><a href=""><i class="bi bi-facebook fb"  style="font-size: 2rem;"></i></a></li>
                            <li><a href=""><i class="bi bi-whatsapp wa" style="font-size: 2rem;"></i></a></li>
                        </ul>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-12 directions">
                        <p>Find Us Here</p>
                        <div class="line"></div>
                        <h3><i class="bi bi-geo-alt" style="color: rgb(226, 43, 195);"></i>  Imaara Daima, Off Mombasa Road, Nairobi, Kenya</h3>
            
                        <div style="width: 100%"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=The%20Imaara%20Mall,Imaara%20Daima,%20Nairobi,%20Kenya+(The%20Imaara%20Mall)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/population/">Population calculator map</a></iframe></div>
            
                      </div>
                    </div>
                    <div class="row text-center bottom">
                        <p><i class="bi bi-c-circle"></i>  The Imaara Mall 2023</p>
                    </div>
                  </div>
                <script src="./assets/js/index.js"></script>
            
                <!--Bootstrap-->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
  </html>
<?php

?>
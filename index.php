<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include('../upload_image/upload.php');
    include('../connection/connection.php');
    ?>
    <meta charset="UTF-8">
    
   <!-- <link rel="stylesheet" href="../newcss/forindex.css"> -->

   


    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index.com</title>
    <script src="../homepage/passwordvisibility.js"></script>
</head>
<body>
    <div class="content">
        <p>This is where you can find amazing products at great prices.</p>

        <p>
    <a href="../seller/sellerreg.php">
        <button id="seller" class="seller" name="seller">Sell My Item</button>
    </a>
    </p>
   

    <div id="admin_gmail">admin@evedeal.com</div>
</p>

    </div>

    <div class="navbar">
        <div id="Logo">Everest Deal</div>
        <a href="../views/index.php" class="left">Home</a>

        <div class="search">
            <form method="GET" action="">
                <input type="text" id="search" name="query" placeholder="Search...">
                <button id="searchButton" type="submit">Search</button>
            </form>
        </div>

        <a href="../login/loginform.php">
            <div class="cart">
                <div id="quantity">My cart[0]</div>
            </div>
        </a>

        <div class="auth-buttons">
            <a href="../login/loginform.php" class="auth-button">Login</a>
            <a href="../signup/signupform.php" class="auth-button">Sign Up</a>
        </div>
    </div>








    <div id="display" class="display">
        <table>
            <?php
            if(isset($_GET['query'])) {
                $search_query = $_GET['query'];
                $sql = "SELECT * FROM project_images WHERE title LIKE '%$search_query%'";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '
                                <div><img src="../upload_image/uploads/'.$row['images'].'" width="400px" height="600px"></div>
                                <div>Name of Item: '.$row['title'].'</div>
                                <div>Renting Price: '.$row['rentingprice'].'</div>
                                <div>Selling Price: '.$row['sellingprice'].'</div>
                                <div>'.$row['description'].'</div>
                                <div><a href="../login/loginform.php"><button class="add_to_cart" name="add_to_cart" button type="submit">Add to Cart</button></a></td>
                              ';
                    }
                } else {
                    echo '<tr><td colspan="5">No records found</td></tr>';
                }
            } else {
                // If no search query is provided, display all products
                $res = mysqli_query($conn, "SELECT * FROM project_images ORDER BY id DESC");
                if (!$res) {
                    die("Error: " . mysqli_error($conn)); 
                }

                if (mysqli_num_rows($res) > 0) {
                    while($row = mysqli_fetch_array($res)) {
                        echo '<tr>
                                <div><img src="../upload_image/uploads/'.$row['images'].'" width="400px" height="600px"></div>
                                <div>Name of Item: '.$row['title'].'</div>
                                <div>Renting Price: '.$row['rentingprice'].'</div>
                                <div>Selling Price: '.$row['sellingprice'].'</div>
                                <div>'.$row['description'].'</div>
                                <div><a href="../login/loginform.php"><button class="add_to_cart" name="add_to_cart" button type="submit">Add to Cart</button></a></div>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No records found</td></tr>';
                }
            }
            ?>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchButton = document.getElementById('searchButton');
            const searchInput = document.getElementById('searchInput');
            
            searchButton.addEventListener('click', function() {
                search(); // Call the search function when the button is clicked
            });

            searchInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    search(); // Call the search function when Enter is pressed
                }
            });

            // Define the search function
            function search() {
                let searchValue = searchInput.value.trim();

                // Redirect to the same page with the search query as a parameter
                window.location.href = 'index.php?query=' + searchValue;
            }
        });

       

    </script>



<footer>
        Feel free to contact us, we will be at your service.
        <div>
            <p>Contact our admin:</p>
        <p> 01-426392<p>
        <p>  9851100022</p>
    </div>
    <div>
        Mail us your every types of problem at :admin@evedeal.com
    </div>
    </footer>
</body>
</html>

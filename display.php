<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../upload_image/upload.php');
    include('../connection/connection.php');
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="display" class="display">
<form method="post" action="">
        <table>
            <!-- <tr>
            <div>Image:</div>
            <div>Title:</div>
            <th>Description:</th> -->

        <!-- </tr> -->

        <?php
    $res = mysqli_query($conn, "SELECT * FROM project_images ORDER BY id DESC");
    if (!$res) {
        die("Error: " . mysqli_error($conn)); // Print error if query fails
    }

    if (mysqli_num_rows($res) > 0) {
        // Fetch and display data if there are rows returned
        while($row = mysqli_fetch_array($res)) {
            echo '<tr>
                    <div id="image" name="image"><img src="../upload_image/uploads/'.$row['images'].'"  width="400px" height="600px"></div>

                    

                    <div id="title" name="title">'.$row['title'].'</div>

                     <div id="description" name="description">'.$row['description'].'</div>

                     <button class="add_to_cart" name="add" id="add" button type="submit">Add to Cart</button>
                  </tr>';
        }
    } else {
        // Display a message if no data is found
        echo '<tr>
                <div class="no_info">No records found</div>
              </tr>';
              
    }
    
    

    ?>




    
    
    
    
    
</body>
</html>

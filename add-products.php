<?php
require 'config/database.php';
?>


<!-- // we will simply create a form to add product details. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Add Product</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" name="name" id="name" placeholder="Enter product name">
            </div>
            <div class="form-group">
                <label for="category">Product Category</label>
                <input type="text" name="category" id="category" placeholder="Enter product category">
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Add Product</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_SESSION['add-success'])) {
    echo $_SESSION['add-success'];
    unset($_SESSION['add-success']);
}

if (isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $image = $_FILES['image'];


    //skipping the validations for later

    //before we write the query for the post, we will move the images to the local directory to be used in renders
    //we will also make the name of the image unique by appending the time

    $time = time();

    $image_name = $time . $image['name'];

    //destination path for the image will be the static/images/
    $destination_path = "static/images/" . $image_name;

    //supposing that only images will be uploaded
    move_uploaded_file($image['tmp_name'], $destination_path);

    $add_product_query = "INSERT INTO products (name, category, image) VALUES('$name', '$category', '$image_name') ";

    $add_product_result = mysqli_query($connection, $add_product_query);

    if (!mysqli_errno($connection)) {
        $_SESSION['add-success'] = "Product Added";
    }
}

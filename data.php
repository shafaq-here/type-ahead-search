<?php
include('config/database.php');
$user_input = filter_var($_POST['user_input'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); //sanitizing the input 

$query = "SELECT * FROM products WHERE name LIKE '" . $user_input . "%'";

$result = mysqli_query($connection, $query);

$output = "";

while ($data = mysqli_fetch_array($result)) {
    $output .= '<li>
                    <img src="./static/images/' . $data['image'] . '" alt="phone">
                    <div class="product">
                        <h3>' . $data['name'] . '</h3>
                        <h4>in ' . $data['category'] . '</h4>
                    </div>

                </li>';
}

echo $output;

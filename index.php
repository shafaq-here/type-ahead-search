<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typeahead Search</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
    <div class="main-container">
        <div class="form-section">
            <form action="">
                <input type="text" id="user-input" placeholder="Search Products" class="search-bar">
                <button type="submit" class="btn"><i class="uil uil-search"></i></button>
            </form>
        </div>
        <div class="results-section" id="results">
            <ul id="dropdata">
              
            </ul>
        </div>
    </div>
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="jquery/jquery.js"></script>
</body>

</html>
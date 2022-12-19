<?php
require_once '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$servername = $_ENV['servername'];
$username = $_ENV['username'];
$password = $_ENV['password'];

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db('rmrbot');
//echo "Connected successfully";
class ages{
    public function display($conn, $rown="0"): void
    {
        $result = $conn->query("SELECT * FROM user");
        $count = 0;
        while($row = mysqli_fetch_row($result)) {
            $count += 1;
            echo "<br><b>$count</b>. " . htmlspecialchars($row[$rown]);
        }
    }


}

$ages = new ages();
//$ages->display($servername, $username, $password, "0");


?>
<!doctype html>
<html lang="">
<head>
    <title>Roleplay Meets: Home</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <!-- integrated Scripts - not working right now, fixing later
    <script src="{{ asset('js/app.js') }}" defer></script>-->
    <!-- integrated Styles - not working right now, fixing later
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-expand-xl navbar">
        <div class="container ">
            <a class="navbar-brand" href="index.php">Roleplay Meets: Reborn</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rules.php">Rules</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="container-md mt-5">
    <div class="row justify-content-center">
        <div class="col-xl-7 border-primary border filler m-1" >
            <div class="container-fluid mt-5">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-5 border-primary border m-1" >
                        <p class="h3">User ID</p>
                        <?php
                        $ages->display($conn, "0");
                        ?>
                    </div>
                    <div class="col-xl-4 col-4 border-primary border m-1" >
                        <p class="h3">Dobs</p>
                        <?php
                        $ages->display($conn, "1");
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4  border-primary border filler2 m-1 p-0">
            <?php
            $result = $conn->query("SELECT * FROM user");
            $counted = count(mysqli_fetch_all($result));
            echo "<h3 class='h3'>Recorded entries: $counted</h3>";
            ?>
            <h1>To do:</h1>
            <ul>
                <li>Make a search function</li>
                <li>Make a decent layout</li>
                <li>Make a search function</li>
                <li><strike>Count how much users are recorded</strike></li>
                <li>Add Function</li>
                <li>Remove Function</li>
                <li>Login</li>
            </ul>
            <h3>useful links:</h3>
            <a href="https://stackoverflow.com/questions/129677/how-can-i-sanitize-user-input-with-php">https://stackoverflow.com/questions/129677/how-can-i-sanitize-user-input-with-php</a>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

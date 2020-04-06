<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rent a Flat</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/index-design.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="div1">
    <div class="div1-1">
        <h1>Rent-a-Flat</h1>
        <form method="POST" action="index.php#div-2">
            <input type="text" name="pinCode" placeholder="Enter your Pin Code"><br>
            <select name="bhk">
                <option value="1 BHK">1 BHK</option>
                <option value="2 BHK">2 BHK</option>
                <option value="3 BHK">3 BHK</option>
            </select><br>
            <input type="submit" value="Search" name="submit" id="open">
        </form>
</div>
</div>

<div class="div2" id="div-2">
    <h2>Flats available near you are...</h2>

    <div class="div2-1">

        <?php
        if(isset($_POST['submit'])) {

            $pin = $_POST['pinCode'];
            $bhk = $_POST['bhk'];

            if (!empty($pin) and !empty($bhk)) {

                $conn = new mysqli('localhost', 'root', '', 'project');

                if ($conn->connect_error) {
                    die("Connection Error" . $conn->connect_error);
                } else {
                    $sql = "SELECT * FROM data where pin=$pin AND bhk='$bhk'";

                    $result = mysqli_query($conn, $sql);

                    while ($data = mysqli_fetch_array($result)) {

                            echo '<div class="div2-2">';
                            echo '<img src="img/',$data['image'],'">';
                            echo '<p>',$data['name'],'</p>';
                            echo '<p>',$data['bhk'],'</p>';
                            echo '<p>',$data['address'],'</p>';
                            echo '<p>',$data['pin'],'</p>';
                            echo '<a href="tel:',$data['phone'],'"><button>Call Now</button></a>';
                            echo '</div>';
                    }
                    $conn->close();
                }
            }
        }
        ?>

    </div>
</div>

</body>
</html>

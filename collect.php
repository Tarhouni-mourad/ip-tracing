<?php
var_dump($_POST); // Insert the debugging line here

$conn = mysqli_connect("localhost", "root", "", "ipaddress");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>website</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <a href="data.php">Data</a>
    <script type="text/javascript">
        $(document).ready(function(){
            $.getJSON('http://ip-api.com/json', function(ip){
                var data = {
                    ip:      ip.query,
                    isp:     ip.isp,
                    country: ip.country,
                    city:    ip.regionName
                };
                $.ajax({
                    url:  'data.php',
                    type: 'post',
                    data: data,
                    success: function(response) {
                        console.log(response); // Check response for any debugging
                    },
                    error: function(xhr, status, error) {
                        console.error(status, error); // Log any errors for debugging
                    }
                });
            });
        });
    </script>
</body>
</html>

<?php 
if(isset($_POST['ip'], $_POST['isp'], $_POST['country'], $_POST['city'])){
    $ip = $_POST['ip'];
    $isp = $_POST['isp'];
    $country = $_POST['country'];
    $city = $_POST['city'];

    $query = "INSERT INTO tb_data (ip, isp, country, city) VALUES ('$ip', '$isp', '$country', '$city')";
    if(mysqli_query($conn, $query)) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>

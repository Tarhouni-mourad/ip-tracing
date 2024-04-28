<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<body>
    <table border="1">
        <tr>
        <td>Id</td>
        <td>IP</td>
        <td>ISP</td>
        <td>Country</td>
        <td>City</td>
        </tr>
        <?php
        require 'config.php';
        $row = mysqli_query($conn, "SELECT * FROM tb_data");
        ?>
        <?php foreach($row as $row) : ?>
        <tr>
        <td>Visitor <?php echo $row["id"]; ?></td>
        <td><?php echo $row["ip"]; ?></td>
        <td>Visitor <?php echo $row["isp"]; ?></td>
        <td>Visitor <?php echo $row["country"]; ?></td>
        <td>Visitor <?php echo $row["city"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="index.php">Index</a>
</body>
</html>
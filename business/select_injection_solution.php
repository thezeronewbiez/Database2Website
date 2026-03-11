<?php
require "connect.php";

$cid = $_GET["CustomerID"];

$sql = "SELECT CustomerID , Name , OutstandingDebt , CountryName , Email 
        FROM customer , country 
        WHERE CustomerID = :CustomerID 
        AND customer.CountryCode = country.CountryCode";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':CustomerID', $cid);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Customer Information</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f9;
            text-align: center;
        }

        h2 {
            margin-top: 40px;
        }

        table {
            border-collapse: collapse;
            margin: 30px auto;
            width: 70%;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            background: #007BFF;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        tr:hover {
            background: #e9f3ff;
        }
    </style>
</head>

<body>

    <h2>Customer Information</h2>

    <table>
        <tr>
            <th>CustomerID</th>
            <th>Name</th>
            <th>Outstanding Debt</th>
            <th>Country</th>
            <th>Email</th>
        </tr>

        <?php
        while ($row = $stmt->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['CustomerID'] . "</td>";
            echo "<td>" . $row['Name'] . "</td>";
            echo "<td>" . $row['OutstandingDebt'] . "</td>";
            echo "<td>" . $row['CountryName'] . "</td>";
            echo "<td>" . $row['Email'] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>

<?php
$conn = null;
?>
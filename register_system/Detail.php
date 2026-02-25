<html>

<head>
    <title> Display Selected Student Information </title>
</head>

<body>

    <?php
    if (isset($_GET["Register_ID"])) {
        $strCustomerID = $_GET["Register_ID"];
    }
    echo $strCustomerID;

    require "connect.php";
    $sql = "SELECT * FROM register_detail , course WHERE course.Course_ID = register_detail.Course_ID AND Register_ID = ?";
    $params = array($strCustomerID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <table width="800" border="1">
        <tr>
            <th width="40">
                <div align="center">รหัสวิชา </div>
            <th width="140">
                <div align="center">ชื่อวิชา </div>
            <th width="50">
                <div align="center">หน่วยกิต </div>
            </th>
            <th width="50">
                <div align="center">เกรด</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>
                    <?php echo $result["Course_ID"]; ?>
                </td>
                <td>
                    <?php echo $result["Course_name"]; ?>
                </td>
                <td><?php echo $result['Course_credit']; ?></div>
                </td>
                <td><?php echo $result["Grade"]; ?></div>
                </td>
            <?php
        }
        $conn = null;
            ?>
    </table>
</body>

</html>
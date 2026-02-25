<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require "connect.php";
    $sql = "SELECT * FROM register , student WHERE  register.Student_ID = student.Student_ID;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    ?>

    <table width="800" border="1">
        <tr>
            <th width="90">
                <div align="center">รหัสผู้ใช้ </div>
            </th>
            <th width="140">
                <div align="center">ชื่อ </div>
            <th width="140">
                <div align="center">นามสกุล </div>
            <th width="50">
                <div align="center">ปี </div>
            </th>
            <th width="100">
                <div align="center">เทอม </div>
            </th>
            </th>
            <th width="140">
                <div align="center">ข้อมูลแสดงเกรด </div>
            </th>
            <th width="140">
                <div align="center">วันที่ลงทะเบียน</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>
                <td>
                    <?php echo $result["Student_ID"]; ?>

                </td>

                <td>
                    <?php echo $result["Student_Fname"]; ?>
                </td>
                <td>
                    <?php echo $result["Student_Lname"]; ?>
                </td>
                <td><?php echo $result['Years']; ?></div>
                </td>

                <td><?php echo $result["Term"]; ?></div>
                </td>
                <td>
                    <a href="detail.php?Register_ID=<?php echo $result['Register_ID']; ?>">
                        ดูผลการเรียน
                    </a>
                </td>
                <td><?php echo $result["Regis_dateTime"]; ?></td>

            </tr>

        <?php
        }
        ?>

    </table>

</body>

</html>
<?php
if (isset($_GET['CustomerID'])) {
    require 'connect.php';
    $CustomerID = $_GET['CustomerID'];


    $sql = "DELETE FROM customer WHERE CustomerID = :CustomerID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CustomerID', $CustomerID);


    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "ลบข้อมูลสำเร็จ!",
                text: "ข้อมูลลูกค้าถูกลบออกจากระบบแล้ว",
                type: "success",
                timer: 2000,
                showConfirmButton: false
            }, function(){
                window.location.href = "index.php"; // กลับหน้าหลัก
            });
        });
        </script>
        ';
    } else {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "เกิดข้อผิดพลาด!",
                text: "ไม่สามารถลบข้อมูลได้",
                type: "error"
            }, function(){
                window.location.href = "index.php";
            });
        });
        </script>
        ';
    }
    $conn = null;
} else {
    header("Location: index.php");
    exit();
}

<?php
require 'connect.php';

if (isset($_POST['CustomerID'])) {


    $CustomerID = $_POST['CustomerID'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Birthdate = $_POST['Birthdate'];
    $CountryCode = $_POST['CountryCode'];
    $OutstandingDebt = $_POST['OutstandingDebt'];


    $sql = "UPDATE customer SET Name = :Name, Email = :Email , Birthdate = :Birthdate , OutstandingDebt = :OutstandingDebt , Birthdate = :Birthdate , CountryCode = :CountryCode WHERE CustomerID = :CustomerID";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Name', $Name);
    $stmt->bindParam(':Email', $Email);
    $stmt->bindParam(':Birthdate', $Birthdate);
    $stmt->bindParam(':CustomerID', $CustomerID);
    $stmt->bindParam(':CountryCode', $CountryCode);
    $stmt->bindParam(':OutstandingDebt', $OutstandingDebt);

    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        $(document).ready(function(){
            swal({
                title: "Success!",
                text: "Successfully updated customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        </script>
        ';
    }
    $conn = null;
}

<?php
include('conn.php');

if (isset($_POST['submit'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cin_c = $_POST["cin_c"];
        $nom_c = $_POST["nom_c"];
        $prenom_c = $_POST["prenom_c"];
        $addresse_c = $_POST["addresse_c"];
        $num_c = $_POST["num_c"];

        $cin_c = mysqli_real_escape_string($conn, $cin_c);
        $nom_c = mysqli_real_escape_string($conn, $nom_c);
        $prenom_c = mysqli_real_escape_string($conn, $prenom_c);
        $addresse_c = mysqli_real_escape_string($conn, $addresse_c);
        $num_c = mysqli_real_escape_string($conn, $num_c);

        $sql = "INSERT INTO COACH (CIN_C, NOM_C, PRENOM_C, ADDRESSE_C, NUM_C) VALUES ('$cin_c', '$nom_c', '$prenom_c', '$addresse_c', '$num_c')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Coach added successfully');</script>";
        } else {
            echo "<script>alert('An error occurred while adding the coach.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coach</title>
    <link rel="stylesheet" href="add.css">
</head>
<body>
<div class="login-box">
    <form action="" method="post">
        <div class="user-box">
            <input type="text" name="cin_c" id="cin_c" required>
            <label>CIN</label>
        </div>
        <div class="user-box">
            <input type="text" name="nom_c" id="nom_c" required>
            <label>First Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="prenom_c" id="prenom_c" required>
            <label>Last Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="addresse_c" id="addresse_c" required>
            <label>Address</label>
        </div>
        <div class="user-box">
            <input type="text" name="num_c" id="num_c" required>
            <label>Phone Number</label>
        </div>
        <input type="submit" name="submit" value="Add Coach" class="insert">
    </form>
</div>
</body>
</html>

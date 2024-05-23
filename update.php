<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_coach'])) {
    $cin_c = $_POST['edit_coach'];
    $sql = "SELECT * FROM COACH WHERE CIN_C = '$cin_c'";
    $result = mysqli_query($conn, $sql);
    $coach = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_coach'])) {
    $cin_c = $_POST['cin_c'];
    $nom_c = $_POST['nom_c'];
    $prenom_c = $_POST['prenom_c'];
    $addresse_c = $_POST['addresse_c'];
    $num_c = $_POST['num_c'];

    $sql = "UPDATE COACH SET 
            NOM_C = '$nom_c', 
            PRENOM_C = '$prenom_c', 
            ADDRESSE_C = '$addresse_c', 
            NUM_C = '$num_c' 
            WHERE CIN_C = '$cin_c'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Coach updated successfully');</script>";
        header('Location: all.php');
        exit;
    } else {
        echo "<script>alert('Error updating coach: " . mysqli_error($conn) . "');</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Coach</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="login-box">
    <div class="card-image"></div>
    <form action="" method="post">
        <input type="hidden" name="cin_c" value="<?php echo $coach['CIN_C']; ?>">
        <div class="user-box">
            <input type="text" name="nom_c" value="<?php echo $coach['NOM_C']; ?>" required>
            <label>First Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="prenom_c" value="<?php echo $coach['PRENOM_C']; ?>" required>
            <label>Last Name</label>
        </div>
        <div class="user-box">
            <input type="text" name="addresse_c" value="<?php echo $coach['ADDRESSE_C']; ?>" required>
            <label>Address</label>
        </div>
        <div class="user-box">
            <input type="text" name="num_c" value="<?php echo $coach['NUM_C']; ?>" required>
            <label>Phone Number</label>
        </div>
        <input type="submit" name="update_coach" value="Update Coach" class="insert">
    </form>
</div>
</body>
</html>

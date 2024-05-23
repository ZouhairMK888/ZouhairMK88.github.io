<?php 
include('conn.php');

$allCoaches = array();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_coach'])) {
    $cin_c = $_POST['delete_coach'];
    $sql_delete_coach = "DELETE FROM COACH WHERE CIN_C = '$cin_c'";
    if (mysqli_query($conn, $sql_delete_coach)) {
        echo "<script>alert('Coach deleted successfully');</script>";
        header("Refresh:0");
    } else {
        echo "<script>alert('Error deleting the coach: " . mysqli_error($conn) . "');</script>";
    }
}

$sql = "SELECT CIN_C, NOM_C, PRENOM_C, ADDRESSE_C, NUM_C FROM COACH"; 

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $allCoaches[] = $row;
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Coaches</title>
    <link rel="stylesheet" href="all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="margin: 0 20px 0 20px;">
    <h1 class="title"><i class="fas fa-list"></i> List of Coaches</h1><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>CIN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th style="width: 400px;">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($allCoaches)) {
            foreach ($allCoaches as $row) {
                echo "<tr>
                        <td>". $row["CIN_C"]."</td>
                        <td>". $row["NOM_C"]."</td>
                        <td>". $row["PRENOM_C"]."</td>
                        <td>". $row["ADDRESSE_C"]."</td>
                        <td>". $row["NUM_C"]."</td>
                        <td>
                            <div class='btn-group'>
                                <form method='post' action='update.php'>
                                    <input type='hidden' name='edit_coach' value='". $row["CIN_C"]."'>
                                    <button type='submit' class='btn btn-success btn-sm'><i class=\"fas fa-edit\"></i> Update</button>
                                </form>
                                <form method='post' action='' onsubmit='return confirmDelete()'>
                                    <input type='hidden' name='delete_coach' value='". $row["CIN_C"]."'>
                                    <button type='submit' class='btn btn-danger btn-sm'><i class=\"fas fa-trash\"></i> Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No coaches found</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this coach?');
        }
    </script>
</body>
</html>

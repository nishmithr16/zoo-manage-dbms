<?php
// animal_add.php
include 'db_connect.php';

// Fetch enclosures for dropdown
$enclosure_sql = "SELECT enclosure_id, name FROM enclosure";
$enclosure_result = $conn->query($enclosure_sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $species = $conn->real_escape_string($_POST['species']);
    $age = (int)$_POST['age'];
    $gender = $conn->real_escape_string($_POST['gender']);
    $habitat = $conn->real_escape_string($_POST['habitat']);
    $medical_history = $conn->real_escape_string($_POST['medical_history']);
    $enclosure_id = (int)$_POST['enclosure_id'];

    $sql = "INSERT INTO animal (species, age, gender, habitat, medical_history, enclosure_id) 
            VALUES ('$species', $age, '$gender', '$habitat', '$medical_history', $enclosure_id)";

    if ($conn->query($sql) === TRUE) {
        header("Location: animal_view.php");
        exit();
    } else {
        $error = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Add New Animal</h2>
        <?php if (isset($error)) echo '<div class="alert alert-danger">' . $error . '</div>'; ?>
        
        <form method="post" action="animal_add.php">
            <div class="mb-3">
                <label for="species" class="form-label">Species</label>
                <input type="text" class="form-control" id="species" name="species" required>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Unknown">Unknown</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="habitat" class="form-label">Habitat</label>
                <input type="text" class="form-control" id="habitat" name="habitat">
            </div>
            <div class="mb-3">
                <label for="medical_history" class="form-label">Medical History</label>
                <textarea class="form-control" id="medical_history" name="medical_history" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="enclosure_id" class="form-label">Assigned Enclosure</label>
                <select class="form-control" id="enclosure_id" name="enclosure_id" required>
                    <option value="">Select Enclosure</option>
                    <?php 
                    if ($enclosure_result->num_rows > 0) {
                        while($row = $enclosure_result->fetch_assoc()) {
                            echo "<option value='" . $row['enclosure_id'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save Animal</button>
            <a href="animal_view.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>
<?php
// animal_view.php
include 'db_connect.php';

$sql = "SELECT a.*, e.name as enclosure_name FROM animal a LEFT JOIN enclosure e ON a.enclosure_id = e.enclosure_id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Animal Management 🐾</h2>
        <a href="animal_add.php" class="btn btn-success mb-3">Add New Animal</a>
        <a href="index1.php" class="btn btn-primary mb-3 float-end">Back to Dashboard</a>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Species</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Habitat</th>
                    <th>Enclosure</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["animal_id"] . "</td>";
                        echo "<td>" . $row["species"] . "</td>";
                        echo "<td>" . $row["age"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["habitat"] . "</td>";
                        echo "<td>" . ($row["enclosure_name"] ? $row["enclosure_name"] : 'N/A') . "</td>";
                        echo "<td>
                                <a href='animal_edit.php?id=" . $row["animal_id"] . "' class='btn btn-sm btn-info me-2'>Edit</a>
                                <a href='animal_delete.php?id=" . $row["animal_id"] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No animals found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
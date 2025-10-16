<?php
// feeding_view.php
include 'db_connect.php';

// SQL query to join feeding, animal, and zookeeper tables
$sql = "SELECT f.*, a.species, z.name AS zookeeper_name 
        FROM feeding f
        LEFT JOIN animal a ON f.animal_id = a.animal_id
        LEFT JOIN zookeeper z ON f.zookeeper_id = z.zookeeper_id
        ORDER BY f.feeding_time DESC";
        
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feeding Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Feeding Schedule 🍽️</h2>
        <a href="feeding_add.php" class="btn btn-secondary mb-3">Record New Feeding</a>
        <a href="index.php" class="btn btn-primary mb-3 float-end">Back to Dashboard</a>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Animal (Species)</th>
                    <th>Feeding Time</th>
                    <th>Food Type</th>
                    <th>Responsible Zookeeper</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["feeding_id"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["species"]) . "</td>";
                        echo "<td>" . $row["feeding_time"] . "</td>";
                        echo "<td>" . $row["food_type"] . "</td>";
                        echo "<td>" . htmlspecialchars($row["zookeeper_name"]) . "</td>";
                        echo "<td>
                                <a href='feeding_edit.php?id=" . $row["feeding_id"] . "' class='btn btn-sm btn-info me-2'>Edit</a>
                                <a href='feeding_delete.php?id=" . $row["feeding_id"] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No feeding records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
<?php
// enclosure_view.php
include 'db_connect.php';

$sql = "SELECT * FROM enclosure";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enclosure Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Enclosure Management 🏡</h2>
        <a href="enclosure_add.php" class="btn btn-success mb-3">Add New Enclosure</a>
        <a href="index.php" class="btn btn-primary mb-3 float-end">Back to Dashboard</a>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Capacity</th>
                    <th>Cleaning Schedule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["enclosure_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["capacity"] . "</td>";
                        echo "<td>" . $row["cleaning_schedule"] . "</td>";
                        echo "<td>
                                <a href='enclosure_edit.php?id=" . $row["enclosure_id"] . "' class='btn btn-sm btn-info me-2'>Edit</a>
                                <a href='enclosure_delete.php?id=" . $row["enclosure_id"] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No enclosures found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
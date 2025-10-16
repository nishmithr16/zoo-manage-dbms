<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// visitor_view.php
include 'db_connect.php';

$sql = "SELECT * FROM visitor";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="mb-4">Visitor Management 👨‍👩‍👧‍👦</h2>
        <a href="visitor_add.php" class="btn btn-danger mb-3">Record New Visitor</a>
        <a href="index.php" class="btn btn-primary mb-3 float-end">Back to Dashboard</a>
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Ticket Type</th>
                    <th>Visit Date</th>
                    <th>Entry Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["visitor_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["ticket_type"] . "</td>";
                        echo "<td>" . $row["visit_date"] . "</td>";
                        echo "<td>" . $row["entry_time"] . "</td>";
                        echo "<td>
                                <a href='visitor_edit.php?id=" . $row["visitor_id"] . "' class='btn btn-sm btn-info me-2'>Edit</a>
                                <a href='visitor_delete.php?id=" . $row["visitor_id"] . "' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No visitors recorded today.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $conn->close(); ?>
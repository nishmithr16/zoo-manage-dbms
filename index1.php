<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db_connect.php'; 
// ... rest of your index.php code
?>
<?php
// index.php
include 'db_connect.php'; // Include connection file for potential data display
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Management Dashboard 🦒</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4 text-primary">Zoo Management System Dashboard</h1>
        <p class="text-center">Welcome, Zookeeper! Select a module to manage the zoo operations.</p>
        
        <hr class="my-4">
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-success">Animal Management 🐾</h5>
                        <p class="card-text">Add, update, and view all animal details.</p>
                        <a href="animal_view.php" class="btn btn-success w-100">Go to Module</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-info">Enclosure Management 🏡</h5>
                        <p class="card-text">Manage habitats, capacity, and cleaning schedules.</p>
                        <a href="enclosure_view.php" class="btn btn-info w-100">Go to Module</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-warning">Zookeeper Management 🧑‍🌾</h5>
                        <p class="card-text">Manage staff data, shifts, and assignments.</p>
                        <a href="zookeeper_view.php" class="btn btn-warning w-100">Go to Module</a>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Visitor Management 👨‍👩‍👧‍👦</h5>
                        <p class="card-text">Record and view visitor ticket and entry details.</p>
                        <a href="visitor_view.php" class="btn btn-danger w-100">Go to Module</a>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title text-secondary">Feeding Schedule 🍽️</h5>
                        <p class="card-text">Maintain records of feeding times and food types.</p>
                        <a href="feeding_view.php" class="btn btn-secondary w-100">Go to Module</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php $conn->close(); ?>
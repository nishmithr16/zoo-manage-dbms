<?php
// index.php
include 'db_connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Management Dashboard 🦒</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* 🌍 GLOBAL BACKGROUND IMAGE */
        body {
            background-image: url('bg.jpeg'); /* 🔁 Replace with your own image link */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* Make the dashboard container slightly transparent */
        #dashboard-content .container {
            background: rgba(255, 255, 255, 0.1);
            
            backdrop-filter: blur(5px);           /* blur strength */
            -webkit-backdrop-filter: blur(5px);   /* for Safari support */
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3)
            
        }

        /* 🌿 Unique Animated Splash Screen */
        .splash-overlay {
            position: fixed;
            inset: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            z-index: 1000;
            animation: fadeOut 1s ease 3s forwards; /* fades away after 3s */
        }

        /* 🖼️ Background with diagonal split effect */
        .splash-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #388e3c 50%, #a5d6a7 50%);
            clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%);
            animation: slideSplit 2.5s ease-in-out forwards;
        }

        /* 🐾 Text styles */
        .splash-content {
            text-align: center;
            color: white;
            z-index: 10;
            animation: fadeIn 2s ease-in-out;
        }

        .splash-title {
            font-size: 3rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 3px 3px 10px rgba(0,0,0,0.5);
        }

        .splash-title span {
            color: #ffe082;
        }

        .splash-subtitle {
            font-size: 1.3rem;
            font-weight: 500;
            margin-top: 10px;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
        }

        /* 🌈 Animations */
        @keyframes slideSplit {
            from { clip-path: polygon(0 100%, 0 100%, 100% 100%, 100% 100%, 0 100%); }
            to { clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 80%, 0 100%); }
        }

        @keyframes fadeOut {
            to { opacity: 0; visibility: hidden; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Hide dashboard initially */
        #dashboard-content {
            opacity: 0;
            transition: opacity 1s;
        }
        .content-show {
            opacity: 1 !important;
        }
    </style>
</head>
<body>
    
    <!-- 🌟 Splash Screen -->
    <div id="splashOverlay" class="splash-overlay">
        <div class="splash-bg"></div>
        <div class="splash-content">
            <h1 class="splash-title">Welcome to the <span>Wildlife Haven Zoo</span> 🦁</h1>
            <p class="splash-subtitle">"From the jungle to our hearts, experience India's wildlife."</p>
        </div>
    </div>

    <!-- 🌿 Dashboard Content -->
    <div id="dashboard-content"> 
        <div class="container my-5">
            <h1 class="text-center mb-4 text-primary"style="color: #01070dff">Wildlife Haven Zoo</h1>
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
    </div>
    
    <!-- 🎬 Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dashboard = document.getElementById('dashboard-content');
            
            // Show dashboard after splash disappears
            setTimeout(() => {
                dashboard.classList.add('content-show');
            }, 2800);
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php $conn->close(); ?>

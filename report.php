<?php
// Start session for form submission
session_start();

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process form data
    $emergencyType = $_POST['emergencyType'] ?? '';
    $location = $_POST['location'] ?? '';
    $description = $_POST['description'] ?? '';
    $severity = $_POST['severity'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $anonymous = isset($_POST['anonymous']) ? 1 : 0;
    
    // Validate inputs
    $errors = [];
    if (empty($emergencyType)) $errors[] = 'Emergency type is required';
    if (empty($location)) $errors[] = 'Location is required';
    if (empty($description)) $errors[] = 'Description is required';
    if (empty($severity)) $errors[] = 'Severity level is required';
    if (empty($contact)) $errors[] = 'Contact information is required';
    
    if (empty($errors)) {
        // Connect to database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "disaster_management";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Prepare and execute SQL
        $stmt = $conn->prepare("INSERT INTO emergency_reports (emergency_type, location, description, severity, contact, anonymous, timestamp) VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssssi", $emergencyType, $location, $description, $severity, $contact, $anonymous);
        
        if ($stmt->execute()) {
            $_SESSION['success_message'] = 'Emergency report submitted successfully!';
            header("Location: report.php?success=1");
            exit();
        } else {
            $errors[] = 'Error submitting report. Please try again.';
        }
        
        $stmt->close();
        $conn->close();
    }
    
    $_SESSION['errors'] = $errors;
    $_SESSION['form_data'] = $_POST;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Emergency - Disaster Management Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/animations.css">
    <style>
        /* All the CSS styles from the original report.html */
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
        }
        .form-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .severity-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }
        .severity-low { background-color: #10B981; }
        .severity-medium { background-color: #F59E0B; }
        .severity-high { background-color: #EF4444; }
        .severity-critical { background-color: #7C3AED; }
        .form-input {
            transition: all 0.3s ease;
            border: 2px solid #E5E7EB;
        }
        .form-input:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .form-input:hover {
            border-color: #93C5FD;
        }
        .submit-btn {
            background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
            transition: all 0.3s ease;
        }
        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }
        .emergency-type-card {
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .emergency-type-card:hover {
            transform: translateY(-5px);
            border-color: #3B82F6;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .emergency-type-card.selected {
            border-color: #3B82F6;
            background-color: #EFF6FF;
        }
        .progress-bar {
            height: 4px;
            background: linear-gradient(90deg, #3B82F6 0%, #60A5FA 100%);
            transition: width 0.3s ease;
        }
        .form-section {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease;
        }
        .form-section.active {
            opacity: 1;
            transform: translateY(0);
        }
        .loading-spinner {
            display: none;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .success-message {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }
        .success-message.active {
            opacity: 1;
            transform: scale(1);
        }
        .error-message {
            animation: shake 0.5s ease-in-out;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        .floating-label {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.3s ease;
            pointer-events: none;
            color: #6B7280;
        }
        .floating-label.active {
            top: 0;
            left: 8px;
            font-size: 0.75rem;
            background: white;
            padding: 0 4px;
            color: #3B82F6;
        }
        .input-wrapper {
            position: relative;
            margin-top: 1rem;
        }
        .input-wrapper input:focus + .floating-label,
        .input-wrapper input:not(:placeholder-shown) + .floating-label {
            top: 0;
            left: 8px;
            font-size: 0.75rem;
            background: white;
            padding: 0 4px;
            color: #3B82F6;
        }
        .ripple {
            position: absolute;
            border-radius: 50%;
            transform: scale(0);
            animation: ripple 0.6s linear;
            background-color: rgba(255, 255, 255, 0.7);
        }
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        .submit-btn {
            position: relative;
            overflow: hidden;
        }
        .submit-btn:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }
        .submit-btn:focus:not(:active)::after {
            animation: ripple 1s ease-out;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 animate-slide-in">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-3xl gradient-text mr-3 animate-rotate"></i>
                    <span class="font-bold text-2xl gradient-text">Disaster Portal</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover-lift">Home</a>
                    <a href="report.php" class="text-blue-600 font-medium transition duration-300">Report</a>
                    <a href="resources.php" class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover-lift">Resources</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Progress Bar -->
    <div class="w-full bg-gray-200 h-1">
        <div id="formProgress" class="progress-bar" style="width: 0%"></div>
    </div>

    <!-- Report Form Section -->
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-3xl mx-auto">
            <div class="form-card rounded-2xl p-8 animate-fade-in">
                <div class="text-center mb-8">
                    <h2 class="text-4xl font-bold gradient-text mb-4">Report an Emergency</h2>
                    <p class="text-gray-600">Help us respond quickly by providing accurate information about the emergency situation.</p>
                </div>

                <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])): ?>
                    <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg error-message">
                        <ul class="list-disc pl-5">
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php 
                    unset($_SESSION['errors']);
                endif; ?>

                <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                    <div id="successMessage" class="success-message active mt-4 p-4 bg-green-100 text-green-700 rounded-lg text-center">
                        <i class="fas fa-check-circle text-2xl mb-2"></i>
                        <p class="font-semibold">Report submitted successfully!</p>
                        <p class="text-sm">Emergency services have been notified.</p>
                    </div>
                <?php endif; ?>

                <form id="reportForm" action="report.php" method="POST" class="space-y-8">
                    <!-- Emergency Type Selection -->
                    <div class="form-section" style="animation-delay: 0.1s;">
                        <label class="block text-gray-700 font-semibold mb-4">Type of Emergency</label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="emergency-type-card p-4 rounded-xl text-center cursor-pointer <?php echo (isset($_SESSION['form_data']['emergencyType']) && $_SESSION['form_data']['emergencyType'] == 'fire') ? 'selected' : ''; ?>" data-type="fire">
                                <i class="fas fa-fire text-3xl text-red-500 mb-2 animate-float"></i>
                                <p class="font-medium">Fire</p>
                            </div>
                            <div class="emergency-type-card p-4 rounded-xl text-center cursor-pointer <?php echo (isset($_SESSION['form_data']['emergencyType']) && $_SESSION['form_data']['emergencyType'] == 'flood') ? 'selected' : ''; ?>" data-type="flood">
                                <i class="fas fa-water text-3xl text-blue-500 mb-2 animate-float" style="animation-delay: 0.1s;"></i>
                                <p class="font-medium">Flood</p>
                            </div>
                            <div class="emergency-type-card p-4 rounded-xl text-center cursor-pointer <?php echo (isset($_SESSION['form_data']['emergencyType']) && $_SESSION['form_data']['emergencyType'] == 'earthquake') ? 'selected' : ''; ?>" data-type="earthquake">
                                <i class="fas fa-mountain text-3xl text-yellow-500 mb-2 animate-float" style="animation-delay: 0.2s;"></i>
                                <p class="font-medium">Earthquake</p>
                            </div>
                            <div class="emergency-type-card p-4 rounded-xl text-center cursor-pointer <?php echo (isset($_SESSION['form_data']['emergencyType']) && $_SESSION['form_data']['emergencyType'] == 'medical') ? 'selected' : ''; ?>" data-type="medical">
                                <i class="fas fa-ambulance text-3xl text-green-500 mb-2 animate-float" style="animation-delay: 0.3s;"></i>
                                <p class="font-medium">Medical</p>
                            </div>
                        </div>
                        <input type="hidden" id="emergencyType" name="emergencyType" value="<?php echo isset($_SESSION['form_data']['emergencyType']) ? htmlspecialchars($_SESSION['form_data']['emergencyType']) : ''; ?>" required>
                    </div>

                    <!-- Location Input -->
                    <div class="form-section" style="animation-delay: 0.2s;">
                        <div class="input-wrapper">
                            <input type="text" id="location" name="location" class="form-input w-full pl-4 pr-10 py-3 rounded-xl" placeholder=" " value="<?php echo isset($_SESSION['form_data']['location']) ? htmlspecialchars($_SESSION['form_data']['location']) : ''; ?>" required>
                            <label class="floating-label">&nbsp; &nbsp; &nbsp;Location</label>
                            <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                            <button type="button" class="absolute right-3 top-3 text-blue-600 hover:text-blue-800" id="getLocation">
                                <i class="fas fa-crosshairs"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="form-section" style="animation-delay: 0.3s;">
                        <div class="input-wrapper">
                            <textarea id="description" name="description" rows="4" class="form-input w-full px-4 py-3 rounded-xl" placeholder="Description" required><?php echo isset($_SESSION['form_data']['description']) ? htmlspecialchars($_SESSION['form_data']['description']) : ''; ?></textarea>
                            <label class="floating-label"></label>
                        </div>
                    </div>

                    <!-- Severity Level -->
                    <div class="form-section" style="animation-delay: 0.4s;">
                        <div class="input-wrapper">
                            <select id="severity" name="severity" class="form-input w-full px-4 py-3 rounded-xl" required>
                                <option value=""></option>
                                <option value="low" <?php echo (isset($_SESSION['form_data']['severity']) && $_SESSION['form_data']['severity'] == 'low') ? 'selected' : ''; ?>><span class="severity-indicator severity-low"></span>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Low</option>
                                <option value="medium" <?php echo (isset($_SESSION['form_data']['severity']) && $_SESSION['form_data']['severity'] == 'medium') ? 'selected' : ''; ?>><span class="severity-indicator severity-medium"></span>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Medium</option>
                                <option value="high" <?php echo (isset($_SESSION['form_data']['severity']) && $_SESSION['form_data']['severity'] == 'high') ? 'selected' : ''; ?>><span class="severity-indicator severity-high"></span>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; High</option>
                                <option value="critical" <?php echo (isset($_SESSION['form_data']['severity']) && $_SESSION['form_data']['severity'] == 'critical') ? 'selected' : ''; ?>><span class="severity-indicator severity-critical"></span>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; Critical</option>
                            </select>
                            <label class="floating-label"><b>Severity Level: </b></label>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="form-section" style="animation-delay: 0.5s;">
                        <div class="input-wrapper">
                            <input type="text" id="contact" name="contact" class="form-input w-full pl-10 pr-4 py-3 rounded-xl" placeholder=" " value="<?php echo isset($_SESSION['form_data']['contact']) ? htmlspecialchars($_SESSION['form_data']['contact']) : ''; ?>" required>
                            <label class="floating-label">&nbsp; &nbsp; &nbsp;Contact Information</label>
                            <i class="fas fa-phone absolute left-3 top-3 text-gray-400"></i>
                        </div> 
                    </div>

                    <!-- Anonymous Report -->
                    <div class="form-section flex items-center" style="animation-delay: 0.6s;">
                        <input type="checkbox" id="anonymous" name="anonymous" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500 hover-lift" <?php echo (isset($_SESSION['form_data']['anonymous']) && $_SESSION['form_data']['anonymous']) ? 'checked' : ''; ?>>
                        <label for="anonymous" class="ml-2 text-gray-700">Report anonymously</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-section" style="animation-delay: 0.7s;">
                        <button type="submit" class="submit-btn w-full text-white py-4 rounded-xl font-semibold text-lg animate-pulse">
                            <span class="submit-text">Submit Report</span>
                            <i class="fas fa-paper-plane ml-2"></i>
                            <i class="fas fa-spinner loading-spinner ml-2"></i>
                        </button>
                    </div>
                </form>

                <!-- Success Message -->
                <div id="successMessage" class="success-message mt-4 p-4 bg-green-100 text-green-700 rounded-lg text-center">
                    <i class="fas fa-check-circle text-2xl mb-2"></i>
                    <p class="font-semibold">Report submitted successfully!</p>
                    <p class="text-sm">Emergency services have been notified.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12 mt-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger-animation">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">Disaster Portal</h3>
                    <p class="text-gray-400">Your trusted source for emergency information and community support.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-blue-400 transition duration-300 hover-lift">Home</a></li>
                        <li><a href="report.php" class="text-gray-400 hover:text-blue-400 transition duration-300 hover-lift">Report</a></li>
                        <li><a href="resources.php" class="text-gray-400 hover:text-blue-400 transition duration-300 hover-lift">Resources</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-white">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-2xl hover-lift"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-2xl hover-lift"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-400 transition duration-300 text-2xl hover-lift"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> Community Disaster Management Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Form Section Animation
        const formSections = document.querySelectorAll('.form-section');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });

        formSections.forEach(section => observer.observe(section));

        // Emergency Type Selection
        const emergencyTypeCards = document.querySelectorAll('.emergency-type-card');
        const emergencyTypeInput = document.getElementById('emergencyType');

        emergencyTypeCards.forEach(card => {
            card.addEventListener('click', () => {
                emergencyTypeCards.forEach(c => c.classList.remove('selected'));
                card.classList.add('selected');
                emergencyTypeInput.value = card.dataset.type;
                
                // Add ripple effect
                const ripple = document.createElement('span');
                ripple.classList.add('ripple');
                card.appendChild(ripple);
                setTimeout(() => ripple.remove(), 600);
            });
        });

        // Location Detection
        document.getElementById('getLocation').addEventListener('click', () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(position => {
                    const { latitude, longitude } = position.coords;
                    document.getElementById('location').value = `${latitude}, ${longitude}`;
                });
            }
        });

        // Form Progress
        const form = document.getElementById('reportForm');
        const progressBar = document.getElementById('formProgress');
        const formInputs = form.querySelectorAll('input, select, textarea');

        formInputs.forEach(input => {
            input.addEventListener('input', () => {
                const filledInputs = Array.from(formInputs).filter(input => input.value.trim() !== '');
                const progress = (filledInputs.length / formInputs.length) * 100;
                progressBar.style.width = `${progress}%`;
            });
        });

        // Ripple Effect for Submit Button
        const submitBtn = document.querySelector('.submit-btn');
        submitBtn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    </script>
    <script src="js/report.js"></script>
</body>
</html>
<?php
// Clear form data from session
if (isset($_SESSION['form_data'])) {
    unset($_SESSION['form_data']);
}
?>
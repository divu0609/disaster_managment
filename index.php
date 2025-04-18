<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Disaster Management Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/animations.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);
        }
        .card-hover {
            transition: all 0.3s ease; 
        }
        .card-hover:hover {
            transform: translateY(-5px);  
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            background: linear-gradient(135deg, #3b82f6 0%, #1e3a8a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #1e3a8a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .emergency-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
        }
        .emergency-icon {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-gradient {
            background: linear-gradient(to right, #ffffff 0%, #f3f4f6 100%);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-50 to-gray-100">
    <!-- Navigation -->
    <nav class="nav-gradient shadow-lg sticky top-0 z-50 animate-slide-in">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-3xl gradient-text mr-3 animate-rotate"></i>
                    <span class="font-bold text-2xl gradient-text">Disaster Portal</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover-lift">Home</a>
                    <a href="report.php" class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover-lift">Report</a>
                    <a href="resources.php" class="text-gray-700 hover:text-blue-600 font-medium transition duration-300 hover-lift">Resources</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="gradient-bg text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="container mx-auto px-6 py-24 relative">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 animate-fade-in">
                    <h1 class="text-5xl font-bold mb-6 leading-tight">Community Disaster Management Portal</h1>
                    <p class="text-xl mb-8 text-blue-100">Stay informed, stay safe, and help your community during emergencies.</p>
                    <a href="report.php" class="inline-block bg-gradient-to-r from-white to-blue-50 text-blue-600 px-8 py-4 rounded-full font-semibold hover:from-blue-50 hover:to-white transition duration-300 transform hover:scale-105 shadow-lg animate-pulse">Report an Emergency</a>
                </div>
                <div class="md:w-1/2 mt-12 md:mt-0 animate-scale-in">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-blue-600 rounded-full opacity-20 blur-3xl animate-float"></div>
                        <img src="\disaster_portal\assets\emergency_pic1.jpg" alt="Emergency Response Team" class="relative rounded-2xl shadow-2xl w-full h-auto hover-scale">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto px-6 py-20">
        <h2 class="text-4xl font-bold text-center mb-16 gradient-text animate-fade-in">Key Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger-animation">
            <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl shadow-lg card-hover">
                <div class="feature-icon text-5xl mb-6 animate-float">
                    <i class="fas fa-bell"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 gradient-text">Real-time Alerts</h3>
                <p class="text-gray-600 leading-relaxed">Receive instant notifications about emergencies in your area with our advanced alert system.</p>
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl shadow-lg card-hover">
                <div class="feature-icon text-5xl mb-6 animate-float" style="animation-delay: 0.2s;">
                    <i class="fas fa-map-marked-alt"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 gradient-text">Emergency Mapping</h3>
                <p class="text-gray-600 leading-relaxed">View real-time disaster maps and affected areas with detailed information.</p>
            </div>
            <div class="bg-gradient-to-br from-white to-blue-50 p-8 rounded-2xl shadow-lg card-hover">
                <div class="feature-icon text-5xl mb-6 animate-float" style="animation-delay: 0.4s;">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 gradient-text">Community Support</h3>
                <p class="text-gray-600 leading-relaxed">Connect with volunteers and emergency services for immediate assistance.</p>
            </div>
        </div>
    </div>

    <!-- Emergency Numbers -->
    <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 text-white animate-fade-in">Emergency Contacts</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger-animation">
                <div class="emergency-card p-8 rounded-2xl text-center card-hover">
                    <div class="emergency-icon text-5xl mb-6 animate-pulse">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-white">Medical Emergency</h3>
                    <p class="text-3xl font-bold text-blue-400">108</p>
                </div>
                <div class="emergency-card p-8 rounded-2xl text-center card-hover">
                    <div class="emergency-icon text-5xl mb-6 animate-pulse" style="animation-delay: 0.2s;">
                        <i class="fas fa-fire-extinguisher"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-white">Fire Department</h3>
                    <p class="text-3xl font-bold text-blue-400">101</p>
                </div>
                <div class="emergency-card p-8 rounded-2xl text-center card-hover">
                    <div class="emergency-icon text-5xl mb-6 animate-pulse" style="animation-delay: 0.4s;">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 text-white">Police</h3>
                    <p class="text-3xl font-bold text-blue-400">100</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-12">
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
        // Scroll Reveal Animation
        const revealElements = document.querySelectorAll('.reveal');
        
        const revealOnScroll = () => {
            revealElements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        };

        window.addEventListener('scroll', revealOnScroll);
        revealOnScroll(); // Initial check
    </script>
    <script src="js/main.js"></script>
</body>
</html>
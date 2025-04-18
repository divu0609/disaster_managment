<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Resources - Disaster Management Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/animations.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 50%, #3b82f6 100%);
        }
        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }
        .feature-icon {
            background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #0f172a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .emergency-card {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
        }
        .emergency-icon {
            background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-gradient {
            background: linear-gradient(to right, #ffffff 0%, #f1f5f9 100%);
        }
        .resource-card {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
        }
        .hero-image {
            position: relative;
            overflow: hidden;
        }
        .hero-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(30,64,175,0.3) 0%, rgba(15,23,42,0.3) 100%);
            animation: enhancedShine 3s linear infinite;
        }
        .footer-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e40af 100%);
        }
        .hover-text {
            color: #1e40af;
        }
        .hover-text:hover {
            color: #3b82f6;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100">
    <!-- Navigation -->
    <nav class="nav-gradient shadow-lg sticky top-0 z-50 animate-slide-in">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-shield-alt text-3xl gradient-text mr-3 animate-rotate icon-hover"></i>
                    <span class="font-bold text-2xl gradient-text animate-wave">Disaster Portal</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-slate-700 hover-text font-medium transition duration-300 hover-lift">Home</a>
                    <a href="report.php" class="text-slate-700 hover-text font-medium transition duration-300 hover-lift">Report</a>
                    <a href="resources.php" class="text-slate-700 hover-text font-medium transition duration-300 hover-lift">Resources</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="gradient-bg text-white relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10 animate-pulse"></div>
        <div class="container mx-auto px-6 py-24 relative">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 animate-fade-in">
                    <h1 class="text-5xl font-bold mb-6 leading-tight animate-glow">Emergency Resources</h1>
                    <p class="text-xl mb-8 text-blue-100 animate-shine">Access critical emergency contacts, disaster preparedness guides, and life-saving information.</p>
                </div>
                <div class="md:w-1/2 mt-12 md:mt-0 animate-scale-in">
                    <div class="hero-image relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full opacity-20 blur-3xl animate-float"></div>
                        <!-- <img src="assets/emergency-resources.jpg" alt="Emergency Resources" class="relative rounded-2xl shadow-2xl w-full h-auto hover-scale"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Emergency Numbers Section -->
    <div class="container mx-auto px-6 py-20">
        <h2 class="text-4xl font-bold text-center mb-16 gradient-text animate-fade-in">Indian Emergency Numbers</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger-animation">
            <div class="emergency-card p-8 rounded-2xl text-center card-hover animate-glow">
                <div class="emergency-icon text-5xl mb-6 animate-pulse icon-hover">
                    <i class="fas fa-ambulance"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-white animate-shine">Medical Emergency</h3>
                <p class="text-3xl font-bold text-blue-400 animate-bounce">108</p>
                <p class="text-slate-300 mt-2">(Toll-free Emergency Response)</p>
            </div>
            <div class="emergency-card p-8 rounded-2xl text-center card-hover animate-glow">
                <div class="emergency-icon text-5xl mb-6 animate-pulse icon-hover" style="animation-delay: 0.2s;">
                    <i class="fas fa-fire-extinguisher"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-white animate-shine">Fire Department</h3>
                <p class="text-3xl font-bold text-blue-400 animate-bounce">101</p>
                <p class="text-slate-300 mt-2">(Fire & Rescue Services)</p>
            </div>
            <div class="emergency-card p-8 rounded-2xl text-center card-hover animate-glow">
                <div class="emergency-icon text-5xl mb-6 animate-pulse icon-hover" style="animation-delay: 0.4s;">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-white animate-shine">Police</h3>
                <p class="text-3xl font-bold text-blue-400 animate-bounce">100</p>
                <p class="text-slate-300 mt-2">(Police Control Room)</p>
            </div>
        </div>
    </div>

    <!-- Additional Emergency Numbers -->
    <div class="bg-slate-50 py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-16 gradient-text animate-fade-in">Additional Emergency Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 stagger-animation">
                <div class="resource-card p-6 rounded-2xl shadow-lg card-hover animate-glow">
                    <div class="feature-icon text-4xl mb-4 animate-float icon-hover">
                        <i class="fas fa-women"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 gradient-text animate-shine">Women Helpline</h3>
                    <p class="text-2xl font-bold text-blue-600 animate-bounce">1091</p>
                    <p class="text-slate-600 mt-2">Women in Distress</p>
                </div>
                <div class="resource-card p-6 rounded-2xl shadow-lg card-hover animate-glow">
                    <div class="feature-icon text-4xl mb-4 animate-float icon-hover" style="animation-delay: 0.1s;">
                        <i class="fas fa-child"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 gradient-text animate-shine">Child Helpline</h3>
                    <p class="text-2xl font-bold text-blue-600 animate-bounce">1098</p>
                    <p class="text-slate-600 mt-2">Child in Danger</p>
                </div>
                <div class="resource-card p-6 rounded-2xl shadow-lg card-hover animate-glow">
                    <div class="feature-icon text-4xl mb-4 animate-float icon-hover" style="animation-delay: 0.2s;">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 gradient-text animate-shine">Disaster Management</h3>
                    <p class="text-2xl font-bold text-blue-600 animate-bounce">1078</p>
                    <p class="text-slate-600 mt-2">NDRF Control Room</p>
                </div>
                <div class="resource-card p-6 rounded-2xl shadow-lg card-hover animate-glow">
                    <div class="feature-icon text-4xl mb-4 animate-float icon-hover" style="animation-delay: 0.3s;">
                        <i class="fas fa-ambulance"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 gradient-text animate-shine">Ambulance</h3>
                    <p class="text-2xl font-bold text-blue-600 animate-bounce">102</p>
                    <p class="text-slate-600 mt-2">Emergency Ambulance</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Disaster Preparedness Guide -->
    <div class="container mx-auto px-6 py-20">
        <h2 class="text-4xl font-bold text-center mb-16 gradient-text animate-fade-in">Disaster Preparedness Guide</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 stagger-animation">
            <div class="resource-card p-8 rounded-2xl shadow-lg card-hover animate-glow">
                <div class="feature-icon text-5xl mb-6 animate-float icon-hover">
                    <i class="fas fa-book-medical"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 gradient-text animate-shine">Emergency Kit Checklist</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-center animate-fade-in"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> First Aid Kit</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.1s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Flashlight with extra batteries</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.2s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Water (1 gallon per person per day)</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.3s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Non-perishable food</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.4s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Important documents</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.5s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Emergency contact list</li>
                </ul>
            </div>
            <div class="resource-card p-8 rounded-2xl shadow-lg card-hover animate-glow">
                <div class="feature-icon text-5xl mb-6 animate-float icon-hover" style="animation-delay: 0.2s;">
                    <i class="fas fa-shield-virus"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 gradient-text animate-shine">Safety Tips</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-center animate-fade-in"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Stay informed about weather alerts</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.1s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Know your evacuation routes</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.2s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Keep emergency numbers handy</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.3s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Have a family emergency plan</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.4s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Learn basic first aid</li>
                    <li class="flex items-center animate-fade-in" style="animation-delay: 0.5s;"><i class="fas fa-check text-blue-600 mr-2 animate-pulse"></i> Keep important documents safe</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-gradient text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 stagger-animation">
                <div class="animate-fade-in">
                    <h3 class="text-xl font-bold mb-4 text-white animate-glow">Disaster Portal</h3>
                    <p class="text-slate-300 animate-shine">Your trusted source for emergency information and community support.</p>
                </div>
                <div class="animate-fade-in" style="animation-delay: 0.2s;">
                    <h3 class="text-xl font-bold mb-4 text-white animate-glow">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-slate-300 hover:text-blue-400 transition duration-300 hover-lift">Home</a></li>
                        <li><a href="report.php" class="text-slate-300 hover:text-blue-400 transition duration-300 hover-lift">Report</a></li>
                        <li><a href="resources.php" class="text-slate-300 hover:text-blue-400 transition duration-300 hover-lift">Resources</a></li>
                    </ul>
                </div>
                <div class="animate-fade-in" style="animation-delay: 0.4s;">
                    <h3 class="text-xl font-bold mb-4 text-white animate-glow">Connect With Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-slate-300 hover:text-blue-400 transition duration-300 text-2xl hover-lift icon-hover"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-slate-300 hover:text-blue-400 transition duration-300 text-2xl hover-lift icon-hover"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-slate-300 hover:text-blue-400 transition duration-300 text-2xl hover-lift icon-hover"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-700 mt-8 pt-8 text-center text-slate-300 animate-fade-in">
                <p class="animate-shine">&copy; <?php echo date('Y'); ?> Community Disaster Management Portal. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Enhanced Scroll Reveal Animation
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

        // Add hover effects to all cards
        document.querySelectorAll('.card-hover').forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px) scale(1.02)';
                card.style.boxShadow = '0 20px 40px rgba(0,0,0,0.1)';
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0) scale(1)';
                card.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
            });
        });

        // Add pulse animation to emergency numbers
        document.querySelectorAll('.animate-bounce').forEach(number => {
            number.addEventListener('mouseenter', () => {
                number.style.animation = 'bounce 1s ease-in-out infinite';
            });
            number.addEventListener('mouseleave', () => {
                number.style.animation = 'bounce 2s ease-in-out infinite';
            });
        });
    </script>
    <script src="js/main.js"></script>
</body>
</html>
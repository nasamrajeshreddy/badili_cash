<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BadliCash - Secure Payment Gateway for India</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --dark: #0f172a;
            --light: #f8fafc;
            --gradient-1: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-2: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-3: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background: var(--dark);
            color: var(--light);
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }

        nav.scrolled {
            background: rgba(15, 23, 42, 0.95);
            padding: 1rem 5%;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--light);
            text-decoration: none;
            transition: all 0.3s;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: var(--gradient-1);
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.3);
        }

        /* Section Base */
        section {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        /* Hero Section - VH1 */
        .hero {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }

        #hero-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 1200px;
            padding: 2rem;
        }

        .hero h1 {
            font-size: 5rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: fadeInUp 1s ease;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #94a3b8;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            animation: fadeInUp 1s ease 0.4s both;
        }

        .floating-cards {
            position: absolute;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .float-card {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            animation: float 6s ease-in-out infinite;
        }

        .float-card:nth-child(1) {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .float-card:nth-child(2) {
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .float-card:nth-child(3) {
            bottom: 20%;
            left: 15%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section - VH2 */
        .features {
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            padding: 5rem 5%;
        }

        .section-title {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 3rem;
            background: var(--gradient-1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient-1);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary);
        }

        .feature-card:hover::before {
            opacity: 0.1;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .feature-card p {
            color: #94a3b8;
            line-height: 1.6;
            position: relative;
            z-index: 1;
        }

        /* Stats Section - VH3 */
        .stats {
            background: var(--dark);
            padding: 5rem 5%;
            position: relative;
        }

        .stats-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 5rem;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 4rem;
            font-weight: bold;
            background: var(--gradient-2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.2rem;
            color: #94a3b8;
        }

        .certifications {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 3rem;
            flex-wrap: wrap;
            margin-top: 4rem;
        }

        .cert-badge {
            background: rgba(255, 255, 255, 0.05);
            padding: 2rem 3rem;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            transition: all 0.3s;
        }

        .cert-badge:hover {
            transform: scale(1.05);
            border-color: var(--primary);
        }

        .cert-badge h4 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        /* Services Carousel - VH4 */
        .services {
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            padding: 5rem 5%;
        }

        .carousel-container {
            max-width: 1400px;
            margin: 3rem auto;
            position: relative;
        }

        .carousel {
            display: flex;
            gap: 2rem;
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            padding: 2rem 0;
        }

        .carousel::-webkit-scrollbar {
            height: 10px;
        }

        .carousel::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .carousel::-webkit-scrollbar-thumb {
            background: var(--gradient-1);
            border-radius: 10px;
        }

        .service-card {
            min-width: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 3rem;
            scroll-snap-align: start;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .service-card:hover {
            transform: scale(1.02);
            background: rgba(255, 255, 255, 0.08);
        }

        .service-card h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: var(--gradient-3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .service-features {
            list-style: none;
            margin-top: 1.5rem;
        }

        .service-features li {
            padding: 0.75rem 0;
            color: #94a3b8;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .service-features li::before {
            content: "✓";
            color: #10b981;
            font-weight: bold;
            margin-right: 0.5rem;
        }

        /* CTA Section */
        .cta {
            background: var(--dark);
            padding: 5rem 5%;
            text-align: center;
        }

        .cta h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }

        .cta p {
            font-size: 1.3rem;
            color: #94a3b8;
            margin-bottom: 2rem;
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 3rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }

            .nav-links {
                display: none;
            }

            .service-card {
                min-width: 300px;
            }

            .stat-number {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav id="navbar">
        <div class="logo">BadliCash</div>
        <div class="nav-links">
            <a href="#features">Features</a>
            <a href="#stats">About</a>
            <a href="#services">Services</a>
        </div>
        <div class="auth-buttons">
            <a href="/login" class="btn btn-outline">Login</a>
            <a href="/register" class="btn btn-primary">Register</a>
        </div>
    </nav>

    <!-- Hero Section - VH1 -->
    <section class="hero" id="home">
        <canvas id="hero-canvas"></canvas>
        
        <div class="floating-cards">
            <div class="float-card">
                <div style="font-size: 2rem;">💳</div>
                <div style="margin-top: 0.5rem; font-weight: 600;">Instant Payments</div>
            </div>
            <div class="float-card">
                <div style="font-size: 2rem;">🔒</div>
                <div style="margin-top: 0.5rem; font-weight: 600;">Bank-Grade Security</div>
            </div>
            <div class="float-card">
                <div style="font-size: 2rem;">📊</div>
                <div style="margin-top: 0.5rem; font-weight: 600;">Real-time Analytics</div>
            </div>
        </div>

        <div class="hero-content">
            <h1>Transform Your Payment Experience</h1>
            <p class="hero-subtitle">India's Most Secure & Fastest Payment Gateway | PCI-DSS Certified</p>
            <div class="hero-buttons">
                <a href="/register" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">Start Free Trial</a>
                <a href="#services" class="btn btn-outline" style="font-size: 1.2rem; padding: 1rem 3rem;">Explore Services</a>
            </div>
        </div>
    </section>

    <!-- Features Section - VH2 -->
    <section class="features fade-in" id="features">
        <h2 class="section-title">Why Choose BadliCash?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">⚡</span>
                <h3>Lightning Fast Settlements</h3>
                <p>Get your money in 24 hours with our instant settlement feature. No more waiting for days.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🛡️</span>
                <h3>Military-Grade Security</h3>
                <p>PCI-DSS Level 1 certified with 256-bit encryption. Your transactions are safer than ever.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🔗</span>
                <h3>Smart Payment Links</h3>
                <p>Create and share payment links in seconds. No website needed to collect payments.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">💰</span>
                <h3>Lowest Transaction Fees</h3>
                <p>Industry-leading rates starting at 1.5%. Save more on every transaction.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">🔄</span>
                <h3>Instant Refunds</h3>
                <p>Process refunds in real-time with our automated refund system.</p>
            </div>
            <div class="feature-card">
                <span class="feature-icon">📱</span>
                <h3>Unified Payment Interface</h3>
                <p>Accept UPI, Cards, Net Banking, Wallets - all from one dashboard.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section - VH3 -->
    <section class="stats fade-in" id="stats">
        <h2 class="section-title">Trusted by Thousands</h2>
        <div class="stats-container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number" data-target="50000">0</div>
                    <div class="stat-label">Active Merchants</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">₹<span data-target="1000">0</span>Cr+</div>
                    <div class="stat-label">Monthly Transactions</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-target="99">0</div>
                    <div class="stat-label">% Uptime</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" data-target="10">0</div>
                    <div class="stat-label">Million+ Customers</div>
                </div>
            </div>

            <h3 class="section-title" style="font-size: 2rem; margin-top: 3rem;">Certified & Compliant</h3>
            <div class="certifications">
                <div class="cert-badge">
                    <h4>🏆 PCI-DSS</h4>
                    <p>Level 1 Certified</p>
                </div>
                <div class="cert-badge">
                    <h4>🔐 ISO 27001</h4>
                    <p>Information Security</p>
                </div>
                <div class="cert-badge">
                    <h4>✅ RBI Approved</h4>
                    <p>Payment Gateway</p>
                </div>
                <div class="cert-badge">
                    <h4>🛡️ SSL Secured</h4>
                    <p>256-bit Encryption</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - VH4 -->
    <section class="services fade-in" id="services">
        <h2 class="section-title">Complete Payment Solutions</h2>
        <div class="carousel-container">
            <div class="carousel">
                <div class="service-card">
                    <h3>Payment Gateway</h3>
                    <p>Accept payments from anywhere, anytime with our robust payment gateway solution.</p>
                    <ul class="service-features">
                        <li>Multiple payment modes</li>
                        <li>One-click checkout</li>
                        <li>Recurring payments</li>
                        <li>International payments</li>
                        <li>Custom checkout page</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Payment Links</h3>
                    <p>Share payment links via SMS, Email, WhatsApp without any coding.</p>
                    <ul class="service-features">
                        <li>No website required</li>
                        <li>QR code generation</li>
                        <li>Custom branding</li>
                        <li>Track payment status</li>
                        <li>Bulk link creation</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Smart Routing</h3>
                    <p>Intelligent transaction routing for maximum success rates.</p>
                    <ul class="service-features">
                        <li>AI-powered routing</li>
                        <li>Multiple bank connections</li>
                        <li>Failover protection</li>
                        <li>Cost optimization</li>
                        <li>Real-time switching</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Settlement Management</h3>
                    <p>Flexible settlement options tailored to your business needs.</p>
                    <ul class="service-features">
                        <li>T+1 settlements</li>
                        <li>Instant settlements</li>
                        <li>Split settlements</li>
                        <li>Auto-reconciliation</li>
                        <li>Detailed reports</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Refund Engine</h3>
                    <p>Automated refund processing with complete transparency.</p>
                    <ul class="service-features">
                        <li>Instant refunds</li>
                        <li>Partial refunds</li>
                        <li>Bulk refund processing</li>
                        <li>Refund analytics</li>
                        <li>Customer notifications</li>
                    </ul>
                </div>

                <div class="service-card">
                    <h3>Developer APIs</h3>
                    <p>Comprehensive APIs with detailed documentation for seamless integration.</p>
                    <ul class="service-features">
                        <li>RESTful APIs</li>
                        <li>Webhooks support</li>
                        <li>SDK in 10+ languages</li>
                        <li>Sandbox environment</li>
                        <li>24/7 developer support</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <h2>Ready to Transform Your Business?</h2>
        <p>Join 50,000+ merchants who trust BadliCash for their payment needs</p>
        <div style="margin-top: 2rem;">
            <a href="/register" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">Get Started Now</a>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script>
        // Three.js Background Animation
        const canvas = document.getElementById('hero-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas, alpha: true });
        
        renderer.setSize(window.innerWidth, window.innerHeight);
        camera.position.z = 5;

        // Create particles
        const geometry = new THREE.BufferGeometry();
        const vertices = [];
        const colors = [];

        for (let i = 0; i < 5000; i++) {
            vertices.push(
                Math.random() * 2000 - 1000,
                Math.random() * 2000 - 1000,
                Math.random() * 2000 - 1000
            );
            
            const color = new THREE.Color();
            color.setHSL(Math.random(), 0.7, 0.6);
            colors.push(color.r, color.g, color.b);
        }

        geometry.setAttribute('position', new THREE.Float32BufferAttribute(vertices, 3));
        geometry.setAttribute('color', new THREE.Float32BufferAttribute(colors, 3));

        const material = new THREE.PointsMaterial({
            size: 2,
            vertexColors: true,
            transparent: true,
            opacity: 0.8
        });

        const points = new THREE.Points(geometry, material);
        scene.add(points);

        // Animation
        function animate() {
            requestAnimationFrame(animate);
            points.rotation.x += 0.0003;
            points.rotation.y += 0.0005;
            renderer.render(scene, camera);
        }
        animate();

        // Responsive
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        // Animated counter
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toLocaleString('en-IN');
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString('en-IN');
                }
            }, 16);
        }

        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    document.querySelectorAll('[data-target]').forEach(el => {
                        animateCounter(el);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        const statsSection = document.querySelector('.stats');
        if (statsSection) statsObserver.observe(statsSection);

        // Smooth scroll for navigation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>
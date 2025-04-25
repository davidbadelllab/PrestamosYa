<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PrestamosYa - Préstamos rápidos y seguros. Obtén dinero en menos de 24 horas con proceso 100% digital">
    <meta name="keywords" content="préstamos, créditos, dinero rápido, préstamos online, financiamiento">
    <meta name="theme-color" content="#4f46e5">
    <title>PrestamosYa - Préstamos Rápidos y Seguros Online</title>

    <!-- Precargar recursos críticos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap">
    
    <!-- Estilos y Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-color: #4f46e5;
            --secondary-color: #f43f5e;
            --accent-color: #0ea5e9;
            --dark-bg: #111827;
            --card-bg: rgba(255, 255, 255, 0.1);
        }

        /* Optimizaciones de rendimiento */
        body {
            font-family: 'Outfit', sans-serif;
            overflow-x: hidden;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Mejoras en efectos visuales */
        .glass-effect {
            background: var(--card-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .neo-button {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            will-change: transform;
        }

        .neo-button:hover {
            transform: translateY(-2px);
            box-shadow: 25px 25px 75px #d9d9d9, -25px -25px 75px #ffffff;
        }

        .gradient-text {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Animaciones optimizadas */
        .floating {
            animation: floating 3s ease-in-out infinite;
            will-change: transform;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .content-wrapper {
            position: relative;
            z-index: 2;
        }

        .hero-gradient {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--accent-color) 50%, var(--secondary-color) 100%);
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            will-change: transform;
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
        }

        /* Mejoras en accesibilidad */
        .skip-link {
            position: absolute;
            top: -40px;
            left: 0;
            background: var(--primary-color);
            color: white;
            padding: 8px;
            z-index: 100;
            transition: top 0.3s;
        }

        .skip-link:focus {
            top: 0;
        }

        /* Menú móvil mejorado */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            height: 100vh;
            width: 100%;
            background: var(--dark-bg);
            transition: right 0.3s ease;
            z-index: 49;
        }

        .mobile-menu.active {
            right: 0;
        }

        /* Mejoras en el scroll */
        .smooth-scroll {
            scroll-behavior: smooth;
        }

        @media (prefers-reduced-motion: reduce) {
            .smooth-scroll {
                scroll-behavior: auto;
            }
            
            .floating, .card-hover {
                animation: none;
                transform: none;
            }
        }

        /* Indicador de carga */
        .loading-indicator {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-color);
            z-index: 1000;
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }

        .loading .loading-indicator {
            transform: scaleX(1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white font-sans leading-relaxed smooth-scroll">
    <!-- Skip Link para accesibilidad -->
    <a href="#main-content" class="skip-link">Saltar al contenido principal</a>

    <!-- Indicador de carga -->
    <div class="loading-indicator"></div>

    <!-- Background Wrapper -->
    <div class="relative min-h-screen">
        <!-- Particles Background -->
        <div id="particles-js" class="absolute inset-0 z-0" aria-hidden="true"></div>

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-purple-900/50 via-gray-900/50 to-gray-900/90 z-10"></div>

        <!-- Content Wrapper -->
        <div class="relative z-20">
            <!-- Header -->
            <header class="fixed w-full z-50 transition-all duration-300" id="main-header">
                <div class="container mx-auto px-4">
                    <div class="glass-effect rounded-2xl my-4 px-6 py-4">
                        <div class="flex justify-between items-center">
                            <a href="/" class="flex items-center space-x-2" aria-label="PrestamosYa">
                                <img class="w-[80px] floating" src="{{ asset('img/PrestamosYa.png') }}" alt="Logo de PrestamosYa" width="80" height="80">
                                <span class="text-2xl font-bold gradient-text">PrestamosYa</span>
                            </a>

                            <!-- Navegación Desktop -->
                            <nav class="hidden md:flex space-x-6" aria-label="Navegación principal">
                                <a href="#benefits" class="hover:text-accent-color transition-colors duration-300">Beneficios</a>
                                <a href="#testimonials" class="hover:text-accent-color transition-colors duration-300">Testimonios</a>
                                <a href="{{ route('login') }}" class="neo-button text-gray-800 rounded-full px-6 py-2">Iniciar Sesión</a>
                            </nav>

                            <!-- Botón Menú Móvil -->
                            <button class="md:hidden text-white p-2" aria-label="Abrir menú" id="mobile-menu-button">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Menú Móvil -->
                <div class="mobile-menu md:hidden" id="mobile-menu">
                    <div class="container mx-auto px-4 py-6">
                        <div class="flex justify-end mb-6">
                            <button class="text-white p-2" aria-label="Cerrar menú" id="close-menu-button">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <nav class="flex flex-col space-y-4">
                            <a href="#benefits" class="text-xl py-2">Beneficios</a>
                            <a href="#testimonials" class="text-xl py-2">Testimonios</a>
                            <a href="{{ route('login') }}" class="neo-button text-gray-800 rounded-full px-6 py-3 text-center">Iniciar Sesión</a>
                        </nav>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main id="main-content">
                <!-- Hero Section -->
                <section class="min-h-screen flex items-center justify-center relative overflow-hidden pt-20">
                    <div class="container mx-auto text-center px-4">
                        <div class="max-w-4xl mx-auto">
                            <h1 class="text-6xl md:text-7xl font-bold mb-6 tracking-tight">
                                Tu Futuro Financiero
                                <span class="block gradient-text mt-2">Comienza Aquí</span>
                            </h1>
                            <p class="text-xl md:text-2xl mb-12 text-gray-300">Préstamos instantáneos con la tecnología más avanzada</p>
                            <div class="flex flex-col md:flex-row justify-center gap-4">
                                <a href="#apply" class="neo-button text-gray-800 rounded-full px-8 py-4 text-lg font-semibold">
                                    Solicita ahora →
                                </a>
                                <a href="#benefits" class="glass-effect rounded-full px-8 py-4 text-lg font-semibold hover:bg-white/20 transition-all">
                                    Descubre más
                                </a>
                            </div>
                            
                            <!-- Scroll indicator -->
                            <div class="scroll-indicator mt-16">
                                <svg class="w-6 h-6 animate-bounce mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </section>

        
            <!-- Benefits Section -->
            <section id="benefits" class="py-32 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 to-gray-900"></div>
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center mb-16">
                        <h2 class="text-5xl font-bold mb-4 gradient-text">Beneficios Exclusivos</h2>
                        <p class="text-xl text-gray-300">Descubre por qué somos la mejor opción en el mercado</p>
                    </div>

                    <!-- Cards de Beneficios -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                        <div class="glass-effect rounded-2xl p-8 card-hover">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-center">Dinero Instantáneo</h3>
                            <p class="text-gray-300 text-center">Recibe tu préstamo en menos de 24 horas directamente en tu cuenta bancaria.</p>
                        </div>

                        <div class="glass-effect rounded-2xl p-8 card-hover transform translate-y-4">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-r from-pink-500 to-red-500 flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-center">Proceso Simple</h3>
                            <p class="text-gray-300 text-center">Sin papeleo excesivo, todo el proceso es 100% digital y seguro.</p>
                        </div>

                        <div class="glass-effect rounded-2xl p-8 card-hover">
                            <div class="h-16 w-16 rounded-full bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold mb-4 text-center">Aprobación Rápida</h3>
                            <p class="text-gray-300 text-center">Respuesta en menos de 10 minutos con nuestra tecnología de evaluación instantánea.</p>
                        </div>
                    </div>

                    <!-- Lista de Beneficios Adicionales -->
                    <div class="mt-20 glass-effect rounded-2xl p-8">
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <div class="space-y-4">
                                <h3 class="text-3xl font-bold gradient-text mb-6">Más Beneficios</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-center space-x-3">
                                        <span class="text-green-400 text-xl">✓</span>
                                        <span class="text-gray-300">Tasas de interés competitivas</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <span class="text-green-400 text-xl">✓</span>
                                        <span class="text-gray-300">Soporte al cliente 24/7</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <span class="text-green-400 text-xl">✓</span>
                                        <span class="text-gray-300">Pagos flexibles y accesibles</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="space-y-4">
                                <h3 class="text-3xl font-bold gradient-text mb-6">Nuestros Objetivos</h3>
                                <ul class="space-y-4">
                                    <li class="flex items-center space-x-3">
                                        <span class="text-blue-400 text-xl">🎯</span>
                                        <span class="text-gray-300">Brindar soluciones financieras personalizadas</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <span class="text-blue-400 text-xl">🎯</span>
                                        <span class="text-gray-300">Mantener transparencia en cada transacción</span>
                                    </li>
                                    <li class="flex items-center space-x-3">
                                        <span class="text-blue-400 text-xl">🎯</span>
                                        <span class="text-gray-300">Fomentar la educación financiera</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section id="testimonials" class="py-32 relative bg-gray-900">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 to-gray-900/50"></div>
                <div class="container mx-auto px-4 relative z-10">
                    <div class="text-center mb-16">
                        <h2 class="text-5xl font-bold mb-4 gradient-text">Testimonios</h2>
                        <p class="text-xl text-gray-300">Lo que dicen nuestros clientes satisfechos</p>
                    </div>

                    <div class="testimonials-slider relative">
                        <div class="flex gap-6 overflow-x-auto pb-8 snap-x snap-mandatory no-scrollbar">
                            <div class="min-w-[300px] md:min-w-[400px] glass-effect rounded-2xl p-8 card-hover snap-center backdrop-blur-lg bg-white/5">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-2xl font-bold text-white">JP</div>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-semibold text-white">Juan Pérez</h4>
                                        <div class="flex text-yellow-400">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-gray-300">"¡Increíble servicio! Obtuve mi préstamo en tiempo récord y el proceso fue súper sencillo. ¡Totalmente recomendado!"</p>
                            </div>

                            <div class="min-w-[300px] md:min-w-[400px] glass-effect rounded-2xl p-8 card-hover snap-center backdrop-blur-lg bg-white/5">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-blue-500 to-teal-500 flex items-center justify-center text-2xl font-bold text-white">MG</div>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-semibold text-white">María González</h4>
                                        <div class="flex text-yellow-400">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-gray-300">"La mejor plataforma de préstamos que he utilizado. Todo es transparente y el servicio al cliente es excepcional."</p>
                            </div>

                            <div class="min-w-[300px] md:min-w-[400px] glass-effect rounded-2xl p-8 card-hover snap-center backdrop-blur-lg bg-white/5">
                                <div class="flex items-center mb-6">
                                    <div class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center text-2xl font-bold text-white">AR</div>
                                    <div class="ml-4">
                                        <h4 class="text-xl font-semibold text-white">Alberto Rodríguez</h4>
                                        <div class="flex text-yellow-400">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-gray-300">"Excelente experiencia. El proceso fue rápido y la plataforma es muy intuitiva. ¡Los recomiendo ampliamente!"</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="py-32 relative overflow-hidden">
                <div class="container mx-auto px-4">
                    <div class="flex flex-col lg:flex-row items-center gap-12">
                        <!-- Texto a la izquierda -->
                        <div class="lg:w-1/2 space-y-6">
                            <h2 class="text-4xl md:text-5xl font-bold gradient-text">
                                Tecnología de Última Generación
                            </h2>
                            <div class="space-y-4">
                                <div class="glass-effect p-4 rounded-xl card-hover">
                                    <div class="flex items-center space-x-4">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-semibold">Proceso 100% Digital</h3>
                                            <p class="text-gray-300">Solicita tu préstamo desde cualquier dispositivo</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="glass-effect p-4 rounded-xl card-hover">
                                    <div class="flex items-center space-x-4">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-500 to-teal-500 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-semibold">Seguridad Garantizada</h3>
                                            <p class="text-gray-300">Tus datos siempre están protegidos</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="glass-effect p-4 rounded-xl card-hover">
                                    <div class="flex items-center space-x-4">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <h3 class="text-xl font-semibold">Disponible 24/7</h3>
                                            <p class="text-gray-300">Solicita tu préstamo en cualquier momento</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Imagen a la derecha -->
                        <div class="lg:w-1/2 relative">
                            <div class="relative z-10 transform hover:scale-105 transition-transform duration-500">
                                <img class="w-full rounded-2xl shadow-2xl" src="{{ asset('img/objetivos.png') }}" alt="Tecnología PrestamosYa">
                                <div class="absolute inset-0 bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-2xl"></div>
                            </div>
                            <!-- Elementos decorativos -->
                            <div class="absolute -top-10 -right-10 w-72 h-72 bg-purple-500/10 rounded-full filter blur-3xl"></div>
                            <div class="absolute -bottom-10 -left-10 w-72 h-72 bg-pink-500/10 rounded-full filter blur-3xl"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="py-32 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-900/90 to-pink-900/90"></div>
                <div class="container mx-auto px-4 relative z-10 text-center">
                    <h2 class="text-5xl md:text-6xl font-bold mb-8">
                        ¿Listo para comenzar?
                    </h2>
                    <p class="text-xl md:text-2xl mb-12 text-gray-300">
                        Únete a miles de clientes satisfechos que ya han confiado en nosotros
                    </p>
                    <div class="flex flex-col md:flex-row gap-4 justify-center">
                        <a href="#apply" class="neo-button text-gray-800 rounded-full px-8 py-4 text-lg font-semibold">
                            Solicitar Préstamo →
                        </a>
                        <a href="#contact" class="glass-effect rounded-full px-8 py-4 text-lg font-semibold hover:bg-white/20 transition-all">
                            Contactar Asesor
                        </a>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-gray-900 py-12">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div>
                            <div class="flex items-center space-x-2 mb-6">
                                <img class="w-[60px]" src="{{ asset('img/PrestamosYa.png') }}" alt="PrestamosYa">
                                <span class="text-xl font-bold gradient-text">PrestamosYa</span>
                            </div>
                            <p class="text-gray-400">Tu mejor opción en préstamos online. Rápido, seguro y confiable.</p>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-4">Enlaces Rápidos</h4>
                            <ul class="space-y-2 text-gray-400">
                                <li><a href="#" class="hover:text-white transition-colors">Inicio</a></li>
                                <li><a href="#benefits" class="hover:text-white transition-colors">Beneficios</a></li>
                                <li><a href="#testimonials" class="hover:text-white transition-colors">Testimonios</a></li>
                                <li><a href="#contact" class="hover:text-white transition-colors">Contacto</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-4">Legal</h4>
                            <ul class="space-y-2 text-gray-400">
                                <li><a href="#" class="hover:text-white transition-colors">Términos y Condiciones</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Política de Privacidad</a></li>
                                <li><a href="#" class="hover:text-white transition-colors">Aviso Legal</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold mb-4">Contacto</h4>
                            <ul class="space-y-2 text-gray-400">
                                <li>📞 0800-555-PRESTAMOS</li>
                                <li>📧 info@prestamosya.com</li>
                                <li>📍 Av. Principal 1234</li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                        <p>&copy; 2024 PrestamosYa. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
        // Inicialización de Particles.js
        particlesJS('particles-js', {
            particles: {
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#ffffff'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.5,
                    random: false
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#ffffff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                }
            },
            retina_detect: true
        });

        // Animaciones con GSAP
        document.addEventListener('DOMContentLoaded', function() {
            // Animación del header
            gsap.from('header', {
                y: -100,
                opacity: 0,
                duration: 1,
                ease: 'power4.out'
            });

            // Animación del hero
            gsap.from('.hero-gradient h1', {
                y: 50,
                opacity: 0,
                duration: 1,
                delay: 0.5,
                ease: 'power4.out'
            });

            // Animación de las cards de beneficios
            gsap.from('.card-hover', {
                scrollTrigger: {
                    trigger: '.card-hover',
                    start: 'top bottom',
                    end: 'bottom top',
                    toggleActions: 'play none none reverse'
                },
                y: 50,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2
            });

            // Efecto parallax en imágenes
            gsap.to('.floating', {
                y: 20,
                duration: 2,
                repeat: -1,
                yoyo: true,
                ease: 'power1.inOut'
            });
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>

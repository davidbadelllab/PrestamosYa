<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inicia sesión en PrestamosYa - Tu plataforma financiera de confianza">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Iniciar Sesión | PrestamosYa</title>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.161.0/build/three.min.js" defer></script>
    <script>
        // Configurar el token CSRF para todas las peticiones AJAX
        document.addEventListener('DOMContentLoaded', function() {
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            window.axios = require('axios');
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
        });
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #4f46e5;
            --secondary: #0ea5e9;
            --accent: #f43f5e;
            --dark: #0f172a;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: var(--dark);
            overflow-x: hidden;
        }

        .glassmorphism {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }

        .gradient-border {
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            overflow: hidden;
        }

        .gradient-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--primary), var(--secondary), var(--accent));
            z-index: -1;
            border-radius: 18px;
            animation: borderAnimation 4s linear infinite;
        }

        .modern-input {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .modern-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
            background: rgba(255, 255, 255, 0.05);
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        .gradient-text {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .neo-button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .neo-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: -1;
        }

        .neo-button:hover::before {
            opacity: 1;
        }

        @keyframes borderAnimation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        #canvas-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .checkbox-wrapper {
            position: relative;
            display: inline-block;
        }

        .custom-checkbox {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.03);
            cursor: pointer;
            position: relative;
            transition: all 0.3s ease;
        }

        .custom-checkbox:checked {
            background: var(--primary);
            border-color: var(--primary);
        }

        .custom-checkbox:checked::before {
            content: '✓';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 12px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-center items-center">
    <div id="canvas-container"></div>

    <div class="w-[420px] max-w-lg p-8 gradient-border glassmorphism relative z-10">
        <div class="text-center mb-8">
            <div class="floating inline-block mb-4">
                <div class="w-20 h-20 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center">
                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-4xl font-bold gradient-text mb-2">Bienvenido</h1>
            <p class="text-gray-400">Accede a tu cuenta para continuar</p>
        </div>

        <!-- Validation Errors -->
        <x-validation-errors class="mb-4 text-red-400" />

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                    class="modern-input w-full px-4 py-3 rounded-lg focus:outline-none"
                    placeholder="tu@email.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-2">Contraseña</label>
                <input id="password" type="password" name="password" required 
                    class="modern-input w-full px-4 py-3 rounded-lg focus:outline-none"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <div class="checkbox-wrapper">
                        <input type="checkbox" id="remember_me" name="remember" class="custom-checkbox">
                    </div>
                    <span class="ml-2 text-sm text-gray-300">Recordarme</span>
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:text-blue-300 transition-colors">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif
            </div>

            <button type="submit" class="neo-button w-full bg-primary hover:bg-primary/90 text-white py-3 px-4 rounded-lg font-semibold transition duration-300 transform hover:scale-[1.02]">
                Iniciar Sesión
            </button>
        </form>

        <div class="text-center mt-6">
            <p class="text-gray-400">¿No tienes una cuenta? 
                <a href="{{ route('register') }}" class="text-blue-400 hover:text-blue-300 transition-colors font-medium">
                    Regístrate
                </a>
            </p>
        </div>
    </div>

    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Configuración de Three.js
            const container = document.getElementById('canvas-container');
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });

            renderer.setSize(window.innerWidth, window.innerHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            // Crear partículas
            const particlesGeometry = new THREE.BufferGeometry();
            const particlesCount = 1000;
            const posArray = new Float32Array(particlesCount * 3);

            for(let i = 0; i < particlesCount * 3; i++) {
                posArray[i] = (Math.random() - 0.5) * 5;
            }

            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

            const particlesMaterial = new THREE.PointsMaterial({
                size: 0.005,
                color: '#4f46e5',
                transparent: true,
                opacity: 0.8
            });

            const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particlesMesh);

            camera.position.z = 3;

            // Animación
            const animate = () => {
                requestAnimationFrame(animate);
                particlesMesh.rotation.y += 0.001;
                renderer.render(scene, camera);
            };

            animate();

            // Responsive
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });

            // Animaciones GSAP
            gsap.from('.gradient-border', {
                duration: 1,
                opacity: 0,
                y: 30,
                ease: 'power3.out'
            });

            gsap.from('form > *', {
                duration: 0.8,
                opacity: 0,
                y: 20,
                stagger: 0.1,
                ease: 'power2.out',
                delay: 0.5
            });
        });
    </script>
</body>
</html>

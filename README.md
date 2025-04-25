# 💰 PrestamosYa - Sistema de Gestión de Préstamos

<div align="center">
    <img src="public/images/logo.png" alt="PrestamosYa Logo" width="200">
    <p align="center">
        <strong>Una solución moderna y eficiente para la gestión de préstamos</strong>
    </p>
</div>

## ✨ Características Principales

- 📊 **Dashboard Intuitivo**: Visualización en tiempo real de préstamos activos, pagos pendientes y métricas clave.
- 👥 **Gestión de Deudores**: Control completo de la información de clientes y su historial crediticio.
- 💳 **Control de Pagos**: Seguimiento detallado de pagos, con soporte para múltiples métodos de pago.
- 📈 **Gestión de Capital**: Monitoreo del capital disponible y retorno de inversiones.
- 🔒 **Sistema de Avales**: Gestión segura de garantías y avales para préstamos.
- 📱 **Diseño Responsivo**: Interfaz adaptable a cualquier dispositivo.

## 🚀 Tecnologías Utilizadas

- **Laravel 10**: Framework PHP robusto y moderno
- **Livewire**: Para interacciones dinámicas sin complicaciones
- **Tailwind CSS**: Diseño moderno y personalizable
- **Alpine.js**: Interactividad fluida en el frontend
- **MySQL**: Base de datos confiable y escalable

## 🛠️ Instalación

1. **Clonar el repositorio**
```bash
git clone https://github.com/tuusuario/PrestamosYa.git
cd PrestamosYa
```

2. **Instalar dependencias**
```bash
composer install
npm install
```

3. **Configurar el entorno**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configurar la base de datos**
- Crear una base de datos MySQL
- Actualizar las credenciales en el archivo `.env`

5. **Ejecutar migraciones y seeders**
```bash
php artisan migrate --seed
```

6. **Compilar assets**
```bash
npm run dev
```

7. **Iniciar el servidor**
```bash
php artisan serve
```

## 📱 Capturas de Pantalla

<div align="center">
    <img src="public/screenshots/dashboard.png" alt="Dashboard" width="45%">
    <img src="public/screenshots/prestamos.png" alt="Préstamos" width="45%">
</div>

## 🔑 Características de Seguridad

- ✅ Autenticación robusta
- 🔐 Control de acceso basado en roles
- 🛡️ Protección contra CSRF
- 📝 Registro de actividades
- 🔒 Encriptación de datos sensibles

## 📊 Módulos Principales

### 1. Gestión de Préstamos
- Creación y seguimiento de préstamos
- Cálculo automático de intereses
- Generación de planes de pago
- Notificaciones de vencimientos

### 2. Control de Pagos
- Registro de pagos en tiempo real
- Múltiples métodos de pago
- Historial detallado de transacciones
- Recordatorios automáticos

### 3. Gestión de Clientes
- Perfiles detallados de deudores
- Historial crediticio
- Documentación digital
- Sistema de calificación crediticia

## 🤝 Contribución

¿Quieres contribuir? ¡Excelente! Sigue estos pasos:

1. Fork el proyecto
2. Crea una nueva rama (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE.md](LICENSE.md) para más detalles.

## 📞 Soporte

¿Tienes preguntas? Contáctanos:
- 📧 Email: soporte@prestamosya.com
- 💬 Chat: [prestamosya.com/soporte](https://prestamosya.com/soporte)
- 📱 WhatsApp: +1234567890

---

<div align="center">
    <p>Desarrollado con ❤️ por el equipo de PrestamosYa</p>
    <p>© 2025 PrestamosYa - Todos los derechos reservados</p>
</div>

// animate/js/navvar.js
        /**
         * Función para alternar el menú móvil
         * Activa/desactiva las clases 'active' del hamburguesa y menú móvil
         */
        function toggleMenu() {
            const hamburger = document.querySelector('.navvarA__hamburger');
            const mobileMenu = document.getElementById('mobileMenu');
            
            // Alternar clase active en el hamburguesa (para animación)
            hamburger.classList.toggle('active');
            // Alternar clase active en el menú móvil (para mostrar/ocultar)
            mobileMenu.classList.toggle('active');
        }

        /**
         * Cerrar menú móvil cuando se hace clic en un enlace
         * Mejora la experiencia de usuario en dispositivos móviles
         */
        document.querySelectorAll('.navvarA__mobile-nav-link').forEach(link => {
            link.addEventListener('click', () => {
                // Remover clase active del hamburguesa
                document.querySelector('.navvarA__hamburger').classList.remove('active');
                // Remover clase active del menú móvil
                document.getElementById('mobileMenu').classList.remove('active');
            });
        });

        /**
         * Cerrar menú móvil si se hace clic fuera de él
         * Funcionalidad adicional para mejor UX
         */
        document.addEventListener('click', (event) => {
            const hamburger = document.querySelector('.navvarA__hamburger');
            const mobileMenu = document.getElementById('mobileMenu');
            
            // Si el clic no fue en el hamburguesa ni en el menú móvil
            if (!hamburger.contains(event.target) && !mobileMenu.contains(event.target)) {
                // Cerrar el menú si está abierto
                hamburger.classList.remove('active');
                mobileMenu.classList.remove('active');
            }
        });

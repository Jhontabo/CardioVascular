import preset from './vendor/filament/support/tailwind.config.preset';

export default {
    presets: [preset],
    content: [
        './resources/views/**/*.blade.php', // Todas las vistas
        './app/Http/Livewire/**/*.php',    // Componentes de Livewire
        './resources/js/**/*.js',         // Archivos JS personalizados
        './resources/css/**/*.css',       // Estilos CSS personalizados
        './vendor/filament/**/*.blade.php', // Vistas de Filament
    ],
    theme: {
        extend: {},
    },
    plugins: [],
};

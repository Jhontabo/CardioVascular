import React, { useState } from 'react';
import { ArrowRight, Heart, Calculator, ChartBar, FileText, LogIn, UserPlus } from 'lucide-react';
import { Link } from '@inertiajs/react';

const Welcome = () => {
    const [hoveredCard, setHoveredCard] = useState(null);

    const features = [
        {
            title: "Calculadora de Riesgo",
            description: "Herramienta precisa para evaluar tu riesgo cardiovascular basada en múltiples factores clínicos.",
            icon: <Calculator className="h-6 w-6 text-red-600 dark:text-red-400" />,
            link: "/calculator"
        },
        {
            title: "Seguimiento",
            description: "Monitorea tus factores de riesgo a lo largo del tiempo y visualiza tu progreso con gráficos detallados.",
            icon: <ChartBar className="h-6 w-6 text-red-600 dark:text-red-400" />,
            link: "/tracking"
        },
        {
            title: "Recomendaciones",
            description: "Recibe consejos personalizados y guías para mejorar tu salud cardiovascular.",
            icon: <FileText className="h-6 w-6 text-red-600 dark:text-red-400" />,
            link: "/recommendations"
        }
    ];

    return (
        <div className="min-h-screen bg-gradient-to-b from-gray-50 to-white dark:from-gray-900 dark:to-gray-800">
            {/* Auth Buttons - New Section */}
            <div className="absolute top-4 right-4 flex gap-4">
                <Link href={route('login')}>
                    <button className="px-4 py-2 flex items-center gap-2 bg-white dark:bg-gray-800 text-red-600 dark:text-red-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors border border-red-200 dark:border-red-800">
                        <LogIn className="h-4 w-4" />
                        Iniciar Sesión
                    </button>
                </Link>
                <Link href={route('register')}>
                    <button className="px-4 py-2 flex items-center gap-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                        <UserPlus className="h-4 w-4" />
                        Registrarse
                    </button>
                </Link>
            </div>

            {/* Hero Section */}
            <div className="container mx-auto px-4 pt-20 pb-16">
                <div className="text-center">
                    <div className="flex justify-center mb-6">
                        <Heart className="h-16 w-16 text-red-600 dark:text-red-400" />
                    </div>
                    <h1 className="text-5xl font-bold tracking-tight mb-8">
                        CardioRisk <span className="text-red-600 dark:text-red-400">Calculator</span>
                    </h1>
                    <p className="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        Evalúa y gestiona tu riesgo cardiovascular de manera precisa y sencilla.
                        Obtén recomendaciones personalizadas para mejorar tu salud cardíaca.
                    </p>

                    <div className="mt-10 flex justify-center gap-4">
                        <Link href={route('register')}>
                            <button
                                className="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors flex items-center gap-2"
                            >
                                Comenzar Evaluación <ArrowRight className="h-4 w-4" />
                            </button>
                        </Link>
                        <button
                            className="px-6 py-3 bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors flex items-center gap-2"
                        >
                            Más Información <FileText className="h-5 w-5" />
                        </button>
                    </div>
                </div>
            </div>

            {/* Features Section */}
            <div className="container mx-auto px-4 py-16">
                <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
                    {features.map((feature, index) => (
                        <div
                            key={index}
                            className={`bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 shadow-sm transition-all duration-300 cursor-pointer hover:shadow-lg ${hoveredCard === index ? 'transform -translate-y-2' : ''
                                }`}
                            onMouseEnter={() => setHoveredCard(index)}
                            onMouseLeave={() => setHoveredCard(null)}
                        >
                            <div className="p-6">
                                <div className="flex items-center gap-4">
                                    <div className="p-2 bg-red-100 dark:bg-red-900/50 rounded-lg">
                                        {feature.icon}
                                    </div>
                                    <h3 className="text-xl font-semibold">{feature.title}</h3>
                                </div>
                            </div>
                            <div className="px-6 pb-6">
                                <p className="text-gray-600 dark:text-gray-300">{feature.description}</p>
                                <button
                                    className="mt-4 text-red-600 dark:text-red-400 font-medium flex items-center hover:text-red-700 dark:hover:text-red-300 transition-colors"
                                >
                                    Empezar <ArrowRight className="ml-2 h-4 w-4" />
                                </button>
                            </div>
                        </div>
                    ))}
                </div>
            </div>

            {/* Footer */}
            <footer className="container mx-auto px-4 py-12 text-center text-gray-600 dark:text-gray-400">
                <p>© 2024 CardioRisk Calculator. Todos los derechos reservados.</p>
            </footer>
        </div>
    );
};

export default Welcome;
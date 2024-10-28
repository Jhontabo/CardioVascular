import React from 'react';
import { LineChart, User } from 'lucide-react';

export default function Dashboard() {
    return (
        <div className="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div className="max-w-7xl mx-auto">
                <h1 className="text-3xl font-bold text-gray-900 mb-8 text-center">
                    Bienvenido a tu Panel de Control
                </h1>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {/* Datos de Usuario */}
                    <div
                        className="group cursor-pointer transition-all duration-300 hover:translate-y-[-8px]"
                        onClick={() => console.log('Navegando a datos de usuario')}
                    >
                        <div className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div className="p-8">
                                <div className="flex justify-center mb-6">
                                    <div className="w-20 h-20 bg-blue-500 rounded-full flex items-center justify-center shadow-lg group-hover:bg-blue-600 transition-colors duration-300">
                                        <User size={40} className="text-white" />
                                    </div>
                                </div>
                                <h2 className="text-xl font-semibold text-center text-gray-800 mb-3">
                                    Datos de Usuario
                                </h2>
                                <p className="text-center text-gray-600">
                                    Información necesaria para calcular el riesgo cardiovascular
                                </p>
                            </div>
                            <div className="bg-blue-50 px-8 py-4 border-t border-blue-100">
                                <p className="text-blue-600 text-sm text-center font-medium">
                                    Click para gestionar datos →
                                </p>
                            </div>
                        </div>
                    </div>

                    {/* Seguimiento Personalizado */}
                    <div
                        className="group cursor-pointer transition-all duration-300 hover:translate-y-[-8px]"
                        onClick={() => console.log('Navegando a seguimiento')}
                    >
                        <div className="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                            <div className="p-8">
                                <div className="flex justify-center mb-6">
                                    <div className="w-20 h-20 bg-green-500 rounded-full flex items-center justify-center shadow-lg group-hover:bg-green-600 transition-colors duration-300">
                                        <LineChart size={40} className="text-white" />
                                    </div>
                                </div>
                                <h2 className="text-xl font-semibold text-center text-gray-800 mb-3">
                                    Seguimiento Personalizado
                                </h2>
                                <p className="text-center text-gray-600">
                                    Monitoreo y control de tu progreso
                                </p>
                            </div>
                            <div className="bg-green-50 px-8 py-4 border-t border-green-100">
                                <p className="text-green-600 text-sm text-center font-medium">
                                    Click para ver seguimiento →
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Evaluacion;

class EvaluacionGrafico extends Component
{
    public $labels = [];
    public $data = [];

    public function mount()
    {
        // Simulación de datos o consulta real a la base de datos
        $evaluaciones = Evaluacion::all();

        // Generar etiquetas (nombres de usuarios) y niveles de riesgo
        $this->labels = $evaluaciones->pluck('user.name')->toArray();
        $this->data = $evaluaciones->map(function ($evaluacion) {
            $riesgo = 0;
            $riesgo += $evaluacion->sistolica > 140 ? 30 : 0;
            $riesgo += $evaluacion->diastolica > 90 ? 20 : 0;
            $riesgo += $evaluacion->colesterol > 200 ? 20 : 0;
            $riesgo += $evaluacion->antecedentes ? 30 : 0;

            return min($riesgo, 100);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.evaluacion-grafico');
    }
}
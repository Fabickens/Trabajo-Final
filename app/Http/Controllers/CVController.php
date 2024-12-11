<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Importa el trait

class CVController extends Controller
{
    use AuthorizesRequests; // Usa el trait para habilitar el método `authorize`

    /**
     * Mostrar una lista de los CVs.
     */
    public function index()
    {
        $cvs = auth()->user()->cvs; // Obtiene todos los CVs del usuario autenticado
        return view('cvs.index', compact('cvs')); // Retorna la vista con los CVs
    }

    /**
     * Mostrar el formulario para crear un nuevo CV.
     */
    public function create()
    {
        return view('cvs.create'); // Retorna la vista del formulario de creación
    }

    /**
     * Guardar un nuevo CV en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

        // Crear un nuevo CV asociado al usuario autenticado
        auth()->user()->cvs()->create($request->all());

        return redirect()->route('cvs.index')->with('success', 'CV creado con éxito');
    }

    /**
     * Mostrar el formulario para editar un CV existente.
     */
    public function edit(CV $cv)
    {
        $this->authorize('update', $cv); // Asegura que el usuario puede editar este CV
        return view('cvs.edit', compact('cv')); // Retorna la vista de edición
    }

    /**
     * Actualizar un CV en la base de datos.
     */
    public function update(Request $request, CV $cv)
    {
        $this->authorize('update', $cv); // Asegura que el usuario puede actualizar este CV

        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'education' => 'required|string',
            'experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

        // Actualizar el CV
        $cv->update($request->all());

        return redirect()->route('cvs.index')->with('success', 'CV actualizado con éxito');
    }

    /**
     * Eliminar un CV de la base de datos.
     */
    public function destroy(CV $cv)
    {
        $this->authorize('delete', $cv); // Asegura que el usuario puede eliminar este CV

        $cv->delete();

        return redirect()->route('cvs.index')->with('success', 'CV eliminado con éxito');
    }

    /**
     * Descargar el CV en PDF.
     */
    public function download(CV $cv)
    {
        $this->authorize('view', $cv);

        // Usa el wrapper directamente
        $pdf = app()->make('dompdf.wrapper');
        $pdf->loadView('cvs.pdf', compact('cv'));

        // Descarga el PDF
        return $pdf->download('cv-' . $cv->name . '.pdf');
    }
}

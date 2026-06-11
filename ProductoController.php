<?php
 
namespace App\Http\Controllers;
 
use App\Models\Producto;

use Illuminate\Http\Request;
 
class ProductoController extends Controller

{

    // Mostrar la lista de productos (Read)

    public function index()

    {

        return response()->json(Producto::all(), 200);

    }
 
    // Guardar un nuevo producto (Create)

    public function store(Request $request)

    {

        // Validamos que los datos vengan correctos

        $validated = $request->validate([

            'nombre' => 'required|string|max:255',

            'descripcion' => 'nullable|string',

            'precio' => 'required|numeric',

            'stock' => 'integer'

        ]);
 
        $producto = Producto::create($validated);

        // Retornamos código 201 de creado

        return response()->json($producto, 201);

    }
 
    // Mostrar un solo producto (opcional, pero buena práctica)

    public function show($id)

    {

        $producto = Producto::find($id);

        if (!$producto) {

            return response()->json(['message' => 'No encontrado'], 404);

        }

        return response()->json($producto, 200);

    }
 
    // Actualizar un producto existente (Update)

    public function update(Request $request, $id)

    {

        $producto = Producto::find($id);

        if (!$producto) {

            return response()->json(['message' => 'No encontrado'], 404);

        }
 
        $producto->update($request->all());

        return response()->json($producto, 200);

    }
 
    // Eliminar un producto (Delete)

    public function destroy($id)

    {

        $producto = Producto::find($id);

        if (!$producto) {

            return response()->json(['message' => 'No encontrado'], 404);

        }
 
        $producto->delete();

        // Retornamos código 204 sin contenido

        return response()->json(null, 204);

    }

}
 

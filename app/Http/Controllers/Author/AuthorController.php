<?php

namespace app\Http\Controllers\Author;

use App\Models\Author;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Http\Response;

class AuthorController extends BaseController
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index()
    {
        $authors = Author::all();

        return $authors;
        // return json_encode($authors);

        // return $this->jsonResponse('metodo index authors', $authors, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max: 255',
            'gender' => 'required|max: 255|in:male,female',
            'country' => 'required|max: 255'
        ];

        if (!$this->validate($request, $rules)) {
            return $this->jsonResponse('Revisar todos los datos', null, 500);
        };

        $author = new Author();

        if (!$author->create($request->all())) {
            return $this->jsonResponse('No se inserto el autor', null, 500);
        }

        return $this->jsonResponse('Autor insertado',null, 201);
    }

    public function show($author)
    {

        $author = Author::where('id',$author)->first();

        return $author;
        // return $this->jsonResponse('Busqueda de usuarios', $author, 200);        
    }

    public function update(Request $request, $author)
    {
        $author = Author::where('id',$author)->first();

        if (!$author) {
            return $this->jsonResponse('No se encontraron resultados',null, 404); 
        }

        $author->fill($request->all());

        if ($author->isClean()) {
           return $this->jsonResponse('No se encontraron cambios, al menos un cambio debe ser realizado',null, 500); 
        }

        if (!$author->save()) {
            return $this->jsonResponse('No se realizo la actualizacion',null, 500); 
        }
        return $this->jsonResponse('registro actualizado',null, 200); 

    }

    public function destroy($author)
    {
        $author = Author::where('id',$author)->first();

        if (!$author) {
            return $this->jsonResponse('No se encontraron resultados',null, 404); 
        }

        if (!$author->delete()) {
            return $this->jsonResponse('No se elimino el registro',null, 500); 
        }

        return $this->jsonResponse('Registro eliminado',null, 200); 

    }
}

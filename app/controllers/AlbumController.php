<?php

class AlbumController extends \BaseController {

	
	/**
	 * Genera el formulario para crear un nuevo álbum.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('albums.create');
	}


	/**
	 * Guarda el nuevo álbum.
	 *
	 * @return Response
	 */
	public function store()
	{
            
            $rules =  array(
                'name'  => array('required'),
                'description' => 'required',
                'year'  => array('required', 'numeric', 'digits:4'),
            );
            
            $messages =  array(
                'name.required'  => 'Escriba el nombre del álbum.',
                'description.required' => 'Escriba la descripción del álbum.',
                'year.required'  => 'Escriba el año.',
                'numeric' => 'Sólo valores numéricos.',
                'digits' => 'No se pueden escribir más de :digits dígitos.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/albums/create')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $album = new Album();
                $album->name = Input::get('name');
                $album->description = Input::get('description');
                $album->year = Input::get('year');
                
                if ($album->save()) {
                        Session::flash('message','Álbum agregado correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/albums/create');
            }
	}


	/**
	 * Muestra el listado de álbumes creados.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
            return View::make('albums.show');
	}
        
        
        /**
	 * Genera el json para el plugin datatables.
	 *
	 * @return Response
	 */
        
        public function datatables()
        {
            $albums = Album::all();
            return Datatable::collection($albums)
            ->showColumns('name', 'description', 'year')
            ->searchColumns('name', 'description', 'year')
            ->orderColumns('year','name')
            ->addColumn('actions', function($albums){ //Columna de acciones
                return '<a title="Ver secciones del álbum" class="btn btn-success" href="'.URL::to('/sections/show/'.$albums->id).'"><span class="glyphicon glyphicon-list-alt"></span></a><a title="Editar álbum" class="btn btn-info" href="'.URL::to('/albums/edit/'.$albums->id).'"><span class="glyphicon glyphicon-pencil"></span></a><a title="Borrar álbum" class="btn btn-danger" href="'.URL::to('/albums/remove/'.$albums->id).'"><span class="glyphicon glyphicon-trash"></span></a>';
            })
            ->make();
        }

        
	/**
	 * Genera el formulario para editar álbum seleccionado.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $album = Album::find($id);
            return View::make('albums.edit')->with('album', $album);
	}


	/**
	 * Actualiza los datos del álbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
            $rules =  array(
                'name'  => array('required'),
                'description' => 'required',
                'year'  => array('required', 'numeric', 'digits:4'),
            );
            
            $messages =  array(
                'name.required'  => 'Escriba el nombre del álbum.',
                'description.required' => 'Escriba la descripción del álbum.',
                'year.required'  => 'Escriba el año.',
                'numeric' => 'Sólo valores numéricos.',
                'digits' => 'No se pueden escribir más de :digits dígitos.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/albums/edit')
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $album = Album::find(Input::get('id'));
                $album->name = Input::get('name');
                $album->description = Input::get('description');
                $album->year = Input::get('year');
                
                if ($album->save()) {
                        Session::flash('message','Álbum actualizado correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/albums/edit/'.Input::get('id'));
            }
	}


	/**
	 * Elimina un álbum.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $album = Album::find($id);
            if ($album->delete()) {
                    Session::flash('message','Álbum borrado correctamente.');
                    Session::flash('class','success');
            } else {
                    Session::flash('message','Ha ocurrido un error al eliminar.');
                    Session::flash('class','danger');
            }
            return Redirect::to('/albums/show');
	}


}

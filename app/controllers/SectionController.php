<?php

class SectionController extends \BaseController {

	/**
	 * Genera el formulario para crear una nueva sección.
	 *
         * @param  int  $albumid
	 * @return Response
	 */
	public function create($albumid = '')
	{
            $album = Album::find($albumid);
            return View::make('sections.create', array('album' => $album));
	}


	/**
	 * Guarda la nueva sección.
	 *
	 * @return Response
	 */
	public function store()
	{
            $rules =  array(
                'order'  => array('required', 'numeric'),
                'name' => 'required',
            );
            
            $messages =  array(
                'order.required'  => 'Escriba el orden de la sección.',
                'name.required' => 'Escriba el nombre de la sección.',
                'numeric' => 'Sólo valores numéricos.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/sections/create/'.Input::get('albumid'))
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $section = new Section();
                $section->albumid = Input::get('albumid');
                $section->order = Input::get('order');
                $section->name = Input::get('name');
                
                if ($section->save()) {
                        Session::flash('message','Sección agregada correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/sections/create/'.Input::get('albumid'));
            }
	}


	/**
	 * Muestra las secciones del álbum seleccionado.
	 *
	 * @param  int  $albumid
	 * @return Response
	 */
	public function show($albumid)
	{
            $album = Album::find($albumid);
            $sections = $album->sections()->orderBy('order', 'asc')->get();
            return View::make('sections.show', array('sections' => $sections, 'album' => $album));
	}


	/**
	 * Genera el formulario para editar la sección seleccionada.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $albums = Album::lists('name', 'id');
            $section = Section::find($id);
            return View::make('sections.edit', array('section' => $section, 'albums' => $albums));
	}


	/**
	 * Actualiza los datos de la sección.
	 *
	 * @return Response
	 */
	public function update()
	{
            $rules =  array(
                'order'  => array('required', 'numeric'),
                'name' => 'required',
            );
            
            $messages =  array(
                'order.required'  => 'Escriba el orden de la sección.',
                'name.required' => 'Escriba el nombre de la sección.',
                'numeric' => 'Sólo valores numéricos.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/sections/edit/'.Input::get('id'))
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $section = Section::find(Input::get('id'));
                $section->albumid = Input::get('albumid');
                $section->order = Input::get('order');
                $section->name = Input::get('name');
                
                if ($section->save()) {
                        Session::flash('message','Sección actualizada correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/sections/edit/'.Input::get('id'));
            }
	}


	/**
	 * Elimina una sección.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $section = Section::find($id);
            $albumid = $section->albumid;
            if ($section->delete()) {
                    Session::flash('message','Sección borrada correctamente.');
                    Session::flash('class','success');
            } else {
                    Session::flash('message','Ha ocurrido un error al eliminar.');
                    Session::flash('class','danger');
            }
            return Redirect::to('/sections/show/'.$albumid);
	}


}

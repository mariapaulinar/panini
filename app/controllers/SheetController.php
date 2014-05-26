<?php

class SheetController extends \BaseController {

	
	/**
	 * Genera el formulario para crear una nueva hoja.
	 *
         * @param  int  $sectionid
	 * @return Response
	 */
	public function create($sectionid = '')
	{
            $section = Section::find($sectionid);
            return View::make('sheets.create', array('section' => $section));
	}


	/**
	 * Guarda la nueva hoja.
	 *
	 * @return Response
	 */
	public function store()
	{
            $rules =  array(
                'image'  => array('required', 'url'),
                'content' => 'required',
            );
            
            $messages =  array(
                'image.required'  => 'Escriba la url de la imagen.',
                'content.required' => 'Escriba el contenido de la hoja.',
                'url' => 'Escriba una URL válida.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/sheets/create/'.Input::get('sectionid'))
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $sheet = new Sheet();
                $sheet->sectionid = Input::get('sectionid');
                $sheet->image = Input::get('image');
                $sheet->content = Input::get('content');
                
                if ($sheet->save()) {
                        $section = Section::find($sheet->sectionid);
                        $section->sheets++;
                        $section->save();
                        Session::flash('message','Hoja agregada correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/sheets/create/'.Input::get('sectionid'));
            }
	}


	/**
	 * Muestra las secciones del álbum seleccionado.
	 *
	 * @param  int  $sectionid
	 * @return Response
	 */
	public function show($sectionid)
	{
            $section = Section::find($sectionid);
            $sheets = $section->sheets()->paginate(2);
            return View::make('sheets.show', array('sheets' => $sheets));
	}


	/**
	 * Genera el formulario para editar la hoja seleccionada.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $sheet = Sheet::find($id);
            //Buscar el álbum al que pertenece la sección de la hoja seleccionada.
            $section = Section::find($sheet->sectionid);
            $album = Album::find($section->albumid);
            $sections = $album->sections()->lists('name', 'id');//Secciones asociadas al álbum
            return View::make('sheets.edit', array('sheet' => $sheet, 'sections' => $sections, 'album' => $album));
	}


	/**
	 * Actualiza los datos de la hoja.
	 *
	 * @return Response
	 */
	public function update()
	{
            $rules =  array(
                'image'  => array('required', 'url'),
                'content' => 'required',
            );
            
            $messages =  array(
                'image.required'  => 'Escriba la url de la imagen.',
                'content.required' => 'Escriba el contenido de la hoja.',
                'url' => 'Escriba una URL válida.',
            );

            $validator = Validator::make(Input::all(), $rules, $messages);
            
            if ( $validator->fails() ){
                return Redirect::to('/sheets/edit/'.Input::get('id'))
                        ->withErrors($validator)
                        ->withInput();
            }else{
                $sheet = Sheet::find(Input::get('id'));
                $old_sectionid = $sheet->sectionid;
                $sheet->sectionid = Input::get('sectionid');
                $sheet->image = Input::get('image');
                $sheet->content = Input::get('content');
                
                if ($sheet->save()) {
                        $section = Section::find($sheet->sectionid);
                        $section->sheets++;
                        $section->save();
                        
                        $section_old = Section::find($old_sectionid);
                        $section_old->sheets--;
                        $section_old->save();
                        
                        Session::flash('message','Hoja actualizada correctamente.');
                        Session::flash('class','success');
                } else {
                        Session::flash('message','Ha ocurrido un error al guardar.');
                        Session::flash('class','danger');
                }

                return Redirect::to('/sheets/edit/'.Input::get('id'));
            }
	}


	/**
	 * Elimina una hoja.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $sheet = Sheet::find($id);
            $section = Section::find($sheet->sectionid);
            $section->sheets--;
            $section->save();
            if ($sheet->delete()) {
                    Session::flash('message','Hoja borrada correctamente.');
                    Session::flash('class','success');
            } else {
                    Session::flash('message','Ha ocurrido un error al eliminar.');
                    Session::flash('class','danger');
            }
            return Redirect::to('/sections/show/'.$section->albumid);
	}


}

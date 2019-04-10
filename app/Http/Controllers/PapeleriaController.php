<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Papeleria;
use Barryvdh\DomPDF\Facade as PDF;

class PapeleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papelerias=Papeleria::orderBy('id','asc')->paginate(5);
        return view ('papelerias.index',compact('papelerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('papelerias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required',
            'imagen'=>'image|required',
        ]);
        $extension = strtolower(\Input::file('imagen')->getClientOriginalExtension());

        $fileName = uniqid().'.'.$extension;
        $path = "files_upload";
            


            \Request::file('imagen')->move($path, $fileName);
            $papeleria = new Papeleria();
            $papeleria->imagen = $fileName;
            $papeleria->nombre=$request->nombre;


            if($papeleria->save())
            {
                 return redirect('papelerias')->with('sucess', 'El archivo ha sido agreagdo correctamente');
            }
            else
            {
                \File::delete($path."/".$fileName);
                return redirect('papelerias')->with('error', 'Ocurrió un error  ');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $papeleria = Papeleria::find($id);
        return view('papelerias.mostrar', compact('papeleria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $papeleria = Papeleria::find($id);
        return view('papelerias.edit', compact('papeleria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombre'=>'required',
            'imagen'=>'sometimes|image'
        ]);

        $imagenBorrar = DB::table('papeles')->where('id',$id)->value('imagen');





        if (!\Input::file('imagen')){
            $papeleria = new Papeleria();
            $papeleria->nombre = $request->nombre;
            Papeleria::find($id)->update(['nombre'=>$papeleria->nombre]);
            return redirect('papelerias')->with('success', 'El nombre ha sido actualizado correctamente');
        } else {
            \Input::file("imagen");
            $extension = strtolower(\Input::file('imagen')->getClientOriginalExtension());
            $fileName = uniqid().'.'. $extension;
            $path="files_upload";

            if (\Request::file('imagen')->isValid()) {

                \Request::file('imagen')->move($path, $fileName);
                $papeleria = new Papeleria();
                $papeleria->file = $fileName;
                $papeleria->nombre = $request->nombre;
                
            if (Papeleria::find($id)->update(['nombre' => $papeleria->nombre, 'imagen'=>$papeleria->file])) {
                \File::delete($path . "/" . $imagenBorrar);
                return redirect('papelerias')->with('success', 'El archivo ha sido actualizado correctamente');

            }


            } else {
                File::delete($path . "/" . $fileName);
                return redirect('papelerias.edit')->with('error-message', 'Ocurrio un error en la base datos al momento de guardar');
            }
            
        }    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $name = DB::table('papeles')->where('id', $id)->value('imagen');
        \File::delete("files_upload" . "/" . $name);
        Papeleria::find($id)->delete();
        return redirect()->route('papelerias.index')->with('success','La imagen fue eliminado');
    }

    public function print()
    {
        $papelerias = Papeleria::all();
        $pdf = PDF::loadview('papelerias.mostrar1', compact('papelerias'));
        return $pdf->stream();
    }
}


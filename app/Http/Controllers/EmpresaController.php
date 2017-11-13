<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view('admin.empresa.empresas')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.empresa-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $empresa = new Empresa();
            $empresa->nome = $request->input('nome');
            $empresa->cpf_cnpj = $request->input('cpf_cnpj');
            $empresa->inscricao_estadual = $request->input('inscricao_estadual');
            $empresa->cep = $request->input('cep');
            $empresa->endereco = $request->input('endereco');
            $empresa->numero = $request->input('numero');
            $empresa->bairro = $request->input('bairro');
            $empresa->cidade = $request->input('cidade');
            $empresa->estado = $request->input('estado');
            if ($request->hasFile('img_url')) {
              # code...
              $ext = $request->file('img_url')->getClientOriginalExtension();
              $photoName = 'empresa_'.str_slug($empresa->nome, '_').'.'.strtolower($ext);
    
              $request->file('img_url')->move(public_path('images/empresas/'), $photoName);
              $empresa->img_url = $photoName;
              $empresa->save();
            }else{
              $empresa->save();
            }
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", $e);
    
        }

        return redirect()->route('empresa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

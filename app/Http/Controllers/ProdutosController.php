<?php

namespace App\Http\Controllers;

use App\Entities\Categoria;
use App\Services\CategoriaService;
use App\Services\ProdutosService;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ProdutosController
 * @package App\Http\Controllers
 */
class ProdutosController extends Controller
{
    /**
     * @var ProdutosService
     */
    protected $produtosService;

    /**
     * @param ProdutosService $produtosService
     */
    function __construct(ProdutosService $produtosService)
    {
        $this->produtosService = $produtosService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->produtosService->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return ['status' => 200, 'data' => $this->produtosService->create($request->all())];
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
        return ['status' => 200, 'data' => $this->produtosService->update($request->all(), $id)];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ['status' => 200, 'data' => $this->produtosService->destroy($id)];
    }
}

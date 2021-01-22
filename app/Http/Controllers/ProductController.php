<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class ProductController extends Controller
{
    public $viewDir = "product";

    public function index()
    {
        $records = Product::all();
        return $this->view( "index", ['records' => $records] );
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store( Request $request )
    {
        $this->validate($request, Product::validationRules());

        Product::create($request->all());

        return redirect(route('product.index'));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Product $product)
    {
        return $this->view("show",['product' => $product]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Product $product)
    {
        return $this->view( "edit", ['product' => $product] );
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, Product::validationRules());

        $product->update($request->all());

        return redirect(route('product.index'));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws Exception
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        return redirect(route('product.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }
}

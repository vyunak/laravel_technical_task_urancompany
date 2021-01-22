<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;

class CategoryController extends Controller
{
    public $viewDir = "category";

    public function index()
    {
        $records = Category::findRequested();
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
        $this->validate($request, Category::validationRules());

        Category::create($request->all());

        return redirect(route('category.index'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request, Category $category)
    {
        return $this->view("show",['category' => $category]);
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Request $request, Category $category)
    {
        return $this->view( "edit", ['category' => $category] );
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::validationRules());

        $category->update($request->all());

        return redirect(route('category.index'));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws Exception
     */
    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return redirect(route('category.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }
}

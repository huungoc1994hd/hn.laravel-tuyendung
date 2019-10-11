<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Requests\Backend\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * This action render the category page's view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categoryModel = new Category();

        $categories = Category::where('parent_id', 0)
            ->with('children')
            ->get();

        $categoriesSelectData = $this->flattenDown($categories);

        return view('backend.category.index')->with([
            'categoryModel' => $categoryModel,
            'categories' => $categories,
            'categoriesSelectData' => $categoriesSelectData
        ]);
    }

    /**
     * @param $data
     * @param int $index
     * @param array $elements
     * @return array of select tag data list
     */
    protected function flattenDown($data, $index = 0, &$elements = [])
    {
        $elements[0] = ':root';

        foreach($data as $e) {
            $elements[$e->id] = str_repeat('---', $index) . $e->name;

            if (!empty($e->children)) {
                $elements = $this->flattenDown($e->children, $index+1, $elements);
            }
        }

        return $elements;
    }

    /**
     * Action create the category
     * @param CategoryFormRequest $request
     */
    public function create(CategoryFormRequest $request)
    {
        $input = $request->all();
        if (!Category::create($input)) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi máy chủ cục bộ');
        }

        return redirect()->back()->with('success', 'Một danh mục đã được thêm');
    }

    /**
     * This action delete one or multiple categories
     * @param CategoryFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(CategoryFormRequest $request)
    {
        $ids = $this->recursiveDelete($request->id);

        if (!Category::destroy($ids)) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi máy chủ cục bộ');
        }

        return redirect()->back()->with('success', count($ids) . ' danh mục đã được xóa');
    }

    /**
     * Recursive array id list to delete the categories
     * @param $ids
     * @param array $result
     * @param int $index | default 1
     * @return array
     */
    protected function recursiveDelete($ids, &$result = [], $index = 1)
    {
        $idArr = explode(',', $ids);

        if ($index == 1) {
            $result = $idArr;
        }

        $parentCates = Category::select('id')->whereIn('parent_id', $idArr)->get();
        foreach($parentCates as $parentCate) {
            $parentId = $parentCate->id;
            array_push($result, $parentId);
            $this->recursiveDelete($parentId, $result, $index+1);
        }

        return $result;
    }
}

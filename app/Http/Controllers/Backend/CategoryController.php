<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Category;
use App\Http\Requests\Backend\CategoryFormRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('order', 'asc')
            ->get();

        return view('backend.category.index')->with([
            'categoryModel' => $categoryModel,
            'categories' => $categories
        ]);
    }

    /**
     * Action create the category
     * @param CategoryFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(CategoryFormRequest $request)
    {
        $categoryModel = new Category();

        $categories = Category::where('parent_id', 0)
            ->with('children')
            ->get();
        $categoriesSelectData = $this->flattenDown($categories);

        if ($request->isMethod('post')) {
            $input = $request->all();
            if (!Category::create($input)) {
                return redirect()->back()
                    ->with('error', 'Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.category')
                ->with('success', 'Một danh mục đã được thêm');
        }

        return view('backend.category.create')->with([
            'categoryModel' => $categoryModel,
            'categoriesSelectData' => $categoriesSelectData
        ]);
    }

    /**
     * Action update the category
     * @param CategoryFormRequest $request
     */
    public function update(CategoryFormRequest $request)
    {
        $categoryModel = Category::find($request->id);
        if (!$categoryModel) {
            throw new NotFoundHttpException();
        }

        $categories = Category::where('parent_id', 0)
            ->with('children')
            ->get();
        $categoriesSelectData = $this->flattenDown($categories);

        if ($request->isMethod('put')) {
            $input = $request->all();
            $input['status'] = $input['status'] ?? Category::STATUS_HIDDEN;
            if (!$categoryModel->update($input)) {
                return redirect()->back()
                    ->with('error', 'Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.category')
                ->with('success', 'Một danh mục đã được cập nhật');
        }

        return view('backend.category.update')->with([
            'categoryModel' => $categoryModel,
            'categoriesSelectData' => $categoriesSelectData
        ]);
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
     * Save the changes when ordering
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function order(Request $request)
    {
        $data = json_decode($request->data, true);

        $dataSave = $this->handleData($data);
        if (empty($dataSave)) {
            return redirect()->back()->with('error', 'Không có dữ liệu nào bị thay đổi');
        }

        DB::beginTransaction();

        $idStr = implode(',', $dataSave['id']);
        $orderStr = implode(',', $dataSave['order']);
        $parentStr = implode(',', $dataSave['parent_id']);

        $query = Category::whereIn('id', $dataSave['id'])
            ->update([
                'order' => DB::raw("ELT(field(id, {$idStr}), {$orderStr})"),
                'parent_id' => DB::raw("ELT(field(id, {$idStr}), {$parentStr})")
            ]);

        if (!$query) {
            DB::rollback();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi máy chủ cục bộ');
        }

        DB::commit();
        return redirect()->back()->with('success', 'Dữ liệu đã được cập nhật thành công');
    }

    /**
     * Handle the input data
     *
     * @param array $data
     * @param int $parent_id default 0
     * @param array $result
     *
     * @return array
     */
    protected function handleData(array $data = [], $parent_id = 0, &$result = [])
    {
        if (empty($data)) {
            return $data;
        }

        foreach($data as $key => $item) {
            $result['id'][] = $item['id'];
            $result['order'][] = $key;
            $result['parent_id'][] = $parent_id;

            if (!empty($item['children'])) {
                $this->handleData($item['children'], $item['id'], $result);
            }
        }

        return $result;
    }
}

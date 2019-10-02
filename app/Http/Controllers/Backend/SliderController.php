<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Media;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $mediaModel = Media::paginate(config('app.pagination'), ['*'], 'trang');

        return view('backend.slider.index')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    public function create(Request $request)
    {
        $mediaModel = new Media();

        $isPost = $request->isMethod('post');
        if ($isPost) {
            $input = $request->all();
            if (empty($input['status'])) {
                $input['status'] = Media::STATUS_HIDDEN;
            }
            if (empty($input['target'])) {
                $input['target'] = Media::TARGET_SELF;
            }

            if (!$mediaModel->create($input)) {
                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được thêm');
        }

        return view('backend.slider.create')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    public function update(Request $request)
    {
        $mediaModel = Media::find($request->id);

        $isPut = $request->isMethod('put');
        if ($isPut) {
            $input = $request->all();
            if (empty($input['status'])) {
                $input['status'] = Media::STATUS_HIDDEN;
            }
            if (empty($input['target'])) {
                $input['target'] = Media::TARGET_SELF;
            }

            if (!$mediaModel->update($input)) {
                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được cập nhật thành công');
        }

        return view('backend.slider.update')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    public function delete(Request $request)
    {
        if (!Media::destroy($request->id)) {
            return redirect()->route('admin.slider.index')->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
        }

        return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được xóa');
    }
}

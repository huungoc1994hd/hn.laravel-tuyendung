<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Media;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $mediaModel = Media::where('type', 'slider')
            ->orderBy('created_at', 'desc')
            ->paginate(config('app.pagination'), ['*'], 'trang');

        return view('backend.slider.index')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    /**
     * Create the slide
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $mediaModel = new Media();

        $isPost = $request->isMethod('post');
        if ($isPost) {
            $input = $request->all();
            if (!$mediaModel->create($input)) {
                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được thêm');
        }

        return view('backend.slider.create')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    /**
     * Update the slide
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        $mediaModel = Media::find($request->id);

        $isPut = $request->isMethod('put');
        if ($isPut) {
            $input = $request->all();
            if (!$mediaModel->update($input)) {
                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được cập nhật thành công');
        }

        return view('backend.slider.update')->with([
            'mediaModel' => $mediaModel
        ]);
    }

    /**
     * Delete the slide
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        if (!Media::destroy($request->id)) {
            return redirect()->route('admin.slider.index')->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
        }

        return redirect()->route('admin.slider.index')->withSuccess('1 slide đã được xóa');
    }
}

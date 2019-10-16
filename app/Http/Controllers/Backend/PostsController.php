<?php

namespace App\Http\Controllers\Backend;

use App\Http\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Posts;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $postsModel = Posts::orderBy('created_at', 'desc')->get();

        return view('backend.posts.index')->with([
            'postsModel' => $postsModel
        ]);
    }

    /**
     * Create the posts
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $postsModel = new Posts();

        $isMethodPost = $request->isMethod('post');
        if ($isMethodPost) {
            $input = $request->all();

            DB::beginTransaction();

            $query = $postsModel->create($input);
            if (!$query) {
                DB::rollback();

                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            if (!empty($input['avatar'])) {
                $avatar = $this->handleAvatar($input['avatar'], $query);

                if (!$query->avatar()->create($avatar)) {
                    DB::rollback();

                    return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
                }
            }

            DB::commit();

            return redirect()->route('admin.posts')->withSuccess('Một bài viết đã được thêm');
        }

        return view('backend.posts.create')->with([
            'postsModel' => $postsModel
        ]);
    }

    /**
     * Update the posts
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(Request $request)
    {
        $postsModel = Posts::find($request->id);
        if (!$postsModel) {
            throw new NotFoundHttpException();
        }

        $isMethodPut = $request->isMethod('put');
        if ($isMethodPut) {
            $input = $request->all();

            DB::beginTransaction();

            $query = $postsModel->update($input);

            if (!$query) {
                DB::rollback();

                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            if (!empty($input['avatar'])) {
                if (!$postsModel->avatar()->update($input['avatar'])) {
                    DB::rollback();

                    return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
                }
            }

            DB::commit();

            return redirect()->route('admin.posts')->withSuccess('Một bài viết đã được cập nhật');
        }

        return view('backend.posts.update')->with([
            'postsModel' => $postsModel
        ]);
    }

    /**
     * Delete one or multiple the record(s)
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $idArr = explode(",", $request->ids);

        if (!Posts::destroy($idArr)) {
            return redirect()->back()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
        }

        return redirect()->back()->withSuccess('Một bài viết đã được xóa');
    }

    /**
     * Handle the avatar
     *
     * @param array $inputAvt
     * @param $postsModel
     * @return array|bool
     */
    protected function handleAvatar(array $inputAvt, $postsModel)
    {
        if (empty($inputAvt) || empty($postsModel)) {
            return false;
        }

        $result = [
            'name' => $postsModel->title,
            'alt' => $postsModel->title,
            'image' => $inputAvt['image'],
            'type' => Media::POSTS_TYPE,
            'relationship_table' => $postsModel->table
        ];

        return $result;
    }
}

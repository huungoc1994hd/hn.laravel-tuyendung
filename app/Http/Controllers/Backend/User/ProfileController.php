<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $userModel = User::find(Auth::user()->id);

        $isMethodPut = $request->isMethod('put');
        if ($isMethodPut) {
            $isError = true;
            $input = $request->all();

            DB::beginTransaction();

            if (!$userModel->update($input)) {
                DB::rollback();

                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            if (!empty($input['phone']['phone'])) {
                $condition = [
                    'relationship_id' => $userModel->id,
                    'relationship_table' => $userModel->table
                ];
                if (!$userModel->phone()->updateOrCreate($condition, $input['phone'])) {
                    $isError = false;
                }
            }

            if (!empty($input['profile'])) {
                $condition = [
                    'user_id' => $userModel->id
                ];
                if (!$userModel->profile()->updateOrCreate($condition, $input['profile'])) {
                    $isError = false;
                }
            }

            if ($isError == false) {
                DB::rollback();

                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            DB::commit();

            return redirect()->refresh()->withSuccess('Cập nhật thành công');
        }

        return view('backend.user.profile.index')->with([
            'userModel' => $userModel,
        ]);
    }
}

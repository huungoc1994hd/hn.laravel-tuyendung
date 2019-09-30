<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function index(Request $request)
    {
        $optionModel = Option::first();

        $isMethodPut = $request->isMethod('put');
        if ($isMethodPut) {
            $input = $request->all();
            $isError = true;
            $errorField = [];

            DB::beginTransaction();

            if (!$optionModel->update($input)) {
                DB::rollback();

                return redirect()->refresh()->withErrors('Đã xảy ra lỗi máy chủ cục bộ');
            }

            $conditionRelationship = [
                'relationship_id' => $optionModel->id,
                'relationship_table' => $optionModel->table
            ];

            if (!empty($input['phone']['phone'])) {
                if (!$optionModel->phone()->updateOrCreate($conditionRelationship, $input['phone'])) {
                    $errorField[] = 'Hotline';
                    $isError = false;
                }
            }

            if (!empty($input['email']['email'])) {
                if (!$optionModel->email()->updateOrCreate($conditionRelationship, $input['email'])) {
                    $errorField[] = 'Email';
                    $isError = false;
                }
            }

            if ($isError == false && !empty($errorField)) {
                DB::rollback();

                $errorMsg = 'Có lỗi xảy ra khi cập nhật ' . implode(' và ', $errorField);
                return redirect()->refresh()->withErrors($errorMsg);
            }

            DB::commit();

            return redirect()->refresh()->withSuccess('Cập nhật thành công');
        }

        return view('backend.option.index')->with([
            'optionModel' => $optionModel
        ]);
    }
}

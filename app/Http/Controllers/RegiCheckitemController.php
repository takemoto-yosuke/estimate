<?php

namespace App\Http\Controllers;

use App\Models\RegiCheckitem;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class RegiCheckitemController extends Controller
{
    public function index()
    {
    $checkitems = RegiCheckitem::orderBy('order', 'asc')->get(); // 順番によるソート（order列を使用する）
    return view('registration/checkitems', compact('checkitems'));
    }          

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
        'checkitem' => 'required|max:255',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）
        // Eloquent モデル
         $checkitems = new RegiCheckitem;
         $checkitems->checkitem = $request->checkitem;
         //$checkitems->first_estimate = $request->first_estimate;
         $checkitems->save(); 
         return redirect('/registration/checkitem');
    }

    public function show(RegiCheckitem $regiCheckitem)
    {
        //
    }

    public function edit(RegiCheckitem $checkitem)
    {
        return view('registration/checkitemsedit',compact('checkitem'));
    }

    public function update(Request $request, $id)
    {

        $checkitem = RegiCheckitem::find($id)->update($request->all());
        return redirect('/registration/checkitem');      
    }

    public function destroy($id)
    {
        $checkItem = RegiCheckitem::find($id)->delete();
        return redirect('/registration/checkitem');
    }
    public function saveOrder(Request $request)
    {
        $order = json_decode($request->input('order'), true);

        DB::beginTransaction();

        try {
            foreach ($order as $index => $itemId) {
                RegiCheckitem::where('id', $itemId)->update(['order' => $index + 1]);
            }

            DB::commit();
            return redirect()->back()->with('success', '並び順を保存しました。');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', '並び順の保存中にエラーが発生しました。');
        }
    }    
}

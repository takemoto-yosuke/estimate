<?php

namespace App\Http\Controllers;

use App\Models\CheckItem;
use Illuminate\Http\Request;
use Validator;

class CheckItemController extends Controller
{
  public function __construct(){
//    $this->middleware('auth');
  }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $checkitems = CheckItem::orderBy('created_at', 'asc')->paginate(100);
      return view('checkitems', [
          'checkitems' => $checkitems
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
         $checkitems = new CheckItem;
         $checkitems->checkitem = $request->checkitem;
         $checkitems->machine = $request->machine;
         $checkitems->save(); 
         return redirect('/checkitem');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function show(CheckItem $checkItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckItem $checkitem)
    {
        return view('checkitemsedit',compact('checkitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $checkitem = CheckItem::find($id)->update($request->all());
        return redirect('/checkitem');      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckItem  $checkItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkItem = CheckItem::find($id)->delete();
        return redirect('/checkitem');
    }
}

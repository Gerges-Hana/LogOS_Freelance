<?php

namespace App\Http\Controllers;


use App\Models\outlay_categori;
use Illuminate\Http\Request;
use App\Http\Requests\outlay_categoriRequest;
use App\Http\Requests\EditadminPanelRequset;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class outlay_categoriController extends Controller
{
  public function index()
  {

    $data = outlay_categori::all();
    return view('outlay_categori.index', compact('data'));
  }

  public function create()
  {
    return view('outlay_categori.create');
  }

  public function store(Request $request)
  {
    $request->validate([

      'name' => 'required|min:3|max:255|unique:item_categories,name,',
      'active' => 'required',

    ], [
      'name.required' => 'حقل الاسم مطلوب',
      'name.min' => 'الاسم يجب أن يحتوي على 3 أحرف على الأقل',
      'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا',
      'name.unique' => 'هذا الاسم موجود بالفعل في الجدول',
      'active.required' => ' التفعيل مطلوب',
    ]);

    // التحقق من حق الاسم
    $name_Exisets = outlay_categori::where(['name' => $request->name, 'active' => 1])->first();
    if (!$name_Exisets) {


      outlay_categori::create([
        'name' => $request->name,
        'active' => $request->active
      ]);
      return redirect()->route('outlay_categori.index')->with(['success' => 'تم  الاضافة البيانات بنجاح']);
    } else {
      return redirect()->back()->with(['error' => 'عفوًا، اسم الفئة موجود بالفعل'])
        ->withInput();
    }
  }

  public function edit($id)
  {
    $data = outlay_categori::where('id', $id)->first();
    return view('outlay_categori.edit', compact('data'));
  }

  public function update($id, Request $request)
  {
    $request->validate([

      'name' => 'required|min:3|max:255|unique:item_categories,name,',
      'active' => 'required',

    ], [
      'name.required' => 'حقل الاسم مطلوب',
      'name.min' => 'الاسم يجب أن يحتوي على 3 أحرف على الأقل',
      'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا',
      'name.unique' => 'هذا الاسم موجود بالفعل في الجدول',
      'active.required' => ' التفعيل مطلوب',
    ]);


    $data = outlay_categori::where('id', $id)->first();

    if (empty($data)) {
      return redirect()->back()->with(['error' => 'لايمكن الوصول الى البيانات المطلوبة!'])->withInput();
    }


    $nameExists = outlay_categori::where('name', $request->name)->where('id', '!=', $id)->first();

    if ($nameExists == null) {
      $data->update([
        'name' => $request->name,
        'active' => $request->active,
      ]);

      return redirect()->route('outlay_categori.index')
        ->with(['success' => 'تم  تعديل البيانات بنجاح']);
    } else {
      return redirect()->back()->with(['error' => 'عفوا اسم الادمن موجود بالفعل'])->withInput();
    }
  }

  public function delete($id)
  {
    $item = outlay_categori::where('id', $id)->first();

    if (!$item) {
      return back()->with(['error' => 'لا يمكن العثور على الفئة المطلوبة']);
    }

    if ($item->active == 1) {
      return back()->with(['error' => 'لا يمكن حذف هذه الفئة، عليك تعطيلها أولا']);
    }
    if ($item->outlays()->count() > 0) {
      return back()->with(['error' => 'لا يمكن حذف هذه الفئة لأنها تحتوي على مصاريف مرتبطة']);
    }

    $item->delete();

    return back()->with(['success' => 'تم حذف البيانات بنجاح']);
  }
}
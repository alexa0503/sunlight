<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    protected $type_titles = [
        1=>'首页管理',
        2=>'品牌历史',
        3=>'产品手册',
        4=>'阳光秘籍',
    ];
    public function index($type_id)
    {
        $rows = \App\Page::where('type_id', $type_id)->paginate(20);
        return view('admin/page/index', ['rows'=>$rows, 'type_id'=>$type_id, 'type_title'=>$this->type_titles[$type_id]]);
    }
    public function create($type_id)
    {
        return view('admin/page/create', ['type_id'=>$type_id]);
    }
    public function store(Request $request, $type_id)
    {
        if( $type_id == 3){
            $this->validate($request, [
                'title' => 'required|max:60',
                'description' => 'required|max:120',
                'sort_id' => 'required|max:11',
                'image' => 'mimes:jpeg,bmp,png',
            ]);
        }
        else{
            $this->validate($request, [
                'title' => 'required|max:60',
                'sort_id' => 'required|max:11',
                'image' => 'mimes:jpeg,bmp,png',
            ]);
        }

        if ($request->hasFile('image')) {
            if ($request->file('image')->getError() != 0) {
                return Response(['image' => $request->file('image')->getErrorMessage()], 422);
            }
            $file = $request->file('image');

            $entension = $file->getClientOriginalExtension();
            $file_name = uniqid().'.'.$entension;
            $path = 'uploads/'.date('Ymd').'/';
            $file->move(public_path($path), $file_name);
            $image = $path.$file_name;
        }
        $page = new \App\Page;
        $page->image = $image;
        $page->type_id = $type_id;
        $page->title = $request->input('title');
        $page->description = $request->input('description');
        $page->content = $request->input('content');
        $page->sort_id = $request->input('sort_id');
        $page->save();
        return [];
    }
}

<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\DoMat;

class DoMatController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::Do_mat.index');
    }

    public function danhsach(Request $request)
    {
        $tenmucdo = $request->get('ten_muc_do');
        $ds_mucdo = DoMat::wherenull('deleted_at')->orderBy('ten_muc_do','asc')
            ->where(function ($query) use ($tenmucdo) {
                if (!empty($tenmucdo)) {
                    return $query->where('ten_muc_do', 'LIKE', "%$tenmucdo%");
                }
            })
            ->paginate(PER_PAGE);
        return view('admin::Do_mat.danh_sach',compact('ds_mucdo'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $do_mat = new DoMat();
        $do_mat->ten_muc_do = $request->ten_muc_do;
        $do_mat->mo_ta = $request->mo_ta;
        $do_mat->save();
        return redirect()->route('danhsachdobaomat')->with('success','Thêm mới thành công !');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $mucdo = DoMat::where('id',$id)->first();
        return view('admin::Do_mat.edit',compact('mucdo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $mucdo = DoMat::where('id',$id)->first();
        $mucdo->ten_muc_do = $request->ten_muc_do;
        $mucdo->mo_ta = $request->mo_ta;
        $mucdo->save();
        return redirect()->route('danhsachdobaomat')->with('success','Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $mucdo = DoMat::where('id',$id)->first();
        $mucdo->delete();
        return redirect()->route('danhsachdobaomat')->with('success','Xóa thành công !');
    }
}
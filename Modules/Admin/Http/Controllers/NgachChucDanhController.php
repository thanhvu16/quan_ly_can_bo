<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\NgachChucDanh;

class NgachChucDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->get('ten');
        $mo_ta = $request->get('mo_ta');
        $danh_sach = NgachChucDanh::orderBy('ten')
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->where(function ($query) use ($mo_ta) {
                if (!empty($mo_ta)) {
                    return $query->where(DB::raw('lower(mo_ta)'), 'LIKE', "%" . mb_strtolower($mo_ta) . "%");
                }
            })
            ->paginate(PER_PAGE);

        return view('admin::ngach-chuc-danh.index',compact('danh_sach'));
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
        $data = new NgachChucDanh();
        $data->ten = $request->ten;
        $data->mo_ta = $request->mo_ta;
        $data->save();

        return redirect()->back()->with('success', 'Thêm mới thành công !');
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
        $data = NgachChucDanh::where('id', $id)->first();
        return view('admin::ngach-chuc-danh.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = NgachChucDanh::where('id', $id)->first();
        $data->ten = $request->ten;
        $data->mo_ta = $request->mo_ta;
        $data->save();
        return redirect()->route('ngach-chuc-danh.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data = NgachChucDanh::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }
}

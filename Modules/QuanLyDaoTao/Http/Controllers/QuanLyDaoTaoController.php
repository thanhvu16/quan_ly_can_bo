<?php

namespace Modules\QuanLyDaoTao\Http\Controllers;
use auth,DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\LopDaoTao;

class QuanLyDaoTaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->get('ten');
        $danhSachDuKien = LopDaoTao::where('trang_thai',LopDaoTao::DU_KIEN_MO)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })->paginate(PER_PAGE);
        $danhSachDangMo = LopDaoTao::where('trang_thai',LopDaoTao::DANG_MO)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })->paginate(PER_PAGE);
        $danhSachDaKetThuc = LopDaoTao::where('trang_thai',LopDaoTao::DA_KET_THUC)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })->paginate(PER_PAGE);
        return view('quanlydaotao::view_index',compact('danhSachDaKetThuc','danhSachDangMo','danhSachDuKien'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('quanlydaotao::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('quanlydaotao::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('quanlydaotao::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}

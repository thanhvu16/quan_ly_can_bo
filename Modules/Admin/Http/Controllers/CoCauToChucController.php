<?php

namespace Modules\Admin\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\NhomDonVi;
use Modules\Admin\Entities\ToChuc;
use Auth;

class CoCauToChucController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $tendonvi = $request->get('ten_don_vi');
        $tenviettat = $request->get('ten_viet_tat');
        $mahanhchinh = $request->get('ma_hanh_chinh');
//        $donVi = ToChuc::where('ten_don_vi', 'LIKE', "%$tendonvi%")->first();

        $ds_donvi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id);
            } else {
                $query->where('parent_id', auth::user()->don_vi_id);
            }
        })->paginate(PER_PAGE);

        $nhom_don_vi = NhomDonVi::wherenull('deleted_at')->get();

        $donViCapXa = ToChuc::whereNotNull('cap_xa')->select('id', 'ten_don_vi')->get();
        $title = 'Nghiệp vụ quản lý cán bộ';

        return view('admin::to-chuc.danh_sach', compact('ds_donvi','nhom_don_vi', 'donViCapXa','title'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $nhom_don_vi = NhomDonVi::wherenull('deleted_at')->get();
        $donViCapXa = ToChuc::whereNotNull('cap_xa')->select('id', 'ten_don_vi')->get();

        return view('admin::to-chuc.create', compact('nhom_don_vi', 'donViCapXa'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $donvi = new ToChuc();
        $donvi->ten_don_vi = $request->ten_don_vi;
        $donvi->ten_viet_tat = $request->ten_viet_tat;
        $donvi->ma_hanh_chinh = $request->ma_hanh_chinh;
        $donvi->dia_chi = $request->dia_chi;
        $donvi->so_dien_thoai = $request->dien_thoai;
        $donvi->email = $request->email;
        $donvi->dieu_hanh = $request->dieu_hanh;
        $donvi->nhom_don_vi = $request->nhom_don_vi;
        $donvi->cap_xa = $request->cap_xa ?? null;
        $donvi->cap_chi_nhanh = $request->cap_chi_nhanh ?? null;
        if ($request->check_parent == 1) {
            $donvi->parent_id = $request->get('parent_id');
        }
        $donvi->save();

        // check update nguoi dung
        User::where('don_vi_id', $donvi->id)->update([
            'cap_xa' => $donvi->cap_xa
        ]);

        return redirect()->route('don-vi-to-chuc.index')->with('success', 'Thêm mới thành công !');
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
        $donvi = ToChuc::where('id', $id)->first();
        $nhom_don_vi = NhomDonVi::wherenull('deleted_at')->get();
        $donViCapXa = ToChuc::whereNotNull('cap_xa')->select('id', 'ten_don_vi')->get();

        if ($donvi->parent_id != 0) {

            return view('admin::to-chuc.edit_cap_phong_ban', compact('donvi','nhom_don_vi', 'donViCapXa'));

        }

        return view('admin::to-chuc.edit', compact('donvi','nhom_don_vi', 'donViCapXa'));
    }
    public function sua($id)
    {
        $donvi = ToChuc::where('id', $id)->first();
        $nhom_don_vi = NhomDonVi::wherenull('deleted_at')->get();
        $donViCapXa = ToChuc::whereNotNull('cap_xa')->select('id', 'ten_don_vi')->get();

        if ($donvi->parent_id != 0) {

            return view('admin::to-chuc.edit_cap_phong_ban', compact('donvi','nhom_don_vi', 'donViCapXa'));

        }

        return view('admin::to-chuc.edit', compact('donvi','nhom_don_vi', 'donViCapXa'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $donvi = ToChuc::where('id', $id)->first();
        $donvi->ten_don_vi = $request->ten_don_vi;
        $donvi->ten_viet_tat = $request->ten_viet_tat;
        $donvi->ma_hanh_chinh = $request->ma_hanh_chinh;
        $donvi->dia_chi = $request->dia_chi;
        $donvi->so_dien_thoai = $request->dien_thoai;
        $donvi->email = $request->email;
        $donvi->dieu_hanh = $request->dieu_hanh;
        $donvi->nhom_don_vi = $request->nhom_don_vi;
        $donvi->cap_xa = $request->cap_xa ?? null;
        $donvi->parent_id = 0;
        if ($request->check_parent == 1) {
            $donvi->parent_id = $request->get('parent_id');
        }
        $donvi->save();

        // check update nguoi dung
        User::where('don_vi_id', $donvi->id)->update([
            'cap_xa' => $donvi->cap_xa
        ]);

        return redirect()->route('don-vi-to-chuc.index')->with('success', 'Cập nhật thành công !');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $donvi = ToChuc::where('id', $id)->delete();
    }
}

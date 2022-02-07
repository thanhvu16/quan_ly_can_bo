<?php

namespace Modules\CanBo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\DanToc;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\ThanhPho;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('canbo::index');
    }

    public function canBo($id)
    {
        $danhSach = CanBo::paginate(20);
        return view('canbo::danh-sach-can-bo',compact('danhSach'));

    }
    public function getlistcb()
    {
        $donVi = ToChuc::get();
        $arayEcabinet = array();

        foreach ($donVi as $key=>$data)
        {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['STT'] = $key+1;
            $arayEcabinet[$key]['pid'] = $data->parent_id;
            $arayEcabinet[$key]['Email'] = $data->email;
//            $arayEcabinet[$key]['status'] = 1;
            $arayEcabinet[$key]['name'] ="<b style='color: black'>$data->ten_don_vi</b>";
            $arayEcabinet[$key]['permissionValue'] = '<a href="danh-sach-don-vi/'.$data->id.'">Xem chi tiết</a>';
            $arayEcabinet[$key]['tacvu'] = '<a href="sua-don-vi-to-chuc/'.$data->id.'"'.'><i class="'.'fa fa-edit'.'"></i></a> &emsp; <a href="xoa-don-vi-to-chuc/'.$data->id.'"'.'><i style="color: red"class="'.'fa fa-trash'.'"></i></a> ';
        }


        return $arayEcabinet;
    }
    public function canBoDetail($id)
    {
        $canBo = CanBo:: where('id',$id)->first();

        $danToc = DanToc::orderBy('ten','asc')->get();
        $tonGiao = TonGiao::orderBy('ten','asc')->get();
        $thanhPho = ThanhPho::orderBy('ten','asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten','asc')->get();
        $donVi = ToChuc::orderBy('ten_don_vi','asc')->get();
        $ngach = NgachChucDanh::orderBy('ten','asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten','asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten','asc')->get();


        return view('canbo::index',compact('canBo','danToc','tonGiao','thanhPho','chucVuHienTai'
            ,'donVi','ngach','bacLuong','phuCap'));

    }

    public function postSoLuoc1(Request $request)
    {
        dd($request->all());
        $canBo = CanBo::first();
        $canBo->ho_ten = $request->ten;
        $canBo->gioi_tinh = $request->gioi_tinh;
        $canBo->ngay_sinh = !empty($request->ngay_sinh) ? formatYMD($request->ngay_sinh) : null;
        $canBo->dan_toc = $request->dan_toc;
        $canBo->ton_giao = $request->ton_giao;

//        $canBo->ngay_vao_don_vi = !empty($request->ngay_vao_don_vi) ? formatYMD($request->ngay_vao_don_vi) : null;

        $canBo->co_quan_tuyen = $request->co_quan_tuyen;
        $canBo->noi_sinh = $request->noi_sinh_xa;
        $canBo->huyen_noi_sinh = $request->noi_sinh_huyen;
        $canBo-> thanh_pho_noi_sinh= $request->noi_sinh_tp;
        $canBo->que_quan = $request->que_quan_xa;
        $canBo->huyen_que_quan = $request->que_quan_huyen;
        $canBo->thanh_pho_que_quan = $request->que_quan_tp;
        $canBo->ho_khau = $request->ho_khau;
        $canBo->noi_o_hien_nay = $request->noi_o_hien_nay;
        $canBo->nghe_nghiep_khi_duoc_tuyen = $request->nghe_nghiep_khi_tuyen;
        $canBo->ngay_bat_dau_di_lam = !empty($request->ngay_bat_dau_di_lam) ? formatYMD($request->ngay_bat_dau_di_lam) : null;

        $canBo->chuc_danh = $request->chuc_danh;
        $canBo->don_vi_id = $request->don_vi;
        $canBo->ngach_cong_chuc = $request->ngach_cong_chuc;
        $canBo->ma_ngach = $request->ma_ngach;
        $canBo->bac_luong = $request->bac_luong;
        $canBo->he_so_luong = $request->he_so_luong;
        $canBo->ngay_huong = !empty($request->ngay_huong) ? formatYMD($request->ngay_huong) : null;
        $canBo->som = $request->som;
        $canBo->phu_cap_cv = $request->phu_cap;
        $canBo->phu_cap_khac = $request->phu_cap_khac;
        $canBo->phan_tram_huong = $request->phan_tram_huong;
        $canBo->phan_tram_khung = $request->khung;
        $canBo->BHXH = $request->bhxh;
        $canBo->BHYT = $request->bhyt;

        $canBo->save();
        return redirect()->back()->with('cập nhật thành công !');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('canbo::create');
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
        return view('canbo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('canbo::edit');
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

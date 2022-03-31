<?php

namespace Modules\BaoCaoThongKe\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ToChuc;
use Auth;

class ThongKeHoSoDonViController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $donViCap1 = ToChuc::where('parent_id', 0)->select('id', 'ten_don_vi')->first();

        $danhSachToChuc = ToChuc::where(function ($query) use ($donViCap1) {
            if (!empty(auth::user()->donVi) && auth::user()->donVi->parent_id != 0) {

                    return $query->Where('id', auth::user()->don_vi_id);
                } else {

                return $query->Where('parent_id', $donViCap1->id);
            }
            })
            ->orderBy('parent_id', 'ASC')
            ->whereNull('deleted_at')
            ->select('id', 'parent_id', 'ten_don_vi', 'thu_tu', 'created_at')
            ->get();

        if (count($danhSachToChuc) > 0) {
            foreach ($danhSachToChuc as $toChuc) {
                $data = $this->getDachSachCon($toChuc->id);
                $toChuc->danh_sach_con = $data['danh_sach_con'];
                $toChuc->tong_can_bo = $data['tong_can_bo'];
                $toChuc->tong_dang_vien = $data['tong_dang_vien'];
                $toChuc->khen_thuong = $data['khen_thuong'];
                $toChuc->ki_luat = $data['ki_luat'];
                $toChuc->chuyen_cong_tac = $data['chuyen_cong_tac'];
                $toChuc->ve_huu = $data['ve_huu'];
            }
        }
        $title = 'Tổng hợp, báo cáo > Thống kê chung ';

        return view('baocaothongke::don-vi.index', compact('danhSachToChuc','title'));
    }

    public function getDachSachCon($id)
    {
        $danhSachToChucCon = ToChuc::where('parent_id', $id)->whereNull('deleted_at')
            ->select('id', 'parent_id', 'ten_don_vi', 'thu_tu', 'created_at')
            ->get();

        $tong = 0;
        $tongTatDangVien = 0;
        $tongTatKhenThuong = 0;
        $tongTatKiLuat = 0;
        $tongTatChuyenCongTac = 0;
        $tongTatVeHuu = 0;

        foreach ($danhSachToChucCon as $toChuc) {
            $tongCanBo = $this->layThongTinCanBoTheoToChucId($toChuc->id)['tong_can_bo'];
            $toChuc->tongCanBo = $tongCanBo;
            $tong += $tongCanBo;

            $tongDangVien = $this->layThongTinCanBoTheoToChucId($toChuc->id)['tong_dang_vien'];
            $toChuc->tongDangVien = $tongDangVien;
            $tongTatDangVien += $tongDangVien;

            $tongKhenThuong = $this->layThongTinCanBoTheoToChucId($toChuc->id)['khen_thuong'];
            $toChuc->tongKhenThuong = $this->layThongTinCanBoTheoToChucId($toChuc->id)['khen_thuong'];
            $tongTatKhenThuong += $tongKhenThuong;

            $tongKyLuat = $this->layThongTinCanBoTheoToChucId($toChuc->id)['ki_luat'];
            $toChuc->tongKiLuat = $tongKyLuat;
            $tongTatKiLuat += $tongTatKiLuat;

            $tongChuyenCongTac = $this->layThongTinCanBoTheoToChucId($toChuc->id)['chuyen_cong_tac'];
            $toChuc->tongChuyenCongTac = $tongChuyenCongTac;
            $tongTatChuyenCongTac += $tongChuyenCongTac;

            $tongVeHuu = $this->layThongTinCanBoTheoToChucId($toChuc->id)['ve_huu'];
            $toChuc->tongVeHuu = $tongVeHuu;
            $tongTatVeHuu += $tongVeHuu;
        }

        return [
            'danh_sach_con' => $danhSachToChucCon,
            'tong_can_bo' => $tong,
            'tong_dang_vien' => $tongTatDangVien,
            'khen_thuong' => $tongTatKhenThuong,
            'ki_luat' => $tongTatKiLuat,
            'chuyen_cong_tac' => $tongTatChuyenCongTac,
            've_huu' => $tongTatVeHuu,
        ];

    }

    public function layThongTinCanBoTheoToChucId($toChucId)
    {
        $tongCanBo = CanBo::where('don_vi_id', $toChucId)->count();
        $tongSoDangVien = CanBo::where('don_vi_id', $toChucId)
            ->where('la_dang_vien', 1)->count();
        $tongSoKhenThuong = CanBo::whereHas('khenThuong')->where('don_vi_id', $toChucId)->count();
        $tongSoKiLuat = CanBo::whereHas('kiLuat')->where('don_vi_id', $toChucId)->count();
        $tongSoChuyenCongTac = CanBo::whereHas('chuyenCongTac')->where('don_vi_id', $toChucId)->count();
        $tongSoVeHuu = CanBo::whereHas('veHuu')->where('don_vi_id', $toChucId)->count();

        return [
            'tong_can_bo' => $tongCanBo,
            'tong_dang_vien' => $tongSoDangVien,
            'khen_thuong' => $tongSoKhenThuong,
            'ki_luat' => $tongSoKiLuat,
            'chuyen_cong_tac' => $tongSoChuyenCongTac,
            've_huu' => $tongSoVeHuu,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('baocaothongke::create');
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
        return view('baocaothongke::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('baocaothongke::edit');
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

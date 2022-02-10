<?php

namespace Modules\ThemCanBo\Http\Controllers;

use App\Models\HoSoTraLai;
use App\Models\LogDuyetHoSoCanBo;
use App\Models\TrinhTuGuiDuyetHoSo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ToChuc;
use Auth, DB;

class HoSoCanBoController extends Controller
{
    public function lanhDaoChoDuyet(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $danhSach = CanBo::whereHas('trinhTuChoDuyetHoSo')
            ->where('don_vi_tao_id', auth::user()->don_vi_id)
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($gioiTinh) {
                if (!empty($gioiTinh)) {
                    return $query->where('gioi_tinh', $gioiTinh);
                }
            })
            ->where(function ($query) use ($donViId) {
                if (!empty($donViId)) {
                    return $query->where('don_vi_id', $donViId);
                }
            })
            ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET)
            ->paginate(20);

        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::lanh-dao.cho_duyet',
            compact('danhSach', 'danhSachToChuc'));
    }

    public function lanhDaoTraLai(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;

        $danhSach = CanBo::with('trinhTuTraLaiHoSo')
            ->whereHas('trinhTuTraLaiHoSo')
            ->where('don_vi_tao_id', auth::user()->don_vi_id)
            ->where(function ($query) use ($hoTen) {
                if (!empty($hoTen)) {
                    return $query->where('ho_ten', 'LIKE', "%$hoTen%");
                }
            })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($gioiTinh) {
                if (!empty($gioiTinh)) {
                    return $query->where('gioi_tinh', $gioiTinh);
                }
            })
            ->where(function ($query) use ($donViId) {
                if (!empty($donViId)) {
                    return $query->where('don_vi_id', $donViId);
                }
            })
            ->where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI)
            ->paginate(20);

        $danhSachToChuc = ToChuc::all();

        return view('themcanbo::lanh-dao.gui_tra_lai',
            compact('danhSach', 'danhSachToChuc'));
    }

    public function lanhDaoDuyet(Request $request)
    {
        $duyetMulti = $request->get('multi') ?? null;
        $status = $request->get('status');
        $noiDung = $request->get('noi_dung') ?? null;

        if (!empty($duyetMulti)) {
            $arrCanBoId = json_decode($request->get('can_bo_id'));
        } else {
            $arrCanBoId = [$request->get('can_bo_id')];
        }

        if ($status == 1) {
            $message = 'Đã duyệt hồ sơ';
        } else {
            $message = 'Đã gửi trả lại hồ sơ';
        }

        if ($arrCanBoId) {
            try {
                DB::beginTransaction();
                foreach ($arrCanBoId as $canBoId) {
                    // duyet
                    if ($status == 1) {
                        CanBo::updateTrangThaiGuiDuyet($canBoId, CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET);
                        TrinhTuGuiDuyetHoSo::updateTrangThai($canBoId);
                    } else {
                        $trinhTuGuiDuyetHoSo = TrinhTuGuiDuyetHoSo::where('can_bo_id', $canBoId)
                            ->where('can_bo_nhan_id', auth::user()->id)
                            ->whereNull('status')
                            ->orderBy('id', 'DESC')
                            ->first();

                        $hoSoTraLai = new HoSoTraLai();
                        $hoSoTraLai->can_bo_id = $canBoId;
                        $hoSoTraLai->can_bo_chuyen_id = auth::user()->id;
                        $hoSoTraLai->can_bo_nhan_id = $trinhTuGuiDuyetHoSo->can_bo_chuyen_id;
                        $hoSoTraLai->don_vi_tao_id = auth::user()->don_vi_id;
                        $hoSoTraLai->noi_dung = $noiDung;
                        $hoSoTraLai->save();

                        CanBo::updateTrangThaiGuiDuyet($canBoId, CanBo::TRANG_THAI_DA_GUI_DUYET_TRA_LAI);
                        $trinhTuGuiDuyetHoSo->status = 1;
                        $trinhTuGuiDuyetHoSo->save();
                    }
                }

                /** luu log duyet, tra lai ho so**/
                $logDuyetHoSo = new LogDuyetHoSoCanBo();
                $logDuyetHoSo->arr_can_bo_id = json_encode($arrCanBoId);
                $logDuyetHoSo->user_id = auth::user()->id;
                $logDuyetHoSo->status = $status;
                $logDuyetHoSo->don_vi_tao_id = auth::user()->don_vi_id;
                $logDuyetHoSo->save();

                DB::commit();

                if ($request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => $message,
                        200
                    ]);
                } else {
                    return redirect()->back()->with('success', $message);
                }

            } catch (\Exception $e) {
                if (!empty($duyetMulti)) {
                    DB::rollback();
                }
                dd($e);
            }
        }
    }
}

<?php

namespace Modules\BaoCaoThongKe\Http\Controllers;

use App\Exports\ExportBaoCaoTheoMau;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ToChuc;
use Auth, Excel;

class BaoCaoThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $donViBaoCao = null;

        $donViCap1 = ToChuc::where('parent_id', 0)->select('id', 'ten_don_vi')->first();

        $danhSachToChuc = ToChuc::with('toChucCon')->where(function ($query) use ($donViCap1) {
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

        if ($id) {
            $donViBaoCao = ToChuc::with('parentToChuc')->where('id', $id)->first();
        }
        $title = 'Tổng hợp, báo cáo > Báo cáo thống kê ';

        return view('baocaothongke::index', compact('danhSachToChuc', 'donViBaoCao','title'));
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

    public function XuatBaoCaoThongKe(Request $request)
    {
        $type = $request->type;
        $fileName = $type .'-TINH' .'.xlsx';
        $donViId = $request->get('don_vi_id') ?? null;
        $data = null;
        if ($type == 1) {
            $currentMonth = date('m');
            $startDate = null;
            $endDate = null;
            $startDateBefore = null;
            $endDateBefore = null;
            $quyHienTai = null;

            // 1-2-3
            if ($currentMonth < 4) {
                $startDate = date('Y').'-01-01'.' 00.00.00';
                $endDate = date('Y').'-03-31'.' 23.59.59';

                $startDateBefore = date('Y')-1 .'-01-01'.' 00.00.00';
                $endDateBefore = date('Y')-1 .'-03-31'.' 23.59.59';
                $quyHienTai = 1;
            }

            // 4-5-6
            if ($currentMonth > 3 && $currentMonth < 7) {
                $startDate = date('Y').'-04-01'.' 00.00.00';
                $endDate = date('Y').'-06-30'.' 23.59.59';

                $startDateBefore = date('Y')-1 .'-04-01'.' 00.00.00';
                $endDateBefore = date('Y')-1 .'-06-30'.' 23.59.59';
                $quyHienTai = 2;
            }

            // 7-8-9
            if ($currentMonth > 6 && $currentMonth < 10) {
                $startDate = date('Y').'-01-01'.' 00.00.00';
                $endDate = date('Y').'-09-30'.' 23.59.59';

                $startDateBefore = date('Y')-1 .'-01-01'.' 00.00.00';
                $endDateBefore = date('Y')-1 .'-09-30'.' 23.59.59';
                $quyHienTai = 3;
            }

            // 10-11-12
            if ($currentMonth > 9) {
                $startDate = date('Y').'-01-01'.'00.00.00';
                $endDate = date('Y').'-12-31'.'23.59.59';

                $startDateBefore = date('Y')-1 .'-01-01'.'00.00.00';
                $endDateBefore = date('Y')-1 .'-12-31'.'23.59.59';
                $quyHienTai = 4;
            }

            $ketNap['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate);
            $ketNap['ky_truoc'] = CanBo::soDangVien($donViId,'la_dang_vien', $startDateBefore, $endDateBefore);

            $tinhKhacChuyenDen['ky_nay'] = CanBo::soDangVien($donViId,'la_dang_vien', $startDate, $endDate, 'dang_vien_tinh_khac_chuyen_den');
            $tinhKhacChuyenDen['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'dang_vien_tinh_khac_chuyen_den');

            $huyenKhacTrongTinhChuyenDen['ky_nay'] = CanBo::soDangVien($donViId,'la_dang_vien', $startDate, $endDate, 'dang_vien_huyen_khac_trong_tinh');
            $huyenKhacTrongTinhChuyenDen['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore,'dang_vien_huyen_khac_trong_tinh');

            $phucHoiDangTich['ky_nay'] = CanBo::soDangVien($donViId,'la_dang_vien', $startDate, $endDate,'phuc_hoi_dang_tich');
            $phucHoiDangTich['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore,'phuc_hoi_dang_tich');

            $tuTran['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'tu_tran');
            $tuTran['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'tu_tran');

            $khaiTru['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'khai_tru');
            $khaiTru['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'khai_tru');

            $xoaTen['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'xoa_ten');
            $xoaTen['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'xoa_ten');

            $xinRaKhoiDang['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'xin_ra_khoi_dang');
            $xinRaKhoiDang['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'xin_ra_khoi_dang');

            $chuyenDiTinhKhac['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'chuyen_di_tinh_khac');
            $chuyenDiTinhKhac['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'chuyen_di_tinh_khac');

            $chuyenDiHuyenKhacTrongTinh['ky_nay'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDate, $endDate, 'chuyen_di_huyen_khac_trong_tinh');
            $chuyenDiHuyenKhacTrongTinh['ky_truoc'] = CanBo::soDangVien($donViId, 'la_dang_vien', $startDateBefore, $endDateBefore, 'chuyen_di_huyen_khac_trong_tinh');

            $data = [
                'ket_nap' => $ketNap,
                'tinh_khac_chuyen_den' => $tinhKhacChuyenDen,
                'huyen_khac_trong_tinh_chuyen_den' => $huyenKhacTrongTinhChuyenDen,
                'phuc_hoi_dang_tich' => $phucHoiDangTich,
                'tu_tran' => $tuTran,
                'khai_tru' => $khaiTru,
                'xoa_ten' => $xoaTen,
                'xin_ra_khoi_dang' => $xinRaKhoiDang,
                'chuyen_di_tinh_khac' => $chuyenDiTinhKhac,
                'chuyen_di_huyen_khac_trong_tinh' => $chuyenDiHuyenKhacTrongTinh
            ];


        }

        return Excel::download(new ExportBaoCaoTheoMau($type, $data),
            $fileName);

//        return view('baocaothongke::mau-bao-cao-excel.1');
    }
}

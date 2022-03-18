<?php

namespace Modules\CacQuaTrinh\Http\Controllers;

use App\Exports\CanBoExort;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\QuaChucVu;
use Modules\Admin\Entities\QuaTrinhChucVuDang;
use Modules\Admin\Entities\QuaTrinhCongTac;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\QuaTrinhDoan;
use Modules\Admin\Entities\QuaTrinhGiaDinh;
use Modules\Admin\Entities\QuaTrinhLuong;
use Modules\Admin\Entities\QuaTrinhNghienCuu;
use Modules\Admin\Entities\QuaTrinhNuocNgoai;
use Modules\Admin\Entities\QuaTrinhPhuCapKhac;
use Modules\Admin\Entities\QuaTrinhQuocHoi;
use Modules\Admin\Entities\QuaTrinhVuotKhung;
use Modules\Admin\Entities\ToChuc;
use auth, DB, Excel;
use Modules\Admin\Entities\TruongHoc;

class CacQuaTrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $ten = $request->ten_cb;
        $cmt = $request->cmt;
        $donViId = $request->don_vi;
        $phongBanId = $request->phong_ban_id ?? null;
        $chuc_vu_chinh = $request->chuc_vu_chinh;
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $page = $request->get('page');
        $search = $request->search;

        $danhSachPhongBan = null;
        if ($search || !empty($donViId)) {
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->select('id', 'ten_don_vi', 'parent_id')->get();
            if (!empty($donViId)) {
                $donViCha = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi', 'parent_id')->first();
                if ($donViCha->parent_id == 0) {
                    $donViId = null;
                }
            }

        }

        $cap2 = false;
        if (auth::user()->hasRole(QUAN_TRI_HT) || auth::user()->donVi->parent_id == 0) {
            $donViCap1 = ToChuc::where('parent_id', 0)->select('id', 'ten_don_vi')->first();

            $donVi = ToChuc::where('parent_id', $donViCap1->id)->select('id', 'ten_don_vi')->get();
        } else {
            $donVi = ToChuc::where('id', auth::user()->don_vi_id)->select('id', 'ten_don_vi')->get();
            $donViId = auth::user()->don_vi_id;
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->select('id', 'ten_don_vi')->get();
            $cap2 = true;
        }


        $danhSach = CanBo::where(function ($query) use ($donViId) {
            if (!empty($donViId)) {
                return $query->where('don_vi_tao_id', $donViId);
            }
        })
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ho_ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })
            ->where(function ($query) use ($cmt) {
                if (!empty($cmt)) {
                    return $query->where(DB::raw('lower(cmnd)'), 'LIKE', "%" . mb_strtolower($cmt) . "%");
                }
            })
            ->where(function ($query) use ($chuc_vu_chinh) {
                if (!empty($chuc_vu_chinh)) {
                    return $query->where(DB::raw('lower(chuc_vu_hien_tai)'), 'LIKE', "%" . mb_strtolower($chuc_vu_chinh) . "%");
                }
            })
            ->where(function ($query) use ($phongBanId) {
                if (!empty($phongBanId)) {
                    return $query->where('don_vi_id', $phongBanId);
                }
            })
            ->paginate(PER_PAGE, ['*'], 'page', $page);

        if ($request->get('type') == 'excel') {
            $totalRecord = $danhSach->count();
            $fileName = 'Danh sách cán bộ ' . date('d-m-Y') . '.xlsx';

            return Excel::download(new CanBoExort($danhSach, $totalRecord),
                $fileName);
        }
        return view('cacquatrinh::index',
            compact('danhSach', 'donVi', 'chucVuHienTai', 'danhSachPhongBan', 'cap2'));
    }

    public function capNhatQuaTrinhDaoTao($id, Request $request)
    {
        $quaTrinhDaoTao = QuaTrinhDaoTao::where('users', $id)->get();
        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();
        $truongHoc = TruongHoc::orderBy('ten', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $quaTrinhCongTac = QuaTrinhCongTac::where('users', $id)->get();
        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::where('users', $id)->get();
        $quaTrinhLuong = QuaTrinhLuong::where('users', $id)->get();
        $ngach = NgachChucDanh::orderBy('ten', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();
        $quaTrinhQuocHoi = QuaTrinhQuocHoi::where('users', $id)->get();
        $quaTrinhChucVu = QuaChucVu::where('users', $id)->get();
        $quaTrinhChucVuDang = QuaTrinhChucVuDang::where('users', $id)->get();
        $quaTrinhQuyHoachCanBo = QuaTrinhDoan::where('users', $id)->get();
        $quaTrinhVuotKhung = QuaTrinhVuotKhung::where('users', $id)->get();
        $quaTrinhPhuCapKhac = QuaTrinhPhuCapKhac::where('users', $id)->get();
        $quaTrinhNghienCuu = QuaTrinhNghienCuu::where('users', $id)->get();
        $quaTrinhGiaDinh = QuaTrinhGiaDinh::where('users', $id)->get();
        $canBo = CanBo::where('id', $id)->first();

        if ($request->dao_tao == 1) {
            return view('cacquatrinh::components.quaTrinhDaoTao', compact('quaTrinhDaoTao', 'canBo', 'chuyenNganhDT', 'hinhThucDaoTao', 'truongHoc', 'congViecChuyenMon'));

        } elseif ($request->ban_than == 1) {
            return view('cacquatrinh::components.banThan', compact('quaTrinhCongTac', 'canBo'));
        } elseif ($request->nuoc_ngoai == 1) {
            return view('cacquatrinh::components.nuocNgoai', compact('quaTrinhCongTac', 'canBo','quaTrinhNuocNgoai'));
        } elseif ($request->luong == 1) {
            return view('cacquatrinh::components.luong', compact('quaTrinhLuong', 'canBo','ngach','bacLuong','phuCap'));
        } elseif ($request->quoc_hoi == 1) {
            return view('cacquatrinh::components.quocHoi', compact('quaTrinhQuocHoi', 'canBo'));
        } elseif ($request->chuc_vu == 1) {
            return view('cacquatrinh::components.chucVu', compact('quaTrinhChucVu', 'canBo'));
        } elseif ($request->dang == 1) {
            return view('cacquatrinh::components.chucVuDang', compact('quaTrinhChucVuDang', 'canBo'));
        } elseif ($request->doan_the == 1) {
            return view('cacquatrinh::components.chucVuDoan', compact('quaTrinhQuyHoachCanBo', 'canBo'));
        } elseif ($request->tham_nien == 1) {
            return view('cacquatrinh::components.thamNien', compact('quaTrinhVuotKhung', 'canBo'));
        } elseif ($request->phu_cap_khac == 1) {
            return view('cacquatrinh::components.phuCapKhac', compact('quaTrinhPhuCapKhac', 'canBo'));
        } elseif ($request->nghien_cuu == 1) {
            return view('cacquatrinh::components.nghienCuu', compact('quaTrinhNghienCuu', 'canBo'));
        } elseif ($request->gia_dinh == 1) {
            return view('cacquatrinh::components.giaDinh', compact('quaTrinhGiaDinh', 'canBo'));
        } else {
            return redirect()->back();
        }


    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('cacquatrinh::create');
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
        return view('cacquatrinh::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cacquatrinh::edit');
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

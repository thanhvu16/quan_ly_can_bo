<?php

namespace Modules\TraCuu\Http\Controllers;

use App\Exports\CanBoExort;
use App\Exports\VanbandenExport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\BinhBauPhanLoaiCanBo;
use Modules\Admin\Entities\CanBo;
use DB, Excel;
use Modules\Admin\Entities\ChucVu;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\DonVi;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\KiemNhiemBietPhai;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;
use Auth;

class TraCuuController extends \App\Http\Controllers\Controller
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
        if ($request->tracuu == 5) {
            $title = 'Tìm kiếm > Tìm kiếm nhanh ';
        } else {
            $title = 'Quản lý hồ sơ cán bộ > Hồ sơ cán bộ';
        }

        return view('tracuu::index',
            compact('danhSach', 'donVi', 'chucVuHienTai', 'danhSachPhongBan', 'cap2', 'title'));
    }

    public function huyHieuDang(Request $request)
    {
        $danhSach = CanBo::all();

        $arrId30 = [];
        $arrId40 = [];
        $arrId50 = [];
        $arrId60 = [];
        $arrId65 = [];
        $arrId70 = [];
        $arrId75 = [];
        $arrId80 = [];
        $now = date('Y-m-d');
        foreach ($danhSach as $data) {

            $danhSachct = CanBo::where('id', $data->id)->where('la_dang_vien', 1)->wherenotNull('ngay_vao_dang')->first();
            if ($danhSachct) {
                $dang = $danhSachct->ngay_vao_dang;
                $diff = abs(strtotime($now) - strtotime($dang));
                $years = floor($diff / (365 * 60 * 60 * 24));
                if ($years >= 30) {
                    array_push($arrId30, $danhSachct->id);
                }
                if ($years >= 40) {
                    array_push($arrId40, $danhSachct->id);
                }
                if ($years >= 50) {
                    array_push($arrId50, $danhSachct->id);
                }
                if ($years >= 60) {
                    array_push($arrId60, $danhSachct->id);
                }
                if ($years >= 65) {
                    array_push($arrId65, $danhSachct->id);
                }
                if ($years >= 70) {
                    array_push($arrId70, $danhSachct->id);
                }
                if ($years >= 75) {
                    array_push($arrId75, $danhSachct->id);
                }
                if ($years >= 80) {
                    array_push($arrId80, $danhSachct->id);
                }
            }
            $id30 = null;
            $id40 = null;
            $id50 = null;
            $id60 = null;
            $id65 = null;
            $id70 = null;
            $id75 = null;
            $id80 = null;
            if (count($arrId30) > 0) {
                $id30 = \GuzzleHttp\json_encode($arrId30);
            }
            if (count($arrId40) > 0) {
                $id40 = \GuzzleHttp\json_encode($arrId40);
            }
            if (count($arrId50) > 0) {
                $id50 = \GuzzleHttp\json_encode($arrId50);
            }
            if (count($arrId60) > 0) {
                $id60 = \GuzzleHttp\json_encode($arrId60);
            }
            if (count($arrId65) > 0) {
                $id65 = \GuzzleHttp\json_encode($arrId65);
            }
            if (count($arrId70) > 0) {
                $id70 = \GuzzleHttp\json_encode($arrId70);
            }
            if (count($arrId80) > 0) {
                $id80 = \GuzzleHttp\json_encode($arrId80);
            }
            if (count($arrId75) > 0) {
                $id75 = \GuzzleHttp\json_encode($arrId75);
            }


        }
        return view('tracuu::huy_hieu', compact('id30', 'id40', 'id50', 'id60', 'id65', 'id70', 'id75', 'id80'));
    }

    public function nangCao(Request $request)
    {
//        dd($request->all());
        $ten = $request->ten_cb;
        $page = $request->get('page');
        $donViId = $request->get('don_vi_id') ?? null;
        $cmt = $request->cmt;
        $the_dang = $request->the_dang;
        $ngayVaoDang = formatYMD($request->start_date);
        $chuc_vu_dang = $request->chuc_vu_dang;
        $trinh_do_chuyen_mon = $request->trinh_do_chuyen_mon;
        $gioi_tinh = $request->gioi_tinh;
        $he_so_luong = $request->he_so_luong;
        $phu_cap = $request->phu_cap;
        $bac_luong = $request->bac_luong;
        $hinh_thuc = $request->hinh_thuc;
        $loai_dao_tao = $request->loai_dao_tao;
        $phan_loai = $request->phan_loai;
        $kiem_nhiem = $request->kiem_nhiem;
        $phongBanId = $request->phong_ban_id;
        $ton_giao = $request->ton_giao;
        $tinh_trang = $request->tinh_trang;
        $chuc_vu_chinh = $request->chuc_vu_chinh;


        $chucVuDang = ChucVu::orderBy('ten_chuc_vu', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $trangThai = TrangThai::orderBy('ten', 'asc')->get();
        $tonGiao = TonGiao::orderBy('ten', 'asc')->get();
        $kiemNhiemBietPhai = KiemNhiemBietPhai::orderBy('ten', 'asc')->get();
        $hopDongBienChe = BinhBauPhanLoaiCanBo::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();
        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();
        $search = $request->search ?? null;
        $quaTrinh = null;
        $user = null;

        $danhSachPhongBan = null;
        if ($search && !empty($donViId)) {
            $danhSachPhongBan = ToChuc::where('parent_id', $donViId)->select('id', 'ten_don_vi')->get();
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

        if ($hinh_thuc || $loai_dao_tao) {
            if ($hinh_thuc && $loai_dao_tao) {
                $quaTrinh = QuaTrinhDaoTao::where(['hinh_thuc' => $hinh_thuc, 'loai_dao_tao' => $loai_dao_tao])->get();
                $user = $quaTrinh->pluck('users');
            } elseif ($loai_dao_tao) {
                $quaTrinh = QuaTrinhDaoTao::where('loai_dao_tao', $loai_dao_tao)->get();
                $user = $quaTrinh->pluck('users');
            } elseif ($hinh_thuc) {
                $quaTrinh = QuaTrinhDaoTao::where('hinh_thuc', $hinh_thuc)->get();
                $user = $quaTrinh->pluck('users');
            }
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
            ->where(function ($query) use ($ton_giao) {
                if (!empty($ton_giao)) {
                    return $query->where(DB::raw('lower(ton_giao)'), 'LIKE', "%" . mb_strtolower($ton_giao) . "%");
                }
            })
            ->where(function ($query) use ($tinh_trang) {
                if (!empty($tinh_trang)) {
                    return $query->where(DB::raw('lower(trang_thai_cb)'), 'LIKE', "%" . mb_strtolower($tinh_trang) . "%");
                }
            })
            ->where(function ($query) use ($chuc_vu_chinh) {
                if (!empty($chuc_vu_chinh)) {
                    return $query->where(DB::raw('lower(chuc_vu_hien_tai)'), 'LIKE', "%" . mb_strtolower($chuc_vu_chinh) . "%");
                }
            })
            ->where(function ($query) use ($trinh_do_chuyen_mon) {
                if (!empty($trinh_do_chuyen_mon)) {
                    return $query->where(DB::raw('lower(trinh_do_1)'), 'LIKE', "%" . mb_strtolower($trinh_do_chuyen_mon) . "%");
                }
            })
            ->where(function ($query) use ($ngayVaoDang) {
                if (!empty($ngayVaoDang)) {
                    return $query->where(DB::raw('lower(ngay_vao_dang_chinh_thuc)'), 'LIKE', "%" . mb_strtolower($ngayVaoDang) . "%");
                }
            })
            ->where(function ($query) use ($chuc_vu_dang) {
                if (!empty($chuc_vu_dang)) {
                    return $query->where(DB::raw('lower(chuc_vu_cao_nhat)'), 'LIKE', "%" . mb_strtolower($chuc_vu_dang) . "%");
                }
            })
            ->where(function ($query) use ($the_dang) {
                if (!empty($the_dang)) {
                    return $query->where(DB::raw('lower(so_the_dang)'), 'LIKE', "%" . mb_strtolower($the_dang) . "%");
                }
            })
            ->where(function ($query) use ($gioi_tinh) {
                if (!empty($gioi_tinh)) {
                    return $query->where(DB::raw('lower(gioi_tinh)'), 'LIKE', "%" . mb_strtolower($gioi_tinh) . "%");
                }
            })
            ->where(function ($query) use ($he_so_luong) {
                if (!empty($he_so_luong)) {
                    return $query->where(DB::raw('lower(he_so_luong)'), 'LIKE', "%" . mb_strtolower($he_so_luong) . "%");
                }
            })
            ->where(function ($query) use ($bac_luong) {
                if (!empty($bac_luong)) {
                    return $query->where(DB::raw('lower(bac_luong)'), 'LIKE', "%" . mb_strtolower($bac_luong) . "%");
                }
            })
            ->where(function ($query) use ($phu_cap) {
                if (!empty($phu_cap)) {
                    return $query->where(DB::raw('lower(phu_cap_cv)'), 'LIKE', "%" . mb_strtolower($phu_cap) . "%");
                }
            })
            ->where(function ($query) use ($phan_loai) {
                if (!empty($phan_loai)) {
                    return $query->where(DB::raw('lower(phan_loai_cb)'), 'LIKE', "%" . mb_strtolower($phan_loai) . "%");
                }
            })
            ->where(function ($query) use ($kiem_nhiem) {
                if (!empty($kiem_nhiem)) {
                    return $query->where(DB::raw('lower(kiem_nhiem_biet_phai)'), 'LIKE', "%" . mb_strtolower($kiem_nhiem) . "%");
                }
            })
            ->where(function ($query) use ($user) {
                if (!empty($user)) {
                    return $query->whereIN('id', $user);
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
        $title = 'Tìm kiếm > Tìm kiếm nâng cao';
        return view('tracuu::tim-kiem-nang-cao', compact('danhSach', 'chucVuDang', 'congViecChuyenMon', 'chucVuHienTai', 'phuCap',
            'hopDongBienChe', 'kiemNhiemBietPhai', 'danhSachPhongBan', 'donVi', 'title',
            'trangThai', 'tonGiao', 'chuyenNganhDT', 'hinhThucDaoTao', 'bacLuong', 'cap2'));
    }

    public function quanLy(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;
        $type = $request->get('type') ?? null;
        if (empty($type)) {
            return redirect()->back();
        }
        if ($type == 1) {
            $title = 'Quản lý hồ sơ cán bộ  > Cán bộ trung ương';
        }
        if ($type == 2) {
            $title = 'Quản lý hồ sơ cán bộ  > cán bộ BTV thành ủy';
        }
        if ($type == 3) {
            $title = 'Quản lý hồ sơ cán bộ  > cán bộ BTV thành ủy';
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
        $tenDonVi = auth::user()->donVi->ten_don_vi;
        if (!empty($donViId)) {
            $tenDonVi = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi')->first()->ten_don_vi;
        }

        $danhSach = CanBo::where(function ($query) use ($hoTen) {
            if (!empty($hoTen)) {
                return $query->where('ho_ten', 'LIKE', "%$hoTen%");
            }
        })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($type) {
                if ($type == 1) {
                    return $query->where('trung_uong', 1);
                }
                if ($type == 2) {
                    return $query->where('cb_btv_thanh_uy', 1);
                }
                if ($type == 3) {
                    return $query->where('cb_btv_quan_uy', 1);
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
            ->paginate(20);


        $danhSachToChuc = ToChuc::all();

        return view('tracuu::quanLy',
            compact('danhSach', 'danhSachToChuc', 'tenDonVi', 'donVi', 'cap2', 'title'));
    }

    public function khenThuong(Request $request)
    {
        $hoTen = $request->get('ho_ten') ?? null;
        $queQuan = $request->get('que_quan') ?? null;
        $gioiTinh = $request->get('gioi_tinh') ?? null;
        $donViId = $request->get('don_vi_id') ?? null;
        $type = $request->get('type') ?? null;
        $title = 'Khen thưởng';

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
        $tenDonVi = auth::user()->donVi->ten_don_vi;
        if (!empty($donViId)) {
            $tenDonVi = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi')->first()->ten_don_vi;
        }

        $danhSach = CanBo::where(function ($query) use ($hoTen) {
            if (!empty($hoTen)) {
                return $query->where('ho_ten', 'LIKE', "%$hoTen%");
            }
        })
            ->where(function ($query) use ($queQuan) {
                if (!empty($queQuan)) {
                    return $query->where('que_quan', 'LIKE', "%$queQuan%");
                }
            })
            ->where(function ($query) use ($type) {
                if ($type == 1) {
                    return $query->where('trung_uong', 1);
                }
                if ($type == 2) {
                    return $query->where('cb_btv_thanh_uy', 1);
                }
                if ($type == 3) {
                    return $query->where('cb_btv_quan_uy', 1);
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
            ->paginate(20);


        $danhSachToChuc = ToChuc::all();

        return view('tracuu::khenThuong',
            compact('danhSach', 'danhSachToChuc', 'tenDonVi', 'donVi', 'cap2', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('tracuu::create');
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
        return view('tracuu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('tracuu::edit');
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

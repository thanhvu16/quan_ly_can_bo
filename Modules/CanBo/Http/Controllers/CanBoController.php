<?php

namespace Modules\CanBo\Http\Controllers;

use App\Common\AllPermission;
use App\Models\HoSoTraLai;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\BacHeSoLuong;
use Modules\Admin\Entities\BinhBauPhanLoaiCanBo;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ChinhTri;
use Modules\Admin\Entities\ChucVu;
use Modules\Admin\Entities\ChucVuHienTai;
use Modules\Admin\Entities\ChuyenNganhDaoTao;
use Modules\Admin\Entities\CongViecChuyenMon;
use Modules\Admin\Entities\DanhHieu;
use Modules\Admin\Entities\DanToc;
use Modules\Admin\Entities\DoiTuongQuanLy;
use Modules\Admin\Entities\HinhThucDaoTao;
use Modules\Admin\Entities\HinhThucThiTuyen;
use Modules\Admin\Entities\KhenThuongKyLuat;
use Modules\Admin\Entities\KiemNhiemBietPhai;
use Modules\Admin\Entities\KyLuat;
use Modules\Admin\Entities\LoaiPhuCap;
use Modules\Admin\Entities\NgachChucDanh;
use Modules\Admin\Entities\NgoaiNgu;
use Modules\Admin\Entities\NhiemKy;
use Modules\Admin\Entities\NhomDonVi;
use Modules\Admin\Entities\PhoThong;
use Modules\Admin\Entities\QuaChucVu;
use Modules\Admin\Entities\QuanHam;
use Modules\Admin\Entities\QuanHeGiaDinh;
use Modules\Admin\Entities\QuanLyHanhChinh;
use Modules\Admin\Entities\QuaTrinhBaoHiem;
use Modules\Admin\Entities\QuaTrinhBienCheHopDong;
use Modules\Admin\Entities\QuaTrinhChucVuDang;
use Modules\Admin\Entities\QuaTrinhChuyenDonVi;
use Modules\Admin\Entities\QuaTrinhCongTac;
use Modules\Admin\Entities\QuaTrinhDaoTao;
use Modules\Admin\Entities\QuaTrinhDoan;
use Modules\Admin\Entities\QuaTrinhGiaDinh;
use Modules\Admin\Entities\QuaTrinhKhenThuong;
use Modules\Admin\Entities\QuaTrinhKiemNhiemBietPhai;
use Modules\Admin\Entities\QuaTrinhLuong;
use Modules\Admin\Entities\QuaTrinhNghienCuu;
use Modules\Admin\Entities\QuaTrinhNuocNgoai;
use Modules\Admin\Entities\QuaTrinhPhuCapKhac;
use Modules\Admin\Entities\QuaTrinhQuocHoi;
use Modules\Admin\Entities\QuaTrinhQuyHoachCanBo;
use Modules\Admin\Entities\QuaTrinhVeHuu;
use Modules\Admin\Entities\QuaTrinhVuotKhung;
use Modules\Admin\Entities\ThanhPhanXuatThan;
use Modules\Admin\Entities\ThanhPho;
use Modules\Admin\Entities\TiengAnh;
use Modules\Admin\Entities\TinHoc;
use Modules\Admin\Entities\ToChuc;
use Modules\Admin\Entities\TonGiao;
use Modules\Admin\Entities\TrangThai;
use Modules\Admin\Entities\TruongHoc;
use Modules\Admin\Http\Controllers\LyLuanChinhTri;
use File, Auth;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Cell;
use PhpOffice\PhpWord\TemplateProcessor;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index()
    {
        return view('canbo::them-moi-can-bo');
    }

    public function canBo($id)
    {
        $donVi = ToChuc::where('id', $id)->first();
        $danhSach = CanBo::where('don_vi', $id)->paginate(20);

        return view('canbo::danh-sach-can-bo', compact('danhSach', 'donVi'));

    }

    public function getlistcb()
    {
        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
        $arayEcabinet = array();

        foreach ($donVi as $key => $data) {
            $arayEcabinet[$key]['id'] = $data->id;
//            $arayEcabinet[$key]['STT'] = $key + 1;
            $arayEcabinet[$key]['pid'] = (auth::user()->donVi->parent_id != 0 && $data->parent_id != auth::user()->don_vi_id) ? 0 : $data->parent_id;
            $arayEcabinet[$key]['Email'] = $data->email;
//            $arayEcabinet[$key]['status'] = 1;
            $arayEcabinet[$key]['name'] = "<b style='color: black'>$data->ten_don_vi</b>";
            $arayEcabinet[$key]['permissionValue'] = '<a href="danh-sach-don-vi/' . $data->id . '">Xem chi tiết</a>';
            $arayEcabinet[$key]['tacvu'] = '<a href="sua-don-vi-to-chuc/' . $data->id . '"' . '><i class="' . 'fa fa-edit' . '"></i></a> &emsp; <a href="xoa-don-vi-to-chuc/' . $data->id . '"' . '><i style="color: red"class="' . 'fa fa-trash' . '"></i></a> ';
        }


        return $arayEcabinet;
    }

    public function getlistcb2()
    {
        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
        $arayEcabinet = array();

        foreach ($donVi as $key => $data) {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['pid'] = (auth::user()->donVi->parent_id != 0 && $data->parent_id != auth::user()->don_vi_id) ? 0 : $data->parent_id;
            $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="cap-nhap-qua-trinh?don_vi=' . $data->id . '">' . $data->ten_don_vi . '</a>';
        }


        return $arayEcabinet;
    }

    public function getlistcb3()
    {
        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
        $arayEcabinet = array();

        foreach ($donVi as $key => $data) {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['pid'] = (auth::user()->donVi->parent_id != 0 && $data->parent_id != auth::user()->don_vi_id) ? 0 : $data->parent_id;
            $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="thong-tin-ho-so?don_vi=' . $data->id . '">' . $data->ten_don_vi . '</a>';
        }


        return $arayEcabinet;
    }

    public function getlistcb4(Request $request)
    {

        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
        $arayEcabinet = array();
        foreach ($donVi as $key => $data) {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['pid'] = (auth::user()->donVi->parent_id != 0 && $data->parent_id != auth::user()->don_vi_id) ? 0 : $data->parent_id;
            if ($request->dao_tao == 1) {
                $url = 'dao_tao=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="dao-tao?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->ban_than == 1) {
                $url = 'ban_than=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="ban-than-cong-tac?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->chuc_vu == 1) {
                $url = 'chuc_vu=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="chuc-vu-qt?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->chuc_vu_dang == 1) {
                $url = 'chuc_vu_dang=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="qua-trinh?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->chuc_vu_doan == 1) {
                $url = 'chuc_vu_doan=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="doan-the-cn?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->tham_nien == 1) {
                $url = 'tham_nien=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="tham_nien?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->quoc_hoi == 1) {
                $url = 'quoc_hoi=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="quoc-hoi?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->nuoc_ngoai == 1) {
                $url = 'nuoc_ngoai=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="nuoc-ngoai?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->gia_dinh == 1) {
                $url = 'gia_dinh=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="gia-dinh?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->nghien_cuu == 1) {
                $url = 'nghien_cuu=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="nghien-cuu?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            }  elseif ($request->luong == 1) {
                $url = 'luong=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="qua-trinh-luong?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } elseif ($request->phu_cap_khac == 1) {
                $url = 'phu_cap_khac=1';
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="phu-cap-khac-cn?don_vi=' . $data->id . '&' . $url . '">' . $data->ten_don_vi . '</a>';

            } else {
                $arayEcabinet[$key]['permissionValue'] = '<a style="font-weight: bold" href="dao-tao?don_vi=' . $data->id . '">' . $data->ten_don_vi . '</a>';
            }
        }


        return $arayEcabinet;
    }

    public function quaTrinh(Request $request)
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
            $donViCha = ToChuc::where('id', $donViId)->select('id', 'ten_don_vi', 'parent_id')->first();
            if ($donViCha->parent_id == 0) {
                $donViId = null;
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

        return view('canbo::don-vi', compact('ds_donvi', 'nhom_don_vi', 'donViCapXa', 'danhSach', 'danhSachPhongBan'));
    }


    public function uploadAnh(Request $request, $id)
    {
        $multiFiles = !empty($request['ten_file']) ? $request['ten_file'] : null;
        $uploadPath = UPLOAD_ANH;
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0777, true, true);
        }

        $fileName = date('Y_m_d') . '_' . Time() . '_' . $multiFiles->getClientOriginalName();
        $urlFile = UPLOAD_ANH . '/' . $fileName;
        $canBo = CanBo:: where('id', $id)->first();

        $multiFiles->move($uploadPath, $fileName);
        $canBo->anh_dai_dien = $urlFile;
        $canBo->save();
        return redirect()->route('canBoDetail', $canBo->id)->with('Thêm mới thành công !');


    }


    public function canBoDetail($id)
    {
        canPermission(AllPermission::xemCanBo());

        $canBo = CanBo::with('hinhThucTuyen')->where('id', $id)->first();
        $canBoDV = CanBo::where('don_vi_id', $canBo->don_vi_id)->orderBy('ho_ten','desc')->get();


        $donViChuQuan = ToChuc::where('id', $canBo->donVi->parent_id)->select('id', 'ten_don_vi')->first();

        $danToc = DanToc::orderBy('ten', 'asc')->get();
        $tonGiao = TonGiao::orderBy('ten', 'asc')->get();
        $thanhPho = ThanhPho::orderBy('ten', 'asc')->get();
        $chucVuHienTai = ChucVuHienTai::orderBy('ten', 'asc')->get();
        $donVi = ToChuc::where('parent_id', auth::user()->don_vi_id)->orderBy('ten_don_vi', 'asc')->get();
        $ngach = NgachChucDanh::orderBy('ten', 'asc')->get();
        $bacLuong = BacHeSoLuong::orderBy('ten', 'asc')->get();
        $phuCap = LoaiPhuCap::orderBy('ten', 'asc')->get();

        $chuyenNganhDT = ChuyenNganhDaoTao::orderBy('ten', 'asc')->get();
        $congViecChuyenMon = CongViecChuyenMon::orderBy('ten', 'asc')->get();
        $phoThong = PhoThong::orderBy('ten', 'asc')->get();
        $lyluanChinhTri = ChinhTri::orderBy('ten', 'asc')->get();
        $quanLyHanhChinh = QuanLyHanhChinh::orderBy('ten', 'asc')->get();
        $tinHoc = TinHoc::orderBy('ten', 'asc')->get();
        $tiengAnh = TiengAnh::orderBy('ten', 'asc')->get();
        $ngoaiNgu = NgoaiNgu::orderBy('ten', 'asc')->get();
        $chucVuDang = ChucVu::orderBy('ten_chuc_vu', 'asc')->get();
        $quanHam = QuanHam::orderBy('ten', 'asc')->get();
        $danhHieu = DanhHieu::orderBy('ten', 'asc')->get();
        $doiTuongQuanLy = DoiTuongQuanLy::orderBy('ten', 'asc')->get();
        $hinhThucDaoTao = HinhThucDaoTao::orderBy('ten', 'asc')->get();


        $hinhThucTuyen = HinhThucThiTuyen::orderBy('ten', 'asc')->get();
        $trangThai = TrangThai::orderBy('ten', 'asc')->get();

        $khenThuong = KhenThuongKyLuat::orderBy('ten', 'asc')->get();
        $kyLuat = KyLuat::orderBy('ten', 'asc')->get();
        $xuatThan = ThanhPhanXuatThan::orderBy('ten', 'asc')->get();
        $loaiCanBo = BinhBauPhanLoaiCanBo::orderBy('ten', 'asc')->get();

        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::where('users', $id)->get();
        $quaTrinhDaoTao = QuaTrinhDaoTao::where('users', $id)->get();
        $quaTrinhCongTac = QuaTrinhCongTac::where('users', $id)->get();
        $kiemNhiem = KiemNhiemBietPhai::orderBy('ten', 'asc')->get();

        $quaTrinhLuong = QuaTrinhLuong::where('users', $id)->get();
        $quaTrinhQuocHoi = QuaTrinhQuocHoi::where('users', $id)->get();
        $quaTrinhChucVuDang = QuaTrinhChucVuDang::where('users', $id)->get();
        $quaTrinhChucVu = QuaChucVu::where('users', $id)->get();
        $quaTrinhQuyHoachCanBo = QuaTrinhDoan::where('users', $id)->get();
        $quaTrinhKiemNhiemBietphai = QuaTrinhKiemNhiemBietPhai::where('users', $id)->get();
        $quaTrinhVuotKhung = QuaTrinhVuotKhung::where('users', $id)->get();
        $quaTrinhPhuCapKhac = QuaTrinhPhuCapKhac::where('users', $id)->get();
        $quaTrinhBienCheHopDong = QuaTrinhBienCheHopDong::where('users', $id)->get();
        $quaTrinhKhenThuong = QuaTrinhKhenThuong::where('users', $id)->where('type', 2)->get();
        $quaTrinhKyLuat = QuaTrinhKhenThuong::where('users', $id)->where('type', 1)->get();
        $quaTrinhVeHuu = QuaTrinhVeHuu::where('users', $id)->get();
        $quaTrinhBaoHiem = QuaTrinhBaoHiem::where('users', $id)->get();
        $quaTrinhGiaDinh = QuaTrinhGiaDinh::where('users', $id)->get();
        $quaTrinhNghienCuu = QuaTrinhNghienCuu::where('users', $id)->get();
        $quaTrinhChuyenDonVi = QuaTrinhChuyenDonVi::where('users', $id)->get();

        $truongHoc = TruongHoc::orderBy('ten', 'asc')->get();
        $nhiemKy = NhiemKy::orderBy('ten', 'asc')->get();

        //tao phieu can bo
        $this->taoPhieuCanBo($canBo);

        return view('canbo::index', compact('canBo', 'danToc', 'tonGiao', 'thanhPho', 'chucVuHienTai', 'quaTrinhVuotKhung', 'quaTrinhPhuCapKhac'
            , 'donVi', 'ngach', 'bacLuong', 'phuCap', 'chuyenNganhDT', 'congViecChuyenMon', 'phoThong', 'lyluanChinhTri', 'quanLyHanhChinh', 'quaTrinhGiaDinh'
            , 'tiengAnh', 'ngoaiNgu', 'chucVuDang', 'quanHam', 'danhHieu', 'doiTuongQuanLy', 'hinhThucDaoTao', 'hinhThucTuyen', 'trangThai', 'quaTrinhNghienCuu'
            , 'kyLuat', 'khenThuong', 'xuatThan', 'quaTrinhCongTac', 'quaTrinhDaoTao', 'quaTrinhNuocNgoai', 'truongHoc', 'quaTrinhQuocHoi'
            , 'quaTrinhLuong', 'quaTrinhChucVu', 'quaTrinhChucVuDang', 'quaTrinhQuyHoachCanBo', 'nhiemKy', 'quaTrinhBienCheHopDong', 'quaTrinhKiemNhiemBietphai'
            , 'kiemNhiem', 'loaiCanBo', 'quaTrinhKhenThuong', 'quaTrinhKyLuat', 'quaTrinhBaoHiem', 'quaTrinhVeHuu', 'quaTrinhChuyenDonVi'
            , 'tinHoc', 'donViChuQuan','canBoDV'));

    }

    public function quaTrinhNghienCuu(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhNghienCuu();
        $daoTao->thoi_gian = !empty($request->thoi_gian) ? formatYMD($request->thoi_gian) : null;
        $daoTao->users = $canBo->id;
        $daoTao->ten_de_tai = $request->ten_de_tai;
        $daoTao->cap_de_tai = $request->cap_de_tai;
        $daoTao->chu_nhiem = $request->chu_nhiem;
        $daoTao->tu_cach_tham_gia = $request->tu_cach_tham_gia;
        $daoTao->ket_qua = $request->ket_qua;
        $daoTao->save();

        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatNghienCuu', $canBo->id . '?nghien_cuu=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity8')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhGiaDinh(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhGiaDinh();
        $daoTao->users = $canBo->id;
        $daoTao->quan_he = $request->quan_he;
        $daoTao->ho_ten = $request->ho_ten;
        $daoTao->nam_sinh = $request->nam_sinh;
        $daoTao->nghe_nghiep = $request->nghe_nghiep;
        $daoTao->noi_lam_viec = $request->noi_lam_viec;
        $daoTao->noi_o = $request->noi_o;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatGiaDinh', $canBo->id . '?gia_dinh=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity8')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhPhuCapVK(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhVuotKhung();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->phan_tram = $request->phan_tram;
        $daoTao->thanh_tien = $request->thanh_tien;
        $daoTao->save();

        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatThamNien', $canBo->id . '?tham_nien=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity6')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhPhuCapKhac(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhPhuCapKhac();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->loai_phu_cap = $request->loai_phu_cap;
        $daoTao->muc_huong = $request->muc_huong;
        $daoTao->thanh_tien = $request->thanh_tien;
        $daoTao->cach_tinh = $request->cach_tinh;
        $daoTao->save();

        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatPhuCapCn', $canBo->id . '?phu_cap_khac=1')->with('success', 'cập nhật thành công !');
        }


        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity6')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhKiemNhiem(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhKiemNhiemBietPhai();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->biet_phai = $request->biet_phai;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity6')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhQuocHoi(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhQuocHoi();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->loai_hinh_dai_bieu = $request->loai_hinh_dai_bieu;
        $daoTao->nhiem_ky = $request->nhiem_ky;
        $daoTao->thong_tin = $request->thong_tin;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatQuocHoi', $canBo->id . '?quoc_hoi=1')->with('success', 'cập nhật thành công !');
        }
        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity5')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhDiChuyen(Request $request, $id)
    {
//        dd($request->all());
        $canBo = CanBo::where('id', $id)->first();
        $canBo->trang_thai_cb = $request->trang_thai;
        $canBo->save();

        $daoTao = new QuaTrinhChuyenDonVi();
        $daoTao->ngay_chuyen = !empty($request->ngay_chuyen) ? formatYMD($request->ngay_chuyen) : null;
        $daoTao->ngay_quyet_dinh = !empty($request->ngay_quyet_dinh) ? formatYMD($request->ngay_quyet_dinh) : null;
        $daoTao->users = $canBo->id;
        $daoTao->so_quyet_dinh = $request->so_quyet_dinh;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->don_vi_chuyen_den = $request->don_vi_chuyen_den;
        $daoTao->nguoi_ky = $request->nguoi_ky;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity6')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhBaoHiem(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhBaoHiem();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->thanh_pho = $request->thanh_pho;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity8')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhVeHuu(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhVeHuu();
        $daoTao->ngay_ve_huu = !empty($request->ngay_ve_huu) ? formatYMD($request->ngay_ve_huu) : null;
        $daoTao->users = $canBo->id;
        $daoTao->tuoi_dang = $request->tuoi_dang;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity8')->with('success', 'cập nhật thành công !');

    }


    public function quaTrinhKhenKy(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhKhenThuong();
        $daoTao->ngay_quyet_dinh = !empty($request->ngay_quyet_dinh) ? formatYMD($request->ngay_quyet_dinh) : null;
        $daoTao->users = $canBo->id;
        $daoTao->so_quyet_dinh = $request->so_quyet_dinh;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->noi_dung = $request->noi_dung;
        $daoTao->type = $request->type;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity7')->with('success', 'cập nhật thành công !');
    }

    public function quaTrinhBienChe(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhBienCheHopDong();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->bien_che = $request->bien_che;
        $daoTao->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity6')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhluong(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhLuong();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->ngach_cong_chuc = $request->ngach_cong_chuc;
        $daoTao->bac = $request->bac_luong;
        $daoTao->he_so = $request->he_so_luong;
        $daoTao->phu_cap = $request->phu_cap;
        $daoTao->phan_tram = $request->phan_tram_huong;
        $daoTao->tong_luong = $request->tong_luong;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatLuong', $canBo->id . '?luong=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity5')->with('success', 'cập nhật thành công !');
    }

    public function quaTrinhChucVu(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaChucVu();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->chuc_vu = $request->cong_viec;
        $daoTao->he_so_phu_cap = $request->he_so_phu_cap;
        $daoTao->hinh_thuc_bo_nhiem = $request->hinh_thuc_bo_nhiem;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatChucVuQt', $canBo->id . '?chuc_vu=1')->with('success', 'cập nhật thành công !');
        }
        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity5')->with('success', 'cập nhật thành công !');
    }

    public function quaTrinhChucVuDang(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhChucVuDang();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->chuc_vu = $request->chuc_vu;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatQuaTrinhDaoTao', $canBo->id . '?dang=1')->with('success', 'cập nhật thành công !');
        }
        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity5')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhCanBo(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhDoan();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->chuc_vu = $request->chuc_vu;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->save();

        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatDoanThecn', $canBo->id . '?doan_the=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity5')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhDaoTao(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhDaoTao();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->loai_dao_tao = $request->loai_dao_tao;
        $daoTao->trinh_do = $request->trinh_do;
        $daoTao->hinh_thuc = $request->hinh_thuc;
        $daoTao->ten_chuyen_nganh = $request->ten_chuyen_nganh;
        $daoTao->truong = $request->truong;
        $daoTao->nuoc_dao_tao = $request->nuoc_dao_tao;
        $daoTao->chung_chi = $request->chung_chi;
        $daoTao->kinh_phi = $request->kinh_phi;
        $daoTao->save();

        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatDaoTao', $canBo->id . '?dao_tao=1')->with('success', 'cập nhật thành công !');
        }
        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity4')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhCongTac(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhCongTac();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->chuc_danh = $request->chuc_danh;
        $daoTao->co_quan = $request->co_quan;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatbanThan', $canBo->id . '?ban_than=1')->with('success', 'cập nhật thành công !');
        }
        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity4')->with('success', 'cập nhật thành công !');

    }

    public function quaTrinhNuocNgoai(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $daoTao = new QuaTrinhNuocNgoai();
        $daoTao->tu_ngay = !empty($request->tu_ngay) ? formatYMD($request->tu_ngay) : null;
        $daoTao->den_ngay = !empty($request->den_ngay) ? formatYMD($request->den_ngay) : null;
        $daoTao->users = $canBo->id;
        $daoTao->cong_viec = $request->cong_viec;
        $daoTao->ten_nuoc = $request->ten_nuoc;
        $daoTao->kinh_phi = $request->kinh_phi;
        $daoTao->ly_do = $request->ly_do;
        $daoTao->save();
        if ($request->cap_nhat_qua_trinh == 1) {
            return redirect()->route('capNhatnuocNgoai', $canBo->id . '?nuoc_ngoai=1')->with('success', 'cập nhật thành công !');
        }

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity4')->with('success', 'cập nhật thành công !');

    }

    public function canBoDanhGiatt(Request $request, $id)
    {
        $multiFiles = !empty($request['anh_dai_dien']) ? $request['anh_dai_dien'] : null;
        $uploadPath = UPLOAD_ANH;
        $canBo = CanBo::where('id', $id)->first();
        $canBo->hinh_thuc_tuyen = $request->hinh_thuc_tuyen;
        $canBo->trang_thai_cb = $request->trang_thai_cb;
        $canBo->trung_uong_quan_ly = $request->trung_uong_quan_ly;
        $canBo->lam_cong_tac_quan_ly = $request->lam_cong_tac_quan_ly;
        $canBo->save();
        if($multiFiles)
        {
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0777, true, true);
            }

            $fileName = date('Y_m_d') . '_' . Time() . '_' . $multiFiles->getClientOriginalName();
            $urlFile = UPLOAD_ANH . '/' . $fileName;

            $multiFiles->move($uploadPath, $fileName);
            $canBo->anh_dai_dien = $urlFile;
            $canBo->save();
        }

        return redirect()->back()->with('success', 'cập nhật thành công !');
    }

    public function canBoDanhGiac3(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();

        $canBo->nhan_than_nuoc_ngoai = $request->nhan_than_nuoc_ngoai;
        $canBo->bi_dich_bat = $request->bi_dich_bat;
        $canBo->dac_diem_lich_su_ban_than = $request->dac_diem_lich_su_ban_than;
        $canBo->dac_diem_lich_su_ban_than_tai_san = $request->dac_diem_lich_su_ban_than_tai_san;
        $canBo->danh_gia_cua_can_bo = $request->danh_gia_cua_can_bo;

        $canBo->tu_nhan_xet_ban_than = $request->tu_nhan_xet_ban_than;
        $canBo->ngay_khai = !empty($request->ngay_khai) ? formatYMD($request->ngay_khai) : null;
        $canBo->ngay_xac_nhan = !empty($request->ngay_xac_nhan) ? formatYMD($request->ngay_xac_nhan) : null;
        $canBo->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity3')->with('success', 'cập nhật thành công !');
    }

    public function canBoDanhGia(Request $request, $id)
    {
        $canBo = CanBo::where('id', $id)->first();
        $canBo->chuyen_nganh_id = $request->chuyen_nganh_id;
        $canBo->trinh_do_pho_thong_id = $request->trinh_do_pho_thong_id;
        $canBo->trinh_do_chuyen_mon_cao_nhat_id = $request->trinh_do_chuyen_mon_cao_nhat_id;
        $canBo->ly_luan_chinh_tri = $request->ly_luan_chinh_tri;
        $canBo->quan_ly_hanh_chinh = $request->quan_ly_hanh_chinh;
        $canBo->tin_hoc = $request->tin_hoc;
        $canBo->tieng_anh = $request->tieng_anh;
        $canBo->ngon_ngu = $request->ngon_ngu;
        $canBo->la_dang_vien = $request->la_dang_vien;
        $canBo->ngay_vao_dang = !empty($request->ngay_vao_dang) ? formatYMD($request->ngay_vao_dang) : null;
        $canBo->ngay_vao_dang_chinh_thuc = !empty($request->ngay_vao_dang_chinh_thuc) ? formatYMD($request->ngay_vao_dang_chinh_thuc) : null;
        $canBo->ngay_tham_gia_to_chuc = !empty($request->ngay_tham_gia_to_chuc) ? formatYMD($request->ngay_tham_gia_to_chuc) : null;
        $canBo->noi_vao_dang = $request->noi_vao_dang;
        $canBo->chuc_vu_cao_nhat = $request->chuc_vu_cao_nhat;
        $canBo->cong_viec_chinh = $request->cong_viec_chinh;
        $canBo->da_di_bo_doi = $request->da_di_bo_doi;
        $canBo->benh_binh = $request->benh_binh;
        $canBo->so_the_dang = $request->so_the_dang;
        $canBo->hinh_thuc_tuyen = $request->hinh_thuc_tuyen;
        $canBo->trang_thai_cb = $request->trang_thai_cb;

        $canBo->nhap_ngu = !empty($request->nhap_ngu) ? formatYMD($request->nhap_ngu) : null;
        $canBo->xuat_ngu = !empty($request->xuat_ngu) ? formatYMD($request->xuat_ngu) : null;
        $canBo->ngay_vao_doan = !empty($request->ngay_vao_doan) ? formatYMD($request->ngay_vao_doan) : null;
        $canBo->ngay_giai_ngu = !empty($request->ngay_giai_ngu) ? formatYMD($request->ngay_giai_ngu) : null;

        $canBo->chuc_vu_dang_hien_nay = $request->chuc_vu_dang_hien_nay;
        $canBo->nam_phong_tang_nn_pt = $request->nam_phong_tang_nn_pt;
        $canBo->noi_vao_doan = $request->noi_vao_doan;
        $canBo->chuc_vu_doan = $request->chuc_vu_doan;
        $canBo->chuc_danh_kh = $request->chuc_danh_kh;
        $canBo->nam_phong_cd_kh = $request->nam_phong_cd_kh;
        $canBo->tieng_dan_toc = $request->tieng_dan_toc;
        $canBo->trinh_do_quan_ly_kinh_te = $request->trinh_do_quan_ly_kinh_te;
        $canBo->quan_ham_cao_nhat = $request->quan_ham_cao_nhat;
        $canBo->danh_hieu_phong_tang_cao_nhat = $request->danh_hieu_phong_tang_cao_nhat;
        $canBo->suc_khoe = $request->suc_khoe;
        $canBo->so_truong_cong_tac = $request->so_truong_cong_tac;
        $canBo->chieu_cao = $request->chieu_cao;
        $canBo->can_nang = $request->can_nang;
        $canBo->nhom_mau = $request->nhom_mau;
        $canBo->thuong_binh = $request->thuong_binh;
        $canBo->bang1 = $request->bang1;
        $canBo->bang2 = $request->bang2;
        $canBo->trinh_do_1 = $request->trinh_do_1;
        $canBo->trinh_do_2 = $request->trinh_do_2;
        $canBo->doi_tuong_chinh_sach = $request->doi_tuong_chinh_sach;
        $canBo->nam_tot_nghiep = $request->nam_tot_nghiep;
        $canBo->ket_qua_xep_loai = $request->ket_qua_xep_loai;

        $canBo->khen_thuong_cao_nhat = $request->khen_thuong_cao_nhat;
        $canBo->xuat_than = $request->xuat_than;
        $canBo->hoc_ham = $request->hoc_ham;
        $canBo->ky_luat_cao_nhat = $request->ky_luat_cao_nhat;
        $canBo->phan_loai_cb = $request->phan_loai_cb;
        $canBo->save();

        return redirect()->route('canBoDetail', $canBo->id . '?activity=activity2')->with('success', 'cập nhật thành công !');
    }

    public function postSoLuoc1(Request $request, $id)
    {
//        dd($request->all());
        $canBo = CanBo::where('id', $id)->first();
        $canBo->ho_ten = $request->ten;
        $canBo->ten_khac = $request->ten_khac;
        $canBo->gioi_tinh = $request->gioi_tinh;
        $canBo->ngay_sinh = !empty($request->ngay_sinh) ? formatYMD($request->ngay_sinh) : null;
        $canBo->ngay_cap_cmt = !empty($request->ngay_cap_cmt) ? formatYMD($request->ngay_cap_cmt) : null;
        $canBo->tuyen_dung_chinh_thuc = !empty($request->tuyen_dung_chinh_thuc) ? formatYMD($request->tuyen_dung_chinh_thuc) : null;
        $canBo->tuyen_dung_dau_tien = !empty($request->tuyen_dung_dau_tien) ? formatYMD($request->tuyen_dung_dau_tien) : null;
        $canBo->cmnd = $request->cmnd;
        $canBo->email = $request->email;
        $canBo->so_dien_thoai = $request->so_dien_thoai;
        $canBo->noi_cap = $request->noi_cap;
        $canBo->so_so_bao_hiem = $request->so_so_bao_hiem;
        $canBo->linh_vuc_theo_doi = $request->linh_vuc_theo_doi;
        $canBo->bi_danh = $request->bi_danh;
        $canBo->nghe_nghiep_truoc_khi_tuyen = $request->nghe_nghiep_truoc_khi_tuyen;
        $canBo->dan_toc = $request->dan_toc;
        $canBo->ton_giao = $request->ton_giao;

        $canBo->ngay_vao_don_vi = !empty($request->ngay_vao_don_vi) ? formatYMD($request->ngay_vao_don_vi) : null;
        $canBo->ngay_bo_nhiem_ngach = !empty($request->ngay_bo_nhiem_ngach) ? formatYMD($request->ngay_bo_nhiem_ngach) : null;
        $canBo->ngay_huong_vuot_khung = !empty($request->ngay_huong_vuot_khung) ? formatYMD($request->ngay_huong_vuot_khung) : null;
        $canBo->ngay_cap_bao_hiem = !empty($request->ngay_cap_bao_hiem) ? formatYMD($request->ngay_cap_bao_hiem) : null;
        $canBo->moc_xet_tang_luong = !empty($request->moc_xet_tang_luong) ? formatYMD($request->moc_xet_tang_luong) : null;
        $canBo->ngay_bo_nhiem_chuc_vu_hien_tai = !empty($request->ngay_bo_nhiem_chuc_vu_hien_tai) ? formatYMD($request->ngay_bo_nhiem_chuc_vu_hien_tai) : null;
        $canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem = !empty($request->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) ? formatYMD($request->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) : null;

        $canBo->he_so_phu_cap_chuc_vu_hien_tai = $request->he_so_phu_cap_chuc_vu_hien_tai;
        $canBo->chuc_vu_kiem_nhiem = $request->chuc_vu_kiem_nhiem;
        $canBo->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem = $request->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem;
        $canBo->vi_tri_cong_chuc = $request->vi_tri_cong_chuc;
        $canBo->vi_tri_vien_chuc = $request->vi_tri_vien_chuc;
        $canBo->vi_tri_nhan_vien = $request->vi_tri_nhan_vien;
        $canBo->co_quan_tuyen = $request->co_quan_tuyen;
        $canBo->noi_sinh = $request->noi_sinh_xa;
        $canBo->huyen_noi_sinh = $request->noi_sinh_huyen;
        $canBo->thanh_pho_noi_sinh = $request->noi_sinh_tp;
        $canBo->que_quan = $request->que_quan_xa;
        $canBo->huyen_que_quan = $request->que_quan_huyen;
        $canBo->thanh_pho_que_quan = $request->que_quan_tp;
        $canBo->ho_khau = $request->ho_khau;
        $canBo->noi_o_hien_nay = $request->noi_o_hien_nay;
        $canBo->nghe_nghiep_khi_duoc_tuyen = $request->nghe_nghiep_khi_tuyen;
        $canBo->ngay_bat_dau_di_lam = !empty($request->ngay_bat_dau_di_lam) ? formatYMD($request->ngay_bat_dau_di_lam) : null;

        $canBo->chuc_danh = $request->chuc_danh;
        $canBo->chuc_vu_hien_tai = $request->chuc_vu_hien_tai;
        $canBo->don_vi = $request->don_vi;
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

        /** Cập nhật trạng thái hồ sơ trả lại **/
        $checkHoSoTraLai = HoSoTraLai::where('can_bo_id', $canBo->id)
            ->where('can_bo_nhan_id', auth::user()->id)->whereNull('status')
            ->first();

        if ($checkHoSoTraLai) {
            $checkHoSoTraLai->status = 1;
            $checkHoSoTraLai->save();

            $canBo->trang_thai_duyet_ho_so = null;
            $canBo->save();
        }

        return redirect()->back()->with('success', 'cập nhật thành công !');
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

    public function taoPhieuCanBo($canBo)
    {

        $file = public_path('template_phieu_can_bo/phieu_cbcc.docx');
        $uploadPhieuChuyen = public_path(PHIEU_CAN_BO);

        $fileDoc = $canBo->id . "_phieu_can_bo.docx";

        if (!File::exists($uploadPhieuChuyen)) {
            File::makeDirectory($uploadPhieuChuyen, 0775, true, true);
        }

        $dateOrBirth = !empty($canBo->ngay_sinh) ? explode('-', $canBo->ngay_sinh) : null;
        $noiSinh = $canBo->noi_sinh . ', ' . $canBo->noi_sinh_huyen . ', ' . ($canBo->queQuan->ten ?? null);
        $gioiTinh = !empty($canBo->gioi_tinh) ? ($canBo->gioi_tinh == 1 ? 'Nam' : 'Nữ') : null;
        $ngayDiLam = !empty($canBo->ngay_bat_dau_di_lam) ? explode('-', $canBo->ngay_bat_dau_di_lam) : null;
        $tuyenDungDauTien = !empty($canBo->tuyen_dung_dau_tien) ? explode('-', $canBo->tuyen_dung_dau_tien) : null;
        $tuyenDungChinhThuc = !empty($canBo->tuyen_dung_chinh_thuc) ? explode('-', $canBo->tuyen_dung_chinh_thuc) : null;
        $ngayCapBH = !empty($canBo->ngay_cap_bao_hiem) ? explode('-', $canBo->ngay_cap_bao_hiem) : null;
        $mocXet = !empty($canBo->moc_xet_tang_luong) ? explode('-', $canBo->moc_xet_tang_luong) : null;
        $phoThong = !empty($canBo->trinhDoPhoThong->ten) ? explode('/', $canBo->trinhDoPhoThong->ten) : null;
        $ngayBoNhiemKiemNhiemNgach = !empty($canBo->ngay_bo_nhiem_ngach) ? explode('-', $canBo->ngay_bo_nhiem_ngach) : null;
        $ngayCap = !empty($canBo->ngay_cap_cmt) ? formatDMY($canBo->ngay_cap_cmt) : null;
        $ngayHuong = !empty($canBo->ngay_huong) ? formatDMY($canBo->ngay_huong) : null;
        $ngayBoNhiemHienTai = !empty($canBo->ngay_bo_nhiem_chuc_vu_hien_tai) ? formatDMY($canBo->ngay_bo_nhiem_chuc_vu_hien_tai) : null;
        $ngayBoNhiemKiemNhiem = !empty($canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) ? formatDMY($canBo->ngay_bo_nhiem_chuc_vu_chuc_vu_kiem_nhiem) : null;
        $ngay_huong_vuot_khung = !empty($canBo->ngay_huong_vuot_khung) ? formatDMY($canBo->ngay_huong_vuot_khung) : null;
        $ngayVaoDang = !empty($canBo->ngay_vao_dang) ? formatDMY($canBo->ngay_vao_dang) : null;
        $ngayVaoDangCT = !empty($canBo->ngay_vao_dang_chinh_thuc) ? formatDMY($canBo->ngay_vao_dang_chinh_thuc) : null;
        $ngayLLVT = !empty($canBo->ngay_tham_gia_to_chuc) ? formatDMY($canBo->ngay_tham_gia_to_chuc) : null;
        $ngayGiaiN = !empty($canBo->ngay_giai_ngu) ? formatDMY($canBo->ngay_giai_ngu) : null;
        $ngayVaoDoan = !empty($canBo->ngay_vao_doan) ? formatDMY($canBo->ngay_vao_doan) : null;

        if ($phoThong) {
            $lop10 = !empty($phoThong[0]) ? explode(' ', $phoThong[0]) : null;
        }
        if ($canBo->anh_dai_dien == null) {
            $anh = 'images/default-user.png';
        } else {
            $anh = $canBo->anh_dai_dien;
        }
        $date = getdate();
        $weekday = strtolower($date['weekday']);
        switch ($weekday) {
            case 'monday':
                $weekday = 'Thứ hai';
                break;
            case 'tuesday':
                $weekday = 'Thứ ba';
                break;
            case 'wednesday':
                $weekday = 'Thứ tư';
                break;
            case 'thursday':
                $weekday = 'Thứ năm';
                break;
            case 'friday':
                $weekday = 'Thứ sáu';
                break;
            case 'saturday':
                $weekday = 'Thứ bảy';
                break;
            default:
                $weekday = 'Chủ nhật';
                break;
        }


        $wordTemplate = new TemplateProcessor($file);
        $wordTemplate->setImageValue('image', ['path' => public_path($anh), 'width' => 119, 'height' => 160]);
        $wordTemplate->setValue('donViQuanLy', 'BAN TỔ CHỨC QUẬN ỦY');
        $wordTemplate->setValue('donViChuQuan', 'QUẬN ỦY NAM TỪ LIÊM');
        $wordTemplate->setValue('donViCongTac', $canBo->toChuc->ten_don_vi ?? null);
        $wordTemplate->setValue('maSoHoSo', '123');
        $wordTemplate->setValue('soHieuCongChucVienChuc', $canBo->ma_ngach ?? null);
        $wordTemplate->setValue('hoTen', $canBo->ho_ten ?? null);
        $wordTemplate->setValue('tenGoiKhac', $canBo->ten_khac ?? null);
        $wordTemplate->setValue('gioiTinh', $gioiTinh);
        $wordTemplate->setValue('biDanh', $canBo->bi_danh ?? null);
        $wordTemplate->setValue('ngaySinh', $dateOrBirth[2] ?? null);
        $wordTemplate->setValue('thangSinh', $dateOrBirth[1] ?? null);
        $wordTemplate->setValue('namSinh', $dateOrBirth[0] ?? null);
        $wordTemplate->setValue('noiSinh', $noiSinh ?? null);
        $wordTemplate->setValue('danToc', $canBo->danToc->ten ?? null);
        $wordTemplate->setValue('tonGiao', $canBo->tonGiao->ten ?? null);
        $wordTemplate->setValue('queQuanGoc', $noiSinh ?? null);
        $wordTemplate->setValue('queQuanTheoDonViHanhChinh', $noiSinh ?? null);
        $wordTemplate->setValue('hoKhauThuongTru', $canBo->ho_khau ?? null);
        $wordTemplate->setValue('noiOHienNay', $canBo->noi_o_hien_nay ?? null);
        $wordTemplate->setValue('dtCoQuan', '……………');
        $wordTemplate->setValue('dtNhaRieng', '……………');
        $wordTemplate->setValue('dtDiDong', $canBo->so_dien_thoai ?? '……………');
        $wordTemplate->setValue('email', $canBo->email ?? null);
        $wordTemplate->setValue('soCMND', $canBo->cmnd ?? null);
        $wordTemplate->setValue('ngayCap', $ngayCap ?? null);
        $wordTemplate->setValue('noiCap', $canBo->noi_cap);
        $wordTemplate->setValue('ngayDiLam', $ngayDiLam[2] ?? null);
        $wordTemplate->setValue('thangDiLam', $ngayDiLam[1] ?? null);
        $wordTemplate->setValue('namDiLam', $ngayDiLam[0] ?? null);
        $wordTemplate->setValue('ngayDauTien', $tuyenDungDauTien[2] ?? null);
        $wordTemplate->setValue('thangDauTien', $tuyenDungDauTien[1] ?? null);
        $wordTemplate->setValue('namDauTien', $tuyenDungDauTien[0] ?? null);
        $wordTemplate->setValue('ngayTuyen', $tuyenDungChinhThuc[2] ?? null);
        $wordTemplate->setValue('thangTuyen', $tuyenDungChinhThuc[1] ?? null);
        $wordTemplate->setValue('namTuyen', $tuyenDungChinhThuc[0] ?? null);
        $wordTemplate->setValue('coQuanChinhThuc', $canBo->donVi->ten_don_vi ?? null);
        $wordTemplate->setValue('coQuanTuyenDungDauTien', $canBo->co_quan_tuyen ?? null);
        $wordTemplate->setValue('congViecHienNay', $canBo->nghe_nghiep_khi_duoc_tuyen ?? null);
        $wordTemplate->setValue('linhVucTheoDoi', $canBo->linh_vuc_theo_doi ?? null);
        $wordTemplate->setValue('hinhThucTuyen', $canBo->hinhThucTuyenDung->ten ?? null);
        $wordTemplate->setValue('ngheNghiepTruocKhiTuyen', $canBo->nghe_nghiep_truoc_khi_tuyen ?? '.............................................................................');
        $wordTemplate->setValue('congChuc', $canBo->vi_tri_cong_chuc ?? null);
        $wordTemplate->setValue('vienChuc', $canBo->vi_tri_vien_chuc ?? null);
        $wordTemplate->setValue('nhanVienThuaHanh', $canBo->vi_tri_nhan_vien ?? null);
        $wordTemplate->setValue('ngach', $canBo->Ngach->ten ?? null);
        $wordTemplate->setValue('maNgach', $canBo->Ngach->ma_ngach ?? null);
        $wordTemplate->setValue('bac', $canBo->Bac->bac ?? null);
        $wordTemplate->setValue('heSo', $canBo->Bac->he_so_luong ?? null);
        $wordTemplate->setValue('ngayHuong', $ngayHuong ?? null);
        $wordTemplate->setValue('huong', $canBo->phan_tram_huong ?? null);
        $wordTemplate->setValue('Khung', $canBo->khung ?? null);
        $wordTemplate->setValue('dateHuongk', $ngay_huong_vuot_khung ?? null);
        $wordTemplate->setValue('chucVuHienNay', $canBo->chucVuHienTai->ten ?? null);
        $wordTemplate->setValue('tongMucHuongPhuCapKhac', $canBo->phu_cap_khac ?? null);
        $wordTemplate->setValue('soBaoHiem', $canBo->so_so_bao_hiem ?? null);
        $wordTemplate->setValue('bh', $ngayCapBH[2] ?? null);
        $wordTemplate->setValue('th', $ngayCapBH[1] ?? null);
        $wordTemplate->setValue('nh', $ngayCapBH[0] ?? null);
        $wordTemplate->setValue('chucVuKiemNhiem', $canBo->chucVuKiemNhiem->ten ?? null);
        $wordTemplate->setValue('pccv', $canBo->he_so_phu_cap_chuc_vu_hien_tai ?? null);
        $wordTemplate->setValue('pccvkn', $canBo->he_so_phu_cap_chuc_vu_chuc_vu_kiem_nhiem ?? null);
        $wordTemplate->setValue('nbht', $ngayBoNhiemHienTai ?? null);
        $wordTemplate->setValue('nbhtkn', $ngayBoNhiemKiemNhiem ?? null);
        $wordTemplate->setValue('mX', $mocXet[2] ?? null);
        $wordTemplate->setValue('tX', $mocXet[1] ?? null);
        $wordTemplate->setValue('nX', $mocXet[0] ?? null);
        $wordTemplate->setValue('iN', $ngayBoNhiemKiemNhiemNgach[2] ?? null);
        $wordTemplate->setValue('iCX', $ngayBoNhiemKiemNhiemNgach[1] ?? null);
        $wordTemplate->setValue('nCY', $ngayBoNhiemKiemNhiemNgach[0] ?? null);
        $wordTemplate->setValue('phoThong1', $lop10[1] ?? null);
        $wordTemplate->setValue('phoThong2', $lop10[1] ?? null);
        $wordTemplate->setValue('chuyenMon', $canBo->hinhThucTuyen->ten ?? null);
        $wordTemplate->setValue('hoc2', $canBo->chuyenNganh->ten ?? null);
        $wordTemplate->setValue('chuyenNganh', $canBo->chuyenNganh->ten ?? null);
        $wordTemplate->setValue('namTotNgiep', $canBo->nam_tot_nghiep ?? null);
        $wordTemplate->setValue('ketQuaTNLoai', $canBo->ketQuaTNLoai ?? null);
        $wordTemplate->setValue('quanLyKinhTe', $canBo->trinh_do_quan_ly_kinh_te ?? null);
        $wordTemplate->setValue('ngoaiNgu', $canBo->ngoaiNgu->ten ?? null);
        $wordTemplate->setValue('tinHoc', $canBo->tinHoc->ten ?? null);
        $wordTemplate->setValue('tiengDT', $canBo->tieng_dan_toc ?? null);
        $wordTemplate->setValue('chucDanhKH', $canBo->chuc_danh_kh ?? null);
        $wordTemplate->setValue('namPhongcD', $canBo->nam_phong_cd_kh ?? null);
        $wordTemplate->setValue('noiVaoDoan', $canBo->noi_vao_doan ?? null);
        $wordTemplate->setValue('chucVuDoanHN', $canBo->chuc_vu_doan ?? null);
        $wordTemplate->setValue('ngayVDang', $ngayVaoDang ?? null);
        $wordTemplate->setValue('ngayVCT', $ngayVaoDangCT ?? null);
        $wordTemplate->setValue('noiKetNap', $canBo->noi_vao_dang ?? null);
        $wordTemplate->setValue('chucVuDangHN', $canBo->chucVuDangHienTai->ten_chuc_vu ?? null);
        $wordTemplate->setValue('ngayLLTV', $ngayLLVT ?? null);
        $wordTemplate->setValue('ngayGiaiN', $ngayGiaiN ?? null);
        $wordTemplate->setValue('quanHam', $canBo->quanHam->ten ?? null);
        $wordTemplate->setValue('chucVuDCN', $canBo->chucVuDCaoNhat->ten_chuc_vu ?? null);
        $wordTemplate->setValue('dhieupt', $canBo->danhHieuPT->ten ?? null);
        $wordTemplate->setValue('pTan', $canBo->nam_phong_tang_nn_pt ?? null);
        $wordTemplate->setValue('sucKhoe', $canBo->suc_khoe ?? null);
        $wordTemplate->setValue('nhomMau', $canBo->nhom_mau ?? null);
        $wordTemplate->setValue('chieuCao', $canBo->chieu_cao ?? null);
        $wordTemplate->setValue('canNang', $canBo->can_nang ?? null);
        $wordTemplate->setValue('hangtb', $canBo->thuong_binh ?? null);
        $wordTemplate->setValue('benhb', $canBo->benh_binh ?? null);
        $wordTemplate->setValue('doiTuongcs', $canBo->doiTuongCS->ten ?? null);
        $wordTemplate->setValue('doann', $ngayVaoDoan ?? null);
        $wordTemplate->setValue('khenThuong', $canBo->khenThuongCaoNhat->ten ?? null);
        $wordTemplate->setValue('kyLuat', $canBo->kyLuatCaoNhat->ten ?? null);
        $wordTemplate->setValue('banThan', $canBo->dac_diem_lich_su_ban_than ?? null);
        $wordTemplate->setValue('banThan1', $canBo->dac_diem_lich_su_ban_than_tai_san ?? null);
        $wordTemplate->setValue('nhanThanGD', $canBo->nhan_than_nuoc_ngoai ?? null);
        $wordTemplate->setValue('thu', $weekday ?? null);
        $wordTemplate->setValue('now', date('d'));
        $wordTemplate->setValue('mon', date('m') ?? null);
        $wordTemplate->setValue('nam', date('Y') . '.....' ?? null);


        //QUÁ TRÌNH CÔNG TÁC
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhCongTac = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhCongTac->addRow();
        $tableQuaTrinhCongTac->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhCongTac->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhCongTac->addCell(3000)->addText('Chức danh, chức vụ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhCongTac->addCell(3000)->addText('Cơ quan, đơn vị', $myFontStyle, array('align' => 'center'));

        $quaTrinhCongTac = QuaTrinhCongTac::where('users', $canBo->id)->get();
        if (count($quaTrinhCongTac) > 0) {
            foreach ($quaTrinhCongTac as $quaTrinh) {
                $tableQuaTrinhCongTac->addRow();
                $tableQuaTrinhCongTac->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhCongTac->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhCongTac->addCell(3000)->addText($quaTrinh->chuc_danh, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhCongTac->addCell(3000)->addText($quaTrinh->co_quan, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_cong_tac', $tableQuaTrinhCongTac);
        //QUÁ TRÌNH CÔNG TÁC NƯỚC NGOÀI
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhNuocNgoai = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhNuocNgoai->addRow();
        $tableQuaTrinhNuocNgoai->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNuocNgoai->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNuocNgoai->addCell(3000)->addText('Tên nước', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNuocNgoai->addCell(3000)->addText('Lý do', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNuocNgoai->addCell(3000)->addText('Cơ quan quyết định', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNuocNgoai->addCell(3000)->addText('Nguồn kinh phí', $myFontStyle, array('align' => 'center'));

        $quaTrinhNuocNgoai = QuaTrinhNuocNgoai::where('users', $canBo->id)->get();
        if (count($quaTrinhNuocNgoai) > 0) {
            foreach ($quaTrinhNuocNgoai as $quaTrinh) {
                $tableQuaTrinhNuocNgoai->addRow();
                $tableQuaTrinhNuocNgoai->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNuocNgoai->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNuocNgoai->addCell(3000)->addText($quaTrinh->ten_nuoc, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNuocNgoai->addCell(3000)->addText($quaTrinh->ly_do, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNuocNgoai->addCell(3000)->addText($quaTrinh->ly_do, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNuocNgoai->addCell(3000)->addText($quaTrinh->kinh_phi, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_nuoc_ngoai', $tableQuaTrinhNuocNgoai);
        //QUÁ TRÌNH KHEN THƯỞNG
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhKhenThuong = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhKhenThuong->addRow();
        $tableQuaTrinhKhenThuong->addCell(2000)->addText('Ngày KT', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKhenThuong->addCell(2000)->addText('Số ký hiệu quyết định', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKhenThuong->addCell(3000)->addText('Lý do ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKhenThuong->addCell(3000)->addText('Hình thức', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKhenThuong->addCell(3000)->addText('Cơ quan quyết định', $myFontStyle, array('align' => 'center'));

        $quaTrinhKhenThuong = QuaTrinhKhenThuong::where('users', $canBo->id)->where('type', 2)->get();
        if (count($quaTrinhKhenThuong) > 0) {
            foreach ($quaTrinhKhenThuong as $quaTrinh) {
                $tableQuaTrinhKhenThuong->addRow();
                $tableQuaTrinhKhenThuong->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->ngay_quyet_dinh)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKhenThuong->addCell(2000)->addText($quaTrinh->so_quyet_dinh, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKhenThuong->addCell(3000)->addText($quaTrinh->ly_do, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKhenThuong->addCell(3000)->addText($quaTrinh->noi_dung, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKhenThuong->addCell(3000)->addText($quaTrinh->co_quan, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_khen_thuong', $tableQuaTrinhKhenThuong);

        //QUÁ TRÌNH KỶ LUẬT
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhKyLuat = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhKyLuat->addRow();
        $tableQuaTrinhKyLuat->addCell(2000)->addText('Ngày KT', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKyLuat->addCell(2000)->addText('Số ký hiệu quyết định', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKyLuat->addCell(3000)->addText('Lý do ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKyLuat->addCell(3000)->addText('Hình thức', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhKyLuat->addCell(3000)->addText('Cơ quan quyết định', $myFontStyle, array('align' => 'center'));

        $quaTrinhKyLuat = QuaTrinhKhenThuong::where('users', $canBo->id)->where('type', 1)->get();
        if (count($quaTrinhKyLuat) > 0) {
            foreach ($quaTrinhKyLuat as $quaTrinh) {
                $tableQuaTrinhKyLuat->addRow();
                $tableQuaTrinhKyLuat->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->ngay_quyet_dinh)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKyLuat->addCell(2000)->addText($quaTrinh->so_quyet_dinh, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKyLuat->addCell(3000)->addText($quaTrinh->ly_do, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKyLuat->addCell(3000)->addText($quaTrinh->noi_dung, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhKyLuat->addCell(3000)->addText($quaTrinh->co_quan, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_ky_luat', $tableQuaTrinhKyLuat);
        //QUÁ TRÌNH LƯƠNG
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhLuong = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhLuong->addRow();
        $tableQuaTrinhLuong->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Mã ngạch', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Tên ngạch', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Nhóm ngạch', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Bậc lương', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Hệ số lương', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhLuong->addCell(3000)->addText('Hình thức hưởng', $myFontStyle, array('align' => 'center'));

        $quaTrinhLuong = QuaTrinhLuong::where('users', $canBo->id)->get();
        if (count($quaTrinhLuong) > 0) {
            foreach ($quaTrinhLuong as $quaTrinh) {
                $tableQuaTrinhLuong->addRow();
                $tableQuaTrinhLuong->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(2000)->addText($quaTrinh->ngachCongChuc->ma_ngach ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(3000)->addText($quaTrinh->ngachCongChuc->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(3000)->addText($quaTrinh->ngachCongChuc->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(3000)->addText($quaTrinh->bac, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(3000)->addText($quaTrinh->he_so, $fontStyle, array('align' => 'center'));
                $tableQuaTrinhLuong->addCell(3000)->addText($quaTrinh->phan_tram, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_luong', $tableQuaTrinhLuong);
        //QUÁ TRÌNH CHỨC VỤ HIỆN NAY
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhChucVuHN = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhChucVuHN->addRow();
        $tableQuaTrinhChucVuHN->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuHN->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuHN->addCell(3000)->addText('Cơ quan đơn vị', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuHN->addCell(3000)->addText('Chức vụ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuHN->addCell(3000)->addText('Hệ số phụ cấp', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuHN->addCell(3000)->addText('Hình thức bổ nhiệm', $myFontStyle, array('align' => 'center'));

        $quaTrinhChucVu = QuaChucVu::where('users', $canBo->id)->get();
        if (count($quaTrinhChucVu) > 0) {
            foreach ($quaTrinhChucVu as $quaTrinh) {
                $tableQuaTrinhChucVuHN->addRow();
                $tableQuaTrinhChucVuHN->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuHN->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuHN->addCell(2000)->addText($quaTrinh->cong_viec ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuHN->addCell(3000)->addText($quaTrinh->chuc_vu ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuHN->addCell(3000)->addText($quaTrinh->he_so_phu_cap ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuHN->addCell(3000)->addText($quaTrinh->hinh_thuc_bo_nhiem, $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_chuc_vu', $tableQuaTrinhChucVuHN);
        //QUÁ TRÌNH CHỨC VỤ ĐẢNG
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhChucVuDang = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhChucVuDang->addRow();
        $tableQuaTrinhChucVuDang->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuDang->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuDang->addCell(3000)->addText('Cơ quan đơn vị', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhChucVuDang->addCell(3000)->addText('Chức vụ', $myFontStyle, array('align' => 'center'));

        $quaTrinhDang = QuaTrinhChucVuDang::where('users', $canBo->id)->get();
        if (count($quaTrinhDang) > 0) {
            foreach ($quaTrinhDang as $quaTrinh) {
                $tableQuaTrinhChucVuDang->addRow();
                $tableQuaTrinhChucVuDang->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuDang->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuDang->addCell(2000)->addText($quaTrinh->co_quan ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhChucVuDang->addCell(3000)->addText($quaTrinh->chuc_vu ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_chuc_vu_dang', $tableQuaTrinhChucVuDang);
        //QUÁ TRÌNH VƯỢT KHUNG
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhVuotKhung = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhVuotKhung->addRow();
        $tableQuaTrinhVuotKhung->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhVuotKhung->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhVuotKhung->addCell(3000)->addText('Phần trăm được hưởng', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhVuotKhung->addCell(3000)->addText('Thành tiền', $myFontStyle, array('align' => 'center'));

        $quaTrinhVK = QuaTrinhVuotKhung::where('users', $canBo->id)->get();
        if (count($quaTrinhVK) > 0) {
            foreach ($quaTrinhVK as $quaTrinh) {
                $tableQuaTrinhVuotKhung->addRow();
                $tableQuaTrinhVuotKhung->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhVuotKhung->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhVuotKhung->addCell(2000)->addText($quaTrinh->phan_tram ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhVuotKhung->addCell(3000)->addText($quaTrinh->thanh_tien ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_vk', $tableQuaTrinhVuotKhung);
        //QUÁ TRÌNH PC KHAC
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhPCKhac = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhPCKhac->addRow();
        $tableQuaTrinhPCKhac->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhPCKhac->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhPCKhac->addCell(3000)->addText('Loại phụ cấp', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhPCKhac->addCell(3000)->addText('Mức hưởng', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhPCKhac->addCell(3000)->addText('Thành tiền', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhPCKhac->addCell(3000)->addText('Cách tính phụ cấp', $myFontStyle, array('align' => 'center'));

        $quaTrinhPCK = QuaTrinhPhuCapKhac::where('users', $canBo->id)->get();
        if (count($quaTrinhPCK) > 0) {
            foreach ($quaTrinhPCK as $quaTrinh) {
                $tableQuaTrinhPCKhac->addRow();
                $tableQuaTrinhPCKhac->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhPCKhac->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhPCKhac->addCell(2000)->addText($quaTrinh->loai_phu_cap ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhPCKhac->addCell(3000)->addText($quaTrinh->muc_huong ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhPCKhac->addCell(3000)->addText($quaTrinh->thanh_tien ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhPCKhac->addCell(3000)->addText($quaTrinh->cach_tinh ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_pc_khac', $tableQuaTrinhPCKhac);
        //QUÁ TRÌNH NGHIÊN CỨU
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhNghienCuu = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhNghienCuu->addRow();
        $tableQuaTrinhNghienCuu->addCell(2000)->addText('Thời gian tham gia', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNghienCuu->addCell(2000)->addText('Tên đề tài', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNghienCuu->addCell(3000)->addText('Cấp đề tài', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNghienCuu->addCell(3000)->addText('Chủ nhiệm đề tài', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNghienCuu->addCell(3000)->addText('Tư cách tham gia', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNghienCuu->addCell(3000)->addText('Kết quả đánh giá', $myFontStyle, array('align' => 'center'));

        $quaTrinhNK = QuaTrinhNghienCuu::where('users', $canBo->id)->get();
        if (count($quaTrinhNK) > 0) {
            foreach ($quaTrinhNK as $quaTrinh) {
                $tableQuaTrinhNghienCuu->addRow();
                $tableQuaTrinhNghienCuu->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->thoi_gian)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNghienCuu->addCell(2000)->addText($quaTrinh->ten_de_tai ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNghienCuu->addCell(3000)->addText($quaTrinh->cap_de_tai ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNghienCuu->addCell(3000)->addText($quaTrinh->chu_nhiem ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNghienCuu->addCell(3000)->addText($quaTrinh->tu_cach_tham_gia ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNghienCuu->addCell(3000)->addText($quaTrinh->ket_qua ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_nghien_cuu', $tableQuaTrinhNghienCuu);
        //QUÁ TRÌNH NHÂN THÂN
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhNhanThan = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhNhanThan->addRow();
        $tableQuaTrinhNhanThan->addCell(2000)->addText('Quan hệ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNhanThan->addCell(2000)->addText('Họ và tên', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNhanThan->addCell(3000)->addText('Năm sinh', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNhanThan->addCell(3000)->addText('Nghề nghiệp, chức vụ công tác', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNhanThan->addCell(3000)->addText('Nơi làm việc', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhNhanThan->addCell(3000)->addText('Nơi ở hiện nay', $myFontStyle, array('align' => 'center'));

        $quaTrinhGD = QuaTrinhGiaDinh::where('users', $canBo->id)->get();
        if (count($quaTrinhGD) > 0) {
            foreach ($quaTrinhGD as $quaTrinh) {
                $tableQuaTrinhNhanThan->addRow();
                $tableQuaTrinhNhanThan->addCell(2000)->addText($quaTrinh->quan_he ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNhanThan->addCell(2000)->addText($quaTrinh->ho_ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNhanThan->addCell(3000)->addText($quaTrinh->nam_sinh ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNhanThan->addCell(3000)->addText($quaTrinh->nghe_nghiep ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNhanThan->addCell(3000)->addText($quaTrinh->noi_lam_viec ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhNhanThan->addCell(3000)->addText($quaTrinh->noi_o ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_gd', $tableQuaTrinhNhanThan);
        //QUÁ TRÌNH ĐOÀN
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhDoan = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhDoan->addRow();
        $tableQuaTrinhDoan->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhDoan->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhDoan->addCell(3000)->addText('Chức vụ Đoàn thể', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhDoan->addCell(3000)->addText('Cơ quan, đơn vị công tác', $myFontStyle, array('align' => 'center'));

        $quaTrinhDoan = QuaTrinhDoan::where('users', $canBo->id)->get();
        if (count($quaTrinhDoan) > 0) {
            foreach ($quaTrinhDoan as $quaTrinh) {
                $tableQuaTrinhDoan->addRow();
                $tableQuaTrinhDoan->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhDoan->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhDoan->addCell(3000)->addText($quaTrinh->chuc_vu ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhDoan->addCell(3000)->addText($quaTrinh->co_quan ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_doan', $tableQuaTrinhDoan);
        //QUÁ TRÌNH QUỐC HỘI
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhQuocHoi = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhQuocHoi->addRow();
        $tableQuaTrinhQuocHoi->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhQuocHoi->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhQuocHoi->addCell(3000)->addText('Loại hình đại biểu', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhQuocHoi->addCell(3000)->addText('Nhiệm kỳ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhQuocHoi->addCell(3000)->addText('Thông tin chi tiết', $myFontStyle, array('align' => 'center'));

        $quaTrinhQuocHoi = QuaTrinhQuocHoi::where('users', $canBo->id)->get();
        if (count($quaTrinhQuocHoi) > 0) {
            foreach ($quaTrinhQuocHoi as $quaTrinh) {
                $tableQuaTrinhQuocHoi->addRow();
                $tableQuaTrinhQuocHoi->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhQuocHoi->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhQuocHoi->addCell(3000)->addText($quaTrinh->loai_hinh_dai_bieu ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhQuocHoi->addCell(2000)->addText($quaTrinh->nhiem_ky ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhQuocHoi->addCell(2000)->addText($quaTrinh->thong_tin ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_quoc_hoi', $tableQuaTrinhQuocHoi);
        //QUÁ TRÌNH BỒI DƯỠNG
        $myFontStyle = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'bold' => true);
        $fontStyle = ['align' => Cell::TEXT_DIR_TBRLV];
        $tableQuaTrinhBoiDuong = new Table(array('borderColor' => 'black', 'borderSize' => 1, 'cellMargin' => 50, 'valign' => 'center', 'align' => 'center'));
        $tableQuaTrinhBoiDuong->addRow();
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Từ ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Đến ngày', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Loại hình kiến thức', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Tên chuyên ngành ĐT - BD', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Hình thức đào tạo, bồi dưỡng', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Tên trường đào tạo', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Nước đào tạo', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Trình độ tốt nghiệp', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Loại văn bằng, chứng chỉ', $myFontStyle, array('align' => 'center'));
        $tableQuaTrinhBoiDuong->addCell(2000)->addText('Nguồn kinh phí', $myFontStyle, array('align' => 'center'));

        $quaTrinhDoiDuong = QuaTrinhDaoTao::where('users', $canBo->id)->get();
        if (count($quaTrinhDoiDuong) > 0) {
            foreach ($quaTrinhDoiDuong as $quaTrinh) {
                $tableQuaTrinhBoiDuong->addRow();
                $tableQuaTrinhBoiDuong->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->tu_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText(date('d/m/Y', strtotime($quaTrinh->den_ngay)), $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->loaiDaoTao->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->ten_chuyen_nganh ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->hinhThuc->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->truongHoc->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->nuoc_dao_tao ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->trinhDo->ten ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->chung_chi ?? '', $fontStyle, array('align' => 'center'));
                $tableQuaTrinhBoiDuong->addCell(2000)->addText($quaTrinh->kinh_phi ?? '', $fontStyle, array('align' => 'center'));
            }
        }

        $wordTemplate->setComplexBlock('table_qua_trinh_boi_duong', $tableQuaTrinhBoiDuong);

        $wordTemplate->saveAs($uploadPhieuChuyen . "/" . $fileDoc);
    }
}

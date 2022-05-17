<?php

namespace Modules\QuanLyDaoTao\Http\Controllers;
use auth,DB;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\HocVienDaoTao;
use Modules\Admin\Entities\LopDaoTao;
use Modules\Admin\Entities\ToChuc;

class QuanLyLopDaoTaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $first = null;
        $ten = $request->get('ten');
        $id= $request->get('id');
        if($id){
            $first =  LopDaoTao::where('id',$id)->first();
        }
        $danh_sach = LopDaoTao::where('trang_thai',LopDaoTao::DU_KIEN_MO)
            ->where(function ($query) use ($ten) {
                if (!empty($ten)) {
                    return $query->where(DB::raw('lower(ten)'), 'LIKE', "%" . mb_strtolower($ten) . "%");
                }
            })->paginate(PER_PAGE);
        return view('quanlydaotao::themLop',compact('danh_sach','first'));
    }

    public function dangKyLop(Request $request,$id)
    {
        $danhSachPhongBan = null;
        $phongBanId = $request->phong_ban_id ?? null;
        $search = $request->search;
        $donViId = $request->don_vi;
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

        $danhSachHocVien = HocVienDaoTao::where('id',$id)->paginate(PER_PAGE);
        $danhSach = CanBo::where(function ($query) use ($donViId) {
            if (!empty($donViId)) {
                return $query->where('don_vi_tao_id', $donViId);
            }
        }) ->where(function ($query) use ($phongBanId) {
            if (!empty($phongBanId)) {
                return $query->where('don_vi_id', $phongBanId);
            }
        })->where(function ($query){
                return $query->whereHas('searchHV', function ($q)  {
                    return $q->where('deleted_at');
                });
        })
            ->paginate(PER_PAGE);
        return view('quanlydaotao::components.dukien',compact('donVi','danhSachPhongBan','cap2','danhSachHocVien','danhSach','id'));
    }

    public function themcbvlop(Request $request,$id)
    {
        $data = $request->all();
        dd($data);
        $danhSach = $data['can_bo'] ?? null;
        if (!empty($danhSach)) {
            foreach ($danhSach as $dataf) {
                $canBo = new HocVienDaoTao();
                $canBo->ten_hoc_vien = $dataf;
                $canBo->khoa_hoc_id = $id;
                $canBo->save();
            }
            return redirect()->back()->with('success', 'Thêm vào lớp thành công !');
        } else {
            return redirect()->back()->with('error', 'Bạn chưa chọn cán bộ nào !');
        }
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
        $lop = new LopDaoTao();
        $lop->ten = $request->ten;
        $lop->so_luong = $request->so_luong;
        $lop->don_vi_mo = auth::user()->don_vi_id;
        $lop->trang_thai = $request->trang_thai;
        $lop->noi_dung_dt = $request->noi_dung_dt;
        $lop->ngay_khai_giang = !empty($request->ngay_khai_giang) ? formatYMD($request->ngay_khai_giang) : null;
        $lop->ngay_be_giang = !empty($request->ngay_be_giang) ? formatYMD($request->ngay_be_giang) : null;
        $lop->save();

        return redirect()->back()->with('success', 'Thêm mới thành công !');
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
        $lop = LopDaoTao::where('id',$id)->first();
        $lop->ten = $request->ten;
        $lop->so_luong = $request->so_luong;
        $lop->don_vi_mo = auth::user()->don_vi_id;
        $lop->trang_thai = $request->trang_thai;
        $lop->noi_dung_dt = $request->noi_dung_dt;
        $lop->ngay_khai_giang = !empty($request->ngay_khai_giang) ? formatYMD($request->ngay_khai_giang) : null;
        $lop->ngay_be_giang = !empty($request->ngay_be_giang) ? formatYMD($request->ngay_be_giang) : null;
        $lop->save();

        return redirect()->back()->with('success', 'Thêm mới thành công !');
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

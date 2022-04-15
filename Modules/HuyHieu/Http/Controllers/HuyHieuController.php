<?php

namespace Modules\HuyHieu\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\DanhSachHuyHieu;
use Modules\Admin\Entities\DanhSachTheDang;
use Modules\Admin\Entities\DotCapHuyHieu;
use Modules\Admin\Entities\DotCapTheDang;
use DB, auth;
use Modules\Admin\Entities\HuyHieuDang;
use Modules\Admin\Entities\ToChuc;

class HuyHieuController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $dotCap = $request->get('dot_cap');
        $danhSachTheoDot = [];
        $dotCapThe = DotCapHuyHieu::wherenull('trang_thai')->get();
        $danhSach = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
            ->where('la_dang_vien', 1)->whereNull('trang_thai_huy_hieu_can_bo')->get();
        if (!empty($dotCap)) {
            $danhSachTheoDot = DanhSachHuyHieu::where('dot_cap_the_id', $dotCap)->paginate(10);
        }

        return view('huyhieu::index', compact('dotCapThe', 'danhSach', 'danhSachTheoDot'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('huyhieu::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $danhSach = $data['can_bo'] ?? null;
        if (!empty($danhSach)) {
            foreach ($danhSach as $dataf) {
                $lapDS = new DanhSachHuyHieu();
                $lapDS->can_bo_id = $dataf;
                $lapDS->dot_cap_the_id = $request->dot_cap;
                $lapDS->save();
                $canBo = CanBo::where('id', $dataf)->first();
                $canBo->trang_thai_huy_hieu_can_bo = 1;
                $canBo->save();
            }
            return redirect()->back()->with('success', 'cập nhật thành công !');
        } else {
            return redirect()->back()->with('error', 'Bạn chưa chọn cán bộ nào !');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('huyhieu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function capSo(Request $request,$id)
    {
        dd($request->all());
    }
    public function edit($id)
    {
        return view('huyhieu::edit');
    }
    public function guiDuyet(Request $request,$id)
    {
        $dotCap = DotCapHuyHieu::where('id',$id)->first();
        $dotCap->don_vi_id = auth::user()->don_vi_id;
        $dotCap->can_bo_nhan = $request->lanh_dao_duyet;
        $dotCap->trang_thai = 1;
        $dotCap->save();
        $canBoDS = DanhSachHuyHieu::where('dot_cap_the_id',$id)->get();
        foreach ($canBoDS as $data)
        {
            $canBo = CanBo::where('id',$data->can_bo_id)->first();
            $canBo->trang_thai_huy_hieu_can_bo = 1;
            $canBo->save();
        }
        return redirect()->back()->with('success', 'Gửi thành công !');
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

    public function capSoHuyHieu(Request $request,$id)
    {
        $danhSach = DanhSachHuyHieu::where('dot_cap_the_id',$id)->paginate(10);
        $dotCap = DotCapHuyHieu::where('id',$id)->first();
        $huyHieu = HuyHieuDang::all();
        return view('huyhieu::danh_sach_cap_so', compact('danhSach','huyHieu','dotCap'));

    }

    public function DSDotCapHuyHieuDangChoGui(Request $request)
    {
        $danhSach = DotCapHuyHieu::wherenull('trang_thai')->paginate(10);
        $danhSachLanhDaoDuyet = User::role([LANH_DAO])
            ->where('don_vi_id', auth::user()->don_vi_id)
            ->where('trang_thai', ACTIVE)->whereNull('deleted_at')->get();
        return view('huyhieu::dot_cap_the_cho_gui', compact('danhSach', 'danhSachLanhDaoDuyet'));

    }
    public function huyHieuCanBo(Request $request,$id)
    {
        $danhSach = DanhSachHuyHieu::where('dot_cap_the_id',$id)->paginate(10);
        $dotCap = DotCapHuyHieu::where('id',$id)->first();
        $huyHieu = HuyHieuDang::all();
        if ($request->ajax()) {
            $html = view('huyhieu::in_phieu.in_quyet_dinh')->render();;
            return response()->json([
                'html' => $html,
            ]);
        }
        return view('huyhieu::danh_sach_can_bo', compact('danhSach','huyHieu','dotCap','id'));

    }

    public function DSDotCapHuyHieuDangChoDuyet(Request $request)
    {
        $danhSach = DotCapHuyHieu::where('trang_thai', 1)->where('can_bo_nhan', auth::user()->id)->paginate(10);

        return view('huyhieu::dot_cap_the_lanh_dao', compact('danhSach'));

    }

    public function DSDotCapHuyHieuDangDaGui(Request $request)
    {
        $danhSach = DotCapHuyHieu::where('trang_thai', 1)->paginate(10);

        return view('huyhieu::dot_cap_the_da_gui', compact('danhSach'));

    }

    public function DSDotCapHuyHieuDangDaDuyet(Request $request)
    {
        $donVi = $request->get('don_vi');
        $danhSach = DotCapHuyHieu::where('trang_thai', 1)
            ->where(function ($query) use ($donVi) {
                if (!empty($donVi)) {
                    return $query->where(DB::raw('lower(don_vi_id)'), 'LIKE', "%" . mb_strtolower($donVi) . "%");
                }
            })->paginate(10);
        $donVi = ToChuc::where(function ($query) {
            if (auth::user()->donVi && auth::user()->donVi->parent_id != 0) {
                return $query->where('id', auth::user()->don_vi_id)
                    ->orwhere('parent_id', auth::user()->don_vi_id);
            }
        })->get();
        return view('huyhieu::dot_cap_the_duyet', compact('danhSach','donVi'));

    }

    public function DSDotCapHuyHieuDang(Request $request)
    {
        $id = $request->get('id');
        $ghiChu = $request->get('ghi_chu');
        $dotCapThe = formatYMD($request->dot_cap_the);
        $first = null;
        if (!empty($id)) {
            $first = DotCapHuyHieu::where('id', $id)->first();
        }
        $danh_sach = DotCapHuyHieu::whereNull('trang_thai')
            ->where(function ($query) use ($dotCapThe) {
                if (!empty($dotCapThe)) {
                    return $query->where(DB::raw('lower(dot_cap_the)'), 'LIKE', "%" . mb_strtolower($dotCapThe) . "%");
                }
            })
            ->where(function ($query) use ($ghiChu) {
                if (!empty($ghiChu)) {
                    return $query->where(DB::raw('lower(ghi_chu)'), 'LIKE', "%" . mb_strtolower($ghiChu) . "%");
                }
            })
            ->paginate(20);
        return view('huyhieu::dot_cap_the', compact('danh_sach', 'first'));

    }

    public function themMoiDotCapHuyHieuDang(Request $request)
    {
        $them = new DotCapHuyHieu();
        $them->dot_cap_the = !empty($request->dot_cap_the) ? formatYMD($request->dot_cap_the) : null;
        $them->ghi_chu = $request->ghi_chu;
        $them->save();
        return redirect()->back()->with('success', 'thêm mới thành công !');
    }

    public function capNhatCapHuyHieuDang(Request $request, $id)
    {
        $them = DotCapHuyHieu::where('id', $id)->first();
        $them->dot_cap_the = !empty($request->dot_cap_the) ? formatYMD($request->dot_cap_the) : null;
        $them->ghi_chu = $request->ghi_chu;
        $them->save();
        return redirect()->route('DSDotCapHuyHieuDang')->with('success', 'Cập nhật thành công !');
    }

    public function xoaDotCapHuyHieuDang(Request $request, $id)
    {
        $them = DotCapHuyHieu::where('id', $id)->whereNull('trang_thai')->first();
        if ($them) {
            DotCapHuyHieu::where('id', $id)->whereNull('trang_thai')->delete();
            return redirect()->route('DSDotCapHuyHieuDang')->with('success', 'Xóa thành công !');
        }
        return redirect()->route('DSDotCapHuyHieuDang')->with('success', 'Xóa không thành công đợt cấp thẻ đã được duyệt !');

    }
}

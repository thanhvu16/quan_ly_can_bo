<?php

namespace Modules\TheDang\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\DanhSachTheDang;
use Modules\Admin\Entities\DotCapTheDang;
use DB, auth;

class TheDangController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $dotCap = $request->get('dot_cap');
        $danhSachTheoDot = [];
        $dotCapThe = DotCapTheDang::wherenull('trang_thai')->get();
        $danhSach = CanBo::where('trang_thai_duyet_ho_so', CanBo::TRANG_THAI_DA_GUI_DUYET_DA_DUYET)
            ->where('la_dang_vien', 1)->whereNull('trang_thai_can_bo')->get();
        if (!empty($dotCap)) {
            $danhSachTheoDot = DanhSachTheDang::where('dot_cap_the_id', $dotCap)->paginate(10);
        }

        return view('thedang::index', compact('dotCapThe', 'danhSach', 'danhSachTheoDot'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('thedang::create');
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
                $lapDS = new DanhSachTheDang();
                $lapDS->can_bo_id = $dataf;
                $lapDS->dot_cap_the_id = $request->dot_cap;
                $lapDS->save();
                $canBo = CanBo::where('id', $dataf)->first();
                $canBo->trang_thai_can_bo = 1;
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
        return view('thedang::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('thedang::edit');
    }
    public function guiDuyet(Request $request,$id)
    {
        $dotCap = DotCapTheDang::where('id',$id)->first();
        $dotCap->can_bo_nhan = $request->lanh_dao_duyet;
        $dotCap->trang_thai = 1;
        $dotCap->save();
        $canBoDS = DanhSachTheDang::where('dot_cap_the_id',$id)->get();
        foreach ($canBoDS as $data)
        {
            $canBo = CanBo::where('id',$data->can_bo_id)->first();
            $canBo->trang_thai_can_bo = 1;
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

    public function DSDotCapTheChoGui(Request $request)
    {
        $danhSach = DotCapTheDang::wherenull('trang_thai')->paginate(10);
        $danhSachLanhDaoDuyet = User::role([LANH_DAO])
            ->where('don_vi_id', auth::user()->don_vi_id)
            ->where('trang_thai', ACTIVE)->whereNull('deleted_at')->get();
        return view('thedang::dot_cap_the_cho_gui', compact('danhSach', 'danhSachLanhDaoDuyet'));

    }

    public function DSDotCapTheChoDuyet(Request $request)
    {
        $danhSach = DotCapTheDang::where('trang_thai', 1)->where('can_bo_nhan',auth::user()->id)->paginate(10);

        return view('thedang::dot_cap_the_lanh_dao', compact('danhSach'));

    }
    public function DSDotCapTheDaGui(Request $request)
    {
        $danhSach = DotCapTheDang::where('trang_thai', 1)->paginate(10);

        return view('thedang::dot_cap_the_da_gui', compact('danhSach'));

    }
    public function DSDotCapTheDaDuyet(Request $request)
    {
        $danhSach = DotCapTheDang::where('trang_thai', 2)->paginate(10);

        return view('thedang::dot_cap_the_da_gui', compact('danhSach'));

    }

    public function DSDotCapThe(Request $request)
    {
        $id = $request->get('id');
        $ghiChu = $request->get('ghi_chu');
        $dotCapThe = formatYMD($request->dot_cap_the);
        $first = null;
        if (!empty($id)) {
            $first = DotCapTheDang::where('id', $id)->first();
        }
        $danh_sach = DotCapTheDang::whereNull('trang_thai')
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
        return view('thedang::dot_cap_the', compact('danh_sach', 'first'));

    }

    public function themMoiDotCap(Request $request)
    {
        $them = new DotCapTheDang();
        $them->dot_cap_the = !empty($request->dot_cap_the) ? formatYMD($request->dot_cap_the) : null;
        $them->ghi_chu = $request->ghi_chu;
        $them->save();
        return redirect()->back()->with('success', 'thêm mới thành công !');
    }

    public function capNhatCT(Request $request, $id)
    {
        $them = DotCapTheDang::where('id', $id)->first();
        $them->dot_cap_the = !empty($request->dot_cap_the) ? formatYMD($request->dot_cap_the) : null;
        $them->ghi_chu = $request->ghi_chu;
        $them->save();
        return redirect()->route('DSDotCapThe')->with('success', 'Cập nhật thành công !');
    }

    public function xoaDotCap(Request $request, $id)
    {
        $them = DotCapTheDang::where('id', $id)->whereNull('trang_thai')->first();
        if ($them) {
            DotCapTheDang::where('id', $id)->whereNull('trang_thai')->delete();
            return redirect()->route('DSDotCapThe')->with('success', 'Xóa thành công !');
        }
        return redirect()->route('DSDotCapThe')->with('success', 'Xóa không thành công đợt cấp thẻ đã được duyệt !');

    }
}

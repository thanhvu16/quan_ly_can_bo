<?php

namespace Modules\ThemCanBo\Http\Controllers;

use App\Models\TrinhTuGuiDuyetHoSo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Auth;
use Modules\Admin\Entities\ThongBao;

class DuyetHoSoCanBoConTroller extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('themcanbo::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('themcanbo::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $arrCanBoId = json_decode($request->get('can_bo_id'));
        $arrLanhDaoId = array_filter($request->get('lanh_dao_id'));

        if ($arrCanBoId && count($arrCanBoId) > 0) {
            foreach ($arrCanBoId as $canBoId)
            {
                $lanhDaoDuyetId = $arrLanhDaoId[$canBoId];
                $trinhTuGuiDuyetHoSo = new TrinhTuGuiDuyetHoSo();
                $trinhTuGuiDuyetHoSo->can_bo_id = $canBoId;
                $trinhTuGuiDuyetHoSo->can_bo_chuyen_id = auth::user()->id;
                $trinhTuGuiDuyetHoSo->can_bo_nhan_id = $lanhDaoDuyetId;
                $trinhTuGuiDuyetHoSo->save();

                $thongBao = new ThongBao();
                $thongBao->nguoi_gui = auth::user()->id;
                $thongBao->nguoi_nhan = $lanhDaoDuyetId;
                $thongBao->noi_dung = 'Hồ sơ chờ duyệt';
                $thongBao->id_ho_so = $canBoId;
                $thongBao->save();

                //update trang thai gui canBo
                CanBo::updateTrangThaiGuiDuyet($canBoId, CanBo::TRANG_THAI_DA_GUI_DUYET);
            }
        }

        return redirect()->back()->with('success', 'Đã gửi lãnh đạo duyệt');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('themcanbo::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('themcanbo::edit');
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

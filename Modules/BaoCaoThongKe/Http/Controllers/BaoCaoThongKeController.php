<?php

namespace Modules\BaoCaoThongKe\Http\Controllers;

use App\Exports\ExportBaoCaoTheoMau;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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

        return Excel::download(new ExportBaoCaoTheoMau($type),
            $fileName);

//        return view('baocaothongke::mau-bao-cao-excel.1');
    }
}

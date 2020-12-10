<?php

namespace Modules\DieuHanhVanBanDen\Http\Controllers;

use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DieuHanhVanBanDen\Entities\ChuyenVienPhoiHop;
use Modules\DieuHanhVanBanDen\Entities\DonViChuTri;
use Auth, DB;
use Modules\DieuHanhVanBanDen\Entities\LanhDaoXemDeBiet;
use Modules\DieuHanhVanBanDen\Entities\LogXuLyVanBanDen;
use Modules\DieuHanhVanBanDen\Entities\VanBanTraLai;
use Modules\VanBanDen\Entities\VanBanDen;
use Modules\DieuHanhVanBanDen\Entities\XuLyVanBanDen;

class VanBanDenDonViController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $currentUser = auth::user();
        $trinhTuNhanVanBan = null;

        if ($currentUser->hasRole(TRUONG_PHONG) || $currentUser->hasRole(CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 3;
        }

        if ($currentUser->hasRole(PHO_PHONG) || $currentUser->hasRole(PHO_CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 4;
        }

        if ($currentUser->hasRole(CHUYEN_VIEN)) {
            $trinhTuNhanVanBan = 5;
        }

        $donViChuTri = DonViChuTri::where('don_vi_id', $currentUser->don_vi_id)
            ->where('can_bo_nhan_id', $currentUser->id)
            ->whereNotNull('vao_so_van_ban')
            ->whereNull('hoan_thanh')
            ->get();

        $arrVanBanDenId = $donViChuTri->pluck('van_ban_den_id')->toArray();

        $danhSachVanBanDen = VanBanDen::with('donViChuTri', 'xuLyVanBanDen')->whereIn('id', $arrVanBanDenId)
            ->where('trinh_tu_nhan_van_ban', $trinhTuNhanVanBan)
            ->paginate(PER_PAGE);

        $roles = [PHO_PHONG, PHO_CHANH_VAN_PHONG];

        $danhSachPhoPhong = User::where('don_vi_id', $currentUser->don_vi_id)
            ->whereHas('roles', function ($query) use ($roles) {
                return $query->whereIn('name', $roles);
            })
            ->where('trang_thai', ACTIVE)
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')->get();



        $danhSachChuyenVien = User::role(CHUYEN_VIEN)
            ->where('don_vi_id', $currentUser->don_vi_id)
            ->where('trang_thai', ACTIVE)
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')->get();

        $order = ($danhSachVanBanDen->currentPage() - 1) * PER_PAGE + 1;

        if ($trinhTuNhanVanBan == 5) {

            return view('dieuhanhvanbanden::don-vi.chuyen_vien', compact('danhSachVanBanDen', 'danhSachPhoPhong',
                'danhSachChuyenVien', 'trinhTuNhanVanBan', 'order'));
        }

        return view('dieuhanhvanbanden::don-vi.index', compact('danhSachVanBanDen', 'danhSachPhoPhong',
            'danhSachChuyenVien', 'trinhTuNhanVanBan', 'order'));
    }

    public function vanBanDaChiDao()
    {
        $currentUser = auth::user();
        $trinhTuNhanVanBan = null;

        if ($currentUser->hasRole(TRUONG_PHONG) || $currentUser->hasRole(CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 3;
        }

        if ($currentUser->hasRole(PHO_PHONG) || $currentUser->hasRole(PHO_CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 4;
        }

        if ($currentUser->hasRole(CHUYEN_VIEN)) {
            $trinhTuNhanVanBan = 5;
        }

        $donViChuTri = DonViChuTri::where('don_vi_id', $currentUser->don_vi_id)->where('can_bo_chuyen_id', $currentUser->id)
            ->whereNotNull('vao_so_van_ban')
            ->whereNull('hoan_thanh')
            ->get();

        $arrVanBanDenId = $donViChuTri->pluck('van_ban_den_id')->toArray();

        $danhSachVanBanDen = VanBanDen::with('checkLuuVetVanBanDen')->whereIn('id', $arrVanBanDenId)
            ->paginate(PER_PAGE);

        $danhSachPhoPhong = User::role(PHO_PHONG)
            ->where('don_vi_id', $currentUser->don_vi_id)
            ->where('trang_thai', ACTIVE)
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')->get();

        $danhSachChuyenVien = User::role(CHUYEN_VIEN)
            ->where('don_vi_id', $currentUser->don_vi_id)
            ->where('trang_thai', ACTIVE)
            ->whereNull('deleted_at')
            ->orderBy('id', 'DESC')->get();

        $order = ($danhSachVanBanDen->currentPage() - 1) * PER_PAGE + 1;

        return view('dieuhanhvanbanden::don-vi.da_chi_dao', compact('danhSachVanBanDen', 'danhSachPhoPhong',
            'danhSachChuyenVien', 'trinhTuNhanVanBan', 'order'));
    }

    public function dangXuLy(Request $request)
    {
        $currentUser = auth::user();

        $trinhTuNhanVanBan = null;

        $xuLyVanBanDen = XuLyVanBanDen::where('can_bo_nhan_id', $currentUser->id)
            ->whereNull('status')
            ->whereNull('hoan_thanh')
            ->get();

        $arrVanBanDenId = $xuLyVanBanDen->pluck('van_ban_den_id')->toArray();

        if ($currentUser->hasRole(CHU_TICH)) {
            $trinhTuNhanVanBan = 1;
        }

        if ($currentUser->hasRole(PHO_CHUC_TICH)) {
            $trinhTuNhanVanBan = 2;
        }

        if ($currentUser->hasRole(TRUONG_PHONG) || $currentUser->hasRole(CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 3;
        }

        if ($currentUser->hasRole(PHO_PHONG) || $currentUser->hasRole(PHO_CHANH_VAN_PHONG)) {
            $trinhTuNhanVanBan = 4;
        }

        if ($currentUser->hasRole(CHUYEN_VIEN)) {
            $trinhTuNhanVanBan = 5;
        }

        if ($currentUser->hasRole(TRUONG_PHONG) || $currentUser->hasRole(CHANH_VAN_PHONG) || $currentUser->hasRole(CHUYEN_VIEN) ||
            $currentUser->hasRole(PHO_PHONG) || $currentUser->hasRole(PHO_CHANH_VAN_PHONG)) {
            $donViChuTri = DonViChuTri::where('don_vi_id', $currentUser->don_vi_id)
                ->where('can_bo_nhan_id', $currentUser->id)
                ->whereNotNull('vao_so_van_ban')
                ->whereNull('hoan_thanh')
                ->get();

            $arrVanBanDenId = $donViChuTri->pluck('van_ban_den_id')->toArray();
        }

        $danhSachVanBanDen = VanBanDen::with('checkLuuVetVanBanDen')
            ->whereIn('id', $arrVanBanDenId)
            ->where('trinh_tu_nhan_van_ban', '>', $trinhTuNhanVanBan)
            ->where('trinh_tu_nhan_van_ban', '!=', VanBanDen::HOAN_THANH_VAN_BAN)
            ->paginate(PER_PAGE);


        $order = ($danhSachVanBanDen->currentPage() - 1) * PER_PAGE + 1;

        return view('dieuhanhvanbanden::don-vi.dang_xu_ly', compact('danhSachVanBanDen', 'order'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dieuhanhvanbanden::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $currentUser = auth::user();

        $vanBanDenDonViIds = json_decode($data['van_ban_den_id']);
        $danhSachPhoPhongIds = $data['pho_phong_id'] ?? null;
        $danhSachChuyenVienIds = $data['chuyen_vien_id'] ?? null;
        $vanBanTraLoi = $data['van_ban_tra_loi'] ?? null;
        $textnoidungPhoPhong = $data['noi_dung_pho_phong'] ?? null;
        $textNoiDungChuyenVien = $data['noi_dung_chuyen_vien'] ?? null;
        $arrChuyenVienPhoiHopIds = $data['chuyen_vien_phoi_hop_id'] ?? null;
        $lanhDaoDuHopId = $data['lanh_dao_du_hop_id'] ?? null;
        $arrLanhDaoXemDeBiet = $data['lanh_dao_xem_de_biet'] ?? null;

        if (isset($vanBanDenDonViIds) && count($vanBanDenDonViIds) > 0) {
            try {
                DB::beginTransaction();

                foreach ($vanBanDenDonViIds as $vanBanDenDonViId) {

                    $donViChuTri = DonViChuTri::where('van_ban_den_id', $vanBanDenDonViId)
                        ->where('can_bo_nhan_id', $currentUser->id)
                        ->whereNull('hoan_thanh')->first();

                    if ($donViChuTri) {
                        $donViChuTri->chuyen_tiep = DonViChuTri::CHUYEN_TIEP;
                        $donViChuTri->save();

                        DonViChuTri::where('van_ban_den_id', $vanBanDenDonViId)
                            ->where('id', '>', $donViChuTri->id)
                            ->whereNull('hoan_thanh')
                            ->delete();
                    }

                    $vanBanDen = VanBanDen::where('id', $vanBanDenDonViId)->first();
                    if ($vanBanDen) {
                        if (isset($vanBanTraLoi[$vanBanDenDonViId]) && !empty($vanBanTraLoi[$vanBanDenDonViId])) {
                            $vanBanDen->van_ban_can_tra_loi = VanBanDen::VB_TRA_LOI;
                            $vanBanDen->save();
                        }

                        if (!empty($danhSachPhoPhongIds[$vanBanDenDonViId])) {
                            $vanBanDen->trinh_tu_nhan_van_ban = 4;
                            $vanBanDen->save();
                        }

                        if (!empty($danhSachChuyenVienIds[$vanBanDenDonViId]) && empty($danhSachPhoPhongIds[$vanBanDenDonViId])) {
                            $vanBanDen->trinh_tu_nhan_van_ban = 5;
                            $vanBanDen->save();
                        }

                    }

                    //check van ban tra lai
                    $vanBanTraLai = VanBanTraLai::where('van_ban_den_id', $vanBanDenDonViId)
                        ->where('can_bo_nhan_id', $currentUser->id)
                        ->whereNull('status')->first();

                    if ($vanBanTraLai) {
                        $vanBanTraLai->status = VanBanTraLai::STATUS_GIAI_QUYET;
                        $vanBanTraLai->save();
                    }

                    $dataChuyenNhanVanBanDonVi = [
                        'van_ban_den_id' => $vanBanDenDonViId,
                        'can_bo_chuyen_id' => $currentUser->id,
                        'can_bo_nhan_id' => $danhSachPhoPhongIds[$vanBanDenDonViId],
                        'don_vi_id' => $currentUser->don_vi_id,
                        'parent_id' => $donViChuTri ? $donViChuTri->id : null,
                        'noi_dung' => $textnoidungPhoPhong[$vanBanDenDonViId],
                        'don_vi_co_dieu_hanh' => $donViChuTri->don_vi_co_dieu_hanh,
                        'vao_so_van_ban' => $donViChuTri->vao_so_van_ban,
                        'user_id' => $currentUser->id
                    ];



                    //chuyen nhan van ban don vi
                    if (!empty($danhSachPhoPhongIds[$vanBanDenDonViId])) {
                        $chuyenNhanVanBanPhoPhong = new DonViChuTri();
                        $chuyenNhanVanBanPhoPhong->fill($dataChuyenNhanVanBanDonVi);
                        $chuyenNhanVanBanPhoPhong->save();
                    }

                    // luu log dh van ban den pho phong
                    $luuVetVanBanDen = new LogXuLyVanBanDen();
                    $luuVetVanBanDen->fill($dataChuyenNhanVanBanDonVi);
                    $luuVetVanBanDen->save();

                    //save chuyen vien thuc hien
                    $dataChuyenNhanVanBanChuyenVien = [
                        'van_ban_den_id' => $vanBanDenDonViId,
                        'can_bo_chuyen_id' => $currentUser->id,
                        'can_bo_nhan_id' => $danhSachChuyenVienIds[$vanBanDenDonViId],
                        'don_vi_id' => $currentUser->don_vi_id,
                        'parent_id' => $donViChuTri ? $donViChuTri->id : null,
                        'noi_dung' => $textNoiDungChuyenVien[$vanBanDenDonViId],
                        'don_vi_co_dieu_hanh' => $donViChuTri->don_vi_co_dieu_hanh,
                        'vao_so_van_ban' => $donViChuTri->vao_so_van_ban,
                        'user_id' => $currentUser->id

                    ];

                    $chuyenNhanVanBanChuyenVienDonVi = new DonViChuTri();
                    $chuyenNhanVanBanChuyenVienDonVi->fill($dataChuyenNhanVanBanChuyenVien);
                    $chuyenNhanVanBanChuyenVienDonVi->save();

                    // luu log dh van ban den chuyen vien
                    $logChuyenVien = new LogXuLyVanBanDen();
                    $logChuyenVien->fill($dataChuyenNhanVanBanChuyenVien);
                    $logChuyenVien->save();

                    //delete chuyen vien phoi hop
                    ChuyenVienPhoiHop::where('van_ban_den_id', $vanBanDenDonViId)
                        ->where('don_vi_id', $currentUser->don_vi_id)
                        ->delete();

                    if (!empty($arrChuyenVienPhoiHopIds[$vanBanDenDonViId]) && count($arrChuyenVienPhoiHopIds[$vanBanDenDonViId]) > 0) {
                        //save chuyen vien phoi hop
                        ChuyenVienPhoiHop::savechuyenVienPhoiHop($arrChuyenVienPhoiHopIds[$vanBanDenDonViId],
                            $vanBanDenDonViId, $currentUser->don_vi_id);
                    }

                    //luu can bo xem de biet
                    LanhDaoXemDeBiet::where('van_ban_den_id', $vanBanDenDonViId)
                        ->where('don_vi_id', auth::user()->don_vi_id)
                        ->delete();

                    if (!empty($arrLanhDaoXemDeBiet[$vanBanDenDonViId])) {
                        LanhDaoXemDeBiet::saveLanhDaoXemDeBiet($arrLanhDaoXemDeBiet[$vanBanDenDonViId], $vanBanDenDonViId, $type = 1);
                    }
                }

                DB::commit();

                return redirect()->back()->with('success', 'Đã gửi thành công.');

            } catch (\Exception $e) {
                DB::rollback();
                dd($e);
            }

        }

        return redirect()->back()->with('warning', 'Không có dữ liệu.');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dieuhanhvanbanden::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dieuhanhvanbanden::edit');
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

    public function getCanBoPhoiHop($id, Request $request)
    {
        if ($request->ajax()) {

            $currentUser = auth::user();

            $donVi = $currentUser->donVi;

            $danhSachNguoiDung = User::role(CHUYEN_VIEN)
                ->where('don_vi_id', $currentUser->don_vi_id)
                ->whereNotIn('id', json_decode($id))
                ->where('trang_thai', ACTIVE)
                ->whereNull('deleted_at')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $danhSachNguoiDung
            ]);
        }
    }
}

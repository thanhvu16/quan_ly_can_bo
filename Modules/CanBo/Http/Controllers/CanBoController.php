<?php

namespace Modules\CanBo\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\CanBo;
use Modules\Admin\Entities\ToChuc;

class CanBoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('canbo::index');
    }

    public function canBo($id)
    {
        $danhSach = CanBo::paginate(20);
        return view('canbo::danh-sach-can-bo',compact('danhSach'));

    }
    public function getlistcb()
    {
        $donVi = ToChuc::get();
        $arayEcabinet = array();

        foreach ($donVi as $key=>$data)
        {
            $arayEcabinet[$key]['id'] = $data->id;
            $arayEcabinet[$key]['STT'] = $key+1;
            $arayEcabinet[$key]['pid'] = $data->parent_id;
            $arayEcabinet[$key]['Email'] = $data->email;
//            $arayEcabinet[$key]['status'] = 1;
            $arayEcabinet[$key]['name'] ="<b style='color: black'>$data->ten_don_vi</b>";
            $arayEcabinet[$key]['permissionValue'] = '<a href="danh-sach-don-vi/'.$data->id.'">Xem chi tiết</a>';
            $arayEcabinet[$key]['tacvu'] = '<a href="sua-don-vi-to-chuc/'.$data->id.'"'.'><i class="'.'fa fa-edit'.'"></i></a> &emsp; <a href="xoa-don-vi-to-chuc/'.$data->id.'"'.'><i style="color: red"class="'.'fa fa-trash'.'"></i></a> ';
        }


        return $arayEcabinet;
    }
    public function canBoDetail($id)
    {
        $canBo = CanBo:: where('id',$id)->first();
        return view('canbo::index',compact('canBo'));

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
}

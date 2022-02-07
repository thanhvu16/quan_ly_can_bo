<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><i
                            class="fa fa-file-image-o"></i> Cập nhật ảnh đại diện</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="sokyhieu" class="">Chọn tệp
                                tin<br><small><i>(file phải là ảnh dạng jpg,png,..)</i></small>
                            </label>

                            <input type="file" multiple name="ten_file"
                                   accept=".jpg,.png"/>
{{--                            <input type="hidden" value="{{$id}}" name="can_bo">--}}

                        </div>
                        <div class="form-group col-md-4" >
                            <button class="btn btn-primary"><i class="fa fa-cloud-upload"></i> Tải lên</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </form>
        </div>
    </div>
</div>

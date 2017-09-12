@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style=" padding-bottom:120px">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $err)
                            <div class="alert alert-warning text-center" role="alert">{{$err}}</div>
                        @endforeach
                    @endif
                    @if(Session::has('thanh_cong'))
                        <div class="alert alert-warning text-center" role="alert"> {{Session::get('thanh_cong')}}</div>
                    @endif
                    <form action="http://localhost:8000/admin/sanpham/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Nhập tên cho sản phẩm"  size="30"/>
                        </div>
                        <div class="form-group">
                            <label >Avatar</label>
                                <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" placeholder="Nhập tên giá sản phẩm" />
                        </div>
                        <div class="form-group">
                            <label>Discrible</label>
                            <textarea class="form-control" name="discrible" rows="3" placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input class="form-control" name="type" type="number" min="0" max="1" placeholder="Nhập loại sản phẩm "/>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" name="status" type="number" min="0" max="1" placeholder="Nhập trạng thái 1 or 0" />
                        </div>
                        <div class="form-group">
                            <label>Is_hot</label>
                            <input class="form-control" name="is_hot" type="number" min="0" max="1"  placeholder="Sản phẩm có hot không 1 or 0" />
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Rate_point</label>--}}
                            {{--<input class="form-control" name="rate_point" placeholder="Nhập điểm" />--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Rate_count</label>--}}
                            {{--<input class="form-control" name="rate_count" placeholder="Nhập số lượt" />--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>New</label>
                            <input class="form-control" name="new" type="number" min="0" max="1"  placeholder="Sản phẩm có mới không 1 or 0" />
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Lượt comment</label>--}}
                            {{--<input class="form-control" name="comment_count" placeholder="Nhập số lượt comment" />--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection

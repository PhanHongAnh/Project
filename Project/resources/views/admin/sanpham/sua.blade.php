@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>{{$sanpham->name}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="http://localhost:8000/admin/sanpham/sua/{{$sanpham->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">@if(count($errors)>0)
                            @foreach($errors->all() as $err)
                                <div class="alert alert-warning text-center" role="alert">{{$err}}</div>
                            @endforeach
                        @endif
                        @if(Session::has('thanh_cong'))
                            <div class="alert alert-warning text-center" role="alert"> {{Session::get('thanh_cong')}}</div>
                        @endif
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="" value="{{$sanpham->name}}" />
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input class="form-control" name="avatar" placeholder="" value="{{$sanpham->avatar}}"/>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="price" placeholder="" value="{{$sanpham->price}}"/>
                        </div>
                        <div class="form-group">
                            <label>Discrible</label>
                            <textarea class="form-control" name="discrible" rows="3" placeholder="" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <input class="form-control" name="type" placeholder=""value=" {{$sanpham->type}}" />
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" name="status" placeholder="" value="{{$sanpham->status}}"/>
                        </div>
                        <div class="form-group">
                            <label>Is_hot</label>
                            <input class="form-control" name="is_hot" placeholder="" value="{{$sanpham->is_hot}}"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Rate_point</label>--}}
                            {{--<input class="form-control" name="rate_point" placeholder="" value="{{$sanpham->rate_point}}"/>--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label>Rate_count</label>--}}
                            {{--<input class="form-control" name="rate_count" placeholder="" value="{{$sanpham->rate_count}}"/>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label>New</label>
                            <input class="form-control" name="new" placeholder="" value="{{$sanpham->new}}"/>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Lượt comment</label>--}}
                            {{--<input class="form-control" name="comment_count" placeholder="" value="{{$sanpham->comment_count}}"/>--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
            </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

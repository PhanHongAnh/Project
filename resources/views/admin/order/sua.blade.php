@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa
                        <small>{{$order->id}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="#" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>ID</label>
                            <input class="form-control" name="id" value="{{$order->id}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>User ID</label>
                            <input class="form-control" name="user_id" value="{{$order->user_id}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input class="form-control" type="number" min = 0 max = 1 name="status" value="{{$order->status}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
                <div class="col-lg-4" style="margin-top: 30px">
                    @if(Session::has('thongbao'))
                        <div class="alert alert-warning text-center" role="alert"> {{Session::get('thongbao')}}</div>
                    @endif
                </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
@endsection

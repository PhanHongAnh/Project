@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sửa
                        <small>{{$user->email}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="http://localhost:8000/admin/user/sua/{{$user->id}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Nhập tên " value="{{$user->name}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Nhập Email" value="{{$user->email}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{$user->address}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" placeholder="Nhập địa chỉ" value="{{$user->phone}}" readonly />
                        </div>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input class="form-control" name="birthday" type="date" placeholder="Nhập địa chỉ" value="{{$user->birthday}}" readonly/>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input class="form-control" name="role" type="number" min="0" max="1" placeholder="" value="{{$user->role}}" />
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label>Avatar</label>--}}
                            {{--<input class="form-control" name="avatar" placeholder="Nhập địa chỉ" value="{{$user->avatar}}"  />--}}
                        {{--</div>--}}
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </form>
                </div>
                <div class="col-lg-4 ">
                    @if(count($errors)>0)<br>
                    @foreach($errors->all() as $err)
                        <div class="alert alert-warning text-center" role="alert">{{$err}}</div>
                    @endforeach
                    @endif
                    @if(Session::has('thanh_cong'))
                        <div class="alert alert-success text-center" role="alert">
                            {{Session::get('thanh_cong')}}
                        </div>
                    @endif
                </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    </div>
@endsection

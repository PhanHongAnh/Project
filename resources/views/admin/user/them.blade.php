@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="http://localhost:8000/admin/user/them" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" placeholder="Nhập tên " />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" placeholder="Nhập Email" />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" type="password" placeholder="Nhập password" />
                        </div>
                        <div class="form-group">
                            <label>Re Password</label>
                            <input class="form-control" name="re_password" type="password" placeholder="Nhập lại password" />
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" placeholder="Nhập địa chỉ" />
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" placeholder="Nhập địa chỉ" />
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <label class="radio-inline">
                                    <input type="radio"  name="sex" value="Boy"> Boy
                                </label>
                                <label class="radio-inline">
                                    <input type="radio"  name="sex" value="Girl"> Girl
                                </label>
                            </div>
                        </div><br><br>
                        <div class="form-group">
                            <label>Birthday</label>
                            <input class="form-control" name="birthday" type="date" placeholder="Nhập địa chỉ" />
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <input class="form-control" name="role" type="number" min="0" max="1" placeholder="Nhập địa chỉ" />
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <div >
                                <label for="exampleInputFile">File input</label>
                                <input type="file" name="avatar">
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-default">Thêm</button>
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
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    @endsection

@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Danh Sách Người Dùng</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-4">
                    @if(Session::has('thongbao'))
                        <div class="alert alert-warning text-center" role="alert"> {{Session::get('thongbao')}}</div>
                    @endif
                </div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <td>Quyền</td>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $us)
                    <tr class="odd gradeX" align="center">
                        <td>{{$us->id}}</td>
                        <td>{{$us->name}}</td>
                        <td>{{$us->email}}</td>
                        @if($us->role)
                            <td>Admin</td>
                        @else
                            <td>User</td>
                        @endif
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="http://localhost:8000/admin/user/xoa/{{$us->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="http://localhost:8000/admin/user/sua/{{$us->id}}">Edit</a></td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
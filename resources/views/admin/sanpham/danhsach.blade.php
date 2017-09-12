@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Sản Phẩm
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-4">
                    @if(Session::has('thongbao'))
                        <div class="alert alert-warning text-center" role="alert"> {{Session::get('thongbao')}}</div>
                    @endif</div>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>New</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th>Is_hot</th>
                        <th>Delete</th>
                        <th>Edit</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sanpham as $sp)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sp->id}}</td>
                        <td>{{$sp->name}}</td>
                        <th>
                            @if($sp->new==1)
                                Mới
                            @else
                                Cũ
                            @endif
                        </th>
                        <th>
                            @if($sp->status==1)
                                Còn Hàng
                            @else
                                Hết Hàng
                            @endif
                        </th>
                        <th>
                            @if($sp->type==1)
                                Đồ ăn
                            @else
                                Đồ uống
                            @endif
                        </th>
                        <th>
                            @if($sp->is_hot==1)
                                Hot
                            @else
                                No Hot
                            @endif
                        </th>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="http://localhost:8000/admin/sanpham/xoa/{{$sp->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="http://localhost:8000/admin/sanpham/sua/{{$sp->id}}">Edit</a></td>
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
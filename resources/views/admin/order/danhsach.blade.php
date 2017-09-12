@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Order
                        <small>Oders</small>
                    </h1>
                </div>
                <div class="col-lg-4">
                    @if(Session::has('thongbao'))
                        <div class="alert alert-warning text-center" role="alert"> {{Session::get('thongbao')}}</div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User Id</th>
                        <th>Date Order </th>
                        <th>Total_Price </th>
                        <th>Trạng Thái </th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $pr)
                        <tr class="odd gradeX" align="center">
                            <td>{{$pr->id}}</td>
                            <td>{{$pr->user_id}}</td>
                            <td>{{$pr->order_time}}</td>
                            <td>${{$pr->total_price}}</td>
                            @if($pr->status)
                                <td>Đã giao</td>
                            @else
                                <td>Chưa giao</td>
                            @endif
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="http://localhost:8000/admin/order/xoa/{{$pr->id}}"> Delete</a></td>
                            <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="http://localhost:8000/admin/order/sua/{{$pr->id}}">Edit</a></td>

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
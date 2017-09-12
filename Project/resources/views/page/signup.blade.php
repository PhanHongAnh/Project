<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <title>Retaurant</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</head>
<body style="background: url({{asset('img/background/1.jpg')}})">
<div class="row" style="padding-top: 60px;">
        <div class="col-md-4 col-md-offset-2" style="border: 1px solid #b6a338;color: #dca7a7;padding: 15px">
            <form class="form-horizontal" action="{!! route('signup') !!}" method="post">
                @if(Session::has('thanh_cong'))
                    <div class="alert alert-success text-center" role="alert">{{Session::get('thanh_cong')}}</div>
                @endif
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <h3 class="text-center" style="font-family: 'Adobe Arabic';font-size: 40px">SIGN UP</h3>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Re Pw</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="re_password" placeholder="Re Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Sex</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio"  name="sex" value="Boy"> Boy
                        </label>
                        <label class="radio-inline">
                            <input type="radio"  name="sex" value="Girl"> Girl
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Birthday</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="birthday" placeholder="Birthday">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                </div>
                    <div style="padding-left: 72px">
                         <img src="{{asset('img/005.jpg')}}"alt="" id ='image1' style="width: 200px;height: 150px" >
                    </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-10">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="avatar">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" style="font-family: 'Arial Black'">SIGN UP</button>
                        <a href="http://localhost:8000/signin" style="font-family:'Arial Black'" >SIGN IN</a>
                        <a href="http://localhost:8000/trangchu" style="float: right;font-family: 'Arial Black';font-size: 16px;color:#dca7a7;margin-top:20px;text-decoration: none">BACK<span class=" glyphicon glyphicon-chevron-right"></span> </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4 ">
            @if(count($errors)>0)
            @foreach($errors->all() as $err)
                <div class="alert alert-warning text-center" role="alert">{{$err}}</div>
            @endforeach
            @endif
        </div>
</div>
<script>
    $(document).ready(function () {
        $('#image1').attr('src');
        console.log($('#image1').attr('src'));
        $('input[name=avatar]').on('change',function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image1').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        })
    })
</script>
</body>
</html>

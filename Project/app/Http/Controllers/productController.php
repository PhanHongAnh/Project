<?php

namespace App\Http\Controllers;
use App\Persons;
use App\Product;
use Illuminate\Http\Request;
use App\cart;
//use Illuminate\Session;
use Illuminate\Support\Facades\Session;
use App\Suggest;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use Mockery\Exception;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    public function product($id)
    {
        $sanpham = Product::where('id',$id)->first();
        $sanpham1 = Product::where('type',$sanpham->type)->where('id','<>',$sanpham->id)->get();

        return view('page.product',compact('sanpham','sanpham1'));
    }
    public function getdanhsach()
    {
        $sanpham = Product::all();
        return view('admin.sanpham.danhsach',compact('sanpham',$sanpham));
    }
    //Thêm
    public function getthem()
    {
        return view('admin.sanpham.them');
    }
    public function postthem(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required|unique:products,name|min:3|max:30|',
                'avatar'=>'required',
                'price'=>'required|min:0|max:500',
                'discrible'=>'required',
                'type'=>'required|min:0|max:1',
                'status'=>'required|min:0|max:1',
                'is_hot'=>'required|min:0|max:1',
//                'rate_point'=>'required|min:0|max:5',
//                'rate_count'=>'required',
                'new'=>'required|min:0|max:1',
//                'comment_count'=>'required',
            ],
            [
                'name.required'=>'Bạn chưa nhập name',
                'name.min'=>'Tên sản phẩm chứa ít nhất 3 ký tự',
                'name.max'=>'Tên sản phẩm chứa nhiều nhất 30 ký tự',
                'name.unique'=>'Tên sản phẩm bị trùng',
                'avatar.required'=>'Bạn chưa nhập avatar',
                'price.required'=>'Bạn chưa nhập price',
                'price.min'=>'Bạn chưa nhập đúng định dạng Price min  = 0, max = 500',
                'price.max'=>'Bạn chưa nhập đúng định dạng Price min  = 0, max = 500 ',
                'discrible.required'=>'Bạn chưa nhập discrible',
                'type.required'=>'Bạn chưa nhập type',
                'type.min'=>'type 0 or 1',
                'type.max'=>'type 0 or 1',
                'status.required'=>'Bạn chưa nhập status',
                'status.min'=>'status 0 or 1',
                'status.max'=>'status 0 or 1',
                'is_hot.required'=>'Bạn chưa nhập is_hot',
                'is_hot.min'=>'is_hot 0 or 1',
                'is_hot.max'=>'is_hot 0 or 1',
//                'rate_point.required'=>'Bạn chưa nhập rate_point',
//                'rate_count.required'=>'Bạn chưa nhập rate_count',
                'new.required'=>'Bạn chưa nhập new',
                'new.min'=>'new 0 or 1',
                'new.max'=>'new 0 or 1',
//                'rate_point.min'=>'Điểm rate pont min bằng 0',
//                'rate_point.max'=>'Điểm  rate point max bang 5',
//                'comment_count.required'=>'Bạn chưa nhập comment_count',
            ]);
        $sanpham = new Product;
        $sanpham->name = $request->name;
        $sanpham->avatar = $request->avatar;
        $sanpham->price = $request->price;
        $sanpham->discrible = $request->discrible;
        $sanpham->type = $request->type;
        $sanpham->status = $request->status;
        $sanpham->is_hot = $request->is_hot;
//        $sanpham->rate_point = $request->rate_point;
//        $sanpham->rate_count = $request->rate_count;
        $sanpham->new = $request->new;
//        $sanpham->comment_count = $request->comment_count;
        $sanpham->save();
        return redirect()->back()->with('thanh_cong','Thêm sản phẩm thành công');
    }
    //Sửa

    public function getsua($id)
    {
        $sanpham = Product::find($id);
        return view('admin.sanpham.sua',compact('sanpham',$sanpham));
    }
    public function postsua(Request $request,$id)
    {
        $sanpham = Product::find($id);
        $this->validate($request,
            [
//                'name'=>'required|unique:products,name|min:3|max:30|',
                'name'=>'required|min:3|max:30|',
                'avatar'=>'required',
                'price'=>'required|min:0|max:500',
                'discrible'=>'required',
                'type'=>'required|min:0|max:1',
                'status'=>'required|min:0|max:1',
                'is_hot'=>'required|min:0|max:1',
                'new'=>'required|min:0|max:1',
            ],
            [
                'name.required'=>'Bạn chưa nhập name',
                'name.min'=>'Tên sản phẩm chứa ít nhất 3 ký tự',
                'name.max'=>'Tên sản phẩm chứa nhiều nhất 30 ký tự',
                'name.unique'=>'Tên sản phẩm bị trùng',
                'avatar.required'=>'Bạn chưa nhập avatar',
                'price.required'=>'Bạn chưa nhập price',
                'price.min'=>'Bạn chưa nhập đúng định dạng Price min  = 0, max = 500',
                'price.max'=>'Bạn chưa nhập đúng định dạng Price min  = 0, max = 500 ',
                'discrible.required'=>'Bạn chưa nhập discrible',
                'type.required'=>'Bạn chưa nhập type',
                'type.min'=>'type 0 or 1',
                'type.max'=>'type 0 or 1',
                'status.required'=>'Bạn chưa nhập status',
                'status.min'=>'status 0 or 1',
                'status.max'=>'status 0 or 1',
                'is_hot.required'=>'Bạn chưa nhập is_hot',
                'is_hot.min'=>'is_hot 0 or 1',
                'is_hot.max'=>'is_hot 0 or 1',
                'new.required'=>'Bạn chưa nhập new',
                'new.min'=>'new 0 or 1',
                'new.max'=>'new 0 or 1',
            ]);
        $sanpham->name = $request->name;
        $sanpham->avatar = $request->avatar;
        $sanpham->price = $request->price;
        $sanpham->discrible = $request->discrible;
        $sanpham->type = $request->type;
        $sanpham->status = $request->status;
        $sanpham->is_hot = $request->is_hot;
        $sanpham->new = $request->new;
        $sanpham->save();
        return redirect()->back()->with('thanh_cong','Sửa thành công');

    }

    public function getxoa($id)
    {
        $sanpham = Product::find($id);
        $sanpham ->delete();
        return redirect('http://localhost:8000/admin/sanpham/danhsach')->with('thongbao','Bạn đã xoá thành công');
    }

    public function getcart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldCart = Session('cart')? Session::get('cart'):null;//Kiem tra xem trong session hiện tại có sp nào được mua hay chưa
//        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();

    }
    public function delcart($id)
    {
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart',$cart);
        }

        return redirect()->back();
    }
    public function getsuggest(){
        return view('page.suggest');
    }
    public function postsuggest(Request $req){
        $suggest = new Suggest();
        $suggest->user_id = Auth::user()->id;
        $suggest->name_product = $req->name;
        $suggest->status = 0;
        $suggest->save();
        return redirect()->back()->with('thongbao','Xin trân thành cảm ơn về sự gợi ý của bạn!! ');
    }

    public function getComment(Request $req,$id){
        return view('page.product');

    }
    public function postComment(Request $req,$id)
    {


        $comment = new Comment();
        $comment->user_id  = Auth::user()->id;
        $comment->comment = $req->comment;
        $comment->product_id = $id;
        $comment->save();
        $comment->product->comment_count +=1;
        $comment->product->save();
        return redirect()->action('productController@product', $id);
    }
    public function delComment(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $comment = Comment::find($id);
            $comment->delete($id);

            $product = Product::find($request->product_id);

            $product->comment_count -=1;
            $product->save();

            DB::commit();
            return redirect()->action('productController@product', $request->product_id);
        }
        catch (Exception $exception)
        {
            DB::rollBack();
        }
    }


}

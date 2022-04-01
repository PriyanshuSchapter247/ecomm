<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\jobs\ProductCreatedJob;



use Illuminate\Support\Str;class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        if (Auth::user()->role_as == '1') {
//
//            $products = Product::with(['category'])->paginate(2);
//
//            return view('admin.product.index', compact('products'));
//        }
//
//        $products['products'] = Product::where('user_id', '=', Auth::user()->id)->paginate(2);
//        return view('admin.product.index')->with($products);


        if(Auth::user()->role_as == 1){
            $products=  Product::with(['users'])->paginate(2);
        }
        else {
//            if (Auth::user()->role_as == 0) {
                $products = Product::where(['user_id' => Auth::user()->id])->paginate(2);
//            }
        }

        return view('admin.product.index',compact('products'));
    }


//        $products = Product::paginate(5);
//        $products['products'] = Product::with(['products'])->paginate(1);
//        return view('admin.product.index')->with($products);
//        $products['product'] =Product::where('created_by', '=', Auth::user()->id)->get();
//        return view('admin.product.index',compact('products'));
//        $products = Product::all();
//        return view('admin.product.index',compact('products'));


    public function add()
    {
        $category =  Category::all();
        return view('admin.product.add',compact('category'));
    }

    public function insert(ProductRequest $request)
    {

        $request->validated();
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $products->image = $filename;
        }


        $products-> cate_id = $request->input('cate_id');
//        $products['name'] = $request->name;
        $products-> name = $request->input('name');
        $products ['slug'] = Str::slug($products['name'], '-');
        $products-> small_description = $request->input('small_description');
        $products-> description = $request->input('description');
        $products-> original_price = $request->input('original_price');
        $products-> selling_price = $request->input('selling_price');
        $products-> image = $request->input('image');
        $products-> qty = $request->input('qty');
        $products-> taxsss = $request->input('taxsss');
        $products-> status = $request->input('status') == True ? '1':'0';
        $products-> trending = $request->input('trending')== True ? '1':'0';
        $products-> meta_title = $request->input('meta_title');
        $products-> meta_descrip = $request->input('meta_descrip');
        $products-> meta_keywords = $request->input('meta_keywords');
//        dd(auth()->user()->name);
        $products-> save();
        $products['name']=auth()->user()->name;
        $products['email']=auth()->user()->email;
        dispatch(new productCreatedJob($products));

//        Mail::to(auth()->user()->email )->send(
//            (new ProductCreated($products))
//        );
//        Mail::to(auth()->user()->email )->send(
//            (new ProductCreated($products))
//        );
        return redirect('product')->with('status',"Product Added Successfully");
    }

    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.product.edit', compact('products'));
    }

    public function update(ProductRequest $request , $id)
    {

        $request->validated();
        $products = Product::find($id);

        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $products->image;
            if (file::exists($path)) {
                file::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/products', $filename);
            $products->image = $filename;
        }
        $products-> cate_id = $request->input('cate_id');
        $products-> name = $request->input('name');
        $products-> slug = $request->input('slug');
        $products-> small_description = $request->input('small_description');
        $products-> description = $request->input('description');
        $products-> original_price = $request->input('original_price');
        $products-> selling_price = $request->input('selling_price');
        $products-> image = $request->input('image');
        $products-> qty = $request->input('qty');
        $products-> taxsss = $request->input('taxsss');
        $products-> status = $request->input('status') == True ? '1':'0';
        $products-> trending = $request->input('trending')== True ? '1':'0';
        $products-> meta_title = $request->input('meta_title');
        $products-> meta_descrip = $request->input('meta_descrip');
        $products-> meta_keywords = $request->input('meta_keywords');
        $products-> save();

        return redirect('products')->with('status', "product updated successfully" );
    }
    public function destroy($id)
    {
        $products = product::find($id);

        $path = 'assets/uploads/products/' . $products->image;
        if (file::exists($path)) {
            file::delete($path);
        }
        $products->delete();
        return redirect('products')->with('status',"Product deleted successfully");
    }
}


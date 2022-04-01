<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PhpParser\Node\Scalar\MagicConst\File;
use App\jobs\CategoryCreatedJob;

class
CategoryController extends Controller
{
    public function index()
    {



            if(Auth::user()->role_as == 1){
              $category=  Category::with(['products'])->paginate(2);
            }
            else {
//                if(Auth::user()->role_as == 0){
                $category = Category::where(['user_id' => Auth::user()->id])->paginate(5);
//            }
                }

            return view('admin.category.index',compact('category'));

//        $category = Category::with(['category'])->paginate(1);
//        return view('admin.category.index')->with($category);
//        $category = Category::all();
//        $category = DB::table('category')->paginate(5);
//         return view('admin.category.index', compact('category'));
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function insert(CategoryRequest $request)
    {
//         $request->validate([
//            'name' => 'required|max:155|min:3',
//            'description' => 'required|max:255|min:20',
////            'status' => 'required',
////            'popular' => 'required',
//            'meta_title' => 'required|max:155|min:3',
//            'meta_descrip' => 'required|max:255|min:5',
//            'meta_keywords' => 'required',
//        ]);
         //dd("hdjf");

        $request->validated();
        $category = new Category();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        $user_id = Auth::user()->id;
        $category->name = $request->input('name');
        $category ['slug'] = Str::slug($category['name'], '-');
        $category->user_id = $user_id;
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1' : '0';
        $category->popular = $request->input('popular') == True ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->save();
        $Category['name']=auth()->user()->name;
        $Category['email']=auth()->user()->email;
        dispatch( new CategoryCreatedJob($category));

//        Mail::to($category['email'] )->send(
//            (new CategoryCreated($category))
//        );
//        Mail::to(auth()->user()->email )->send(
//            (new CategoryCreated($category))
//        );
        return redirect('/dashboard')->with('status', 'category added successfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
//        $request->validate([
//            'name' => 'required|max:155|min:3',
//            'description' => 'required|max:255|min:20',
////            'status' => 'required',
////            'popular' => 'required',
//            'meta_title' => 'required|max:155|min:3',
//            'meta_descrip' => 'required|max:255|min:5',
//            'meta_keywords' => 'required',
//        ]);


        $request->validate();
        $category = Category::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/category/' . $category->image;
            if (file::exists($path)) {
                file::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/category', $filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
//        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True ? '1' : '0';
        $category->popular = $request->input('popular') == True ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_descrip = $request->input('meta_descrip');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->update;
        return redirect('dashboard')->with('status', 'category update successfully');

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->image) {
            $path = 'assets/uploads/category/' . $category->image;
            if (file::exists($path)) {
                file::delete($path);
            }
            $category->delete();
            return redirect('categories')->with('status', 'category delete successfully');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $products = Product::with(['user', 'category'])->where('user_id', Auth::user()->id)->get();
        return view('admin.product.index', ['products' => $products]);
    }

    public function add()
    {
        $getNextId = DB::table('information_schema.TABLES')
            ->where('TABLE_NAME', '=', 'products')
            ->get();
        $nextId = $getNextId[0]->AUTO_INCREMENT;

        $categories = Category::all();
        $images = Image::whereNull('product_id')->where('user_id', Auth::user()->id)->orderByRaw('created_at DESC')->get();
        return view('admin.product.add', [
            'categories' => $categories,
            'images' => $images,
            'nextId' => $nextId
        ]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'discount' => ['required'],
            'description' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('product_add')
                ->withErrors($validator);
        }

        $images_str_id = json_decode($request->images);

        $images_id = [];
        foreach ($images_str_id->image_ids as $isi) {
            array_push($images_id, (int)$isi);
        }

        if ($request->category == 0) {
            return redirect()->route('product')->with('error', 'Wrong data!');
        }

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'discount' => $request->discount,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
        ];
        if (isset($request->thumbnail)) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imageName);
            $img = 'images/' . $imageName;
            $data['thumbnail'] = $img;
        } else {
            $data['thumbnail'] = 'images/no-image.png';
        }
        $product = Product::create($data);
        Image::whereIn('id', $images_id)->update(['product_id' => $product->id]);
        return redirect()->route('product')->with('message', 'Product created!');
    }

    public function add_category(Request $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ];
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $img = 'images/' . $imageName;
            $data['image'] = $img;
        } else {
            $data['image'] = 'images/no-image.png';
        }
        $cate = Category::create($data);
        return response()->json(['success' => 'Category added!', 'cate' => $cate]);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->where('user_id', Auth::user()->id)->get();

        $categories = Category::all();
        $images = Image::whereNull('product_id')
            ->orWhere('product_id', $id)
            ->orderByRaw('created_at DESC')
            ->get();
        return view('admin.product.edit', [
            'product' => $product[0],
            'categories' => $categories,
            'images' => $images
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'discount' => ['required'],
            'description' => ['required', 'string', 'max:255']
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('product_add')
                ->withErrors($validator);
        }

        if ($request->category == 0) {
            return redirect()->route('product')->with('error', 'Wrong data!');
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category;

        if (isset($request->thumbnail)) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('images'), $imageName);
            $img = 'images/' . $imageName;
            $product->thumbnail = $img;
        } else {
            $product->thumbnail = 'images/no-image.png';
        }
		$product->save();
		$product->update();
        return redirect()->route('product')->with('message', 'Product updated!');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        $deleted = $product->delete();
        if ($deleted === 0)
            return redirect()
                ->route('product')
                ->with('warning', 'Can not delete product!');

		return redirect()
			->route('product')
			->with('message', 'Product deleted');
    }
}

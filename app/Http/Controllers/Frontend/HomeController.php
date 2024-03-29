<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Subcategory;
use App\Models\Products\Category;
use App\Models\Products\Childcategory;
use App\Models\Products\Product;
use \App\Models\Products\Size;
use App\Models\Products\Color;

class HomeController extends Controller
{
    public function home()
    {
        // $testimonials = Testimonial::where('is_active', 1)
        // ->latest('id')
        // ->limit(3)
        // ->select(['id', 'client_name', 'client_designation', 'client_message', 'client_image'])
        // ->get();

        // $categories = Category::where('is_active', 1)
        // ->latest('id')
        // ->limit(6)
        // ->select(['id', 'title','category_image','slug'])
        // ->get();

        // $products = Product::where('status',1)
        // ->latest('id')
        // ->select('id','category_id','product_name','price', 'image','show_frontend','size','color')
        // ->paginate(6);
        // $size_edit = explode(',', $products->size); // Remove unnecessary '?'
        // $sizes =Size::where('company_id', company())->get();
        // $color_edit = explode(',', $products->color); // Remove unnecessary '?'
        // $colors =Color::where('company_id', company())->get();

        // $bestsell = Product::where('is_best_seller',1)
        // ->latest('id')
        // ->limit(6)
        // ->select('id','is_best_seller','name','slug','product_price', 'product_stock', 'product_rating', 'product_image')
        // ->get();

        // return $categories;
        // return $testimonials;
        // return view('frontend.pages.home',compact('products','sizes','size_edit'));

            $products = Product::where('show_frontend', 1)
        ->latest('id')
        ->select('id', 'category_id', 'product_name', 'price', 'image', 'show_frontend', 'size', 'color','description')
        ->paginate(6);
            $kids = Product::where('show_frontend', 3)
        ->latest('id')
        ->select('id', 'category_id', 'product_name', 'price', 'image', 'show_frontend', 'size', 'color','description')
        ->paginate(6);
            $womens = Product::where('show_frontend', 2)
        ->latest('id')
        ->select('id', 'category_id', 'product_name', 'price', 'image', 'show_frontend', 'size', 'color','description')
        ->paginate(6);
            $accessories = Product::where('show_frontend', 4)
        ->latest('id')
        ->select('id', 'category_id', 'product_name', 'price', 'image', 'show_frontend', 'size', 'color','description')
        ->paginate(6);
            $bestsell = Product::where('show_frontend', 5)
        ->latest('id')
        ->select('id', 'category_id', 'product_name', 'price', 'image', 'show_frontend', 'size', 'color','description')
        ->paginate(6);

        return view('frontend.pages.home', compact('products','kids','womens','accessories','bestsell'));

    }

    public function subCategory($category_id)
    {
        $show_subcategory = Subcategory::where('category_id',$category_id)->get();
        $cat=Category::find($category_id);
        // return $show_subcategory;
        $subcategorys = Subcategory::where('category_id',$category_id)->orderBy('id', 'desc')->limit(6)->get();
        // return $show_subcategory;
        return view('product.subcategory',compact('show_subcategory','subcategorys','cat'));

    }
    public function childCategory($category_id,$subcategory_id)
    {
        $show_childcategory = Childcategory::where('subcategory_id',$subcategory_id)->get();
        $sub_cat=Subcategory::find($subcategory_id);
        $cat=Category::find($category_id);
        $child_advertise = Childcategory::where('subcategory_id',$subcategory_id)->orderBy('id', 'desc')->limit(6)->get();
        return view('product.childcategory',compact('show_childcategory','child_advertise','cat','sub_cat'));

    }
    public function childCategoryProductList($category_id,$subcategory_id=false,$childcategory_id=false)
    {
        $child_cat=$sub_cat=false;
        $product =Product::select('id','product_name','price','image');
        if($childcategory_id){
            $product =$product->where('childcategory_id', $childcategory_id);
            $child_cat=ChildCategory::find($childcategory_id);
            $sub_cat=SubCategory::find($subcategory_id);
        }else if($subcategory_id){
            $product =$product->where('subcategory_id', $subcategory_id);
            $sub_cat=SubCategory::find($subcategory_id);
        }else{
            $product =$product->where('category_id', $category_id);
        }

        $cat=Category::find($category_id);
        $product =$product->paginate(6);

        // return $product;
        return view('frontend.pages.widgets.childcatproduct',compact('product','cat','sub_cat','child_cat'));
    }

    public function productDetails($id)
    {
        $product=Product::where('id',$id)
        ->with('category','productImages')
        ->first();
        $sizes=Size::whereIn('id',explode(',',$product?->size))->get();
        $colors=Color::whereIn('id',explode(',',$product?->color))->get();

        $releted_products=Product::whereNot('id',$id)->select('id','product_name','description','price','image')
        ->limit(4)
        ->get();
        return view('frontend.pages.single-product',compact('product','releted_products','sizes','colors'));
    }

    public function offerProduct()
    {
        $offerproduct = Product::where('show_frontend', 5)->where(company())->paginate(12);
        return view('frontend.pages.widgets.offerproduct',compact('offerproduct'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\Auth\ContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::query()->sorted()->get();
        $sliders = Slider::query()->sorted()->get();
        $products = Product::query()->active()->sorted()->orderByDesc('created_at')->take(3)->get();
        $listProduct = Product::query()->active()->inRandomOrder()->take(8)->get();
        $subCategories = Category::query()->active()->whereNotNull('parent_category')->get();
        return view('website.pages.home', compact('sliders', 'banners', 'products', 'listProduct','subCategories'));
    }
    
    public function categories()
    {
        $categories = Category::query()->active()->whereNull('parent_category')->get();
        return view('website.pages.category.main-categories' , compact('categories'));
    }

    public function changeLang()
    {
        if ($local = request('lang')) {
            app()->setLocale(request('lang'));
            App::setLocale($local);
            Config::set('translatable.locale', $local);
            Session::put('lang', $local);
            return redirect()->back();
        }
    }

    public function about()
    {
        return view('website.pages.about');
    }

    public function contact()
    {
        return view('website.pages.contact');
    }

    public function contactUs(Request $request)
    {
        $flight = Contact::create([
            'name' => $request->name,
            'email'=>$request->email,
            'message'=>$request->message,
        ]);
        Session::flash('success', __('front.receive_message'));
        return redirect()->route('user.index');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\cart;
use App\product;
use App\category;
use App\history;

class PediaController extends Controller
{

    Function Home()
    {
        $auth = Auth::check();
        $inventory = product::where('price', '>', '1')->paginate(3);
        return view('Home', ['auth'=>$auth], ['inventory'=>$inventory]);
    }

    Function loginPage()
    {
        $auth = Auth::check();
        return view('Login' , ['auth'=>$auth]);
    }

    Function login(Request $request)
    {
        $info = $request->only('email', 'password');

        $result = Auth::attempt($info);
        $inventory = product::where('price', '>', '10000')->paginate(3);
        $role = Auth::User()->role;
        if($request->get('remember_me')){
            $email = Auth::user()->email;
        }
        if($role == 'member'){
            return view('Home', ['auth'=>$result], ['inventory'=>$inventory]);
        }else{
            return view('Admin', ['auth'=>$result]);
        }
        
    }

    Function Logout()
    {
        Auth::logout();
        $inventory = product::where('price', '>', '1')->paginate(3);
        return view('Home', ['auth'=>false], ['inventory'=>$inventory]);
    }

    Function RegisterPage()
    {
        $auth = Auth::check();
        return view('Register' , ['auth'=>$auth]);
    }

    Function Register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:5'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'member',
        ]);

        $inventory = product::where('price', '>', '1')->paginate(3);
        $auth = Auth::check();

        return view('home', ['auth'=>$auth], ['inventory'=>$inventory]);
    }

    Function ProductDetails($id)
    {
        $auth = Auth::check();
        $inventory = product::where('id', '=', $id)->paginate();
        return view('ProductDetails', ['auth'=>$auth], ['inventory'=>$inventory]);
    }

    Function AddToCartPage($id)
    {
        $auth = Auth::check();
        $inventory = product::where('id', '=', $id)->paginate();
        return view('AddToCart', ['auth'=>$auth],  ['inventory'=>$inventory]);
    }

    Function AddToCart(Request $request)
    {
        $auth = Auth::check();
        cart::create([
            'userid' => Auth::user()->id,
            'image' => Auth::user()->product->image,
            'productname' => Auth::user()->product->name,
            'quantity' => $request->quantity,
            'totalprice' => Auth::user()->product->price
        ]);

        $inventory = product::where('price', '>', '1')->paginate(3);

        return view('Home', ['auth'=>$auth], ['inventory'=>$inventory]);
    }

    Function Cart()
    {
        $auth = Auth::check();
        $cart = cart::where('id', 'like', Auth::user()->id);
        return view('Cart', ['auth'=>$auth], ['cart'=>$cart]);
    }

    Function DeleteCart($id)
    {
        $auth = Auth::check();
        $cart = cart::where('id', 'like', Auth::user()->id);
        DB::delete('DELETE FROM _carts WHERE id=?',[$id]);
        return view('Cart', ['auth'=>$auth], ['cart'=>$cart]);
    }

    Function PlusCart()
    {
        $auth = Auth::check();
        $cart = cart::where('id', 'like', Auth::user()->id);
        cart::where('userid',Auth::user()->id)->update([
            'quantity' => Auth::user()->cart->quantity + 1,
        ]);
        return view('Cart', ['auth'=>$auth], ['cart'=>$cart]);
    }

    Function MinusCart()
    {
        $auth = Auth::check();
        $cart = cart::where('id', 'like', Auth::user()->id);
        cart::where('userid',Auth::user()->id)->update([
            'quantity' => Auth::user()->cart->quantity - 1,
        ]);
        return view('Cart', ['auth'=>$auth], ['cart'=>$cart]);
    }

    Function Checkout()
    {
        $auth = Auth::check();
        $id = Auth::user()->id;
        DB::delete('DELETE FROM _carts WHERE id=?',[$id]);

        history::create([
            'userid' => Auth::user()->id,
            'image' => Auth::user()->cart->image,
            'name' => Auth::user()->cart->name,
            'quantity' => Auth::user()->cart->quantity,
            'price' => Auth::user()->product->price
        ]);

        $inventory = product::where('price', '>', '1')->paginate(3);

        return view('home', ['auth'=>$auth], ['inventory'=>$inventory]);
    }

    Function History()
    {
        $auth = Auth::check();
        $transaction = history::all();
        return view('History', ['auth'=>$auth], ['transaction'=>$transaction]);

    }

    Function Admin()
    {
        $auth = Auth::check();
        return view('Admin', ['auth'=>$auth]);
    }

    Function AddProductPage()
    {
        $auth = Auth::check();
        return view('AddProduct', ['auth'=>$auth]);
    }

    Function AddProduct(Request $request)
    {
        $auth = Auth::check();

        $products = new product();

        $products->name = $request->input('name');
        $products->category = $request->input('category');
        $products->description = $request->input('description');
        $products->price = $request->input('price');

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/product/', $filename);
            $products->image = $filename;
        } else {
            return $request;
            $products->image = '';
        }

        $products->save();      

        $category = new category();
        $category->category = $request->input('category');
        $category->save();

        return view('AddProduct', ['auth'=>$auth])->with('AddProducts', $products);

    }

    Function ProductList()
    {
        $auth = Auth::check();
        $produc = product::where('price', '>', '1')->paginate(3);
        return view('ListProduct', ['auth'=>$auth], ['produc'=>$produc]);
    }
    
    Function ProductIndex()
    {
        $users = DB::select('SELECT * FROM products');
    }

    Function DeleteProduct($id)
    {
        $auth = Auth::check();
        $produc = product::where('price', '>', '1')->paginate(3);
        DB::delete('DELETE FROM products WHERE id=?',[$id]);
        return view('listProduct', ['auth'=>$auth], ['produc'=>$produc]);
    }

    Function AddCategoryPage()
    {
        $auth = Auth::check();
        return view('addCategory', ['auth'=>$auth]);
    }

    Function AddCategory(Request $request)
    {
        $auth = Auth::check();

        category::create([
            'category' => $request->category
        ]);

        return view('addCategory', ['auth'=>$auth]);
    }

    Function CategoryList()
    {
        $auth = Auth::check();
        $prod = product::all();
        $category = category::all();
        return view('listCategory', ['auth'=>$auth], ['category'=>$category], ['prod'=>$prod]);
    }
    
}

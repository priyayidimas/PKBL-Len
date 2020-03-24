<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('demo', function () {
    return view('ckeditor');
});
Route::get('login', function () {
    if (!Auth::check()) {
        return view('admin.login');
    }else{
        return Redirect::to('admin/dashboard');
    }
});
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@login');
//ADMIN AREA
Route::get('admin', function () {
    if (!Auth::check()) {
        return abort('404');
    } else {
        return Redirect::to('admin/dashboard');    
    }
});
Route::get('admin/dashboard', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.dashboard');
});
//Blog
Route::get('admin/blog', function () {
    if (!Auth::check()) {
       return abort('404');
      }
    return view('admin.blog.index');
});
Route::get('admin/blog/add', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.blog.add');
});
Route::get('admin/blog/edit/{slug}', function ($slug) {
    if (!Auth::check()) {
       return abort('404');
    }
    $blog = DB::table('z_blog')->where('slug','=',$slug)->first();
    return view('admin.blog.edit',['blog' => $blog]);
});
Route::get('admin/blog/category', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.blog.category');
});
Route::get('admin/blog/tag', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.blog.tag');
});
Route::get('deleteBlog/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.blog.delete',['id' => $did]);
});
Route::get('editBlogCat/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.blog.editCat',['id' => $did]);
});
Route::get('editBlogTag/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.blog.editTag',['id' => $did]);
});
Route::get('search', 'BlogController@search');
Route::post('addBlog', 'BlogController@addBlog');
Route::post('updateBlog', 'BlogController@updateBlog');
Route::post('deleteBlog', 'BlogController@deleteBlog');
Route::post('addBlogCat', 'BlogController@addBlogCat');
Route::post('updateBlogCat', 'BlogController@updateBlogCat');
Route::get('deleteBlogCat/{id}', 'BlogController@deleteBlogCat');
Route::post('addBlogTag', 'BlogController@addBlogTag');
Route::post('updateBlogTag', 'BlogController@updateBlogTag');
Route::get('deleteBlogTag/{id}', 'BlogController@deleteBlogTag');
//Products
Route::get('admin/products', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.products.index');
});
Route::get('admin/products/add', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.products.add');
});
Route::get('admin/products/category', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.products.category');
});
Route::get('admin/products/edit/{slug}', function ($slug) {
    if (!Auth::check()) {
       return abort('404');
    }
    $product = DB::table('z_product')->where('slug','=',$slug)->first();
    return view('admin.products.edit',['product' => $product]);
});
Route::get('deleteProduct/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.products.delete',['id' => $did]);
});
Route::get('editProductCat/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.products.editCat',['id' => $did]);
});

Route::post('addProduct', 'ProductController@addProduct');
Route::post('updateProduct', 'ProductController@updateProduct');
Route::post('deleteProduct', 'ProductController@deleteProduct');
Route::post('addProductCat', 'ProductController@addProductCat');
Route::post('updateProductCat', 'ProductController@updateProductCat');
Route::get('deleteProductCat/{id}', 'ProductController@deleteProductCat');
//Pages
Route::get('admin/pages', function () {
    if (!Auth::check()) {
        return abort('404');
    }
    return view('admin.pages.index');
});
Route::get('editMenu/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.pages.editMenu',['id' => $did]);
});
Route::get('editPage/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.pages.editPage',['id' => $did]);
});
Route::post('addPage', 'BlogController@addPage');
Route::post('addMenu', 'BlogController@addMenu');
Route::post('updatePage', 'BlogController@updatePage');
Route::get('deletePage/{id}', 'BlogController@deletePage');
//Gallery
Route::get('admin/gallery', function () {
    if (!Auth::check()) {
        return abort('404');
    }
    return view('admin.gallery.index');
});
Route::get('editGallery/{id}', function ($id) {
    if (!Auth::check()) {
       return abort('404');
    }
    $did = Crypt::decryptString($id);
    return view('admin.gallery.edit',['id' => $did]);
});
Route::post('addGallery', 'ConfigController@addGallery');
Route::post('updateGallery', 'ConfigController@updateGallery');
Route::get('deleteGallery/{id}', 'ConfigController@deleteGallery');
//Config
Route::get('admin/config', function () {
    if (!Auth::check()) {
       return abort('404');
    }
    return view('admin.config.dashboard');
});

//CLIENT AREA
// Route::get('blog', function () {
//     return view('blog.content');
// });
Route::get('blog', function () {
    $blogs = DB::table('z_blog')->orderBy('created_at','desc')->paginate(5);
    return view('blog.blog',["blogs" => $blogs]);
});
Route::get('blog/{slug}', function ($slug) {
    $blog = DB::table('z_blog')->where('slug','=',$slug)->first();
    return view('blog.content',["blog" => $blog]);
});
Route::get('blog/category/{slug}', function ($slug) {
    $cat = DB::table('z_blog_cat')->where('slug','=',$slug)->first();
    $trans = DB::table('z_trans_blog_cat')->where('category_id','=',$cat->id)->orderBy('created_at','desc')->paginate(5);
    return view('blog.category',["trans" => $trans, "curCat" => $cat->title]);
});
Route::get('blog/tag/{slug}', function ($slug) {
    $cat = DB::table('z_blog_tag')->where('slug','=',$slug)->first();
    $trans = DB::table('z_trans_blog_tag')->where('tag_id','=',$cat->id)->orderBy('created_at','desc')->paginate(5);
    return view('blog.tag',["trans" => $trans, "curCat" => $cat->title]);
});
//PRODUCT
// Route::get('products', function () {
//     return view('products.product');
// });
Route::get('products/{slug}', function ($slug) {
    $product = DB::table('z_product')->where('slug','=',$slug)->first();
    return view('products.product',["product" => $product]);
});
Route::get('products/category/{slug}', function ($slug) {
    $cat = DB::table('z_product_cat')->where('slug','=',$slug)->first();
    $trans = DB::table('z_trans_product_cat')->where('category_id','=',$cat->id)->orderBy('created_at','desc')->paginate(12);
    return view('products.category',["trans" => $trans, "curCat" => $cat->title]);
});

Route::get('cek', function () {
    return view('admin.config.cek');
});
Route::post('post', function () {
    // foreach (Input::get('sel') as $value) {
    //     echo $value;
    // }
    foreach (Input::get('category') as $value) {
       echo $value.",";
    }
});
Route::get('pag', function () {
    $usaha = DB::table('usaha')->paginate();
    return view('admin.config.pag', compact('usaha'));
});

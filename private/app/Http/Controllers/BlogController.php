<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use Carbon;
use Redirect;
use Crypt;
class BlogController extends Controller
{
    public function addBlogCat()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&()'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "created_at" => Carbon::now()
        );
        if (Input::get('deskripsi') != null) {
            $data["description"] = Input::get('deskripsi');
        }
        $data['parent_id'] = (Input::get('parent_id') == "null") ? null : Input::get('parent_id');
        DB::table('z_blog_cat')->insert($data);
        return Redirect::to('/admin/blog/category')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Kategori']);
    }
    public function addBlogTag()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "description" => Input::get('deskripsi'),
            "created_at" => Carbon::now()
        );
        DB::table('z_blog_tag')->insert($data);
        return Redirect::to('/admin/blog/tag')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Kategori']);
    }
    public function addBlog()
    {
        $data = array(
            "title" => Input::get('title'),
            "content" => Input::get('content'),
            "slug" => Input::get('slug'),
            "published_at" => Carbon::now()->format('Y-m-d'),
            "created_at" => Carbon::now(),
            "description" => "Just Description",
            "masthead" => Input::get('masthead')
        );
        DB::table('z_blog')->insert($data);
        $id = DB::table('z_blog')->where('slug','=',Input::get('slug'))->first()->id;
        foreach (Input::get('category') as $cat) {
            $dataCat = array(
                "blog_id" => $id,
                "category_id" => $cat,
                "created_at" => Carbon::now()
            );
            DB::table('z_trans_blog_cat')->insert($dataCat);
        }
        $tags = explode(',',Input::get('tags'));
        foreach ($tags as $tag) {
            if ($tag != "") {
                $slug = str_replace(str_split('\\/:*?"<>|&'), '', $tag);
                $slug = strtolower(str_replace(' ','-',$slug));
                $cek = DB::table('z_blog_tag')->where('slug','=',$slug)->count();
                if ($cek < 1) {
                    $dataTag = array(
                        "slug" => $slug,
                        "title" => $tag,
                        "created_at" => Carbon::now()
                    );
                    DB::table('z_blog_tag')->insert($dataTag);
                }
                $var = DB::table('z_blog_tag')->where('slug','=',$slug)->first()->id;
                DB::table('z_trans_blog_tag')->insert(["blog_id" => $id, "tag_id" => $var ,"created_at" => Carbon::now()]);     
            }
        }
        return Redirect::to('/admin/blog')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Artikel']);
    }
    public function updateBlog()
    {
        $data = array(
            "title" => Input::get('title'),
            "content" => Input::get('content'),
            "slug" => Input::get('slug'),
            "description" => "Just Description",
            "masthead" => Input::get('masthead')
        );
        DB::table('z_blog')->where('id','=',Input::get('id'))->update($data);
        DB::table('z_trans_blog_cat')->where('blog_id','=',Input::get('id'))->delete();
        foreach (Input::get('category') as $cat) {
            $dataCat = array(
                "blog_id" => Input::get('id'),
                "category_id" => $cat
            );
            DB::table('z_trans_blog_cat')->insert($dataCat);
        }

        DB::table('z_trans_blog_tag')->where('blog_id','=',Input::get('id'))->delete();        
        $tags = explode(',',Input::get('tags'));
        foreach ($tags as $tag) {
            if ($tag != "") {            
                $slug = str_replace(str_split('\\/:*?"<>|&'), '', $tag);
                $slug = strtolower(str_replace(' ','-',$slug));
                $cek = DB::table('z_blog_tag')->where('slug','=',$slug)->count();
                if ($cek < 1) {
                    $dataTag = array(
                        "slug" => $slug,
                        "title" => $tag,
                        "created_at" => Carbon::now()
                    );
                    DB::table('z_blog_tag')->insert($dataTag);
                }
                $var = DB::table('z_blog_tag')->where('slug','=',$slug)->first()->id;
                DB::table('z_trans_blog_tag')->insert(["blog_id" => Input::get('id'), "tag_id" => $var]);  
            }          
        }
        return Redirect::to('/admin/blog')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Artikel']);
    }
    public function deleteBlog()
    {
        $id = Input::get('id');
        DB::table('z_blog')->where('id','=',Input::get('id'))->delete();
        DB::table('z_trans_blog_cat')->where('blog_id','=',$id)->delete();                        
        DB::table('z_trans_blog_tag')->where('blog_id','=',$id)->delete();                        
        DB::table('z_page')->where('blog_id','=',$id)->delete();                        
        return Redirect::to('/admin/blog')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Artikel']);
    }
    public function updateBlogCat()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "created_at" => Carbon::now()
        );
        if (Input::get('deskripsi') != null) {
            $data["description"] = Input::get('deskripsi');
        }
        $data['parent_id'] = (Input::get('parent_id') == "") ? null : Input::get('parent_id');
        DB::table('z_blog_cat')->where('id','=',Input::get('id'))->update($data);
        return Redirect::to('/admin/blog/category')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Kategori']);
    }
    public function updateBlogTag()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "description" => Input::get('deskripsi'),
            "created_at" => Carbon::now()
        );
        DB::table('z_blog_tag')->where('id','=',Input::get('id'))->update($data);
        return Redirect::to('/admin/blog/tag')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Kategori']);
    }
    public function deleteBlogCat($id)
    {
        $did = Crypt::decryptString($id);
        DB::table('z_blog_cat')->where('id','=',$did)->delete();
        DB::table('z_trans_blog_cat')->where('category_id','=',$did)->delete();                        
        return Redirect::to('/admin/blog/category')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Kategori']);
    }
    public function deleteBlogTag($id)
    {
        $did = Crypt::decryptString($id);
        DB::table('z_blog_tag')->where('id','=',$did)->delete();
        DB::table('z_trans_blog_tag')->where('tag_id','=',$did)->delete();                
        return Redirect::to('/admin/blog/tag')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Tag']);
    }
    public function addPage()
    {
        $data = array(
            "title" => Input::get('title'),
            "blog_id" => Input::get('blog_id')
        );
        if (Input::has('page_id')) {
           $data['page_id'] = Input::get('page_id');
        }
        DB::table('z_page')->insert($data);        
        return Redirect::to('/admin/pages/')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Halaman']);
        
    }
    public function addMenu()
    {
        $data = array(
            "title" => Input::get('title'),
        );
        DB::table('z_page')->insert($data);        
        return Redirect::to('/admin/pages/')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Menu']);
    }
    public function updatePage()
    {
        $id = Input::get('id');
        $data['title'] = Input::get('title');
        $data['blog_id'] = (Input::has('blog_id')) ? Input::get('blog_id') : null;
        DB::table('z_page')->where('id','=',$id)->update($data);
        return Redirect::to('/admin/pages/')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Menu / Halaman']);
        
    }
    public function deletePage($id)
    {
        $did = Crypt::decryptString($id);        
        DB::table('z_page')->where('id','=',$did)->delete();
        DB::table('z_page')->where('page_id','=',$did)->delete();
        return Redirect::to('/admin/pages/')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Menu / Halaman']);
    }
    public function search()
    {
        $key = Input::get('key');
        $blogs = DB::table('z_blog')->whereRaw("content LIKE '%$key%' OR title LIKE '%$key%'");
        $products = DB::table('z_product')->where('title','LIKE',"%$key%");
        return view("search",compact("key","blogs","products"));
    }
}

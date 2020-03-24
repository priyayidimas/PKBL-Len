<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;
use Carbon;
use Crypt;
use Redirect;
class ProductController extends Controller
{
    public function addProductCat()
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
        $data['description'] = (Input::get('deskripsi') == null) ? null : Input::get('deskripsi');
        $data['parent_id'] = (Input::get('parent_id') == "null") ? null : Input::get('parent_id');
        DB::table('z_product_cat')->insert($data);

        return Redirect::to('/admin/products/category')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Kategori']);
    }
    public function addProduct()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $harga = str_replace(",","",Input::get('harga')) + 0;
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "harga" => $harga,
            "deskripsi" => Input::get('deskripsi'),
            "category_id" => Input::get('category_id'),            
            "usaha_id" => Input::get('usaha_id'),
            "created_at" => Carbon::now(),
        );
          
        $data['foto1'] = (Input::get('foto1') == null) ? null : Input::get('foto1');
        $data['foto2'] = (Input::get('foto2') == null) ? null : Input::get('foto2');
        $data['foto3'] = (Input::get('foto3') == null) ? null : Input::get('foto3');
        $data['foto4'] = (Input::get('foto4') == null) ? null : Input::get('foto4');
        DB::table('z_product')->insert($data);

        $id = DB::table('z_product')->where('slug','=',$slug)->first()->id; 
        $cat = Input::get('category_id'); 
        $cek = DB::table('z_product_cat')->where('id','=',$cat)->first();    
        if($cek->parent_id != null){
            DB::table('z_trans_product_cat')->insert(['product_id' => $id, 'category_id' => $cek->parent_id]);
        }
        DB::table('z_trans_product_cat')->insert(['product_id' => $id, 'category_id' => $cat]);                
        return Redirect::to('/admin/products')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Produk']);
    }
    public function updateProduct()
    {
        $slug = str_replace(str_split('\\/:*?"<>|&'), '', Input::get('title'));
        $slug = strtolower(str_replace(' ','-',$slug));
        $harga = str_replace(",","",Input::get('harga')) + 0;
        
        $data = array(
            "slug" => $slug,
            "title" => Input::get('title'),
            "harga" => $harga,
            "deskripsi" => Input::get('deskripsi'),
            "category_id" => Input::get('category_id'),
            "usaha_id" => Input::get('usaha_id'),
            "created_at" => Carbon::now(),
        );
        $data['foto1'] = (Input::get('foto1') == null) ? null : Input::get('foto1');
        $data['foto2'] = (Input::get('foto2') == null) ? null : Input::get('foto2');
        $data['foto3'] = (Input::get('foto3') == null) ? null : Input::get('foto3');
        $data['foto4'] = (Input::get('foto4') == null) ? null : Input::get('foto4');
        DB::table('z_product')->where('id','=',Input::get('id'))->update($data);

        DB::table('z_trans_product_cat')->where('product_id','=',Input::get('id'))->delete();
        
        $cat = Input::get('category_id');         
        $cek = DB::table('z_product_cat')->where('id','=',$cat)->first();    
        if($cek->parent_id != null){
            DB::table('z_trans_product_cat')->insert(['product_id' => Input::get('id'), 'category_id' => $cek->parent_id]);
        }
        DB::table('z_trans_product_cat')->insert(['product_id' => Input::get('id'), 'category_id' => $cat]);                        
        return Redirect::to('/admin/products')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Produk']);
    }
    public function deleteProduct()
    {
        $id = Input::get('id');
        DB::table('z_product')->where('id','=',Input::get('id'))->delete();
        DB::table('z_trans_product_cat')->where('product_id','=',$id)->delete();        
        return Redirect::to('/admin/products')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Produk']);
    }
    public function updateProductCat()
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
        DB::table('z_product_cat')->where('id','=',Input::get('id'))->update($data);
        return Redirect::to('/admin/products/category')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Kategori']);
    }
    public function deleteProductCat($id)
    {
        $did = Crypt::decryptString($id);
        DB::table('z_product_cat')->where('id','=',$did)->delete();
        DB::table('z_trans_product_cat')->where('category_id','=',$did)->delete();
        return Redirect::to('/admin/products/category')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Kategori']);
    }
}

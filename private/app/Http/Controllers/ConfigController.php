<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use DB;
use Redirect;
use Crypt;
use Carbon;
class ConfigController extends Controller
{
    public function addGallery()
    {
        $data = array(
            "img" => Input::get('img'),
            "title" => Input::get('title'),
            "created_at" => Carbon::now()
        );
        if (Input::get('description') != null) {
            $data["description"] = Input::get('description');
        }
        DB::table('z_gallery')->insert($data);
        return Redirect::to('/admin/gallery')->with(['color' => 'green', 'msg' => 'Berhasil Menambah Galeri']);
    }
    public function updateGallery()
    {
        $data = array(
            "img" => Input::get('img'),
            "title" => Input::get('title'),
            "created_at" => Carbon::now()
        );
        if (Input::get('description') != null) {
            $data["description"] = Input::get('description');
        }
        DB::table('z_gallery')->where("id",'=',Input::get('id'))->update($data);
        return Redirect::to('/admin/gallery')->with(['color' => 'green', 'msg' => 'Berhasil Mengubah Galeri']);
    }
    public function deleteGallery($id)
    {
        $did = Crypt::decryptString($id);
        DB::table('z_gallery')->where("id",'=',$did)->delete(); 
        return Redirect::to('/admin/gallery')->with(['color' => 'green', 'msg' => 'Berhasil Menghapus Galeri']);
    }
}

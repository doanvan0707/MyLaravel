<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    public function XinChao()
    {
    		echo 'Hello word';
    }

    public function KhoaHoc($ten)
    {
    		echo 'Khoa hoc: ' .$ten;
    		return redirect()->route('testname');
    }

    public function postForm(Request $request)
    {
    		echo  $name = $request->input('name');
    }	

    // Khai báo cookie
    public function setCookie()
    {
    		$response = new Response();
    		$response->withCookie('KhoaHoc', 'Laravel - Khoa Pham', 0.1);
    		echo 'Da setCookie';
    		return $response;
    }	

    // Lấy cookie
    public function getCookie(Request $request)
    {
    		echo 'cookie cua ban la: ';
    		return $request->cookie('KhoaHoc');
    }

    public function postFile(Request $request)
    {
    		if ($request->hasFile('myFile')) {
    				$file = $request->file('myFile');
    				$fileName = $file->getClientOriginalName('myFile');
    				echo 'Ten file: ' . $fileName . '<br>';
    				$fileSize = $file->getClientSize('myFile');
    				echo 'Dung luong' . $fileSize . 'bytes' . '<br>';
    				$file->move('images', $fileName);
    				echo 'Upload file thanh cong';
    		} else {
    				echo 'chua co file';
    		}
    }
}

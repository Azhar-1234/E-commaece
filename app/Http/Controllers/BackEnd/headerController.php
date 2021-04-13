<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\BackEnd\header;
class headerController extends Controller
{
    public function addHeader(){
        return view('backend.header.add-header');
    }
    public function storeHeader(Request $request ){
      $header = new header();
      $header->mobile = $request->mobile;
      $header->email = $request->email;
      $header->logo_name = $request->logo_name;
      $header->footer_about = $request->footer_about;
      $result = $header->save();
      if($result):
          return redirect('manage-header')->with('success','inserted sucessfully');
      else:
          return redirect()->back()->with('danger','inserted unsucessfully');
      endif;
    }
    public function manageHeader(){
        $headers = header::all();
        return view('backend.header.manage-header',compact('headers'));
    }
    public function editHeader($id){
        $headers = header::findOrFail($id);
        return view('backend.header.edit-header',compact('headers'));
    }
    public function updateHeader(Request $request){
        $header = header::findOrFail($request->id);
        $header->mobile = $request->mobile;
        $header->email = $request->email;
        $header->logo_name = $request->logo_name;
        $header->footer_about = $request->footer_about;
        $result = $header->save();
        if($result):
            return redirect('manage-header')->with('success','updated sucessfully');
        else:
            return redirect()->back()->with('danger','updated unsucessfully');
        endif;
    }
}

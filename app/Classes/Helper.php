<?php
namespace App\Classes;
use Illuminate\Http\Request;

class Helper{
    public function __construct()
    {
    }
    public static function imageUpload(Request $request, $bang, $id)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = $id .'.'.$request->image->extension();
                $request->image->move(public_path('uploads/' . $bang), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
    public static function imageUploadProduct(Request $request, $bang, $id)
    {
        if($request->hasFile('image')){
            if($request->file('image')->isValid()){
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = $id .'_1.'.$request->image->extension();
                $request->image->move(public_path('uploads/' . $bang), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
    public static function imageUploadProduct2(Request $request, $bang, $id)
    {
        if($request->hasFile('image2')){
            if($request->file('image2')->isValid()){
                $request->validate([
                    'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = $id .'_2.'.$request->image2->extension();
                $request->image2->move(public_path('uploads/' . $bang), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
    public static function imageUploadProduct3(Request $request, $bang, $id)
    {
        if($request->hasFile('image3')){
            if($request->file('image3')->isValid()){
                $request->validate([
                    'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = $id .'_3.'.$request->image3->extension();
                $request->image3->move(public_path('uploads/' . $bang), $imageName);
                return $imageName;
            }
        }
        return "";
    } 
    
    public function __destruct()
    {
    }    
}
?>
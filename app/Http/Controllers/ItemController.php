<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Item;

class ItemController extends Controller
{
    function showItems(Request $request){
      // $all_items = \App\Item::all();
      // $all_items= \App\Item::orderby('created_at','desc')->limit('3')->get();


      $all_items= \App\Item::orderby('created_at')->paginate(12);

      // will implement the reserve item
      // $all_items= \App\Item::orderby('created_at')->where('reserve_id', '0')->paginate(12);
      return view('inventory.items', compact('all_items'));
    }


    function create(){

      $brandselects = \App\Brand::all();
     
      $barcode = \App\Item::orderby('created_at','desc')->value('barcode');
      $justNo = substr($barcode, 11);
      $justNo += 1;
      $latestbarcode = "BAGAHOLIC00" . $justNo;

      // dd($latestbarcode);

   		return view('inventory.items_create', compact('brandselects', 'latestbarcode'));
    }


    function updatebrand($id){

      $brandselect =\App\Brand::find($id);
      return view('inventory.updatebrand', compact('brandselect'));
    }

    function updatebranddata(Request $request){
      $brandid= $request->post('brandid');
      $updatebrand= $request->post('updatebrand');
      $updatebrandimage= $request->file('updatebrandimage');

      if($updatebrandimage != null){
        $filebrand = $updatebrandimage;
        $namefilebrand = $filebrand->getClientOriginalName();
        $finalfilenamebrand = $updatebrand . time() . $namefilebrand ;
        $destinationPath = 'uploads/brandimage';
        $filebrand->move($destinationPath,$finalfilenamebrand);


        $imageNamebrand = $updatebrandimage->getClientOriginalName();
        $imagedatabrand = 'uploads/brandimage/'. $updatebrand . time() .  $imageNamebrand ;
        } else {
          $imagedatabrand = '0';
        }

      $brand_obj = \App\Brand::find($brandid);
      $brand_obj ->brandname = $updatebrand;
      $brand_obj ->brandimage = $imagedatabrand;
      $brand_obj ->save();

      return redirect("/catalogue/create");


      
    }


    function addbrand(Request $request){
      $addbrand= $request->post('addbrand');
      $brandimage= $request->file('brandimage');


      if($brandimage != null){
        $filebrand = $brandimage;
        $namefilebrand = $filebrand->getClientOriginalName();
        $finalfilenamebrand = $addbrand . time() . $namefilebrand ;
        $destinationPath = 'uploads/brandimage';
        $filebrand->move($destinationPath,$finalfilenamebrand);


        $imageNamebrand = $brandimage->getClientOriginalName();
        $imagedatabrand = 'uploads/brandimage/'. $addbrand . time() .  $imageNamebrand ;
        } else {
          $imagedatabrand = '0';
        }


      $brand_obj = new \App\Brand();
      $brand_obj ->brandname = $addbrand;
      $brand_obj ->brandimage = $imagedatabrand;
      $brand_obj ->save();

      return redirect("/catalogue/create");
    }


    function store(Request $request){
        
        $category= $request->post('category');
        $brand= $request->post('brand');
        $description= $request->post('description');
        $note= $request->post('note');
        $firstimage= $request->file('1stimage');
        $secondimage= $request->file('2ndimage');
        $thirdimage= $request->file('3rdimage');
        $price= $request->post('price');
        $barcode= $request->post('barcode');

        $brandname = \App\Brand::where('id', $brand)->value('brandname');
        
        $name = $brandname . time();

        
        // dd($category,$brand,$description,$note,$firstimage,$secondimage,$thirdimage,$price,$barcode,$name);

        //for future
        // $itemlevel= '0';
        // $reserve_id= '0';
         

        if($brand > 0){
          $brandid = $brand;
        } else {

          $brandname = \App\Brand::where('brandname', '=', $brand)->get();
          $brandname = array_pluck($brandname,'id');


            if (intval($brandname) > 0) {
              $brandid = intval($brandname);
            } else {
              $registerbrand = $brand;

              $brand_obj = new \App\Brand();
              $brand_obj ->brandname = $registerbrand;
              $brand_obj ->save();

              $brandid = \App\Brand::where('brandname', $registerbrand)->get();

              $brandid = intval(array_pluck($brandid,'id'));

            }

            // intval($brandname) > 0 ? $brandid = $brandname : $registerbrand = $brand;

            // if($registerbrand != NULL){
            //   $brand_obj = new \App\Brand();
            //   $brand_obj ->brandname = $registerbrand;
            //   $brand_obj ->save();

            //   $brandid = \App\Brand::where('brandname', $registerbrand)->find($id);

            // } else {}


        }


        // 1st IMAGE going to the folder
        $file1 = $firstimage;
        $namefile1 = $file1->getClientOriginalName();
        $finalfilename1 = time(). '1stitem'. $namefile1 ;
        $destinationPath = 'uploads/item';
        $file1->move($destinationPath,$finalfilename1);

        // 1stimage going to the database
        $imageName1 = $firstimage->getClientOriginalName();
        $imagedata1 = 'uploads/item/'. time(). '1stitem' . $imageName1 ;

        

        // 2nd IMAGE 
        if($secondimage != null){
        $file2 = $secondimage;
        $namefile2 = $file2->getClientOriginalName();
        $finalfilename2 = time() . '2nditem'. $namefile2 ;
        $destinationPath = 'uploads/item';
        $file2->move($destinationPath,$finalfilename2);


        $imageName2 = $secondimage->getClientOriginalName();
        $imagedata2 = 'uploads/item/'. time() . '2nditem' .$imageName2 ;
        } else {
        	$imagedata2 = '0';
        }

        // 3rd IMAGE
        if($thirdimage != null){
        $file3 = $thirdimage;
        $namefile3 = $file3->getClientOriginalName();
        $finalfilename3 = time() . '3rditem' . $namefile3 ;
        $destinationPath = 'uploads/item';
        $file3->move($destinationPath,$finalfilename3);


        $imageName3 = $thirdimage->getClientOriginalName();
        $imagedata3 = 'uploads/item/'. time() . '3rditem' .$imageName3 ;
        } else {
        	$imagedata3 = '0';
        }


        $rules = array(
          'category' => 'required | not_in:0', 
          'description' => 'required',
          'note' => 'required',
          'barcode' => 'required | min:8 | max:50', 
          '1stimage' => '',
          '2ndimage' => '',
          '3rdimage' => '', 
        );

        


      $this -> validate($request,$rules);

      $item_obj = new \App\Item();
      $item_obj ->category = $category;
      $item_obj ->brand_id = $brandid;
      $item_obj ->name = $name;
      $item_obj ->itemimage1 = $imagedata1;
      $item_obj ->itemimage2 = $imagedata2;
      $item_obj ->itemimage3 = $imagedata3;
      $item_obj ->description = $description;
      $item_obj ->note = $note;
      $item_obj ->price = $price;
      $item_obj ->barcode = $barcode;
      $item_obj ->save();

      
      return redirect("catalogue/create");
      }

      

    function delete($id){

      $item_to_delete = \App\Item::find($id);

      $item_to_delete -> delete();
      // what is this(below comment)
      // $all_items = Item::all();
      return redirect("catalogue")->with("deleted","Item has been deleted");
    }

    function update($id){

      $brandid = \App\Item::where('id', $id)->value('brand_id');
      $brandname = \App\Brand::find($brandid);
      
      
      $brandselects = \App\Brand::all();
      $all_items =\App\Item::find($id);
      return view('inventory.updateitem', compact('all_items', 'brandselects', 'brandname'));
    }

    function updatedata(Request $request, $id){

        $category= $request->post('category');
        $brandid= $request->post('brand');
        $description= $request->post('itemdescription');
        $note= $request->post('note');
        $firstimage= $request->file('1stimage');
        $secondimage= $request->file('2ndimage');
        $thirdimage= $request->file('3rdimage');
        $price= $request->post('price');
        $barcode= $request->post('barcode');

        $brandname = \App\Brand::where('id', $brandid)->value('brandname');
        
        $name = $brandname . time();

        
        // dd($category, $brand, $description, $note, $firstimage, $secondimage, $thirdimage, $price, $barcode, $name);
         
        $item_obj = \App\Item::find($id);
        // 1st IMAGE going to the folder
        if($firstimage != null){
        $file1 = $firstimage;
        $namefile1 = $file1->getClientOriginalName();
        $finalfilename1 = time(). '1stitem'. $namefile1 ;
        $destinationPath = 'uploads/item';
        $file1->move($destinationPath,$finalfilename1);

        // 1stimage going to the database
        $imageName1 = $firstimage->getClientOriginalName();
        $imagedata1 = 'uploads/item/'. time(). '1stitem' .$imageName1 ;
        $item_obj ->itemimage1 = $imagedata1;
        }

        // 2nd IMAGE 
        if($secondimage != null){
        $file2 = $secondimage;
        $namefile2 = $file2->getClientOriginalName();
        $finalfilename2 = time() . '2nditem'. $namefile2 ;
        $destinationPath = 'uploads/item';
        $file2->move($destinationPath,$finalfilename2);


        $imageName2 = $secondimage->getClientOriginalName();
        $imagedata2 = 'uploads/item/'. time() . '2nditem' .$imageName2 ;
        $item_obj ->itemimage2 = $imagedata2;
        }

        // 3rd IMAGE
        if($thirdimage != null){
        $file3 = $thirdimage;
        $namefile3 = $file3->getClientOriginalName();
        $finalfilename3 = time() . '3rditem' . $namefile3 ;
        $destinationPath = 'uploads/item';
        $file3->move($destinationPath,$finalfilename3);


        $imageName3 = $thirdimage->getClientOriginalName();
        $imagedata3 = 'uploads/item/'. time() . '3rditem' .$imageName3 ;

        $item_obj ->itemimage3 = $imagedata3;
        }


        $rules = array(
          'category' => 'required | not_in:0', 
          'itemdescription' => 'required',
          'note' => 'required',
          '1stimage' => '',
          '2ndimage' => '',
          '3rdimage' => '', 
        );

      $this -> validate($request,$rules);

      
      $item_obj ->category = $category;
      $item_obj ->brand_id = $brandid;
      $item_obj ->name = $name;

      $item_obj ->description = $description;
      $item_obj ->note = $note;
      $item_obj ->price = $price;
      $item_obj ->barcode = $barcode;
      $item_obj ->save();

      

      

      return redirect("catalogue");
      
    }

    //categorylist

    // function categorycall(Request $request){
      
    // // $request->all()->post('category'); 
    // return redirect("/catalogue/category/$request->category");
    // }

    function categorylist(Request $request){
      // dd($request->category);
      //$category = $request-> get('category');
      $mycategories = $request->input('category');
      

      if(count($mycategories) == 1){
        $all_items = \App\Item::select('*')->paginate(12);
      } elseif(count($mycategories) == 2) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->paginate(12);
      } elseif(count($mycategories) == 3) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->paginate(12);
      } elseif(count($mycategories) == 4) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->paginate(12);
      } elseif(count($mycategories) == 5) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->paginate(12);
      } elseif(count($mycategories) == 6) {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->orWhere('category', $mycategories[5])
                                  ->paginate(12);
      } else {
        $all_items = \App\Item::where('category', $mycategories[0])
                                  ->orWhere('category', $mycategories[1])
                                  ->orWhere('category', $mycategories[2])
                                  ->orWhere('category', $mycategories[3])
                                  ->orWhere('category', $mycategories[4])
                                  ->orWhere('category', $mycategories[5])
                                  ->orWhere('category', $mycategories[6])
                                  ->paginate(12);
      }

     // // // dd($all_items);
     // //  // $request->session()->put('category',$category);

      $brandNo= \App\Item::whereIn('category', $mycategories)->distinct('brand_id')->pluck('brand_id');

        $countbrand= count($brandNo);
      
        $all_brands= \App\Brand::whereIn('id', $brandNo)
                    ->orderby('brandname')
                    ->get();

        $choosencategories= $mycategories;
        $mycategories= http_build_query($mycategories);

        // dd($choosencategories);

      
      return view('inventory.item_sidenavcategory', compact('all_items', 'mycategories','choosencategories', 'all_brands'));
    }


    function reserve($id){

      $reserve_item =\App\Item::find($id);
      
      return view('messages.messaging_create', compact('id','reserve_item'));
    }


    function showReserve(Request $request){
      $all_items= \App\Item::orderby('created_at')->where('reserve_id', '>' ,'0')->paginate(12);


      $nameofuser = DB::table('items')
            ->join('users', 'items.reserve_id', '=', 'users.id')
            ->select('users.name')
            ->first();

      if($nameofuser != null){
      $nameofuser = $nameofuser->name;
      } else {
        $nameofuser = 0;
      }

      return view('inventory.reserve_item', compact('all_items', 'nameofuser'));
    }

    // Search
      public function search(Request $request) {

        $keyword = $request->input('search');

        


        $all_items = Item::where('category', 'LIKE', '%'.$keyword.'%')
          // ->orWhere('brand_id', function ($brand) use ($keyword) {
          //   $brand->where('brandname', 'LIKE', '%'.$keyword.'%');
          // })
            ->orWhere('name', 'LIKE', '%'.$keyword.'%')
            ->orWhere('description', 'LIKE', '%'.$keyword.'%')
            ->orWhere('note', 'LIKE', '%'.$keyword.'%')
          ->with('brand')
          ->paginate(12);



    //copy       $movies = Movie::whereHas('season', function ($season) use ($season_number) {
              //     $season->where('number', $season_number);
              // })
              // ->whereHas('season.category', function ($category) use ($category_slug) {
              //     $category->where('slug', $category_slug);
              // })
              // ->with('season')
              // ->get();



        return view('inventory.searchitem', compact('all_items', 'keyword'));
      }

    function solditem($id){
        

        $itemlevel = 1;

        if(Auth::user()->role == 'admin'){
        $item_obj = \App\Item::find($id);
        $item_obj ->itemlevel = $itemlevel;
        $item_obj ->save();
        }


      return back();
    }

    function unreserve($id){
       

        $unreserve = 0;

        if(Auth::user()->role == 'admin'){
        $item_obj = \App\Item::find($id);
        $item_obj ->reserve_id = $unreserve;
        $item_obj ->save();
        }


      return back();
    }

    function linkcategorylist($category){
      // dd($request->category);
      //$category = $request-> get('category');
      $mycategories = $category;

        $brandNo= \App\Item::where('category', $mycategories)->distinct('brand_id')->pluck('brand_id');

        $countbrand= count($brandNo);
      
        $all_brands= \App\Brand::whereIn('id', $brandNo)
                    ->orderby('brandname')
                    ->get();
      
        $all_items = \App\Item::where('category', $mycategories)->paginate(12);

        

        
      

        


      
      return view('inventory.item_category', compact('all_items', 'mycategories', 'category', 'all_brands'));
    }

    function linkcategorybrandlist($mycategories, $nameofBrand){


      
        if(strrchr($mycategories, '0')){
          $mycategories = parse_str($mycategories,$output);
          $brandNo = \App\Brand::where('brandname', '=', $nameofBrand)->get()->pluck('id');

              if(count($output) == 1){
                $brandListName = \App\Item::select('*')->distinct('brand_id')->pluck('brand_id');;
              } elseif(count($output) >= 2) {
                $brandListName = \App\Item::whereIn('category', $output)
                                          ->distinct('brand_id')
                                          ->pluck('brand_id');
              } 

              $all_brands= \App\Brand::whereIn('id', $brandListName)
                      ->orderby('brandname')
                      ->get();

              
              if(count($output) == 1){
                $all_items = \App\Item::where('brand_id', $brandNo)->paginate(12);
              } else {
                $all_items = \App\Item::where('brand_id', $brandNo)
                                  ->whereIn('category', $output)
                                  ->paginate(12);
              } 

              $choosencategories = $output;
              $mycategories = http_build_query($output);


              return view('inventory.item_brand', compact('all_items', 'choosencategories', 'mycategories', 'nameofBrand', 'all_brands'));

              // STUDY THIS sub-query!!!
              // The error is "No tables used (SQL: select * from `items` where (`category` = (select * where `category` = 0 or `category` = Luggages or `category` = Footwears) and `brand_id` = 1))"

              // $all_items = \App\Item::where([['category', function($query) use ($output) {
              //                 for($i=0;$i<count($output); $i++){
              //                   if(count($output) == 0){
              //                       $query->select('*');
              //                   }else{
              //                       $query->orWhere('category',$output[$i]);
              //                   }
              //                 }
              //               }]
              //             ,['brand_id', $brandNo]])->get();


                          

                          // \App\Item::where(['brand_id', $brandNo])
                          //   ->orWhereIn('category', function($query) use ($output) {
                          //     for($i=0;$i<count($output); $i++){
                          //       if($i==0){
                          //           $query->select('*');
                          //       }else{
                          //           $query->orWhere('category',$output[$i]);
                          //       }
                          //     }
                          //   })
                          //   ->get();


        } else {

          $brandNo = \App\Brand::where('brandname', '=', $nameofBrand)->get()->pluck('id');
          $brandListName = \App\Item::where('category', '=', $mycategories)->distinct('brand_id')->pluck('brand_id');
          
        
          $all_brands= \App\Brand::whereIn('id', $brandListName)
                      ->orderby('brandname')
                      ->get();
        
          $all_items = \App\Item::where([['category', $mycategories],['brand_id', $brandNo]])->paginate(12);
          $choosencategories = '0';

          return view('inventory.item_brand', compact('all_items', 'mycategories', 'choosencategories', 'nameofBrand', 'all_brands'));

        }



      
      
    }


}

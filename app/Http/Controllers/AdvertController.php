<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use DB;

class AdvertController extends Controller
{
    //
     
    
public function addads()
    {

        $params = [
            'title' => 'Add an Ad',
            
        ];

        return view('addads')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */ 

    function addads2(Request $request)
    { 

    	$this->validate($request,[

    			'advert' =>'bail|required|mimes:jpeg,png',

    			    		]);

       $file = $request->advert;
       $description = $request->description;
 		$name =\Ramsey\Uuid\Uuid::uuid4();
        $name = $name->toString();
   
        if($file->getSize()<1000000){
            

			        $fileName =$name.'.' .
        $file->getClientOriginalExtension();

			       if( $file->move(
			            base_path() . '/public/storage/', $fileName
			        )){
			     
					         Advert::create([
					            
					            'description' => $description,
					            'address'=>$fileName
					           
					        ]);
					     $params = [
            'title' => 'Add an Ad',
            'status' => 'Ad added successfully'
            
        ];
					            return redirect('/ads/add')->with($params);

			        }else{
			            return redirect('/ads/add')->withErrors('Error uploading file ,try again later..');
			 
			        }

        }else{
		        return redirect('/ads/add')->withErrors('You must upload a file size less than 1MB ');

		      }
    

    }

    function publishad(Request $request){

$id = $request->advertid;

$adverts = DB::insert('update adverts set state = 1 where id = ?',[$id]);

			     $params = [
            'title' => 'Add an Ad',
            'status' => 'Ad published successfully'
            
        ];

$advert_link =  DB::select('select * from adverts where id = ? ',[$id]);     
$adlink= $advert_link[0]->address;
        $publishers = DB::select('select * from publishers  ');

foreach($publishers as $publisher)
    {
        $pub_id = $publisher->id;
        $publish = DB::insert('insert into ad_pubs(publisher_id,ad_id,adlink) values(?,?,? )',[$pub_id,$id,$adlink]);

    }

 return redirect('/home')->with($params);
            
    }


    function unpublishad(Request $request){

$id = $request->advertid;

$adverts = DB::update('update adverts set state = 0 where id = ?',[$id]);

			     $params = [
            'title' => 'FaceBook Ads',
            'status' => 'Ad has been removed from those published successfully'
            
        ];
 $publishers = DB::delete('delete from ad_pubs where ad_id = ? ',[$id]);


          return redirect('/ads/publish')->with($params);

            
    }

    function publishedads(){

    	 $params = [
            'title' => 'Published Ads',
            
        ];
        
        $adverts = DB::select('select * from adverts where state = 1');
 
        return view('publishedads',compact('adverts'))->with($params);

    }


    function deleteads(Request $request){

$id = $request->advertid;

$adverts = DB::insert('Delete from adverts where id = ?',[$id]);

$params = [
            'title' => 'Published Ads',
            'status' => 'Ad deleted successfully'
            
        ];

      return redirect('/home')->with($params);
    
    }

    

}
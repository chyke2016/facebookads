<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advert;
use DB;

class AdPubController extends Controller
{
    //
     
    
public function confirmads()
    {

        
        
        $adverts = DB::select('select * from adverts where state = 1');
 
        $params = [
            'title' => 'Confirm an Ad',
            
        ];

        return view('confirmads',compact('adverts'))->with($params);
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

    function confirmad_user($ad_id)
    { 
    	
 $users = DB::table('ad_pubs')->where('ad_id',$ad_id)->get();
 
        $params = [
            'title' => 'Confirm a user Ad',
            
        ];

        return view('confirmad_user',compact('users','publishers'))->with($params);

       }


 
    function confirmad_user2(Request $request){

$id = $request->advertid;

$adverts = DB::update('update ad_pubs set confirmed = 1 where id = ?',[$id]);

			     $params = [
            'title' => 'Confirm an ad',
            'status' => 'User confirmed successfully'
            
        ];

 return redirect('/confirmads/')->with($params);
            
    }

    function credit_user(Request $request){

$id = $request->credit;

$balance = DB::select('select * from publishers where id = ?',[$id]);
$balance = $balance[0]->balance;

$adverts = DB::update('update publishers set balance = 500 + ? where id = ?',[$balance,$id]);

			     $params = [
            'title' => 'Confirm an ad',
            'status' => 'User credited successfully'
            
        ];

 return redirect('/confirmads/')->with($params);
            
    }

   

    

}
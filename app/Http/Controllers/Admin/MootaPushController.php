<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MootaPushController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index(Request $post)
    {
        $notifications = json_decode( file_get_contents("php://input") );
        if(!is_array($notifications)) {
            $notifications = json_decode( $notifications );
        }
        
        if( count($notifications) > 0 ) {
            
            foreach( $notifications as $notification) {
                // Your code here
            }
        }

        dd($notifications);

        return 'oke';
    }
}

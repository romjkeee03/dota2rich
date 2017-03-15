<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function add_message(Request $request)
{
	
	
	

	
	
	if($this->user->banchat==1){
		
	  return json_encode(array('clear'=>'Вы забанены в чате ! Срок : Навсегда'));exit(0);
     //  return response()->json(['msg' => 'Неверная ссылка!', 'status' => 'error']);	
	}
	
$userid = htmlspecialchars_decode($this->user->steamid64);
$admin = htmlspecialchars_decode($this->user->is_admin);
$username =  htmlspecialchars_decode($this->user->username);
$avatar = htmlspecialchars_decode($this->user->avatar);
$messages = htmlspecialchars_decode($request->get('messages'));


	
\DB::table('chat')->insertGetId(
  ['userid' => $userid, 'avatar' => $avatar, 'messages' => $messages, 'username' => $username , 'admin' => $admin]
);


	return $request->get('id');





	
	
	
} 
   
    public function getchat(Request $request)
{
	
	
	 
	
$messages = \DB::table('chat')->orderBy('id', 'desc')->take(15)->get();	
	
	

	
return array_reverse($messages);	
	
}
   

}

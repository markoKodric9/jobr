<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;


class MessagesController extends Controller
{
    public function newMessageToUser(Request $request){
      Message::create([
        'user_id' => $request->input('user_id'),
        'company_id' => Auth::guard('company')->user()->id,
        'sender' => 'company',
        'title' => $request->input('title'),
        'message' => $request->input('message'),
      ]);

      return redirect()->back();
    }

    public function newMessageToCompany(Request $request){
      Message::create([
        'user_id' => Auth::guard('web')->user()->id,
        'company_id' => $request->input('company_id'),
        'sender' => 'user',
        'title' => $request->input('title'),
        'message' => $request->input('message'),
      ]);

      return redirect()->back();
    }

    public function messages($filter = 'vsa'){
        if(Auth::guard('web')->check()){
          $user = Auth::guard('web')->user();
          switch ($filter){
            case 'prejeta': $messages = $user->receivedMessages();break;
            case 'poslana': $messages = $user->sentMessages();break;
            case 'vsa': $messages = $user->messages();break;
          }

          $this->markAsRead($user);
          return view('messages')->with(['user' => $user, 'messages' => $messages]);
        }
        else if(Auth::guard('company')->check()){
          $company = Auth::guard('company')->user();
          switch ($filter){
            case 'prejeta': $messages = $company->receivedMessages();break;
            case 'poslana': $messages = $company->sentMessages();break;
            case 'vsa': $messages = $company->messages();break;
          }

          $this->markAsRead($company);
          return view('messages')->with(['company' => $company, 'messages' => $messages]);
        }
        return redirect(route('home'));
    }


    private function markAsRead($user){
        $unread = $user->unreadMessages();
        foreach ($unread as $msg) {
          $msg->seen = 1;
          $msg->save();
        }
    }
}

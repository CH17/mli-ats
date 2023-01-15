<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Validator\MessageValidator;
use App\Formatter\MessageFormatter;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMailable;
use App\Project;
use Illuminate\Support\Facades\Mail;
use Notification;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valdation=new MessageValidator();

        $validator=$valdation->validation($request);
        if($validator->fails()){                  
            return response()->json([
                    'fail'=>true,
                    'errors' => $validator->getMessageBag()->toArray()
                ]);      
        }

        $message_data=new MessageFormatter();
        $data=$message_data->formate($request);     
        // $user->update($data); 

        $message=Message::create($data);

        //$user=Auth::user();
        $project=Project::where('id',$request->project_id)->first();
        $users=\App\User::whereIn('id',[$project->managed_by,$project->assigned_to,$project->used_by])->get();

       // $user->notify(new \App\Notifications\ProjectMessage()); 

    //    Notification::send($users, new \App\Notifications\ProjectMessage($request->activity_id, $request->project_id,'A new message from '.Auth::user()->name));

        return response()->json([
            'success'=>true,
            'message' =>'Message sent successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }

    public function checkmail(){
        $name = 'Krunal';
        Mail::to('krunal@appdividend.com')->send(new SendMailable($name));        
        return 'Email was sent';
    }
}

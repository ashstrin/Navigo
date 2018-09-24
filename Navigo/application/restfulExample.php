<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UsersController extends MyController{
    public function getAction($request){
        if(isset($request->url_elements[2])){
            $user_id = (int)$request->url_elements[2];
            if(isset($request->url_elements[3])){
                switch($request->url_elements[3]){
                    case 'friends':
                        $data["message"] = "user " . $user_id . "has many freinds";
                    default:
                        break;
                }
            }else{
                $data["message"] = "here is the info for user " . $user_id;
            }
        }else{
            $data["message"] = "you want a list of users";
        }
        return $data;
    }
    public function postAction($request){
        $data = $request->parameters;
        $data['message'] = "This data was submitted";
        return $data;
    }
}

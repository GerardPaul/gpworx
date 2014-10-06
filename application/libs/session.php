<?php

class Session{
    
    public function __construct() {
        session_start();
    }
    
    public function set($key, $value){
        $_SESSION[$key] = $value;
    }
    
    public function get($key){
        return (isset($_SESSION[$key])) ? $_SESSION[$key] : false;
    }
    
    public function delete($key){
        if(isset($_SESSION[$key])){
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    
    public function destroy(){
        return session_destroy();
    }
}
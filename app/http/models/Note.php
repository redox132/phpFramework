<?php

namespace App\Http\Models;
use App\Database;


class Note
{
    
    static public function addNote(int $user_id, string $title, string $note) :void
    {

        if (trim($note) != "") {
            
            Database::query("INSERT INTO notes (user_id, title, note) 
            VALUES(:user_id, :title, :note)", 
            [
                ':user_id' => $user_id, 
                ':title' => $title, 
                ':note' => $note
                ]
            );

            redirect('/');
        }
        
    }

    /**
    * @return array all the notes for the auth user
    */
    static public function all() :array
    {
        return Database::query("SELECT * FROM notes")->fetchALL();
    }
}

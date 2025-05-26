<?php

namespace App\Http\Controllers;

use App\Http\Models\Note;


class NoteController
{
    static public function addNote() 
    {
        Note::addNote();
    }

    static public function deleteNote( int $id, int $userIid) :void 
    {
        Note::deleteNote($id, $userIid);
    }
    static public function editNote( int $id, int $userIid, ?string $title, ?string $note) :void 
    {
        Note::editNote($id, $userIid, $title, $note);
    }

}

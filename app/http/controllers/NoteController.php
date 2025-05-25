<?php

namespace App\Http\Controllers;

use App\Http\Models\Note;


class NoteController
{
    static public function addNote(int $user_id, string $title, string $note) 
    {
        Note::addNote($user_id, $title, $note);
    }
}

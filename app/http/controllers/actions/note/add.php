<?php

use App\Http\Controllers\NoteController;

$title = $_POST['title'];
$note = $_POST['note'];


NoteController::addNote($_SESSION['user']['id'], $title, $note);


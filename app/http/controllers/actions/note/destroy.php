<?php

use App\Http\Controllers\NoteController;


$noteId = $_POST['id'] ?? null;
$userId = $_SESSION['user']['id'] ?? null;

if ($noteId && $userId) {
    NoteController::deleteNote($noteId, $userId);
    header("Location: /"); 
    exit;
} else {
    echo "Missing note ID or user session.";
}

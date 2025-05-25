<?php

use App\Http\Controllers\NoteController;

$id = $_POST['id'] ?? null;
$userId = $_SESSION['user']['id'] ?? null;
$title = $_POST['title'] ?? '';
$note = $_POST['note'] ?? '';

if ($id && $userId) {
    NoteController::editNote((int)$id, (int)$userId, $title, $note);
    header("Location: /");
    exit;
} else {
    echo "Missing note ID or session.";
}

<?php

namespace App\Http\Models;

use App\Database;
use App\http\Request;


class Note
{

    // public Request $request;

    // public function __construct(Request $request)
    // {
    //     $this->request = $request;
    // }

    static public function addNote(): void
    {

        $user_id = $_SESSION['user']['id'] ?? null;
        $title = $_POST['title'] ?? '';
        $note = $_POST['note'] ?? '';

        if ($user_id && trim($note) !== '') {
            Database::query(
                "INSERT INTO notes (user_id, title, note) 
                    VALUES (:user_id, :title, :note)",
                [
                    ':user_id' => $user_id,
                    ':title' => $title,
                    ':note' => $note
                ]
            );

            header("Location: /");
            exit;
        } else {
            echo "Note content is required or user not authenticated.";
        }
    }

    /**
     * @return array all the notes for the auth user
     */
    static public function all(): array
    {
        return Database::query("SELECT * FROM notes")->fetchALL();
    }

    static public function deleteNote(int $id, int $userIid): void
    {
        Database::query(
            "DELETE FROM notes WHERE id = :id and user_id = :userId",
            [
                ':id' => $id,
                ':userId' => $userIid,
            ]
        );
    }

    static public function editNote(int $id, int $userIid, ?string $title, ?string $note): void
    {
        Database::query("UPDATE notes SET title = :title, note = :note WHERE id = :id and user_id = :user_id", [
            'id' => $id,
            'user_id' => $userIid,
            ':title' => $title,
            ':note' => $note,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Request;
use App\Models\Publication;
use App\Validations\PublicationValidation;
use App\Models\Like;
use App\Models\Comment;

class PublicationController extends Controller
{
    private $publicationModel;
    private $likeModel;

    public function __construct(){
        $this->publicationModel = new Publication();
        $this->likeModel = new Like();
    }

    public function search(){
        $data = Request::all();
        PublicationValidation::validateSearchPublications($data);

        $publications = $this->publicationModel->getPublicationsByUserAndPage($data['id_usuario'], $data['pg']);

        return response()->json([
            'status' => true,
            'mensagem' => 'Publicações encontradas com sucesso.',
            'data' => $publications
        ]);
    }

    public function addLike(){
        $data = Request::all();
        PublicationValidation::validateLikePublication($data);

        $like = new Like($data);
        $like->ativo = true;
        $like->data = date("Y-m-d");
        $like->save();

        return response()->json([
            'status' => true,
            'mensagem' => 'Publicacao curtida com sucesso.'
        ]);
    }

    public function removeLike(){
        $data = Request::all();
        PublicationValidation::validateLikePublication($data);

        $likes = $this->likeModel->getLikesByUserAndPublication($data['id_usuario'], $data['id_publicacao']);

        foreach ($likes as $like){
            $like->ativo = false;
            $like->save();
        }

        return response()->json([
            'status' => true,
            'mensagem' => 'Publicacao descurtida com sucesso.'
        ]);
    }

    public function addComment(){
        $data = Request::all();
        PublicationValidation::validateAddComment($data);

        $comment = new Comment($data);
        $comment->data = date("Y-m-d");
        $comment->save();

        return response()->json([
            'status' => true,
            'mensagem' => 'Comentário salvo com sucesso.'
        ]);
    }
}

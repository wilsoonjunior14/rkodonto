<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Utils\Utils;

class Publication extends Model
{
    protected $table = "publicacao";
    public $timestamps = false;
    protected $fillable = ['id', 'titulo', 'descricao', 'data_criacao', 'ativo', 'arquivo', 'id_tipo_publicacao', 'id_usuario', 'poster'];

    public function getPublicationsByUserAndPage($idUser, $page){
        $offset = ($page - 1) * 10;
        
        $publications = Publication::where("ativo", true)
        ->skip($offset)
        ->take(10)
        ->orderBy('data_criacao')
        ->get();

        foreach ($publications as $publication){
            $publication->curtiu = (new Like())->verifiesIfPublicationWasLikedByUser($idUser, $publication['id']);
            $publication->curtidas = (new Like())->getLikesByPublication($publication['id']);
            $publication->comentario = (new Comment())->getCommentsByPublication($publication['id']);
            $publication->time_days = Utils::getDifferenceBetweenDates($publication['data_criacao'], date('Y-m-d'));
        }

        return $publications;
    }

}

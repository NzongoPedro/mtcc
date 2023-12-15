<?php

namespace Http\Controller;

use Http\Model\Alunos;

class AlunosController
{

    // Store new record on data base
    public static function store($id_curso, $nome, $n_estudante, $n_BI, $telefone, $password)
    {
        return Alunos::store($id_curso, $nome, $n_estudante, $n_BI, $telefone,  $password);
    }

    public static function login($n_estudante, $password){

        return Alunos::login($n_estudante, $password);
    }
}


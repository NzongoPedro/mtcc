<?php

namespace Http\Model;

class Alunos
{
    protected $table = 'alunos';

    protected $filable =
    [
        'id_curso',
        'nome',
        'n_estudante',
        'n_BI, telefone',
        'password',
        'estado_conta'
    ];
}

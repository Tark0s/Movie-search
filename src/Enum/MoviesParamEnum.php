<?php

namespace App\Enum;

enum MoviesParamEnum: string
{
    case RANDOM = 'random';
    case EVEN_WITH_W = 'evenWithW';
    case MORE_THAN_ONE_WORD = 'moreThan1Word';
}
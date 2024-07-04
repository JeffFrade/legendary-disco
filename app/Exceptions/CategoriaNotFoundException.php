<?php

namespace App\Exceptions;

use App\Core\Support\BaseException;
use App\Interfaces\CategoriaExceptionInterface;

class CategoriaNotFoundException
extends BaseException
implements CategoriaExceptionInterface
{}

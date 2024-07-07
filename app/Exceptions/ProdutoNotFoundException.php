<?php

namespace App\Exceptions;

use App\Core\Support\BaseException;
use App\Interfaces\ProdutoExceptionInterface;

class ProdutoNotFoundException
extends BaseException
implements ProdutoExceptionInterface
{}

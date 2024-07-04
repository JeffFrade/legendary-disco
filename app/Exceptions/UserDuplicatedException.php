<?php

namespace App\Exceptions;

use App\Core\Support\BaseException;
use App\Interfaces\UserExceptionInterface;

class UserDuplicatedException
extends BaseException
implements UserExceptionInterface
{}

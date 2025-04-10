<?php

namespace App\Enums;

enum UserRoles : string
{
    case STUDENT = 'student';

    case TEACHER = 'teacher';

    case ADMIN = 'admin';

    case SUPER_ADMIN = 'super_admin';
}

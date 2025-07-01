<?php

namespace App\Enums;

enum UserRole: string
{
    case User =  'student';
    case Admin = 'admin';
    case SuperAdmin = 'superadmin';
}

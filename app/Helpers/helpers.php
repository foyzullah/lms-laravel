<?php

use Illuminate\Support\Facades\Auth;

function lms_permission($permission)
{
    if (!Auth::user()->hasPermissionTo($permission)) {
        flash()->addWarning('You are not authorized');
        return redirect()->route('dashboard');
    }
}

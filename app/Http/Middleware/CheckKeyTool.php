<?php

namespace App\Http\Middleware;

use App\Enums\KeyToolStatus;
use App\Exceptions\KeyMismatchException;
use App\Models\ToolKeyList;
use Closure;
use Illuminate\Http\Request;

class CheckKeyTool
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     * @throws \App\Exceptions\KeyMismatchException
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->verify($request)) {
            return $next($request);
        }

        throw new KeyMismatchException();
    }


    /**
     * Verify token by querying database for existence of the client:token pair specified in headers.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function verify($request): bool //optional return types
    {
        return ToolKeyList::select('id')->where([    // add select so Eloquent does not query for all fields
            'key'  => $request->header('key'),  // remove variable that is used only once
            'is_active' => KeyToolStatus::Activated
        ])->exists();
    }
}

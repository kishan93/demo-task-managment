<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;

class CheckProjectIdInSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('project_id')) {
            return redirect()->route('projects.index')->with('alertWarning', 'select project first!');
        }

        $project = Project::find(session()->get('project_id'));
        if (!$project) {
            session()->remove('project_id');
            return redirect()->route('projects.index')->with('alertError', 'Selected project was not found!');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostOwnAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('post')->id;

        try {
            $post = Post::findOrFail($postId);
        } catch (ModelNotFoundException $e) {
            abort(404);
        }

        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

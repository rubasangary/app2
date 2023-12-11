<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ForumLike;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;


class ForumLikesController extends Controller
{
    public function like(Forum $forum)
    {
        $user = Auth::user();

        // Check if the user has already liked the item
        $existingLike = ForumLike::where('user_id', $user->id)
            ->where('forum_id', $forum->id)
            ->first();

        if ($existingLike) {
            // User has already liked the item, do not allow duplicate likes
            return response()->json(['message' => 'You have already liked this item.'], 422);
        }

        // Create a new like record
        $like = new ForumLike();
        $like->user_id = $user->id;
        $like->forum_id = $forum->id;
        $like->save();

        return response()->json(['message' => 'Item liked successfully.']);
    }

    public function unlike(Forum $forum)
    {
        $user = Auth::user();

        // Find the like record for the user and item
        $like = ForumLike::where('user_id', $user->id)
            ->where('forum_id', $forum->id)
            ->first();

        if ($like) {
            // Delete the like record
            $like->delete();

            return response()->json(['message' => 'Item unliked successfully.']);
        }

        return response()->json(['message' => 'You have not liked this item.'], 422);
    }


        public function likeStatus(Forum $forum)
        {
            $user = Auth::user();

            // Check if the user has liked the item
            $liked = ForumLike::where('user_id', $user->id)
                ->where('forum_id', $forum->id)
                ->exists();

            return response()->json(['liked' => $liked]);
        }



}


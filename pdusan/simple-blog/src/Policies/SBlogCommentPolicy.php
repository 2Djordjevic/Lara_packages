<?php
namespace Pdusan\SimpleBlog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use Pdusan\SimpleBlog\Models\SBlogComment;

class SBlogCommentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, SBlogComment $comment)
    {
        return $user->id === $comment->user_id;
    }

    public function update(User $user, SBlogComment $comment)
    {
        return $user->id === $comment->user_id;
    }
}
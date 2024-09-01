<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // السماح لجميع المستخدمين بعرض جميع المنشورات
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        // السماح للمستخدم بعرض المنشور إذا كان هو المالك أو إذا كان المنشور عامًا
        return $user->id === $post->user_id || $post->is_public;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // السماح لجميع المستخدمين بإنشاء منشورات
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        // السماح بتحديث المنشور فقط إذا كان المستخدم هو المالك
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        // السماح بحذف المنشور فقط إذا كان المستخدم هو المالك
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        // السماح باستعادة المنشور فقط إذا كان المستخدم هو المالك
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        // السماح بحذف المنشور بشكل دائم فقط إذا كان المستخدم هو المالك
        return $user->id === $post->user_id;
    }
}

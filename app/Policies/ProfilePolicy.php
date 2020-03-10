<?php

namespace DotSocial\Policies;

use DotSocial\Profile;
use DotSocial\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any profiles.
     *
     * @param  \DotSocial\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the profile.
     *
     * @param  \DotSocial\User  $user
     * @param  \DotSocial\Profile  $profile
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can create profiles.
     *
     * @param  \DotSocial\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the profile.
     *
     * @param  \DotSocial\User  $user
     * @param  \DotSocial\Profile  $profile
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        //this allow someone with as a user to update their profile and not another person
        return $user->id == $profile->user_id;
    }

    /**
     * Determine whether the user can delete the profile.
     *
     * @param  \DotSocial\User  $user
     * @param  \DotSocial\Profile  $profile
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can restore the profile.
     *
     * @param  \DotSocial\User  $user
     * @param  \DotSocial\Profile  $profile
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the profile.
     *
     * @param  \DotSocial\User  $user
     * @param  \DotSocial\Profile  $profile
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }
}

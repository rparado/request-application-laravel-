<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Company;
class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = Company::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = Company::create([
                    'email' => $providerUser->getEmail(),
                    'company_name' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
	
}
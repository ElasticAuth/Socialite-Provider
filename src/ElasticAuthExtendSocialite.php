<?php

namespace ElasticAuth\SocialiteProvider;

use SocialiteProviders\Manager\SocialiteWasCalled;

class ElasticAuthExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('elasticauth', Provider::class);
    }
}
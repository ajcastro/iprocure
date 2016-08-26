<?php

namespace Iprocure\Providers;

class RepositoryServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $repos = [
            'Plan',
        ];

        foreach ($repos as $i => $repo) 
        {
            $this->app->bind(
                'Iprocure\\Repositories\\'.$repo.'\\'.$repo.'RepositoryInterface',
                'Iprocure\\Repositories\\'.$repo.'\\'.$repo.'RepositoryEloquent',
                true
            );
        }
    }
}

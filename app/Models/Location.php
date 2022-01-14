<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Location extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
  
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'name',
            'street1',
            'street2',
            'city',
            'state',
            'zip',
        ];
    }

    public function route($route, $parameters = [], $absolute = true)
    {
        $domain = $this->domains->first()->domain;
     
        $parts = explode('.', $domain);
     
        if (count($parts) === 1) { 
            $domain = Domain::domainFromSubdomain($domain);
        }
     
        return tenant_route($domain, $route, $parameters, $absolute);
    }

}

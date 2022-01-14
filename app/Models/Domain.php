<?php

namespace App\Models;

use Illuminate\Support\Str;
use Stancl\Tenancy\Database\Models\Domain as BaseDomain;

/**
 * @property int $id
 * @property int $tenant_id
 * @property string $domain
 * @property bool $is_primary
 * @property bool $is_fallback
 * @property string $certificate_status
 * @property Tenant $tenant
 */
class Domain extends BaseDomain
{
    
    public static function domainFromSubdomain(string $subdomain): string
    {
        return $subdomain . '.' . config('tenancy.central_domains')[0];
    }

    public function isSubdomain(): bool
    {
        return !Str::contains($this->domain, '.');
    }

    public function getTypeAttribute(): string
    {
        return $this->isSubdomain() ? 'subdomain' : 'domain';
    }
}

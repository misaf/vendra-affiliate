<?php

declare(strict_types=1);

namespace Misaf\VendraAffiliate\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Attributes\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Misaf\VendraActivityLog\Concerns\HasDefaultActivityLogOptions;
use Misaf\VendraAffiliate\Database\Factories\AffiliateUserFactory;
use Misaf\VendraAffiliate\Traits\BelongsToAffiliate;
use Misaf\VendraTenant\Traits\BelongsToTenant;
use Misaf\VendraUser\Traits\BelongsToUser;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * @property int $id
 * @property int $tenant_id
 * @property int $affiliate_id
 * @property int $user_id
 * @property int $commission_earned
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 */
#[Fillable(['affiliate_id', 'user_id', 'commission_earned'])]
#[Hidden(['tenant_id'])]
#[UseFactory(AffiliateUserFactory::class)]
final class AffiliateUser extends Model
{
    use BelongsToAffiliate;
    use BelongsToTenant;

    use BelongsToUser;
    use HasDefaultActivityLogOptions;
    /** @use HasFactory<AffiliateUserFactory> */
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    /**
     * @var array<string, string>
     */
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id'                => 'integer',
            'tenant_id'         => 'integer',
            'affiliate_id'      => 'integer',
            'user_id'           => 'integer',
            'commission_earned' => 'integer',
        ];
    }

    /**
     * @var list<string>
     */

    /**
     * @var list<string>
     */

}

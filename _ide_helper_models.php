<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CashbackMerchant
 *
 * @property int $id
 * @property string $merchant_uuid
 * @property int $homepage_id
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property int $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Homepage $homepage
 * @property-read \App\Models\Merchant $merchant
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereHomepageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereMerchantUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashbackMerchant whereUpdatedAt($value)
 */
	class CashbackMerchant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HelloBar
 *
 * @property int $id
 * @property string $message
 * @property string $call_to_action
 * @property string $link
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar query()
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereCallToAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HelloBar whereUpdatedAt($value)
 */
	class HelloBar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Homepage
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CashbackMerchant> $cashbackMerchants
 * @property-read int|null $cashback_merchants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HomepageCarouselFeature> $homepageCarouselFeatures
 * @property-read int|null $homepage_carousel_features_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\OfferGroup> $offerGroups
 * @property-read int|null $offer_groups_count
 * @method static \Database\Factories\HomepageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage query()
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homepage whereUpdatedAt($value)
 */
	class Homepage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\HomepageCarouselFeature
 *
 * @property int $id
 * @property string $uuid
 * @property int $homepage_id
 * @property \App\Models\Enums\CarouselType $type
 * @property mixed $primary_image
 * @property mixed $secondary_image
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property int $rank
 * @property string $title
 * @property string $overline
 * @property string $cta
 * @property string|null $link
 * @property string|null $offer_uuid
 * @property \App\Models\Enums\CarouselTheme $theme
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Homepage $homepage
 * @property-read \App\Models\Offer|null $offer
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature query()
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereCta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereHomepageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereOfferUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereOverline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature wherePrimaryImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereSecondaryImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HomepageCarouselFeature whereUuid($value)
 */
	class HomepageCarouselFeature extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Merchant
 *
 * @property-read Image $image
 * @property string $uuid
 * @property string $cqms_uuid
 * @property bool $is_active
 * @property string $name
 * @property string $slug
 * @property string $image_bg_color
 * @property string $locale
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereCqmsUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereImageBgColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Merchant withUuid($uuid)
 */
	class Merchant extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Offer
 *
 * @property string $uuid
 * @property string|null $merchant_uuid
 * @property int $is_active
 * @property bool $is_sitewide
 * @property int $is_expired
 * @property string|null $starts_at
 * @property string|null $ends_at
 * @property \App\Models\Enums\OfferType $type
 * @property string $title
 * @property string|null $description
 * @property string|null $exclusions
 * @property string|null $coupon_code
 * @property int|null $discount_amount
 * @property \App\Models\Enums\OfferDiscountUnit|null $discount_unit
 * @property bool|null $discount_up_to
 * @property bool $is_exclusive
 * @property bool $has_free_shipping
 * @property bool $available_in_store
 * @property bool $available_online
 * @property string|null $verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OfferClick|null $clickCount
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HomepageCarouselFeature> $homepageCarouselFeatures
 * @property-read int|null $homepage_carousel_features_count
 * @property-read \App\Models\Merchant|null $merchant
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereAvailableInStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereAvailableOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscountAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscountUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereDiscountUpTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereExclusions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereHasFreeShipping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereIsExclusive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereIsExpired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereIsSitewide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereMerchantUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Offer whereVerifiedAt($value)
 */
	class Offer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfferClick
 *
 * @property string $offer_uuid
 * @property int $click_count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick whereClickCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick whereOfferUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferClick whereUpdatedAt($value)
 */
	class OfferClick extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfferGroup
 *
 * @property int $id
 * @property string $title
 * @property int $homepage_id
 * @property string|null $link
 * @property string|null $link_text
 * @property int $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Homepage $homepage
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereHomepageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereLinkText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroup whereUpdatedAt($value)
 */
	class OfferGroup extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OfferGroupOffer
 *
 * @property int $id
 * @property int $offer_group_id
 * @property string|null $title
 * @property string $offer_uuid
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property int $rank
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OfferGroup|null $offerGroup
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereOfferGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereOfferUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OfferGroupOffer whereUpdatedAt($value)
 */
	class OfferGroupOffer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Redirect
 *
 * @property int $id
 * @property string $path
 * @property string $new_location
 * @property int $status_code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RedirectFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect query()
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereNewLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redirect whereUpdatedAt($value)
 */
	class Redirect extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SeasonalLink
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon $starts_at
 * @property \Illuminate\Support\Carbon $ends_at
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink query()
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereEndsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereStartsAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SeasonalLink whereUpdatedAt($value)
 */
	class SeasonalLink extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}


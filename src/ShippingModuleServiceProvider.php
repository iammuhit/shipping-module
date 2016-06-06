<?php namespace Anomaly\ShippingModule;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

/**
 * Class ShippingModuleServiceProvider
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ShippingModule
 */
class ShippingModuleServiceProvider extends AddonServiceProvider
{

    /**
     * The addon singletons.
     *
     * @var array
     */
    protected $singletons = [
        'Anomaly\ShippingModule\Rate\Contract\RateRepositoryInterface'       => 'Anomaly\ShippingModule\Rate\RateRepository',
        'Anomaly\ShippingModule\Zone\Contract\ZoneRepositoryInterface'       => 'Anomaly\ShippingModule\Zone\ZoneRepository',
        'Anomaly\ShippingModule\Package\Contract\PackageRepositoryInterface' => 'Anomaly\ShippingModule\Package\PackageRepository',
    ];
}

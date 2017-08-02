<?php namespace Anomaly\ShippingModule\Shipping;

use Anomaly\CustomersModule\Address\Contract\AddressInterface;
use Anomaly\ShippingModule\Method\MethodCollection;
use Anomaly\ShippingModule\Method\MethodResolver;
use Anomaly\ShippingModule\Zone\ZoneResolver;

/**
 * Class ShippingResolver
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ShippingResolver
{

    /**
     * The zone resolver.
     *
     * @var ZoneResolver $zones
     */
    protected $zones;

    /**
     * The method resolver.
     *
     * @var MethodResolver
     */
    protected $methods;

    /**
     * Create a new ShippingResolver instance.
     *
     * @param ZoneResolver   $zones
     * @param MethodResolver $methods
     */
    public function __construct(ZoneResolver $zones, MethodResolver $methods)
    {
        $this->zones   = $zones;
        $this->methods = $methods;
    }

    /**
     * Resolve the available shipping methods.
     *
     * @param AddressInterface $address
     * @return MethodCollection|null
     */
    public function resolve(AddressInterface $address)
    {
        if (!$zone = $this->zones->resolve($address)) {
            return new MethodCollection();
        }

        $methods = $this->methods->resolve($zone);

        return $methods;
    }
}
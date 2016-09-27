<?php namespace Anomaly\ShippingModule\Shippable\Command;

use Anomaly\ShippingModule\Method\MethodCollection;
use Anomaly\ShippingModule\Shippable\Contract\ShippableInterface;
use Anomaly\ShippingModule\Shippable\ShippableResolver;

/**
 * Class GetShippingMethods
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class GetShippingMethods
{

    /**
     * The shippable interface.
     *
     * @var ShippableInterface
     */
    protected $shippable;

    /**
     * The zone parameters.
     *
     * @var array
     */
    private $parameters;

    /**
     * Create a new GetShippingMethods instance.
     *
     * @param ShippableInterface $shippable
     * @param array              $parameters
     */
    public function __construct(ShippableInterface $shippable, array $parameters = [])
    {
        $this->shippable  = $shippable;
        $this->parameters = $parameters;
    }

    /**
     * Handle the command.
     *
     * @param ShippableResolver $resolver
     * @return MethodCollection
     */
    public function handle(ShippableResolver $resolver)
    {
        return $resolver->resolve($this->shippable->getGroup(), $this->parameters);
    }
}

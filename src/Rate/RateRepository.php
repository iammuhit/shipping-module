<?php namespace Anomaly\ShippingModule\Rate;

use Anomaly\ShippingModule\Rate\Contract\RateRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class RateRepository extends EntryRepository implements RateRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var RateModel
     */
    protected $model;

    /**
     * Create a new RateRepository instance.
     *
     * @param RateModel $model
     */
    public function __construct(RateModel $model)
    {
        $this->model = $model;
    }
}

<?php namespace Anomaly\ShippingModule;

use Anomaly\ShippingModule\Zone\ZoneSeeder;
use Anomaly\Streams\Platform\Database\Seeder\Seeder;

/**
 * Class ShippingModuleSeeder
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 * @package       Anomaly\ShippingModule
 */
class ShippingModuleSeeder extends Seeder
{

    /**
     * Run the seeder.
     */
    public function run()
    {
        $this->call(ZoneSeeder::class);
    }
}

<?php namespace Anomaly\ShippingModule\Http\Controller\Admin;

use Anomaly\ShippingModule\Method\Contract\MethodInterface;
use Anomaly\ShippingModule\Method\Contract\MethodRepositoryInterface;
use Anomaly\ShippingModule\Method\Extension\MethodExtension;
use Anomaly\ShippingModule\Method\Form\MethodFormBuilder;
use Anomaly\ShippingModule\Method\Table\MethodTableBuilder;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionCollection;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

/**
 * Class MethodsController
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class MethodsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param MethodTableBuilder $table
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(MethodTableBuilder $table)
    {
        return $table->render();
    }

    /**
     * Return the ajax to choose method type.
     *
     * @param ExtensionCollection $extensions
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function choose(ExtensionCollection $extensions)
    {
        return $this->view->make(
            'anomaly.module.shipping::admin/methods/choose',
            [
                'methods' => $extensions->search('anomaly.module.shipping::method.*'),
            ]
        );
    }

    /**
     * Create a new entry.
     *
     * @param MethodFormBuilder $form
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(ExtensionCollection $extensions)
    {
        /* @var MethodExtension $extension */
        $extension = $extensions->get($this->request->get('method'));

        return $extension
            ->form()
            ->render();
    }

    /**
     * Edit an existing entry.
     *
     * @param MethodFormBuilder $form
     * @param                   $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(MethodRepositoryInterface $methods, $id)
    {
        /* @var MethodInterface $method */
        $method = $methods->find($id);

        return $method
            ->extension()
            ->form()
            ->render();
    }
}

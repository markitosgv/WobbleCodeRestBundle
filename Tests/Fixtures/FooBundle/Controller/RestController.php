<?php

namespace Tests\Fixtures\FooBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use WobbleCode\RestBundle\Configuration\Rest;

/**
 * @Route(service="test.rest.multiple")
 */
class RestController
{
    protected $return = [
        'entity' => [
            'name' => 'Luis'
        ]
    ];

    /**
     * @Rest()
     * @Route("/basic/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getBasicAction()
    {
        return $this->return;
    }

    /**
     * @Rest(defaultAccept="application/json")
     * @Route("/default/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getDefaultAction()
    {
        return $this->return;
    }

    /**
     * @Rest(acceptedContent={"all"})
     * @Route("/all/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getAllAction()
    {
        return $this->return;
    }

    /**
     * @Rest(acceptedContent={"all"}, defaultAccept="application/json")
     * @Route("/mix/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getMixAction()
    {
        return $this->return;
    }

    /**
     * @Rest()
     * @Route("/httpcode/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getSetCodeAction()
    {
        return [
            'status_code' => 208,
            'entity' => [
                'name' => 'Luis'
            ]
        ];
    }

    /**
     * @Rest(statusCodeParam="http_code")
     * @Route("/customcode/1")
     * @Template("FooBundle:Rest:item.html.twig")
     */
    public function getCustomCodeAction()
    {
        return [
            'http_code' => 208,
            'entity' => [
                'name' => 'Luis'
            ]
        ];
    }
}

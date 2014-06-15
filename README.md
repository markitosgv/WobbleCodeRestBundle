
# WobbleCodeRestBundle

A bundle that creates REST Apis based on your current controllers actions in
seconds just using annotations. This is very helpful if you need to access to a
basic REST api under the same domain or page Practical Case: if you're using
Backbone, you can progressive enhance the functionality supporting common CRUD
or One simple page Crud.

These are the main features:

+ Works with your current controllers
+ Works with your current Symfony forms
+ Intercepts current redirects
+ Version api support
+ Api based on content negotiation
+ Integrated with JMSSerializerBundle

### Quick Example

This is the most basic example of use. Just adding the Rest annotation, the api
will be available using content negotiation. So if you request JSON, it will
return a JSON format schema, If html is requested it will fallback in @Template
so the related view will be rendered.

It will use JSMSerializer if it's possible in
the model as well.

    use WobbleCode\RestBundle\Configuration\Rest;

    /**
     * @Route("/")
     * @Template()
     * @Rest()
     */
    public function indexAction()
    {
        ...

        return array(
            'entity' => $entity
        );
    }

## Setup

### Add to composer

    "wobblecode/rest-bundle": "dev-master",

### Enable bundle in Kernel

    new WobbleCode\RestBundle\WobbleCodeRestBundle()

## Options

**All examples shows the default values.**

### output

List of default objects to serialize from the returned array.

    /**
     * @Rest(output={"entity", "entities", "meta"})
     */
    public function indexAction()
    {
        ...

        return array(
            'user'   => $user,
            'post'   => $post,
            'entity' => $entity
        );
    }

Only `entity` value will be serialized and returned.

### acceptedContent

List of accepted headers that enables REST

    /**
     * @Rest(acceptedContent={"application/json"})
     */

You will have to send `Accept: application/json` in order to enable the REST api
functionality. If there is no match, it will fallback to the controller view.

### payloadMapping

Define if the payload is assigned to a POST value. This is useful because
usually forms are expecting to be received under a POST variable with the name
of the form Eg: `$_POST['my_form_name']`

    /**
     * @Rest(payloadMapping={"form"})
     */

### statusCodeParam

Parameter used to override status code response.

    /**
     * @Route("/")
     * @Template()
     * @Rest(statusCodeParam="status_code")
     */
    public function indexAction()
    {
        ...

        return array(
            'status_code' => '403'
        );
    }

### versionRequired

Force to send version in Accept header if true

    /**
     * @Rest(versionRequired=false)
     */

### defaultVersion

Define the default version of the api, false as default for no versioning

### interceptRedirects

Intercept 3xx redirects and responds with flash messages

### processForms

Process forms errors

### defaultFormParam

Process params with name form as principal Form for validation

## License

Copyright (c) 2014 Luis Hdez

Released under MIT LICENSE, more info at LICENSE-MIT file.

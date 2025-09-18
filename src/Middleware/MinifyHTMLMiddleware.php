<?php

namespace Innoweb\MinifyHTML\Middleware;

use Innoweb\MinifyHTML\Util\HTMLMinifier;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Control\HTTPResponse;
use SilverStripe\Control\Middleware\HTTPMiddleware;

class MinifyHTMLMiddleware implements HTTPMiddleware
{
    /**
     * Generate response for the given request
     *
     * @param HTTPRequest $request
     * @param callable $delegate
     * @return HTTPResponse|null
     */
    public function process(HTTPRequest $request, callable $delegate): ?HTTPResponse
    {
        /** @var HTTPResponse $response */
        $response = $delegate($request);
        if (!$response) {
            return null;
        }

        if (
            array_key_exists('Controller', $request->routeParams())
            && $request->routeParams()['Controller'] != 'SilverStripe\Admin\AdminRootController'
            && $request->routeParams()['Controller'] != '%$SilverStripe\GraphQL\Controller.admin'
			&& str_contains(strtolower($response->getHeader('content-type')), 'text/html')
        ) {
            $body = $response->getBody();
            $body = HTMLMinifier::minify($body);
            $response->setBody($body);
        }

        return $response;
    }

}

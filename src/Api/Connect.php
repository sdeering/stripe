<?php

/**
 * Part of the Stripe package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Stripe
 * @version    1.0.3
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\Stripe\Api;

use Cartalyst\Stripe\Utility;
use Cartalyst\Stripe\Http\Client;
use Cartalyst\Stripe\ConfigInterface;


class Connect extends Api
{

    /**
     * {@inheritDoc}
     */
    public function baseUrl()
    {
        return 'https://connect.stripe.com';
    }

    /**
     * {@inheritDoc}
     */
    public function execute($httpMethod, $url, array $parameters = [], array $body = [])
    {
        $parameters = Utility::prepareParameters($parameters);

        return $this->getClient()->{$httpMethod}("/{$url}", [ 'query' => $parameters, 'body' => $body ]);
    }

    /**
     * Request a new access token.
     * https://stripe.com/docs/connect/reference#post-token
     *
     * @param  array  $parameters
     * @return array
     */
    public function accessToken(array $parameters)
    {
        return $this->_post('oauth/token', $parameters);
    }

    /**
     * Request to disconnect a connected account.
     * https://stripe.com/docs/connect/reference#post-deauthorize
     *
     * @param  array  $parameters
     * @return array
     */
    public function deauthorize(array $parameters)
    {
        return $this->_post('oauth/deauthorize', $parameters);
    }

}

<?php


namespace XPack\Security\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Class PutRole
 *
 * @category Endpoints
 * @package  XPack\Security\Endpoints
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */

class PutRole extends AbstractEndpoint
{
    /** @var  string */
    protected $name;

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }
        $this->name = $name;
        return $this;
    }

    /**
     * @param $body
     * @return $this
     */
    public function setBody($body)
    {
        if (isset($body) !== true) {
            return $this;
        }
        $this->body = $body;
        return $this;
    }

    /**
     * @return string
     */
    public function getURI()
    {
        if (isset($this->name) !== true) {
            throw new Exceptions\RuntimeException(
                'name is required for PutRole'
            );
        }
        return "/_xpack/security/role/{$this->name}";
    }

    /**
     * @return string[]
     */
    public function getParamWhitelist()
    {
        return [
            'refresh'
        ];
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return "PUT";
    }
}
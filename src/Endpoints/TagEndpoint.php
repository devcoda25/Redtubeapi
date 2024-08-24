<?php

namespace devcoda25\Redtube\Endpoints;

use Illuminate\Support\Collection;
use devcoda25\Redtube\Entities\Tags;


/**
 * Tag Endpoint
 *
 * @package devcoda25\Redtube\Endpoints
 * @author Lukáš Homza <lhomza@webland.company>
 */
class TagEndpoint extends AbstractEndpoint
{

    /**
     * Get all tags
     *
     * @return Collection
     * @throws \RuntimeException
     */
    public function getAll()
    {
        $response = $this->call('Tags.getTagList');

        return $this->serializer
            ->deserialize($response, Tags::class, static::OUTPUT_FORMAT)
            ->flatten();
    }

}

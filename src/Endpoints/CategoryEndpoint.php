<?php

namespace devcoda25\Redtube\Endpoints;

use Illuminate\Support\Collection;
use devcoda25\Redtube\Entities\Categories;


/**
 * Category Endpoint
 *
 * @package devcoda25\Redtube\Endpoints
 * @author devcoda25 <lhomza@webland.company>
 */
class CategoryEndpoint extends AbstractEndpoint
{

    /**
     * Get all categories
     *
     * @return Collection
     * @throws \RuntimeException
     */
    public function getAll()
    {
        $response = $this->call('Categories.getCategoriesList');

        return $this->serializer
            ->deserialize($response, Categories::class, static::OUTPUT_FORMAT)
            ->flatten();
    }

}

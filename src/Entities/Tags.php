<?php

namespace devcoda25\Redtube\Entities;

use Illuminate\Support\Collection;
use JMS\Serializer\Annotation as JMS;


/**
 * Class Category
 *
 * @package devcoda25\Redtube\Entities
 * @author Lukáš Homza <lhomza@webland.company>
 *
 * @JMS\XmlRoot("tags")
 */
class Tags
{

    /**
     * @var Collection $items
     *
     * @JMS\XmlList(entry="tag", inline=true)
     * @JMS\Type("Illuminate\Support\Collection<devcoda25\Redtube\Entities\Tag>")
     */
    protected $items;

    /**
     * @return Collection
     */
    public function flatten()
    {
        return $this->items;
    }

}

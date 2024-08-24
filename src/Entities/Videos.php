<?php

namespace devcoda25\Redtube\Entities;

use Illuminate\Support\Collection;
use JMS\Serializer\Annotation as JMS;


/**
 * Videos
 *
 * @package devcoda25\Redtube\Entities
 * @author Lukáš Homza <lhomza@webland.company>
 *
 * @JMS\XmlRoot("videos")
 */
class Videos
{

    /**
     * @var Collection $items
     *
     * @JMS\XmlList(entry="video", inline=true)
     * @JMS\Type("Illuminate\Support\Collection<devcoda25\Redtube\Entities\Video>")
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

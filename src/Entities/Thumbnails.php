<?php

namespace devcoda25\Redtube\Entities;

use Illuminate\Support\Collection;
use JMS\Serializer\Annotation as JMS;


/**
 * Thumbnails
 *
 * @package devcoda25\Redtube\Entities
 * @author Lukáš Homza <lhomza@webland.company>
 *
 * @JMS\XmlRoot("thumbs")
 */
class Thumbnails
{

    /**
     * @var Collection $items
     *
     * @JMS\XmlList(entry="thumb", inline=true)
     * @JMS\Type("Illuminate\Support\Collection<devcoda25\Redtube\Entities\Thumbnail>")
     */
    private $items;

    /**
     * @return Collection
     */
    public function flatten()
    {
        return $this->items;
    }

}

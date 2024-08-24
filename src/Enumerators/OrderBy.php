<?php

namespace devcoda25\Redtube\Enumerators;

use MyCLabs\Enum\Enum;


/**
 * OrderBy Enumerator
 *
 * @package devcoda25\Redtube\Enumerators
 * @author Lukáš Homza <lhomza@webland.company>
 */
final class OrderBy extends Enum
{

    const NEWEST = 'newest';
    const MOST_VIEWED = 'mostviewed';
    const RATING = 'rating';

}

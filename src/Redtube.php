<?php

namespace devcoda25\Redtube;

use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\VisitorInterface;
use devcoda25\Redtube\Endpoints\CategoryEndpoint;
use devcoda25\Redtube\Endpoints\StarEndpoint;
use devcoda25\Redtube\Endpoints\TagEndpoint;
use devcoda25\Redtube\Endpoints\VideoEndpoint;
use devcoda25\Redtube\Entities\Video;
use devcoda25\Redtube\Entities\Videos;


/**
 * Redtube API client
 *
 * @package devcoda25\Redtube
 * @author Lukáš Homza <lhomza@webland.company>
 */
class Redtube
{

    /**
     * Category endpoint
     *
     * @var CategoryEndpoint $categories
     */
    public $categories;

    /**
     * Video endpoint
     *
     * @var VideoEndpoint $videos
     */
    public $videos;

    /**
     * Star endpoint
     *
     * @var StarEndpoint $stars
     */
    public $stars;

    /**
     * Tag endpoint
     *
     * @var TagEndpoint $tags
     */
    public $tags;

    /**
     * Prepare serializer
     *
     * @return \JMS\Serializer\Serializer
     */
    private function prepareSerializer(HandlerRegistry $handlerRegistry = null)
    {
        $serializer = SerializerBuilder::create()
            ->setDebug(false)
            ->addDefaultHandlers()
            ->addDefaultListeners();

        if ($handlerRegistry) {
            $serializer->configureHandlers(function (HandlerRegistry $registry) use ($handlerRegistry) {
                foreach ($handlerRegistry as $type => $handlers) {
                    foreach ($handlers as $handler) {
                        $registry->registerHandler(
                            GraphNavigator::DIRECTION_DESERIALIZATION,
                            $type,
                            'xml',
                            $handler
                        );
                    }
                }
            });
        }

        return $serializer->build();
    }


    /**
     * Create new Redtube API client
     *
     * @param string $host
     */
    public function __construct($host = 'https://api.redtube.com')
    {
        $client = new Client([
            'base_uri' => $host
        ]);

        $serializer = $this->prepareSerializer();

        $this->categories = new CategoryEndpoint($client, $serializer);
        $this->stars = new StarEndpoint($client, $serializer);
        $this->tags = new TagEndpoint($client, $serializer);
        $this->videos = new VideoEndpoint($client, $serializer);
    }

}

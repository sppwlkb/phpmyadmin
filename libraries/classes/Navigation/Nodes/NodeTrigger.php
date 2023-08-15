<?php
/**
 * Functionality for the navigation tree
 */

declare(strict_types=1);

namespace PhpMyAdmin\Navigation\Nodes;

use PhpMyAdmin\Navigation\NodeType;

use function __;

/**
 * Represents a trigger node in the navigation tree
 */
class NodeTrigger extends Node
{
    /**
     * Initialises the class
     *
     * @param string   $name    An identifier for the new node
     * @param NodeType $type    Type of node, may be one of CONTAINER or OBJECT
     * @param bool     $isGroup Whether this object has been created
     *                          while grouping nodes
     */
    public function __construct(string $name, NodeType $type = NodeType::Object, bool $isGroup = false)
    {
        parent::__construct($name, $type, $isGroup);

        $this->icon = ['image' => 'b_triggers', 'title' => __('Trigger')];
        $this->links = [
            'text' => [
                'route' => '/triggers',
                'params' => ['edit_item' => 1, 'db' => null, 'item_name' => null],
            ],
            'icon' => [
                'route' => '/triggers',
                'params' => ['export_item' => 1, 'db' => null, 'item_name' => null],
            ],
        ];
        $this->classes = 'trigger';
        $this->urlParamName = 'item_name';
    }
}

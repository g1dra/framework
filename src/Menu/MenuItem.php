<?php
namespace AvoRed\Framework\Menu;

use AvoRed\Framework\Support\Contracts\MenuInterface;

class MenuItem implements MenuInterface
{
    /**
     * @var string $label
     */
    protected $label;

    /**
     * @var string $icon
     */
    protected $icon;

    /**
     * @var array $attributes
     */
    protected $attributes;

    /**
     * @var string $key
     */
    protected $key;

    /**
     * @var string $params
     */
    protected $params;

    /**
     * @var string $routeName
     */
    protected $routeName;

    /**
     *  AvoRed Front Menu Construct method.
     */
    public function __construct($callable)
    {
        $this->callback = $callable;
        $callable($this);
    }

    /**
     * Get/Set Admin Menu Label.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function label($label = null)
    {
        if (null !== $label) {
            $this->label = $label;
            return $this;
        }
        return $this->label;
    }

    /**
     * Get/Set Admin Menu Identifier.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function key($key = null)
    {
        if (null !== $key) {
            $this->key = $key;
            return $this;
        }
        return $this->key;
    }

    /**
     * Get/Set Admin Menu Route Name.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function route($routeName = null)
    {
        if (null !== $routeName) {
            $this->routeName = $routeName;
            return $this;
        }
        return $this->routeName;
    }

    /**
     * Get/Set Admin Menu Route Params Name.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function params($params = null)
    {
        if (null !== $params) {
            $this->params = $params;
            return $this;
        }
        return $this->params;
    }

    /**
     * Get/Set Admin Menu Icon.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function icon($icon = null)
    {
        if (null !== $icon) {
            $this->icon = $icon;
            return $this;
        }
        return $this->icon;
    }

    /**
     * Get/Set Admin Menu Icon.
     * @return \AvoRed\Framework\Menu\Menu|string
     */
    public function attributes($attributes = null)
    {
        if (null !== $attributes) {
            $this->attributes = $attributes;
            return $this;
        }
        return $this->attributes;
    }

    /**
     * Get/Set Admin Menu Sub Menu.
     * @param null|string $key
     * @param mixed $menuItem
     * @return \AvoRed\Framework\AdminMenu\AdminMenu
     */
    public function subMenu($key = null, $menuItem = null)
    {
        if (null === $menuItem) {
            return $this->subMenu;
        }
        $menu = new MenuItem($menuItem);
        $this->subMenu[$key] = $menu;
        
        return $this;
    }

    /**
     * To check if a menu has submenu or not
     * @return bool
     */
    public function hasSubMenu()
    {
        if (isset($this->subMenu) && count($this->subMenu) > 0) {
            return true;
        }
        return false;
    }
}

<?php

namespace Newsroom\Modules\Shortcodes\Lib;

use Newsroom\Modules\Shortcodes\Button\Button;
use Newsroom\Modules\CustomFont\CustomFont;
use Newsroom\Modules\Dropcaps\Dropcaps;
use Newsroom\Modules\Highlight\Highlight;
use Newsroom\Modules\Shortcodes\Icon\Icon;
use Newsroom\Modules\OrderedList\OrderedList;
use Newsroom\Modules\SectionTitle\SectionTitle;
use Newsroom\Modules\Separator\Separator;
use Newsroom\Modules\SocialShare\SocialShare;
use Newsroom\Modules\GoogleMap\GoogleMap;
use Newsroom\Modules\ImageWithHoverInfo\ImageWithHoverInfo;
use Newsroom\Modules\ImageWithHoverInfoItem\ImageWithHoverInfoItem;

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader
{
    /**
     * @var private instance of current class
     */
    private static $instance;
    /**
     * @var array
     */
    private $loadedShortcodes = array();

    /**
     * Private constuct because of Singletone
     */
    private function __construct() {
    }

    /**
     * Private sleep because of Singletone
     */
    private function __wakeup() {
    }

    /**
     * Private clone because of Singletone
     */
    private function __clone() {
    }

    /**
     * Returns current instance of class
     * @return ShortcodeLoader
     */
    public static function getInstance() {
        if (self::$instance == null) {
            return new self;
        }

        return self::$instance;
    }

    /**
     * Adds new shortcode. Object that it takes must implement ShortcodeInterface
     * @param ShortcodeInterface $shortcode
     */
    private function addShortcode(ShortcodeInterface $shortcode) {
        if (!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
            $this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
        }
    }

    /**
     * Adds all shortcodes.
     *
     * @see ShortcodeLoader::addShortcode()
     */
    private function addShortcodes() {
        $this->addShortcode(new Button());
        $this->addShortcode(new CustomFont());
        $this->addShortcode(new Dropcaps());
        $this->addShortcode(new Highlight());
        $this->addShortcode(new Icon());
        $this->addShortcode(new OrderedList());
        $this->addShortcode(new SectionTitle());
        $this->addShortcode(new Separator());
        $this->addShortcode(new SocialShare());
        $this->addShortcode(new GoogleMap());
        $this->addShortcode(new ImageWithHoverInfo());
        $this->addShortcode(new ImageWithHoverInfoItem());
    }

    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();
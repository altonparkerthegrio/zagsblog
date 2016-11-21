<?php

namespace Newsroom\Modules\Blog\Shortcodes\Lib;

/*
	Layouts - shortcodes
*/
use Newsroom\Modules\Blog\Shortcodes\PostLayoutOne\PostLayoutOne;
use Newsroom\Modules\Blog\Shortcodes\PostLayoutTwo\PostLayoutTwo;
use Newsroom\Modules\Blog\Shortcodes\PostLayoutThree\PostLayoutThree;

/* 
	Blocks - combinations of several layouts
*/
use Newsroom\Modules\Blog\Shortcodes\BlockOne\BlockOne;
use Newsroom\Modules\Blog\Shortcodes\BlockTwo\BlockTwo;
use Newsroom\Modules\Blog\Shortcodes\BlockThree\BlockThree;
use Newsroom\Modules\Blog\Shortcodes\BlockFour\BlockFour;
use Newsroom\Modules\Blog\Shortcodes\BlockFive\BlockFive;

/*
	Post Sliders - combinations of several layouts
*/
use Newsroom\Modules\Blog\Shortcodes\SliderPostOne\SliderPostOne;
use Newsroom\Modules\Blog\Shortcodes\SliderPostTwo\SliderPostTwo;
use Newsroom\Modules\Blog\Shortcodes\SliderPostThree\SliderPostThree;
use Newsroom\Modules\Blog\Shortcodes\SliderPostFour\SliderPostFour;


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
     * Adds new shortcode. Object that it takes must implement ListShortcode
     * @param ListShortcode $shortcode
     */
    private function addShortcode(ListShortcode $shortcode) {
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
        $this->addShortcode(new PostLayoutOne());
        $this->addShortcode(new PostLayoutTwo());
        $this->addShortcode(new PostLayoutThree());
        $this->addShortcode(new BlockOne());
        $this->addShortcode(new BlockTwo());
        $this->addShortcode(new BlockThree());
        $this->addShortcode(new BlockFour());
        $this->addShortcode(new BlockFive());
        $this->addShortcode(new SliderPostOne());
        $this->addShortcode(new SliderPostTwo());
        $this->addShortcode(new SliderPostThree());
        $this->addShortcode(new SliderPostFour());
    }

    /**
     * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
     * of each shortcode object
     */
    public function load() {
        $this->addShortcodes();

        foreach ($this->loadedShortcodes as $shortcode) {
            add_shortcode($shortcode->getBase(), array($shortcode, 'renderHolders'));
        }
    }
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();
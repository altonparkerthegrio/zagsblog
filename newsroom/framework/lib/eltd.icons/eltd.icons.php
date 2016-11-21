<?php

include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.iconcollection.interface.php";
include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.fontawesome.php";
include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.fontelegant.php";
include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.ionicons.php";
include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.lineaicons.php";
include ELATED_FRAMEWORK_ROOT_DIR . "/lib/eltd.icons/eltd.simplelineicons.php";

/*
  Class: NewsroomElatedIconCollections
  A class that initializes Elated Icon Collections
 */

class NewsroomElatedIconCollections
{

    private static $instance;
    public $iconCollections;
    public $VCParamsArray;
    public $iconPackParamName;

    private function __construct() {
        $this->iconPackParamName = 'icon_pack';
        $this->initIconCollections();
    }

    public static function get_instance() {

        if (null == self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Method that adds individual collections to set of collections
     */
    private function initIconCollections() {
        $this->addIconCollection('font_awesome', new NewsroomElatedIconsFontAwesome("Font Awesome", "fa_icon"));
        $this->addIconCollection('font_elegant', new NewsroomElatedIconsFontElegant("Font Elegant", "fe_icon"));
        $this->addIconCollection('ion_icons', new NewsroomElatedIonIcons("Ion Icons", "ion_icon"));
        $this->addIconCollection('linea_icons', new NewsroomElatedLineaIcons('Linea Icons', 'linea_icon'));
        $this->addIconCollection('simple_line_icons', new NewsroomElatedSimpleLineIcons('Simple Line Icons', 'simple_line_icons'));

    }

    public function getVCParamsArray($iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false) {
        if ($emptyIconPack) {
            $iconCollectionsVC = $this->getIconCollectionsVCEmpty();
        } else {
            $iconCollectionsVC = $this->getIconCollectionsVC();
        }

        $iconPackParams = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon pack', 'newsroom'),
            'param_name' => $this->iconPackParamName,
            'value' => $iconCollectionsVC,
            'save_always' => true
        );

        if ($iconPackDependency !== "") {
            $iconPackParams["dependency"] = $iconPackDependency;
        }

        $iconPackParams = array($iconPackParams);

        $iconSetParams = array();
        if (is_array($this->iconCollections) && count($this->iconCollections)) {
            foreach ($this->iconCollections as $key => $collection) {
                $iconSetParams[] = array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Icon', 'newsroom'),
                    'param_name' => $iconCollectionPrefix . $collection->param,
                    'value' => $collection->getIconsArray(),
                    'dependency' => array('element' => $this->iconPackParamName, 'value' => array($key)),
                    'save_always' => true
                );
            }
        }

        return array_merge($iconPackParams, $iconSetParams);
    }

    public function getSocialVCParamsArray($iconPackDependency = array(), $iconCollectionPrefix = "", $emptyIconPack = false, $exclude = '') {
        if ($emptyIconPack) {
            $iconCollectionsVC = $this->getIconCollectionsVCEmptyExclude($exclude);
        } else {
            $iconCollectionsVC = $this->getIconCollectionsVCExclude($exclude);
        }

        $iconPackParams = array(
            'type' => 'dropdown',
            'heading' => esc_html__('Icon Pack', 'newsroom'),
            'param_name' => $this->iconPackParamName,
            'value' => $iconCollectionsVC,
            'save_always' => true
        );

        if ($iconPackDependency !== "") {
            $iconPackParams["dependency"] = $iconPackDependency;
        }

        $iconPackParams = array($iconPackParams);

        $iconCollections = $this->iconCollections;
        if (is_array($exclude) && count($exclude)) {
            foreach ($exclude as $exclude_key) {
                if (array_key_exists($exclude_key, $this->iconCollections)) {

                    unset($iconCollections[$exclude_key]);
                }
            }

        } else {
            if (array_key_exists($exclude, $this->iconCollections)) {
                unset($iconCollections[$exclude]);
            }
        }

        $iconSetParams = array();
        if (is_array($iconCollections) && count($iconCollections)) {
            foreach ($iconCollections as $key => $collection) {
                $iconSetParams[] = array(
                    'type' => 'dropdown',
                    'class' => '',
                    'heading' => esc_html__('Icon', 'newsroom'),
                    'param_name' => $iconCollectionPrefix . $collection->param,
                    'value' => $collection->getSocialIconsArrayVC(),
                    'dependency' => array('element' => $this->iconPackParamName, 'value' => array($key)),
                    'save_always' => true
                );
            }
        }

        return array_merge($iconPackParams, $iconSetParams);
    }

    public function getSocialIconWidgetParamsArray() {

        $iconCollectionsVC = $this->getCollectionsWithSocialIcons();

        $iconPackParams[] = array(
            'type' => 'dropdown',
            'title' => esc_html__('Icon Pack', 'newsroom'),
            'name' => 'icon_pack',
            'options' => array(
                'font_awesome' => esc_html__('Font Awesome', 'newsroom'),
                'font_elegant' => esc_html__('Font Elegant', 'newsroom'),
                'ion_icons' => esc_html__('Ion Icons', 'newsroom'),
                'simple_line_icons' => esc_html__('Simple Line Icons', 'newsroom')
            ),
            'description' => esc_html__('Choose a social icon pack and then select an icon from that pack which you would like to display', 'newsroom')
        );

        $iconSetParams = array();
        if (is_array($iconCollectionsVC) && count($iconCollectionsVC)) {
            foreach ($iconCollectionsVC as $key => $collection) {
                $iconSetParams[] = array(
                    'type' => 'dropdown',
                    'title' => $collection->title . ' ' . esc_html__('Icon', 'newsroom'),
                    'name' => $collection->param,
                    'options' => array_flip($collection->getSocialIconsArrayVC())
                );
            }
        }

        return array_merge($iconPackParams, $iconSetParams);
    }

    public function getCollectionsWithSocialIcons() {
        $collectionsWithSocial = array();

        foreach ($this->iconCollections as $key => $collection) {
            if ($collection->hasSocialIcons()) {
                $collectionsWithSocial[$key] = $collection;
            }
        }

        return $collectionsWithSocial;
    }

    public function getIconSizesArray() {
        return array(
            esc_html__('Tiny', 'newsroom') => 'fa-lg',
            esc_html__('Small', 'newsroom') => 'fa-2x',
            esc_html__('Medium', 'newsroom') => 'fa-3x',
            esc_html__('Large', 'newsroom') => 'fa-4x',
            esc_html__('Very Large', 'newsroom') => 'fa-5x'
        );
    }

    public function getIconSizeClass($iconSize) {
        switch ($iconSize) {
            case "fa-lg":
                $iconSize = "eltd-tiny-icon";
                break;
            case "fa-2x":
                $iconSize = "eltd-small-icon";
                break;
            case "fa-3x":
                $iconSize = "eltd-medium-icon";
                break;
            case "fa-4x":
                $iconSize = "eltd-large-icon";
                break;
            case "fa-5x":
                $iconSize = "eltd-huge-icon";
                break;
            default:
                $iconSize = "eltd-small-icon";
        }

        return $iconSize;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function getIconCollectionParamNameByKey($key) {
        $collection = $this->getIconCollection($key);

        if ($collection) {
            return $collection->param;
        }

        return false;
    }

    public function getShortcodeParams($iconCollectionPrefix = "") {
        $iconCollectionsParam = array();
        foreach ($this->iconCollections as $key => $collection) {
            $iconCollectionsParam[$iconCollectionPrefix . $collection->param] = '';
        }

        return array_merge(array($this->iconPackParamName => '',), $iconCollectionsParam);
    }

    public function addIconCollection($key, $value) {
        $this->iconCollections[$key] = $value;
    }

    public function getIconCollection($key) {
        if (array_key_exists($key, $this->iconCollections)) {
            return $this->iconCollections[$key];
        }

        return false;
    }

    public function getIconCollectionIcons(iNewsroomElatedIconCollection $collection) {
        return $collection->getIconsArray();
    }

    public function getIconCollectionsVC() {
        $vc_array = array();
        foreach ($this->iconCollections as $key => $collection) {
            $vc_array[$collection->title] = $key;
        }

        return $vc_array;
    }

    public function getIconCollectionsVCExclude($exclude) {
        $array = $this->getIconCollectionsVC();

        if (is_array($exclude) && count($exclude)) {
            foreach ($exclude as $key) {
                if (($x = array_search($key, $array)) !== false) {
                    unset($array[$x]);
                }
            }

        } else {
            if (($x = array_search($exclude, $array)) !== false) {
                unset($array[$x]);
            }
        }

        return $array;
    }

    public function getIconCollectionsKeys() {
        return array_keys($this->iconCollections);
    }

    /**
     * Method that returns an array of 'param' attribute of each icon collection
     * @return array array of param attributes
     */
    public function getIconCollectionsParams() {
        $paramArray = array();
        if (is_array($this->iconCollections) && count($this->iconCollections)) {
            foreach ($this->iconCollections as $key => $obj) {
                $paramArray[] = $obj->param;
            }
        }

        return $paramArray;
    }

    public function getIconCollections() {
        $array = array();
        foreach ($this->iconCollections as $key => $collection) {
            $array[$key] = $collection->title;
        }

        return $array;
    }

    public function getIconCollectionsEmpty($no_empty_key = "") {
        $array = array();
        $array[$no_empty_key] = "No Icon";
        foreach ($this->iconCollections as $key => $collection) {
            $array[$key] = $collection->title;
        }

        return $array;
    }

    public function getIconCollectionsVCEmpty() {
        $vc_array = array();
        $vc_array["No Icon"] = "";
        foreach ($this->iconCollections as $key => $collection) {
            $vc_array[$collection->title] = $key;
        }

        return $vc_array;
    }

    public function getIconCollectionsVCEmptyExclude($key) {
        $array = $this->getIconCollectionsVCEmpty();
        if (($x = array_search($key, $array)) !== false) {
            unset($array[$x]);
        }

        return $array;
    }

    public function getIconCollectionsExclude($exclude) {
        $array = $this->getIconCollections();

        if (is_array($exclude) && count($exclude)) {
            foreach ($exclude as $exclude_key) {
                if (array_key_exists($exclude_key, $array)) {
                    unset($array[$exclude_key]);
                }
            }

        } else {
            if (array_key_exists($exclude, $array)) {
                unset($array[$exclude]);
            }
        }

        return $array;
    }

    public function hasIconCollection($key) {

        return array_key_exists($key, $this->iconCollections);
    }

    /**
     * Method that renders icon for given icon pack
     *
     * @param $icon icon to render
     * @param $iconPack icon pack to render icon from
     * @param $params parameters for icon
     *
     * @return mixed
     */
    public function renderIcon($icon, $iconPack, $params = array()) {
        if ($this->hasIconCollection($iconPack)) {
            $iconObject = $this->getIconCollection($iconPack);
            return $iconObject->render($icon, $params);
        }
    }

    public function enqueueStyles() {
        if (is_array($this->iconCollections) && count($this->iconCollections)) {
            foreach ($this->iconCollections as $collection_key => $collection_obj) {
                wp_enqueue_style('eltd_' . $collection_key, $collection_obj->styleUrl);
            }
        }
    }

    # HEADER AND SIDE MENU ICONS
    public function getSearchIcon($iconPack, $return) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);
            if ($return) {
                return $iconsObject->getSearchIcon();
            } else {
                print $iconsObject->getSearchIcon();
            }
        }
    }

    public function getSearchClose($iconPack, $return) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);
            if ($return) {
                return $iconsObject->getSearchClose();
            } else {
                print $iconsObject->getSearchClose();
            }
        }
    }

    public function getSearchIconValue($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);
            print $iconsObject->getSearchIconValue();
        }
    }

    public function getMenuSideIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);
            print $iconsObject->getMenuSideIcon();
        }
    }

    public function getMobileMenuIcon($iconPack, $return = false) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            if ($return) {
                return $iconsObject->getMobileMenuIcon();
            } else {
                print $iconsObject->getMobileMenuIcon();
            }
        }
    }

    public function getQuoteIcon($iconPack, $return = false) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);
            if ($return == true) {
                return $iconsObject->getQuoteIcon();
            } else {
                print $iconsObject->getQuoteIcon();
            }
        }
    }

    # SOCIAL SIDEBAR ICONS
    public function getFacebookIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getFacebookIcon();
        }
    }

    public function getTwitterIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getTwitterIcon();
        }
    }

    public function getGooglePlusIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getGooglePlusIcon();
        }
    }

    public function getLinkedInIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getLinkedInIcon();
        }
    }

    public function getTumblrIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getTumblrIcon();
        }
    }

    public function getPinterestIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getPinterestIcon();
        }
    }

    public function getVKIcon($iconPack) {

        if ($this->hasIconCollection($iconPack)) {

            $iconsObject = $this->getIconCollection($iconPack);

            return $iconsObject->getVKIcon();
        }
    }
}

if (!function_exists('newsroom_elated_activate_theme_icons')) {

    function newsroom_elated_activate_theme_icons() {
        global $newsroom_IconCollections;
        $newsroom_IconCollections = NewsroomElatedIconCollections::get_instance();
    }

    add_action('after_setup_theme', 'newsroom_elated_activate_theme_icons');
}
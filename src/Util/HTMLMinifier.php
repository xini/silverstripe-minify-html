<?php

namespace Innoweb\MinifyHTML\Util;

use SilverStripe\Core\Config\Configurable;
use voku\helper\HtmlMin;

class HTMLMinifier
{
    use Configurable;

    /**
     * Disable all optimisations
     * @var bool
     */
    private static $enable_minification = true;

    /**
     * Optimize html via "HtmlDomParser()"
     * @var bool
     */
    private static $optimize_via_html_dom_parser = true;

    /**
     * Remove default HTML comments
     * @var bool
     */
    private static $remove_comments = true;

    /**
     * Sum-up extra whitespace from the Dom
     * @var bool
     */
    private static $sum_up_whitespace = true;

    /**
     * Remove whitespace around tags
     * @var bool
     */
    private static $remove_whitespace_around_tags = true;

    /**
     * Optimize html attributes
     * @var bool
     */
    private static $optimize_attributes = true;

    /**
     * Remove optional "http:"-prefix from attributes (disabled by default)
     * @var bool
     */
    private static $remove_http_prefix_from_attributes = false;

    /**
     * remove optional "https:"-prefix from attributes (disabled by default)
     * @var bool
     */
    private static $remove_https_prefix_from_attributes = false;

    /**
     * Remove default attributes (disabled by default)
     * @var bool
     */
    private static $remove_default_attributes = false;

    /**
     * Remove deprecated anchor-jump (disabled by default)
     * @var bool
     */
    private static $remove_deprecated_anchor_name = false;

    /**
     * Remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway (disabled by default)
     * @var bool
     */
    private static $remove_deprecated_script_charset_attribute = false;

    /**
     * Remove deprecated script-mime-types
     * @var bool
     */
    private static $remove_deprecated_type_from_script_tag = true;

    /**
     * Remove "type=text/css" for css links
     * @var bool
     */
    private static $remove_deprecated_type_from_stylesheet_link = true;

    /**
     * remove "media="all" from all links and styles (disabled by default)
     * @var bool
     */
    private static $remove_default_media_type_from_style_and_link_tag = false;

    /**
     * remove type="submit" from button tags (disabled by default)
     * @var bool
     */
    private static $remove_default_type_from_button = false;

    /**
     * Remove some empty attributes
     * @var bool
     */
    private static $remove_empty_attributes = true;

    /**
     * Remove 'value=""' from empty <input>
     * @var bool
     */
    private static $remove_value_from_empty_input = true;

    /**
     * Sort css-class-names, for better gzip results
     * @var bool
     */
    private static $sort_css_class_names = true;

    /**
     * Sort html-attributes, for better gzip results
     * @var bool
     */
    private static $sort_html_attributes = true;

    /**
     * Remove more (aggressive) spaces in the dom (disabled by default)
     * @var bool
     */
    private static $remove_spaces_between_tags = false;

    /**
     * remove quotes e.g. class="lall" => class=lall
     * @var bool
     */
    private static $remove_omitted_quotes = false;

    /**
     * remove ommitted html tags e.g. <p>lall</p> => <p>lall
     * @var bool
     */
    private static $remove_omitted_html_tags = false;

    public static function minify($htmlContent)
    {
        if (self::config()->enable_minification) {
            $htmlMin = new HtmlMin();

            $htmlMin->doOptimizeViaHtmlDomParser(self::config()->optimize_via_html_dom_parser);
            $htmlMin->doRemoveComments(self::config()->remove_comments);
            $htmlMin->doSumUpWhitespace(self::config()->sum_up_whitespace);
            $htmlMin->doRemoveWhitespaceAroundTags(self::config()->remove_whitespace_around_tags);
            $htmlMin->doOptimizeAttributes(self::config()->optimize_attributes);
            $htmlMin->doRemoveHttpPrefixFromAttributes(self::config()->remove_http_prefix_from_attributes);
            $htmlMin->doRemoveHttpsPrefixFromAttributes(self::config()->remove_https_prefix_from_attributes);
            $htmlMin->doRemoveDefaultAttributes(self::config()->remove_default_attributes);
            $htmlMin->doRemoveDeprecatedAnchorName(self::config()->remove_deprecated_anchor_name);
            $htmlMin->doRemoveDeprecatedScriptCharsetAttribute(self::config()->remove_deprecated_script_charset_attribute);
            $htmlMin->doRemoveDeprecatedTypeFromScriptTag(self::config()->remove_deprecated_type_from_script_tag);
            $htmlMin->doRemoveDeprecatedTypeFromStylesheetLink(self::config()->remove_deprecated_type_from_stylesheet_link);
            $htmlMin->doRemoveDefaultMediaTypeFromStyleAndLinkTag(self::config()->remove_default_media_type_from_style_and_link_tag);
            $htmlMin->doRemoveDefaultTypeFromButton(self::config()->remove_default_type_from_button);
            $htmlMin->doRemoveEmptyAttributes(self::config()->remove_empty_attributes);
            $htmlMin->doRemoveValueFromEmptyInput(self::config()->remove_value_from_empty_input);
            $htmlMin->doSortCssClassNames(self::config()->sort_css_class_names);
            $htmlMin->doSortHtmlAttributes(self::config()->sort_html_attributes);
            $htmlMin->doRemoveSpacesBetweenTags(self::config()->remove_spaces_between_tags);
            $htmlMin->doRemoveOmittedQuotes(self::config()->remove_omitted_quotes);
            $htmlMin->doRemoveOmittedHtmlTags(self::config()->remove_omitted_html_tags);

            return $htmlMin->minify($htmlContent);
        }
        return $htmlContent;
    }
}
# Silverstripe Minify HTML

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-minify-html.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-minify-html)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-minify-html.svg?style=flat-square)](license.md)

## Overview

Minifies the HTML output for all frontend requets using a middleware wrapping [voku's HTML Compressor and Minifier for PHP](https://packagist.org/packages/voku/html-min).

## Requirements

* Silverstripe CMS 6.x
* [voku/html-min 4](https://packagist.org/packages/voku/html-min)

Note: this version is compatible with SilverStripe 6. For SilverStripe 5, please see the [2 release line](https://github.com/xini/silverstripe-minify-html/tree/2).

## Installation

Install the module using composer:
```
composer require innoweb/silverstripe-minify-html dev-master
```
Then run dev/build.

## Enabling minification

Once installed, HTML minification is enabled by default.

See the example configuration in `config/envtoggle.yml.example` for how to toggle minification on/off for your environment via a `.env` variable.

In the example, a `.env` variable named `HTML_MINIFICATION_ENABLED` can be added, which will enable/disable minification based on whether the value is true or false/absent.

## Configuration

The config variables are derived from voku's library and adjusted to work with Silverstripe. The following config values are available:

```
Innoweb\MinifyHTML\Util\HTMLMinifier:

  // Disable all optimisations, e.g. for dev environment
  enable_minification: true
  
  // optimize html via voku's "HtmlDomParser()"
  optimize_via_html_dom_parser: true 
  
  // remove default HTML comments 
  // (depends on optimize_via_html_dom_parser: true)
  // (disabled by default)
  remove_comments: false 
  
  // sum-up extra whitespace from the Dom
  // (depends on optimize_via_html_dom_parser: true)
  sum_up_whitespace: true 
  
  // remove whitespace around tags
  // (depends on optimize_via_html_dom_parser: true)
  remove_whitespace_around_tags: true 
  
  // optimize html attributes
  // (depends on optimize_via_html_dom_parser: true)
  optimize_attributes: true 
  
  // remove optional "http:"-prefix from attributes
  // (depends on optimize_via_html_dom_parser: true)
  // (disabled by default)
  remove_http_prefix_from_attributes: false 
  
  // remove optional "https:"-prefix from attributes
  // (depends on optimize_via_html_dom_parser: true)
  // (disabled by default)
  remove_https_prefix_from_attributes: false 
  
  // remove defaults
  // (depends on optimize_via_html_dom_parser: true)
  // (disabled by default)
  remove_default_attributes: false 
  
  // remove deprecated anchor-jump
  // (depends on optimize_via_html_dom_parser: true)
  // (disabled by default)
  remove_deprecated_anchor_name: false 
  
  // remove deprecated charset-attribute - the browser will use the charset from the HTTP-Header, anyway
  // (disabled by default)
  remove_deprecated_script_charset_attribute: false 
  
  // remove deprecated script-mime-types
  remove_deprecated_type_from_script_tag: true 
  
  // remove "type=text/css" for css links
  remove_deprecated_type_from_stylesheet_link: true 
  
  // remove "media="all" from all links and styles
  // (disabled by default)
  remove_default_media_type_from_style_and_link_tag: false 
  
  // remove type="submit" from button tags
  // (disabled by default)
  remove_default_type_from_button: false 
  
  // remove some empty attributes
  // (depends on optimize_via_html_dom_parser: true)
  remove_empty_attributes: true 
  
  // remove 'value=""' from empty <input>
  // (depends on optimize_via_html_dom_parser: true)
  remove_value_from_empty_input: true 
  
  // sort css-class-names, for better gzip results
  // (depends on optimize_via_html_dom_parser: true)
  sort_css_class_names: true 
  
  // sort html-attributes, for better gzip results
  // (depends on optimize_via_html_dom_parser: true)
  sort_html_attributes: true 
  
  // remove more (aggressive) spaces in the dom
  // (disabled by default)
  remove_spaces_between_tags: false 
  
  // remove quotes e.g. class="lall" => class=lall
  // (disabled by default)
  remove_omitted_quotes: false 
  
  // remove ommitted html tags e.g. <p>lall</p> => <p>lall 
  // (disabled by default)
  remove_omitted_html_tags: false 
  
```

## License

BSD 3-Clause License, see [License](license.md)

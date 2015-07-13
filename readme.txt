=== Roojoom ===
Contributors: roojoom, ramiy
Tags: roojoom, shortcode, embed, oembed
Requires at least: 3.5
Tested up to: 4.3
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Embed your content from roojoom.com into your WordPress site

== Description ==

Turn you content into revenue using [Roojoom Content Journey](http://www.roojoom.com).

= About Roojoom =

[Roojoom](http://www.roojoom.com) is an online marketing intelligence platform that increases conversion and engagement through personal Content Journeys across customer life-cycle.

A Roojoom Content Journey is a pre-designed trail of content offered to the consumer in a step-by-step fashion, designed and compiled by the brand marketer in order to optimize conversion and band engagement.

https://www.youtube.com/watch?v=yK7F5b2hMWo

= Roojoom WordPress Plugin =

Using this WordPress plugin you can embed any roojoom to your WordPress site using nothing but the URL.

Just copy the item URL and paste it to the post text editor. Then simply click over to the visual editor to confirm that it loads properly.

For advanced customization, use `[roojoom id=""]` shortcode with the following attributes:

* **id** (required) - roojoom item id.
* **type** - '`rect`' for rectangle widget or '`square`' for square widget.
* **width** - embed width.
* **height** - embed height.
* **auto-transition** - (true/false) turn on to change pictures inside widget periodically.
* **show-intro** - (true/false) show intro.
* **mini-mode** - (true/false) hide comments bar inside the Roojoom.
* **open-step** - (true/false) upon clicking the widget, the Roojoom will open in a lightbox starting with the step currently displayed in the image.
* **hide-urls** - (true/false) hide domain name from the widget steps.

= More Information =

For any questions or more information, please [contact us](http://info.roojoom.com/contact-us/).

== Installation ==

= Installation =
1. In your WordPress Dashboard go to "Plugins" -> "Add Plugin".
2. Search for "Roojoom".
3. Install the plugin by pressing the "Install" button.
4. Activate the plugin by pressing the "Activate" button.

= Updating =
* Use WordPress automatic updates to upgrade to the latest version. Make sure to backup your site just in case.

= Minimum Requirements =
* WordPress version 3.5 or greater.
* PHP version 5.2.4 or greater.
* MySQL version 5.0 or greater.

= Recommended  Requirements =
* The latest WordPress version.
* PHP version 5.4 or greater.
* MySQL version 5.5 or greater.

== Screenshots ==
1. Plugin settings page.
2. Pasting the URL to the text-editor.
3. Pasting the URL to the visual-editor.
4. Embed using a shortcode.
4. Add a roojoom sidebar widget.

== Frequently Asked Questions ==

= What makes Roojoom unique? =

Roojoom is the only platform that leverages existing content to create engaging Content Journeys that multiply lead conversion with no IT or design needed.

= Roojoom’s objectives =

At Roojoom, we strive to help marketers control the performance of their content and significantly improve their business KPIs in a scalable and measurable way. We aim to give marketers the freedom to create engaging Content Journeys without involving any IT or designers in the process, and to help them analyze and improve the ROI from their content.

= How does Roojoom work? =

With Roojoom’s simple drag and drop Editor, you create Content Journeys by aggregating content from many sources such as web pages, online videos, presentations, PDFs and more. This will optimize your content to increase business KPIs measuring conversion, brand engagement, and lead generation. 

Personalized and segmented content journeys will enrich user experience with your content.

= How do I embed a roojoom? =

With this plugin you can use the URL to embed roojooms. Just paste the URL into your post editor:
`http://tracks.roojoom.com/r/1949`

= How do I set custom dimentions to my roojooms? =

In WordPress 4.2 you cab double click the embedded item to set max `width` and max `height` dimentions. It will add the WordPress `[embed]` shortcode:
`[embed width="600" height="400"]http://tracks.roojoom.com/r/1949[/embed]`

**Note:** Doing it the WordPress way, using the `[embed]` shortcode, is backwards and forward compatible, and it works with all the themes.

= How do I set custom parameters to my roojooms? =

For advanced customization, use following shortcode:

`[roojoom id="" type="" width="" height="" auto-transition="" show-intro="" mini-mode="" open-step="" hide-urls=""]`

== Changelog ==

= 1.1 (2015-07-12) =
* Add roojoom widget.
* Add screenshots.
* Update readme information.

= 1.0 (2015-06-28) =
* Initial release.
* Register roojoom Shortcode.
* Register roojoom oEmbed Provider.
* Add roojoom admin menu for global settings.
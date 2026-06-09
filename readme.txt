=== Stanza ===
Contributors: crweiner
Requires at least: 6.9
Tested up to: 7.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A minimal, type-forward block theme for single-author publishing and personal essays.

== Description ==

Stanza is a minimal WordPress block theme for personal publishing. It includes full-site-editing templates, template parts, style variations, and block patterns for editorial home pages, post feeds, and subscription call-to-action sections.

== Frequently Asked Questions ==

= How do I use the alternate home page layouts? =

Create or edit a page, then choose one of Stanza's included home templates from the page template settings.

= How do I use the project templates? =

Use the Projects Index template for the main Projects page. Use the Project Detail template for individual project pages, and insert the Project detail content pattern into the page content for editable descriptions and external links.

Related posts on Project Detail pages are filtered to the `projects` category slug.

= How should I connect the subscription forms? =

The subscription forms are visual markup only. Replace the inner form with a newsletter, form, or membership plugin block or shortcode before using it on a production site.

= How do I add custom category accent colors safely? =

Add category accent rules in Additional CSS, a child theme, or a small site plugin instead of editing the installed parent theme files.

= How do I use the project card color helpers? =

Select a Project card Group block, open Advanced, and add `st-project-card` plus one color class: `is-brand`, `is-clay`, `is-mustard`, `is-sage`, `is-petrol`, or `is-plum`. Project Detail link cards use `st-project-link-card` with the same color classes.

= Does Stanza provide syntax highlighting for code blocks? =

No. Stanza styles the core Code block, but syntax highlighting, copy buttons, and Gist or GitHub embed behavior should be provided by a code-focused plugin.

== Privacy ==

Stanza does not include tracking or analytics. The color mode toggle stores a local browser preference in localStorage under the key `stanza-color-mode`; this value is not sent to the site owner or any third party by the theme.

== Changelog ==

= 1.0.0 =
* Initial release.

== Resources ==

Stanza is licensed under the GNU General Public License v2.0 or later.

Solo by Ghost Foundation is acknowledged as MIT-licensed design inspiration only. Stanza is an independent WordPress block theme and is not a port, copy, fork, or derivative of Solo.
Source: https://github.com/TryGhost/Solo
License: MIT
Copyright: Copyright (c) 2013-2026 Ghost Foundation

Manrope font
Source: https://github.com/sharanda/manrope
License: SIL Open Font License 1.1
Copyright: Copyright (c) 2018-2024, Mikhail Sharanda and The Manrope Project Authors

Libre Baskerville font
Source: https://github.com/impallari/Libre-Baskerville
License: SIL Open Font License 1.1
Copyright: Copyright (c) 2012, Pablo Impallari

JetBrains Mono font
Source: https://github.com/JetBrains/JetBrainsMono
License: SIL Open Font License 1.1
Copyright: Copyright (c) 2020, JetBrains s.r.o.

SVG icons
Source: Stanza design system
License: GPLv2 or later
Copyright: Copyright (c) 2026 Chandler Weiner

Hero image
Source: https://wordpress.org/photos/photo/27768b496c/
License: CC0 1.0 Universal
Attribution: CC0 licensed photo by Abdullah Mamun from the WordPress Photo Directory.

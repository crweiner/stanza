=== Stanza ===
Contributors: crweiner
Requires at least: 6.7
Tested up to: 7.0
Requires PHP: 7.4
Stable tag: 2.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A minimal, type-forward block theme for single-author publishing and personal essays.

== Description ==

Stanza is a minimal WordPress block theme for personal publishing. Version 2.0 expresses the entire design through WordPress primitives: theme.json presets, block supports, block style variations with per-block on-demand CSS, and four build-less custom blocks.

**Design tokens (theme.json):** a light-dark() neutral palette (background, foreground, secondary/tertiary text, surface, border) plus a mode-stable brand accent and five tag accent colors (clay, mustard, sage, petrol, plum); nine fluid font sizes (meta through display); three bundled font families (Manrope variable, Libre Baskerville, JetBrains Mono); a 4–80px spacing scale; chip/button/pill radius presets; card and lift shadows; and a hero scrim gradient.

**Color modes:** the palette is built on CSS light-dark(), so the site follows the visitor's OS scheme with zero JavaScript. The header toggle stores a per-visitor override; the Dark and Light style variations force a scheme site-wide. Serif and Mono variations switch the type mood.

**Templates:** front-page/home (background hero + classic feed), index, single (12-column article grid with sticky author meta), page, archive, tag (parallax feed), author, search, 404, plus custom templates: Projects Index, Project Detail, Style Guide, and three alternate home layouts (Profile + Parallax, Side Hero + Typographic, Background Hero + Typographic).

**Patterns (`stanza/*`):** hero-typographic, hero-side, hero-background, feed-classic, feed-typographic, feed-parallax, subscribe-cta, project-index, project-detail-content, project-posts.

**Block styles:** Classic card and Project card (Group), Kicker (Paragraph), Pill (Search). Outline and Secondary button styles ship as theme.json variations.

**Custom blocks:** Color mode toggle, Subscribe form (pluggable provider slot), Parallax card (reduced-motion aware), Nav drawer (accessible mobile navigation). All build-less — block.json + render.php + Interactivity API view modules.

**Hooks and filters:**
* `stanza_subscribe_form_html` — return provider markup to replace the subscribe form internals.
* `stanza_mailpoet_form_id` — return a MailPoet form id to render in the subscribe slot.
* Category links receive `stanza-category-{slug}` classes for the accent map.
* Query Loop blocks honor a `stanzaCategorySlug` query attribute (used by the project-posts pattern).
* Multipage posts get `stanza-page-links` pagination markup via `wp_link_pages_args`.

== Frequently Asked Questions ==

= How do I use the alternate home page layouts? =

Create or edit a page, then choose one of Stanza's included home templates from the page template settings.

= How do I use the project templates? =

Use the Projects Index template for the main Projects page. Use the Project Detail template for individual project pages, and insert the Project detail content pattern into the page content for editable descriptions and external links.

Related posts on Project Detail pages are filtered to the `projects` category slug.

= How should I connect the subscription forms? =

Hook a newsletter provider: return markup from the `stanza_subscribe_form_html` filter, or install MailPoet and return a form id from `stanza_mailpoet_form_id`. Without a provider the form renders disabled and says so — it never pretends to subscribe anyone.

= How do I change a project card's accent color? =

Select the Project card Group block and set its top Border color to any palette color — the accent bar is a regular border, no helper classes needed.

= How do I add custom category accent colors safely? =

Add category accent rules in Additional CSS, a child theme, or a small site plugin instead of editing the installed parent theme files.

= Does Stanza provide syntax highlighting for code blocks? =

No. Stanza styles the core Code block, but syntax highlighting, copy buttons, and Gist or GitHub embed behavior should be provided by a code-focused plugin.

== Privacy ==

Stanza does not include tracking or analytics. The color mode toggle stores a local browser preference in localStorage under the key `stanza-color-mode`; this value is not sent to the site owner or any third party by the theme.

== Changelog ==

= 2.0.0 =
* Complete rebuild on WordPress primitives: theme.json is the single source of truth for every color, size, font, radius, and shadow.
* light-dark() color system with zero-JS OS scheme support; Dark/Light/Serif/Mono style variations.
* Four build-less custom blocks: color mode toggle, subscribe form, parallax card, accessible nav drawer.
* Per-block on-demand stylesheets replace the monolithic stylesheet (2,544 lines of CSS reduced to ~600).
* Native block supports replace bespoke layout CSS (grid article layout, cover hero, aspect-ratio images, sticky meta).

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

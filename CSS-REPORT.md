# Stanza v2 — Hand-written CSS report

Every selector shipped outside `theme.json`, per the build contract
(`blueprint/02-css-disposition.md`). Everything else in the theme is theme.json
presets/styles, block supports carried in markup, or block style variations.

**Totals: 692 non-blank lines across 14 files** (28 of which are the
explicit `:focus-visible`/`:focus-within` accent rings on every custom
interactive control — the handoff's "visible focus everywhere" floor) (WPCS one-declaration-per-line
formatting, selectors and braces included), vs **2,544 lines in v1** — a 76%
reduction. The disposition doc targeted ≤350 (hard 450); the overage is
explained per file below and falls into five buckets: (a) accessibility rules
the handoff mandates elsewhere (reduced-motion gates, focus states, 44px
targets), (b) a WordPress core gap — the server never emits grid
`columnStart`, costing 12 lines, (c) cascade-specificity bumps needed to beat
core layout classes, (d) the MailPoet/provider normalization the subscribe-form
spec requires, and (e) formatting (every `}` and multi-line selector counts).

All `assets/css/blocks/*` files load on demand via `wp_enqueue_block_style()`
(inlined only when the block renders). Custom-block CSS ships via each
`block.json` `style`. Every value references `--wp--preset--*` /
`--wp--custom--*` variables; raw values appear only as 1px hairlines,
breakpoints, intrinsic icon/control sizes, and white-alpha tints on
always-dark/imagery surfaces (per `blueprint/04-color-modes.md`).

## style.css — 66 lines (rung 4, each reported)

| Selector | Why CSS |
|---|---|
| `.stanza-icon-button`, `:hover`, `svg` | Icon-button utility for the header search anchor (plain `wp:html` anchor; core has no icon-button block). Shared metrics with the toggle block. |
| `.stanza-header-overlay`, `.admin-bar …` | Overlay header `position:absolute` — WP position supports offer sticky/fixed only. Colors are presets in the part's markup. |
| `.wp-site-blocks:has(.stanza-header-overlay) > main` | Kills root blockGap margin so the hero starts at the top under the overlay header (v1 parity). |
| `@media (max-width:991px) .stanza-article-grid …` | Single-post 12-column grid collapse. WP grid layout has no responsive `columnCount`; `!important` needed because child `grid-column` rules are emitted per-block. Includes un-sticking the meta sidebar. |

## assets/css/blocks (one file per block type)

| File | Lines | Contents / why supports can't |
|---|---|---|
| core-navigation.css | 44 | Submenu panel (bg/border/shadow/radius/item hover underline — not expressible in theme.json; open-state geometry scoped to `:hover`/`:focus-within` so closed flyouts keep core's zero-size box and never cause horizontal overflow), overlay-header dark submenu tint, `.stanza-desktop-nav` hidden <768px (drawer takes over). |
| core-post-terms.css | 43 | Category chip presentation (border `color-mix`, chip radius, hover wash) + the per-category accent map driven by `stanza-category-*` classes from the v1-ported filter. |
| core-group.css | 49 | `is-style-card-classic` (2-col grid, image right, mobile collapse), `is-style-project-card` (grid rows, min-height, hover lift), `.stanza-header-ctas` mobile hide, the single-post grid `columnStart` rules (core sanitizes `columnStart` in but never emits it server-side), and a `min-width:0` flex fix so long unbreakable comment content can't stretch the comment column. |
| core-post-content.css | 41 | Inline-code chips (`color-mix` accent tint) + `stanza-page-links` multipage nav (markup from the `wp_link_pages` filter). |
| core-search.css | 23 | `is-style-pill` input + embedded accent button. |
| core-post-comments-form.css | 21 | Comment form inputs + pill submit (no block supports for form internals). |
| core-post-title.css | 6 | Title-link hover opacity (v1's hover signal). |
| core-loginout.css | 27 | Outline-button look for the Log in link + overlay-header white variant. |
| core-paragraph.css | 10 | `is-style-kicker` accent pill label. |

## Custom block stylesheets (rung 3, shipped via block.json)

| File | Lines | Notes |
|---|---|---|
| color-mode-toggle/style.css | 34 | 36px round icon button, sun/moon state swap, disabled state for forced-scheme variations. |
| subscribe-form/style.css | 73 | The pill (flex, 52px, pill radius, border-color fill), accent submit + hover, on-cover white variant, notice line, and the spec-required MailPoet/provider normalization selectors. |
| parallax-card/style.css | 85 | Positioning stack (media/scrim/body), parallax headroom (116% img), white type, white-outline chips for the on-image context, imageless petrol fallback, mobile padding step-down. |
| nav-drawer/style.css | 144 | Toggle (44px target), `display:none` swap at 768px (replaces v1's ~45-rule `!important` mobile block), full-screen always-dark scrollable overlay (accent gradient via `color-mix`, `overscroll-behavior:contain`), 44px close circle raised above core's `z-index:1` nav links and offset below the admin bar (the overlay header's stacking context sits under the admin bar's z-index, so the drawer is offset rather than fighting it — matching core's nav-overlay approach), admin-bar offsets, big-type nav rows with hairlines and `→` markers, inline dark submenu expansion with 44px circular disclosure toggles (overriding the desktop flyout panel inside the drawer), reduced-motion-gated transition. |

## Block style variations registered (CSS lives in the files above)

`core/group`: `card-classic`, `project-card` · `core/paragraph`: `kicker` ·
`core/search`: `pill`. Button `outline`/`secondary` variations are pure
theme.json (`styles.blocks.core/button.variations`) — zero CSS.

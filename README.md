# Stanza

Stanza is a minimal, type-forward WordPress block theme for personal publishing.

## Installable ZIP

The repository root is the theme root. To build an installable ZIP from a clone:

```bash
git archive --format=zip --prefix=stanza/ HEAD -o stanza.zip
```

Upload `stanza.zip` in WordPress at **Appearance > Themes > Add New > Upload Theme**.

## Theme Structure

- `theme.json` maps the Stanza design tokens into WordPress global styles.
- `templates/` contains block templates for home, posts, pages, archives, search, author, tag, 404, and style guide.
- `parts/` contains reusable header and footer template parts.
- `patterns/` contains hero, feed, and subscribe CTA block patterns.
- `styles/` contains dark, serif, and mono style variations.
- `assets/` contains local fonts, icons, JavaScript, and imagery.

## Home Template Variants

The default `Front Page` template keeps the background hero and classic feed. Additional page templates are included for alternate pattern combinations:

- `Home: Profile + Parallax Feed`
- `Home: Side Hero + Typographic Feed`
- `Home: Background Hero + Typographic Feed`

Create or edit a page, choose one of these templates in the page settings, and publish it to preview or use that composition.

## Project Templates

Stanza includes a `Projects Index` page template and a `Project Detail` page template.

Use `Projects Index` for the main Projects page. It includes the `Project index` pattern: square-cornered project cards with an orange eyebrow, an H3 title, body copy, and a link to the project sub-page.

Use `Project Detail` for individual project pages. The template renders the page title, the page content, and a related-posts section filtered to the `projects` category slug. For the editable project description and external links, insert the `Project detail content` pattern into the page content and update the links for that project.

### Project Card Accent Classes

Project cards use the theme color tokens through CSS helper classes. In the block editor, select a project card Group block, open **Advanced**, and add one of these classes in **Additional CSS class(es)**:

```text
st-project-card is-brand
st-project-card is-clay
st-project-card is-mustard
st-project-card is-sage
st-project-card is-petrol
st-project-card is-plum
```

Use the same color modifier on project link cards in the Project Detail pattern:

```text
st-project-link-card is-brand
st-project-link-card is-clay
st-project-link-card is-mustard
st-project-link-card is-sage
st-project-link-card is-petrol
st-project-link-card is-plum
```

The base class controls the card layout. The `is-*` class only changes the accent token used for the top border and future project-card accents.

Suggested meanings:

- `is-brand`: Featured, primary, or newest project.
- `is-clay`: Members, subscriptions, or commercial work.
- `is-mustard`: Reading, references, books, or source material.
- `is-sage`: Projects and evergreen content.
- `is-petrol`: Photography, media, travel, or visual archives.
- `is-plum`: Notes, personal logs, or process writing.

These classes are best used inside the bundled Project patterns. For ordinary blocks, prefer the Site Editor color controls first. Use Advanced CSS classes when you need the theme's purpose-built component styling, such as project cards or category chips.

## Category Accents

Stanza includes a small built-in category accent map in `style.css`, keyed by category slug. Do not edit the installed parent theme's `style.css` for site-specific category colors; parent theme files can be replaced during a theme update.

For update-safe category accents, add rules in one of these places:

- **Site Editor > Styles > Additional CSS:** Best for normal site-specific category colors.
- **Child theme CSS:** Best when the custom category map should be packaged with other site-level theme changes.
- **Small site plugin:** Best when the category map should stay independent from any active theme.

Use the same selector shape in whichever update-safe place you choose:

```css
.taxonomy-category .st-category-new-slug {
	--st-category-accent: var(--tag-sage);
}
```

The theme adds `st-category-{slug}` classes to rendered category links, so these accents work whether the site uses pretty permalinks or plain `?cat=ID` category URLs.

### Using Theme Color Classes in the Editor

For blocks that support colors, use **Styles > Colors** in the Site Editor or block sidebar. Stanza exposes the theme palette there: Brand accent, Clay, Mustard, Sage, Petrol, Plum, Background, Foreground, Surface, and Secondary text.

Use **Advanced > Additional CSS class(es)** for Stanza component helpers:

- Project cards: add `st-project-card` plus an `is-*` color class.
- Project detail link cards: add `st-project-link-card` plus an `is-*` color class.
- Manual category chips: add `st-category-term` plus a category class such as `st-category-projects`.

Example manual category chip markup in a Paragraph or custom link context:

```html
<a class="st-category-term st-category-projects" href="/category/projects/">Projects</a>
```

For post category links rendered by WordPress, Stanza adds `st-category-{slug}` classes automatically. You only need to add category classes manually for static demo text, hand-built links, or custom block layouts.

A child theme should be packaged and installed as its own theme with its own theme folder and `style.css` header. Do not bundle a child theme inside the Stanza parent theme ZIP and expect WordPress to install both themes automatically.

## Newsletter and Subscription Forms

Stanza ships styled subscribe forms in the hero and CTA patterns. They are intentionally front-end markup only; a newsletter or membership plugin should own the actual signup, list sync, double opt-in, and consent behavior.

Recommended integration options:

- Replace the inner form with your plugin's form block or shortcode, then keep the wrapper class `st-subscribe-input`.
- If the plugin supports custom form classes, add `st-subscribe-input` to the form wrapper and keep a single email field plus submit button.
- If the plugin opens a modal, change the form to a button/link that triggers the plugin modal and keep the same `st-subscribe-input` visual wrapper.

Plugin-specific notes:

- **MailPoet:** Insert a MailPoet form block or shortcode where the current form sits. Add `st-subscribe-input` to the form/container when possible. The theme includes button/input rules for common MailPoet submit markup.
- **Jetpack Forms:** Replace the static form with a Jetpack Form block. Use the same surrounding section/pattern and apply `st-subscribe-input` to the compact form wrapper if the editor exposes an Additional CSS class field.
- **Mailchimp:** Use the official Mailchimp block/plugin shortcode or an embedded form action URL. Keep the email input and submit button inside the `st-subscribe-input` wrapper.
- **Membership tools:** For MemberPress, Paid Memberships Pro, Newspack, or similar tools, use the subscribe pill as a modal trigger or checkout link instead of posting the theme's static form.

Do not rely on the default theme form action (`/`) for production subscriptions. Replace it with a real plugin form, shortcode, modal trigger, or checkout URL before launch.

## Code Blocks

Stanza styles the core WordPress Code block for readable monospace text, horizontal scrolling, and a small orange accent rule. The theme intentionally does not provide syntax parsing, copy-to-clipboard controls, or Gist/GitHub embed behavior.

Use a code-focused plugin for those features so highlighted code, copy buttons, and external code embeds remain available if the site changes themes. A good plugin should render accessible controls, support common language classes such as `language-php` or `language-js`, and leave normal GitHub or Gist URLs as clean links or embeds in post content.

## Privacy

Stanza does not include tracking or analytics. The color mode toggle stores a local browser preference in `localStorage` under the key `stanza-color-mode`; this value is not sent to the site owner or any third party by the theme.

## Local Development

This theme was tested against WordPress Studio and WordPress 7.0. Use Studio WP-CLI from the site root:

```bash
studio wp theme activate stanza
```

## Licensing

Stanza is licensed under the GNU General Public License v2.0 or later (`GPL-2.0-or-later`), matching the recommended license for WordPress themes.

Solo by Ghost Foundation is acknowledged in `THIRD-PARTY-NOTICES.md` as MIT-licensed design inspiration only. Stanza is independent and is not a port, copy, fork, or derivative of Solo.

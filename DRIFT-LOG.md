# Stanza v2 — Drift log

Accepted differences from v1, per the handoff's pre-approved list plus
build-discovered items. Everything else matched in side-by-side comparison
against the v1 theme (run as `stanza-v1` with identical seeded content) at
1440 / 1024 / 768 / 375.

## Pre-approved (handoff §"Intentional drift fixes")

1. **16px-root rem re-basing.** All v1 62.5%-hack rem values re-derived;
   computed sizes identical. WP fluid font-size clamps replace v1's hand
   clamps — midpoints differ <1px at intermediate viewports.
2. **Hero-background min-height** `min(900px, 100vh − 32px)` → `90vh`.
3. **Hero-side mobile stack order** follows core columns behavior: text column
   first on mobile (v1 used `column-reverse` to put the image first).
4. **Feed/section gaps quantized to spacing presets** (e.g. v1
   `clamp(48,5vw,80)` paddings → preset 48px steps; classic feed card gap
   keeps v1's clamp inside `is-style-card-classic`).
5. **Style-guide page rebuilt from core blocks** — v1's bespoke demo chrome
   (~40% of its CSS) is gone by design; the v2 template needs zero new CSS.
6. **Subscribe form is honest** — no fake GET post to `/`; without a provider
   it renders `aria-disabled` and explains (admin-aware copy). Providers hook
   `stanza_subscribe_form_html` / MailPoet + `stanza_mailpoet_form_id`.
7. **customTemplates keep v1 slugs** (`projects`, `project-detail`; style guide
   registered as `page-style-guide`, matching v1's template file intent).

## Build-discovered (recorded, intentionally not "fixed back")

8. **Single-post title max-width.** v1 capped the display title at `12ch`; v2
   relies on the 9-of-12 grid columns + `text-wrap:balance`. Very long
   one-line titles run wider than v1 (rung-1 fidelity trade; a `12ch` cap has
   no block support).
9. **Hero h1/lead share one 720px content column.** v1 used `20ch`/`48ch`
   per-element caps; v2 uses a constrained inner group (`contentSize:720px`),
   so the lead can run slightly wider than v1's 48ch.
10. **Nav-drawer breakpoint is fixed at 768px.** The blueprint sketched a
    `breakpoint` attribute; CSS media queries can't read block attributes, so
    the attribute was dropped rather than shipped dead.
11. **Color-mode toggle icon pre-hydration.** For ~1 frame before the
    Interactivity API hydrates, the moon icon shows even when dark mode is
    stored (the scheme itself is set pre-paint by the `wp_head:0` bootstrap, so
    there is no color flash — only the 20px icon can lag).
12. **Drawer item font** uses the fluid clamp `clamp(1.875rem, 8vw, 2.75rem)`
    (v1's 3–4.4rem at 62.5% root, re-based) rather than a preset — matching
    v1 exactly; presets have no equivalent step.
13. **Project link cards** ("View project →") inherit the global link
    underline (foreground, 0.08em) instead of v1's content-area accent
    underline, because they sit outside `post-content`. Barely perceptible.
14. **`columnStart` emitted via CSS, not markup alone.** Core sanitizes grid
    `columnStart`/`rowStart` but never outputs them on the front end; the
    single-post grid keeps the attributes for editor parity and ships 12 lines
    of CSS as the server-side fallback (counted in CSS-REPORT.md).

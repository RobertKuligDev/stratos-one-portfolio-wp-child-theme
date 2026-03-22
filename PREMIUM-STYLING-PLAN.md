# 🎨 Stratos One Portfolio - Premium Styling Plan

**Branch:** `feature/premium-portfolio-styles`  
**Data:** 2026-03-22  
**Status:** Planowanie

---

## 📋 Cel

Stworzenie child theme `stratos-one-portfolio` z premium design systemem z `robert-portfolio/assets/css/bundle.css` bez zmiany struktury HTML/PHP.

---

## 🗂️ Struktura Projektu

```
wordpress-portfolio/themes/stratos-one-portfolio/
├── style.css                 ← Theme header + @import parent
├── functions.php             ← Enqueue child styles
├── assets/
│   └── css/
│       ├── bundle.css        ← GŁÓWNY PLIK: premium styles z parent
│       ├── overrides.css     ← Nadpisania specyficzne dla child
│       └── components/       ← Style komponentów
│           ├── header.css
│           ├── footer.css
│           ├── hero.css
│           ├── projects.css
│           └── social-links.css
└── template-parts/
    └── components/
        └── social-links.php  ← Dodać klasy premium
```

---

## 📦 Faza 1: Konfiguracja (1-2h)

### 1.1 Utworzenie brancha
```bash
cd /home/robert/projects/php/wordpress-portfolio/themes/stratos-one-portfolio
git checkout -b feature/premium-portfolio-styles
```

### 1.2 Struktura plików
```bash
mkdir -p assets/css/components
touch assets/css/bundle.css
touch assets/css/overrides.css
```

### 1.3 style.css child theme
```css
/*
Theme Name: Stratos One Portfolio
Theme URI: https://stratos-one-portfolio.com
Author: Robert
Author URI: https://robert.dev
Description: Premium portfolio child theme based on Stratos One with design system from robert-portfolio
Template: stratos-one
Version: 1.0.0
Text Domain: stratos-one-portfolio
*/

/* Import parent theme styles */
@import url('../stratos-one/style.css');

/* Import premium design system */
@import url('assets/css/bundle.css');
@import url('assets/css/overrides.css');
```

### 1.4 functions.php - enqueue
```php
<?php
/**
 * Stratos One Portfolio - Child Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

function stratos_one_portfolio_enqueue_styles() {
    // Parent theme styles
    wp_enqueue_style(
        'parent-style',
        get_template_directory_uri() . '/style.css',
        [],
        wp_get_theme()->get('Version')
    );
    
    // Premium bundle (from robert-portfolio)
    wp_enqueue_style(
        'portfolio-bundle',
        get_stylesheet_directory_uri() . '/assets/css/bundle.css',
        ['parent-style'],
        '1.0.0'
    );
    
    // Child theme overrides
    wp_enqueue_style(
        'portfolio-overrides',
        get_stylesheet_directory_uri() . '/assets/css/overrides.css',
        ['portfolio-bundle'],
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'stratos_one_portfolio_enqueue_styles', 20);
```

---

## 🎨 Faza 2: Przeniesienie Design System (2-3h)

### 2.1 CSS Custom Properties (bundle.css)

**Źródło:** `wordpress/themes/robert-portfolio/assets/css/bundle.css:1-130`

**Kopiujemy:**
- ✅ Color palette (backgrounds, surfaces, text, accents)
- ✅ Typography (fonts, sizes, weights, line-heights)
- ✅ Spacing system
- ✅ Border radius
- ✅ Transitions
- ✅ Shadows
- ✅ Layout variables
- ✅ Z-index scale

**Struktura:**
```css
/**
 * CSS Custom Properties — Premium Design System v3.0
 * @package Stratos_One_Portfolio
 */

:root {
  /* Backgrounds */
  --color-bg-primary:   #07090c;
  --color-bg-secondary: #0d1117;
  /* ... kopiujemy wszystkie zmienne ... */
}
```

### 2.2 Base Styles

**Źródło:** `bundle.css:131-250`

**Kopiujemy:**
- ✅ Reset CSS
- ✅ HTML/Body styles
- ✅ Typography base
- ✅ Links, lists, images
- ✅ Form elements
- ✅ Selection styles
- ✅ Focus outlines
- ✅ Custom scrollbar
- ✅ `.container` class
- ✅ Section spacing

---

## 🧩 Faza 3: Komponenty (4-5h)

### 3.1 Header

**Pliki:**
- `assets/css/components/header.css`
- `header.php` (dodać klasy)

**Style z bundle.css:** `.site-header`, `.header-content`, `.main-navigation`

**Zmiany w header.php:**
```php
<header class="site-header" id="masthead">
  <div class="header-content">
    <div class="site-branding">
      <!-- dodać klasę .brand-logo -->
    </div>
    <nav class="main-navigation">
      <!-- dodać klasy premium -->
    </nav>
    <div class="header-cta-group">
      <!-- nowe CTAs -->
    </div>
  </div>
</header>
```

### 3.2 Footer

**Pliki:**
- `assets/css/components/footer.css`
- `footer.php`

**Style z bundle.css:** `.site-footer`, `.footer-content`, `.footer-links`

### 3.3 Hero Section

**Pliki:**
- `assets/css/components/hero.css`
- `front-page.php` lub pattern hero

**Style z bundle.css:** `.hero`, `.hero-content`, `.hero-eyebrow`, `.hero-headline`

**Klasy do dodania:**
```html
<section class="hero">
  <div class="hero-content">
    <div class="hero-text">
      <div class="hero-eyebrow">→ Available for work</div>
      <h1 class="hero-headline">...</h1>
      <p class="hero-subheadline">...</p>
      <div class="hero-tech-stack">
        <span class="tech-badge">React</span>
        <!-- więcej -->
      </div>
      <div class="hero-cta">
        <a class="btn btn-primary">...</a>
        <a class="btn btn-secondary">...</a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="diagram-container">...</div>
    </div>
  </div>
</section>
```

### 3.4 Projects Grid

**Pliki:**
- `assets/css/components/projects.css`
- `template-parts/components/projects-grid.php`

**Style z bundle.css:** `.projects-grid`, `.project-card`

### 3.5 Social Links

**Pliki:**
- `assets/css/components/social-links.css`
- `template-parts/components/social-links.php` (już istnieje!)

**Style z bundle.css:** `.social-links`, `.social-link`

**Aktualizacja social-links.php:**
```php
<div class="social-links">
  <?php foreach ($social_links as $link) : ?>
    <a href="<?php echo esc_url($link['url']); ?>" 
       class="social-link <?php echo esc_attr($link['class']); ?>"
       aria-label="<?php echo esc_attr($link['label']); ?>">
      <svg viewBox="0 0 24 24">...</svg>
    </a>
  <?php endforeach; ?>
</div>
```

**CSS:**
```css
.social-links {
  display: flex;
  gap: var(--spacing-md);
  align-items: center;
}

.social-link {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 44px;
  height: 44px;
  border-radius: var(--radius);
  background: var(--color-surface-subtle);
  border: 1px solid var(--color-border-subtle);
  transition: all var(--transition-fast);
}

.social-link:hover {
  border-color: var(--color-accent-primary);
  background: var(--color-accent-subtle);
  transform: translateY(-2px);
}

.social-link svg {
  width: 20px;
  height: 20px;
  stroke: var(--color-text-secondary);
  transition: stroke var(--transition-fast);
}

.social-link:hover svg {
  stroke: var(--color-accent-primary);
}
```

---

## 🔧 Faza 4: Override Styles (1-2h)

### 4.1 overrides.css

**Cel:** Nadpisanie stylów parent theme które kolidują z premium design

**Przykłady:**
```css
/* Override Stratos One defaults */
.stratos-one-header {
  background: var(--color-bg-primary) !important;
}

/* Force premium colors */
body {
  background-color: var(--color-bg-primary) !important;
}

/* Typography overrides */
h1, h2, h3, h4, h5, h6 {
  font-weight: var(--font-weight-bold) !important;
  letter-spacing: var(--letter-spacing-tight) !important;
}
```

### 4.2 WordPress Block Overrides

```css
/* Gutenberg blocks premium styling */
.wp-block-button__link {
  border-radius: var(--radius) !important;
  font-weight: var(--font-weight-semibold) !important;
}

.wp-block-heading {
  letter-spacing: var(--letter-spacing-tight) !important;
}
```

---

## ✨ Faza 5: Utilities & Animacje (1h)

### 5.1 Utilities

**Źródło:** `bundle.css` utilities section

**Kopiujemy:**
- `.reveal` + `.visible` (scroll animations)
- `.gradient-text`
- `.badge`
- `.status-dot`
- `.sr-only`
- `.flex-center`, `.flex-between`

### 5.2 Animacje

```css
@keyframes pulse-dot {
  0%, 100% { box-shadow: 0 0 0 3px rgba(16, 217, 160, 0.2); }
  50% { box-shadow: 0 0 0 6px rgba(16, 217, 160, 0.05); }
}

@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-10px); }
}
```

---

## 🧪 Faza 6: Testy (1h)

### 6.1 Checklist

- [ ] Header wygląda jak robert-portfolio
- [ ] Footer wygląda jak robert-portfolio
- [ ] Hero section z premium styles
- [ ] Projects grid cards
- [ ] Social Links z ikonkami
- [ ] Responsywność (mobile, tablet, desktop)
- [ ] Dark mode colors
- [ ] Hover states
- [ ] Focus states (accessibility)
- [ ] Performance (CSS size)

### 6.2 Browser Testing

- [ ] Chrome/Edge
- [ ] Firefox
- [ ] Safari (jeśli dostępne)
- [ ] Mobile Chrome
- [ ] Mobile Safari

---

## 📊 Faza 7: Optymalizacja (30min)

### 7.1 CSS Minification

```bash
# Jeśli używasz Vite
npm run build
```

### 7.2 Critical CSS

Rozważyć inline critical CSS dla above-the-fold content.

---

## 🚀 Faza 8: Commit & Deploy

### 8.1 Git Commit

```bash
cd /home/robert/projects/php/wordpress-portfolio/themes/stratos-one-portfolio

git add -A

git commit -m "feat: add premium portfolio design system

- Import design system from robert-portfolio (bundle.css)
- Create child theme structure with premium styles
- Add component styles: header, footer, hero, projects, social-links
- Implement CSS custom properties (colors, typography, spacing)
- Add utility classes and animations
- Override parent theme styles where needed
- Ensure responsive design matches parent theme
- Test across browsers and devices

Design system includes:
- Color palette (dark theme)
- Typography scale (Plus Jakarta Sans)
- Spacing system
- Shadow system
- Border radius
- Transition timings
- Z-index scale"
```

### 8.2 Merge

```bash
git checkout develop
git merge feature/premium-portfolio-styles
git push origin develop
```

---

## 📁 Lista Plików do Utworzenia/Edycji

### Nowe pliki:
```
✅ assets/css/bundle.css
✅ assets/css/overrides.css
✅ assets/css/components/header.css
✅ assets/css/components/footer.css
✅ assets/css/components/hero.css
✅ assets/css/components/projects.css
✅ assets/css/components/social-links.css
```

### Pliki do edycji:
```
✅ style.css (dodać @import)
✅ functions.php (enqueue styles)
✅ header.php (dodać klasy premium)
✅ footer.php (dodać klasy premium)
✅ front-page.php (hero section)
✅ template-parts/components/social-links.php (klasy)
```

---

## 🎯 Kryteria Akceptacji

- [ ] Child theme aktywowany i działa
- [ ] Wszystkie style z bundle.css załadowane
- [ ] Header identyczny jak robert-portfolio
- [ ] Footer identyczny jak robert-portfolio
- [ ] Hero section z premium design
- [ ] Social Links stylizowane
- [ ] Brak błędów w konsoli
- [ ] Performance: CSS < 100KB (gzipped)
- [ ] Lighthouse score > 90

---

## 🔗 Referencje

**Parent Theme (design source):**
```
/home/robert/projects/php/wordpress/themes/robert-portfolio/
└── assets/css/bundle.css
```

**Child Theme (target):**
```
/home/robert/projects/php/wordpress-portfolio/themes/stratos-one-portfolio/
```

**Stratos One Parent:**
```
/home/robert/projects/php/wordpress/themes/stratos-one/
```

---

## 📝 Uwagi

1. **Nie zmieniać HTML/PHP struktury** - tylko dodawać klasy
2. **Używać CSS custom properties** - łatwe utrzymanie
3. **Testować na żywych danych** - WordPress portfolio
4. **Dokumentować override'y** - dlaczego nadpisane
5. **Mobile-first** - responsywność priorytetem

---

**Czas szacowany:** 10-15 godzin  
**Priorytet:** Wysoki  
**Status:** ⏳ Oczekuje na rozpoczęcie

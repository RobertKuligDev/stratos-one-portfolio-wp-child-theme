# Git Flow Documentation
## Stratos One Portfolio (Child Theme)

**Repository:** `wordpress-portfolio/themes/stratos-one-portfolio`

---

## Branch Strategy

### Main Branches
- **`main`** - production-ready code, always stable
  - Protected branch
  - Only merges from `develop` or hotfixes
  - Tagged with semantic versions (v1.0.0, v1.1.0, etc.)

- **`develop`** - integration branch for features
  - Latest development changes
  - Branch point for features
  - Merges to `main` when ready for release

### Supporting Branches

#### Feature Branches
```
Naming: feature/<description>
Example: feature/header-refactor
Branch from: develop
Merge to: develop
```

#### Release Branches
```
Naming: release/<version>
Example: release/v1.2.0
Branch from: develop
Merge to: main + develop
```

#### Hotfix Branches
```
Naming: hotfix/<description>
Example: hotfix/pattern-slug-fix
Branch from: main
Merge to: main + develop
```

---

## Current Refactoring: Header

### Branch: `feature/header-refactor`

**Goal:** Complete header refactoring to match robert-portfolio standards

**Created from:** `main` (commit: latest)

**Scope:**
- Remove inline JavaScript from functions.php
- Create separate JS files (header-scroll.js, menu-toggle.js)
- Restructure header.php with template parts
- Implement premium CSS styling
- Full accessibility compliance
- Atomic commits with clear messages

**Commits planned:**
1. `refactor(functions): remove inline JavaScript from functions.php`
2. `feat(js): add header-scroll.js for scroll effect handling`
3. `feat(js): add menu-toggle.js for mobile navigation`
4. `feat(functions): enqueue header scripts properly`
5. `feat(template): add site-branding.php template part`
6. `feat(template): add navigation.php template part`
7. `feat(header): add main header.php template structure`
8. `feat(css): add premium header styles with scroll effects`
9. `chore(header): remove unused files and clean up`

**Merge strategy:**
1. Complete all feature work on `feature/header-refactor`
2. Test thoroughly (functionality, accessibility, performance)
3. Create pull request to `develop` (if develop exists) OR
4. Merge directly to `main` with version tag

---

## Commit Message Convention

### Format
```
<type>(<scope>): <subject>

<body>

<footer>
```

### Types
- `feat` - new feature
- `fix` - bug fix
- `refactor` - code refactoring (not feature, not bug)
- `style` - formatting, missing semi-colons, etc.
- `docs` - documentation changes
- `test` - adding tests
- `chore` - build process, tooling, etc.

### Scopes (examples)
- `header` - header component
- `functions` - functions.php
- `css` - stylesheets
- `js` - JavaScript files
- `template` - template parts
- `patterns` - block patterns

### Subject Line Rules
- Use imperative mood ("add" not "added")
- No period at the end
- Max 72 characters

### Body (optional)
- Explain WHAT and WHY (not HOW)
- Wrap at 72 characters

### Footer (optional)
- `Closes #123` for issue references
- `BREAKING CHANGE:` for incompatible changes

---

## Examples

### Feature Commit
```
feat(header): add mobile menu toggle functionality

- Create menu-toggle.js with IIFE pattern
- Add aria-expanded attribute handling
- Implement ESC key handler for accessibility
- Add active class toggle for navigation

Closes #45
```

### Fix Commit
```
fix(patterns): add required Slug header to contact pattern

- Add Slug: stratos-one-portfolio-contact to patterns/contact.php
- Fix WordPress 6.0+ pattern registration error
- Remove missing slug notice from debug log
```

### Refactor Commit
```
refactor(functions): remove inline JavaScript from functions.php

- Extract scroll effect handler to header-scroll.js
- Extract menu toggle to menu-toggle.js
- Add proper wp_enqueue_script() calls
- Maintain backward compatibility
```

---

## Release Process

### Creating a Release
```bash
# 1. Create release branch from develop
git checkout develop
git pull origin develop
git checkout -b release/v1.2.0

# 2. Update version numbers (style.css, functions.php, etc.)
# 3. Final testing
# 4. Commit any last-minute fixes

# 5. Merge to main
git checkout main
git merge --no-ff release/v1.2.0
git tag -a v1.2.0 -m "Release version 1.2.0 - Header Refactoring"

# 6. Merge back to develop
git checkout develop
git merge --no-ff release/v1.2.0

# 7. Push
git push origin main develop --tags
git branch -d release/v1.2.0
```

### Version Tagging
```
v<major>.<minor>.<patch>

Examples:
v1.0.0 - Initial release
v1.1.0 - New features (header refactor)
v1.1.1 - Bug fixes
v2.0.0 - Breaking changes
```

---

## Workflow for This Refactoring

### Step 1: Create Feature Branch
```bash
cd /path/to/stratos-one-portfolio
git checkout main
git pull origin main
git checkout -b feature/header-refactor
```

### Step 2: Work in Atomic Commits
- Each logical change = one commit
- Follow commit message convention
- Test after each commit

### Step 3: Complete Feature
```bash
# Ensure all changes are committed
git status

# Review commit history
git log --oneline

# Push feature branch
git push -u origin feature/header-refactor
```

### Step 4: Merge to Main
```bash
# Option A: Direct merge (for solo development)
git checkout main
git merge --no-ff feature/header-refactor
git tag -a v1.1.0 -m "Release version 1.1.0 - Header Refactoring"
git push origin main --tags

# Option B: Pull Request (if using GitHub/GitLab)
# - Create PR from feature/header-refactor to main
# - Review and approve
# - Merge with squash or merge commit
# - Create release tag
```

### Step 5: Cleanup
```bash
git branch -d feature/header-refactor
git push origin --delete feature/header-refactor
```

---

## Best Practices

### DO:
- ✅ Create branches from up-to-date main/develop
- ✅ Write clear, descriptive commit messages
- ✅ Make atomic commits (one concern = one commit)
- ✅ Test before committing
- ✅ Push regularly to backup work
- ✅ Delete feature branches after merge

### DON'T:
- ❌ Commit directly to main (except hotfixes)
- ❌ Write vague commit messages ("fix stuff", "update")
- ❌ Make huge commits with unrelated changes
- ❌ Commit broken code
- ❌ Keep stale branches

---

## Repository Structure

```
stratos-one-portfolio/
├── .git/
├── functions.php
├── style.css
├── header.php
├── footer.php
├── assets/
│   ├── css/
│   └── js/
├── template-parts/
└── patterns/

Branches:
- main (protected, production)
- develop (integration)
- feature/* (features in progress)
```

---

## Related Repositories

### Parent Theme: stratos-one
**Location:** `/home/robert/projects/php/wordpress/themes/stratos-one`
**Branches:** Same strategy
**Sync:** Child theme must remain compatible

### Portfolio Theme: robert-portfolio
**Location:** `/home/robert/projects/php/wordpress/themes/robert-portfolio`
**Purpose:** Reference implementation
**Style guide:** Source of design standards

---

## Quick Reference

```bash
# Start new feature
git checkout main && git pull
git checkout -b feature/my-feature

# Commit changes
git add .
git commit -m "feat(scope): description"

# Push feature
git push -u origin feature/my-feature

# Merge to main
git checkout main
git merge --no-ff feature/my-feature
git tag -a v1.1.0 -m "Release description"
git push origin main --tags

# Cleanup
git branch -d feature/my-feature
git push origin --delete feature/my-feature
```

---

**Last Updated:** 2026-03-20
**Author:** Robert Kulig
**Version:** 1.0.0

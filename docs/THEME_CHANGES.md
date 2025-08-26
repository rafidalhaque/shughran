---
layout: page
title: Jekyll Theme Configuration Changes
nav_order: 6
---

# Jekyll Theme Configuration Changes

## Issue Resolved
**Problem**: Sub-pages were not being displayed properly in the hosted GitHub Pages documentation.

**Root Cause**: The documentation was using Jekyll front matter attributes (`nav_order`, `has_children`, `parent`) that are specific to the "just-the-docs" theme, but the `_config.yml` was configured to use the "minima" theme which doesn't support hierarchical navigation.

## Changes Made

### 1. Theme Update
- Changed from `theme: minima` to `theme: just-the-docs` in `_config.yml`
- Added just-the-docs specific configuration options:
  - `search_enabled: true` - Enables site-wide search functionality
  - `heading_anchors: true` - Automatically generates anchor links for headings

### 2. Configuration Cleanup
- Removed unnecessary collections configuration
- Simplified default front matter configuration
- Updated default layout to `default` (just-the-docs standard)

### 3. Front Matter Fixes
- Fixed parent reference in `root/index.md` to match exact parent title
- Added missing Jekyll front matter to:
  - `app/controllers/Notify.md`
  - `app/helpers/pagination_helper.md`

### 4. Navigation Structure
The documentation now properly supports the hierarchical structure:

```
├── README.md (nav_order: 1)
├── User Guides (nav_order: 2, has_children: true)
│   └── Account Creation Guide (parent: User Guides)
├── Technical Documentation Index (nav_order: 3)
├── Application Code Documentation (nav_order: 4, has_children: true)
│   ├── Core Extensions
│   ├── Controllers
│   ├── Configuration
│   └── Libraries
└── Root Files Documentation (nav_order: 5, has_children: true)
    └── index.php Documentation
```

## Benefits
- **Hierarchical Navigation**: Proper parent-child relationships displayed in sidebar
- **Search Functionality**: Site-wide search across all documentation
- **Better Organization**: Clear navigation structure for users
- **GitHub Pages Compatible**: Uses themes supported by GitHub Pages

## Maintenance Notes
- All `.md` files must have proper Jekyll front matter with `layout`, `title`, and navigation attributes
- Parent titles in child pages must exactly match the parent page's `title` attribute
- The just-the-docs theme automatically generates navigation based on `nav_order` and hierarchical relationships

## Validation
All markdown files have been validated to ensure:
- Valid YAML front matter syntax
- Correct parent-child relationships
- Proper layout specifications
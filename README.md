
# AirySEO

A lightweight WordPress SEO plugin designed for simplicity and performance.

## Features

- Customize SEO title and description for each post/page, with pixel width reminders for search engine compliance.
- Automatically injects meta tags (title, description) into the page <head>.
- Supports Twitter Card tags for rich sharing on X (Twitter).
- Supports Facebook Open Graph tags for optimized sharing on Facebook.
- Clean interface, easy setup, no unnecessary bloat.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/airy-seo` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Go to the AirySEO settings page to configure your SEO options as needed.

## Usage

- In the post or page editor, use the AirySEO section to set a custom SEO title and description.
- The plugin will automatically insert the corresponding meta tags, Twitter Card, and Facebook Open Graph tags into the frontend <head> section.

## Requirements

- WordPress 4.0 or higher
- PHP 7.1 or higher

## Development & Testing

```bash
make up
make wp.init-dev-site
```
After starting, visit http://localhost:8000 to access the development site.
Default admin credentials: admin / admin

## License

GPLv3 or later

---

AirySEO © 2023 TerryL.in / Airygen Team

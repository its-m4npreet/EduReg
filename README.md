# EduReg — Student Registration (Simple PHP)

EduReg is a lightweight student registration web app built with plain PHP, HTML, CSS and minimal JavaScript. It stores student submissions via server-side scripts (see `process.php`) and provides a view page (`view.php`) to list saved students.

This README explains how to run the project locally using XAMPP, the project structure, quick usage notes, and simple customization tips.

## Features

- Simple student registration form (name, email, age, course)
- Server-side processing using `process.php`
- View page (`view.php`) to list or delete student entries
- Minimal JS for client-side validation (if present in `script.js`)
- Single-folder, easy-to-run project for learning and small demos

## Prerequisites

- Windows with XAMPP installed (Apache + PHP). Other OS / PHP-capable servers work too.

## How to run locally (XAMPP)

1. Copy or place the `eduReg` folder inside XAMPP's `htdocs` directory. Common path on Windows:

   C:\xampp\htdocs\eduReg

2. Start Apache from the XAMPP Control Panel.

3. Open the app in your browser:

```powershell
Start-Process 'http://localhost/eduReg/index.html'
```

Or manually visit `http://localhost/eduReg/index.html`.

4. If CSS/JS changes don't appear, do a hard reload or clear the browser cache (Ctrl+F5) or open an incognito window.

## Project files (overview)

- `index.html` — Frontend form where users register new students.
- `style.css` — Main stylesheet. Edit to customize the look & feel.
- `script.js` — Optional client-side JS (validation or UX enhancements).
- `process.php` — Server-side script that receives form POST, validates and stores data.
- `view.php` — Shows stored student entries and delete links (if implemented).
- `db_connect.php` — (if present) contains DB connection details. If the project uses a DB, secure credentials.
- `delete.php` — Delete endpoint for entries (if present).

> Note: The project is intentionally small and file-based. Before relying on it for production, review data storage and security (use prepared statements, sanitize inputs, implement CSRF protection, and secure file permissions).

## Styling & Theme

- The look is controlled by `style.css`. If you want a different theme (light/dark, custom colors), edit the top of `style.css` or replace the CSS entirely.
- If resource files appear missing: check the paths in `index.html`. Using relative paths like `style.css` and `script.js` (no leading `/`) ensures files load from the project folder.

## Common customizations

- Change accents/colors: edit variables or top color entries in `style.css`.
- Add Google Fonts: in `index.html` head add the Google Fonts link, then update `font-family` in `style.css`.
- Two-column form layout: update `form` styles to use CSS grid with columns and adjust labels/inputs.
- Add a theme toggle: add a small toggle button in `index.html`, add dark/light variable sets in CSS, and use `localStorage` in `script.js` to persist.

## Troubleshooting

- 404 on CSS/JS: ensure paths are relative (e.g., `style.css`) and files exist in `c:\xampp\htdocs\eduReg`.
- PHP errors: enable error display in XAMPP for debugging (only on local/dev). Check Apache/PHP error logs for details.
- Database connection issues: confirm credentials in `db_connect.php` and that the DB server is running.

## Security notes

This project is intended for learning/demos. If you plan to deploy or collect real user data:

- Sanitize and validate all inputs server-side.
- Use prepared statements for database operations.
- Add CSRF protection to forms.
- Remove debug/error display in production and secure configuration files.

## Next steps I can help with

- Add a dark/light theme toggle (persisted in `localStorage`).
- Improve form validation and UX in `script.js` (client-side + server-side validation patterns).
- Convert to use an SQLite file or MySQL with prepared statements and a simple migration script.
- Add minimal automated tests for form processing (PHP unit or simple script).

If you'd like one of those, tell me which and I'll implement it.

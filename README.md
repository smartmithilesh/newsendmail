# newsendmail

PHP mail handler for website enquiry forms. The project accepts form submissions, validates email and reCAPTCHA, sends admin/user email notifications, subscribes contacts to AcyMailing, and stores lead data in configured database tables.

## Features

- Handles multiple form types through `config/mail-config.php`
- Sends admin notification emails using reusable templates
- Sends optional user auto-reply emails
- Validates request method, email format, MX records, and Google reCAPTCHA
- Inserts leads into configurable database tables
- Supports AcyMailing subscription by list ID

## Project Structure

```text
newsendmail/
├── config/
│   ├── config.php          # Local DB, mail, company, and reCAPTCHA settings
│   └── mail-config.php     # Form/template/list/table configuration
├── email-templates/        # HTML email templates
├── helpers/                # Mail, DB, escaping, template, and AcyMailing helpers
├── sendmail.php            # Main POST endpoint
├── .gitignore
├── LICENSE
└── README.md
```

## Setup

1. Place the project on a PHP-enabled server.
2. Create `config/config.php` with local database, mail, company, and reCAPTCHA values.
3. Confirm the form name sent from the frontend matches a key in `config/mail-config.php`.
4. Submit forms to `sendmail.php` using the `POST` method.

## Important

`config/config.php` contains private credentials and is intentionally ignored by Git. Do not commit database passwords, API keys, or reCAPTCHA secret keys.

## Required POST Fields

At minimum, each request should include:

```text
email
formname
g-recaptcha-response
```

Other supported fields include:

```text
first_name, last_name, name, country, phone, jobtitle, designation,
company, industry, content, topic, postID, permalink, postTitle,
ClientName, acymailingID, whitepaperlink, address1, address2, state, zip,
event_title, start_date, end_date, event_location, event_website
```

## Response Format

The endpoint returns JSON:

```json
{
  "type": "message",
  "downloadLinks": [],
  "text": "Thank you message"
}
```

Errors return:

```json
{
  "type": "error",
  "text": "Error message"
}
```

## Git Branches

The main branch is `main`. The earlier `master` branch was merged into `main`.

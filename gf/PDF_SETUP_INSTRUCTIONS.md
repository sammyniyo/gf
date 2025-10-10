# PDF Generation Setup Instructions

## To Re-enable PDF Generation:

### 1. Install DomPDF Package

Run this command in your terminal (from the `gf` directory):

```bash
composer require barryvdh/laravel-dompdf
```

### 2. After Installation

Once the package is installed, I will uncomment the PDF generation code in:

-   `app/Mail/EventTicketMail.php`
-   `app/Http/Controllers/TicketController.php`

### 3. Test PDF Generation

After installation, you can test PDF generation by:

1. Registering for an event
2. Visiting the ticket verification page
3. Clicking "Download PDF Ticket"

### 4. Current Status

-   ✅ QR Code generation is working (using Google Charts API)
-   ✅ Email system is working (using log driver)
-   ✅ Duplicate email validation is implemented
-   ✅ Registrations table has search, filters, and pagination
-   ⏳ PDF generation is ready to be enabled after package installation

## Alternative: Manual PDF Setup

If you can't run composer, you can manually download and install the package:

1. Download from: https://github.com/barryvdh/laravel-dompdf
2. Extract to `vendor/barryvdh/laravel-dompdf/`
3. Add to `composer.json` dependencies
4. Run `composer dump-autoload`

## Benefits After Setup:

-   PDF tickets will be attached to registration emails
-   Users can download PDF tickets directly
-   QR codes will be embedded in PDFs
-   Complete ticket system functionality

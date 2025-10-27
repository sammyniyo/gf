# Page Management System

This system allows you to control the visibility and status of different pages on your website from the admin dashboard.

## Features

-   **Four Status Types:**

    -   **Active**: Page is live and accessible
    -   **Coming Soon**: Displays a "coming soon" page with customizable message
    -   **Maintenance**: Shows a maintenance page with optional custom message
    -   **Locked**: Completely locks the page (redirects to locked page)

-   **Custom Messages**: Add custom messages for each status type
-   **Enable/Disable**: Toggle page access on/off
-   **Admin Override**: Admins can always access pages regardless of status
-   **Beautiful Status Pages**: Each status has its own beautiful, modern design

## How to Use

### 1. Run the Migration

```bash
php artisan migrate
```

### 2. Seed Initial Page Settings

```bash
php artisan db:seed --class=PageSettingsSeeder
```

This will create default settings for:

-   Shop
-   Events
-   Stories
-   Devotions
-   Committee

### 3. Access Admin Panel

Navigate to **Admin Panel** → **Content** → **Page Settings** in the sidebar.

### 4. Configure Pages

1. Click on any page card
2. Choose a status:
    - Active: Page is accessible
    - Coming Soon: Shows coming soon page
    - Maintenance: Shows maintenance page
    - Locked: Page is completely blocked
3. Optionally add a custom message
4. Toggle "Enable Page" to enable/disable
5. Save changes

### 5. Apply Middleware to Routes

Apply the middleware to routes you want to protect:

```php
Route::middleware(['page.status:shop'])->group(function () {
    Route::get('/shop', ...)->name('shop.index');
    // ... other shop routes
});
```

The middleware parameter is the `page_identifier` from your database.

## Available Pages

Currently configured pages:

-   `shop` - Shop page
-   `events` - Events page
-   `stories` - Stories page
-   `devotions` - Devotions page
-   `committee` - Committee page

## Adding New Pages

To add a new page:

1. Add an entry to the `page_settings` table in your seeder
2. Apply the middleware to your routes:
    ```php
    Route::middleware(['page.status:your-page-identifier'])->group(function () {
        // your routes
    });
    ```

## Status Pages

### Coming Soon

-   Purple gradient background
-   Rocket icon with floating animation
-   Customizable message

### Maintenance

-   Orange/amber gradient background
-   Wrench icon with rotating animation
-   Shows "under maintenance" message

### Locked

-   Red gradient background
-   Lock icon with pulse animation
-   Shows "page locked" message

### Active

-   Green gradient background
-   Check mark icon
-   Shows "page active" message

## Technical Details

### Database Schema

```php
page_identifier: string (unique)
page_name: string (human-readable name)
status: enum('active', 'coming_soon', 'maintenance', 'locked')
custom_message: text (nullable)
icon: string (nullable)
is_enabled: boolean
```

### Middleware

The `CheckPageStatus` middleware:

-   Checks if page exists in database
-   Allows access if status is 'active' and enabled
-   Allows admins to bypass all restrictions
-   Returns appropriate status page based on status

### Admin Access

Admins can always access pages regardless of status. This is handled in the middleware by checking `Auth::user()->is_admin`.

## Example: Locking the Shop

1. Go to Admin Panel → Page Settings
2. Click on "Shop"
3. Select "Locked" status
4. Add custom message: "The shop is currently closed for inventory. Please check back soon!"
5. Save

Now when visitors try to access `/shop`, they'll see the beautiful locked page with your custom message.

## Example: Coming Soon

1. Go to Admin Panel → Page Settings
2. Click on any page
3. Select "Coming Soon" status
4. Add message: "We're preparing something amazing! Launch date: December 2024"
5. Save

Visitors will see a coming soon page with your message.

## Maintenance Mode

1. Select "Under Maintenance" status
2. Add details: "We're upgrading our systems. Back in 2 hours!"
3. Save

This is perfect for planned downtime or updates.

## Notes

-   Custom messages are optional and will use default messages if not provided
-   The middleware is already applied to shop routes as an example
-   You can extend this to any routes you want to control
-   All status pages are responsive and mobile-friendly
-   Status pages return HTTP 503 (Service Unavailable) status code

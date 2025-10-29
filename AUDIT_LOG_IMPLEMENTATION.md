# Audit Log System - Implementation Guide

## Overview

A comprehensive audit logging system has been implemented to track all important activities and changes in the God's Family Choir management system.

## Features

### ✅ Implemented Features

1. **Complete Audit Trail**
   - Tracks all CRUD operations (Create, Read, Update, Delete)
   - Records user information (who did it)
   - Captures request details (IP address, user agent, URL)
   - Stores old and new values for updates
   - Supports custom properties for additional context

2. **Automatic Logging**
   - Member creation, updates, status changes, and deletion
   - Email sending events
   - Data exports
   - User login/logout (ready to implement)

3. **Advanced Filtering**
   - Filter by action type (created, updated, deleted, etc.)
   - Filter by model type (Member, Event, Story, etc.)
   - Filter by user
   - Filter by date range
   - Search by description

4. **User-Friendly Interface**
   - Clean, modern UI matching the admin panel design
   - Detailed view of each audit log entry
   - Visual indicators for different action types
   - Old vs New value comparison for updates

5. **Data Management**
   - Cleanup old logs functionality
   - Prevents database bloat
   - Configurable retention period

## Database Schema

```sql
CREATE TABLE audit_logs (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT NULL,                    -- Who did it
    user_name VARCHAR(255) NULL,            -- Stored in case user is deleted
    user_email VARCHAR(255) NULL,
    action VARCHAR(255),                    -- created, updated, deleted, etc.
    auditable_type VARCHAR(255) NULL,       -- Member, Event, Story, etc.
    auditable_id BIGINT NULL,
    description TEXT,                       -- Human-readable description
    ip_address VARCHAR(45) NULL,
    user_agent TEXT NULL,
    url VARCHAR(255) NULL,
    old_values JSON NULL,                   -- Original values before update
    new_values JSON NULL,                   -- New values after update
    properties JSON NULL,                   -- Additional context
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    INDEX (auditable_type, auditable_id),
    INDEX (user_id),
    INDEX (action),
    INDEX (created_at)
);
```

## Usage Examples

### 1. Basic Logging

```php
use App\Services\AuditLogger;

// Log a creation
AuditLogger::created($member);

// Log an update
AuditLogger::updated($member, $oldValues, $newValues);

// Log a deletion
AuditLogger::deleted($member);
```

### 2. Status Change Logging

```php
AuditLogger::statusChanged($member, 'pending', 'active');
```

### 3. Email Logging

```php
AuditLogger::emailSent($member->email, 'Welcome Email', $member);
```

### 4. Export Logging

```php
AuditLogger::exported('members', $membersCount);
```

### 5. Custom Logging

```php
AuditLogger::log(
    action: 'custom_action',
    auditable: $model,
    description: 'Custom description',
    oldValues: [],
    newValues: [],
    properties: ['custom_key' => 'custom_value']
);
```

## Action Types

The system supports the following action types:

- `created` - New record created
- `updated` - Record updated
- `deleted` - Record deleted
- `restored` - Soft-deleted record restored
- `viewed` - Record viewed (optional, can be verbose)
- `exported` - Data exported
- `imported` - Data imported
- `login` - User logged in
- `logout` - User logged out
- `password_changed` - Password changed
- `email_sent` - Email sent
- `status_changed` - Status changed

## Files Created/Modified

### New Files

1. **Migration:**
   - `database/migrations/2025_10_29_154726_create_audit_logs_table.php`

2. **Model:**
   - `app/Models/AuditLog.php`

3. **Service:**
   - `app/Services/AuditLogger.php`

4. **Controller:**
   - `app/Http/Controllers/Admin/AuditLogController.php`

5. **Views:**
   - `resources/views/admin/audit-logs/index.blade.php`
   - `resources/views/admin/audit-logs/show.blade.php`

### Modified Files

1. **Routes:**
   - `routes/web.php` - Added audit log routes

2. **Controllers:**
   - `app/Http/Controllers/Admin/MemberController.php` - Added audit logging

3. **Layout:**
   - `resources/views/admin/layout.blade.php` - Added "Audit Logs" menu item

## Extending to Other Controllers

To add audit logging to other controllers, follow this pattern:

### 1. Import the Service

```php
use App\Services\AuditLogger;
```

### 2. Add Logging to Create Method

```php
public function store(Request $request)
{
    // ... validation and data preparation ...
    
    $model = ModelName::create($data);
    
    // Add audit log
    AuditLogger::created($model);
    
    return redirect()->route('...');
}
```

### 3. Add Logging to Update Method

```php
public function update(Request $request, $model)
{
    $oldValues = $model->only(['field1', 'field2', 'field3']);
    
    $model->update($data);
    
    $newValues = $model->only(['field1', 'field2', 'field3']);
    
    // Add audit log
    AuditLogger::updated($model, $oldValues, $newValues);
    
    return redirect()->route('...');
}
```

### 4. Add Logging to Delete Method

```php
public function destroy($model)
{
    // Add audit log before deleting
    AuditLogger::deleted($model);
    
    $model->delete();
    
    return redirect()->route('...');
}
```

## Recommended Controllers to Add Logging

Priority order for adding audit logging:

### High Priority
- ✅ `Admin\MemberController` (Done)
- ⏳ `Admin\EventController`
- ⏳ `Admin\StoryController`
- ⏳ `Admin\UserController`
- ⏳ `Admin\ContributionController`

### Medium Priority
- ⏳ `Admin\DevotionController`
- ⏳ `Admin\AlbumController`
- ⏳ `Admin\CommitteeController`
- ⏳ `Admin\ResourceController`

### Low Priority
- ⏳ `Admin\PageSettingsController`
- ⏳ `Admin\SiteSettingsController`
- ⏳ Login/Logout (AuthController)

## Access Control

Currently, audit logs are accessible to all admin users. To restrict access:

1. Create a middleware or policy
2. Check user role/permission
3. Apply to routes:

```php
Route::middleware(['auth', 'admin', 'can:view-audit-logs'])->group(function () {
    Route::get('/audit-logs', ...);
});
```

## Performance Considerations

### 1. Indexing
The migration includes indexes on frequently queried columns:
- `auditable_type` and `auditable_id`
- `user_id`
- `action`
- `created_at`

### 2. Cleanup Strategy
Implement regular cleanup to prevent table bloat:

```php
// Delete logs older than 90 days
AuditLog::where('created_at', '<', now()->subDays(90))->delete();
```

Or use the built-in cleanup feature in the admin panel.

### 3. Disable Verbose Logging
For high-traffic actions, consider disabling logging:

```php
// Don't log every view
// AuditLogger::viewed($member);  // Commented out
```

## Viewing Audit Logs

### Admin Panel
1. Navigate to **Admin → Audit Logs**
2. Use filters to narrow down results:
   - Action type
   - Model type
   - User
   - Date range
   - Search text
3. Click "View Details" to see full information

### Programmatically

```php
// Get all logs for a specific model
$logs = AuditLog::where('auditable_type', Member::class)
    ->where('auditable_id', $memberId)
    ->latest()
    ->get();

// Get recent activity
$recentLogs = AuditLog::latest()
    ->take(50)
    ->get();

// Get logs by user
$userLogs = AuditLog::where('user_id', $userId)
    ->latest()
    ->paginate(20);
```

## Testing

### Manual Testing Checklist

- [ ] Create a new member → Check audit log created
- [ ] Update member status → Check status_changed log
- [ ] Delete a member → Check deleted log
- [ ] Export members → Check exported log
- [ ] Filter logs by action
- [ ] Filter logs by model type
- [ ] Filter logs by user
- [ ] Filter logs by date range
- [ ] Search logs
- [ ] View log details
- [ ] Cleanup old logs

### Automated Testing

Create tests in `tests/Feature/AuditLogTest.php`:

```php
public function test_member_creation_is_logged()
{
    $member = Member::factory()->create();
    
    $this->assertDatabaseHas('audit_logs', [
        'action' => 'created',
        'auditable_type' => Member::class,
        'auditable_id' => $member->id,
    ]);
}
```

## Best Practices

1. **Always log important actions**
   - Create, Update, Delete operations
   - Status changes
   - Permission changes
   - Email sending

2. **Don't over-log**
   - Avoid logging read operations (views)
   - Don't log every single request
   - Balance between thoroughness and performance

3. **Store meaningful descriptions**
   - Use human-readable descriptions
   - Include relevant context
   - Make it easy to understand what happened

4. **Regular cleanup**
   - Schedule automatic cleanup
   - Keep logs for compliance period
   - Archive old logs if needed

5. **Monitor log growth**
   - Check database size regularly
   - Adjust cleanup frequency as needed
   - Consider archiving to separate storage

## Troubleshooting

### Logs not appearing
- Check if migration ran successfully
- Verify AuditLogger is imported
- Ensure logging code is executed
- Check for PHP errors in logs

### Performance issues
- Add more indexes if needed
- Implement cleanup routine
- Consider async logging for high-traffic actions
- Use queue workers for logging

### Old values not captured
- Ensure you get old values before updating
- Use `$model->only(['field1', 'field2'])` to get specific fields
- Check that fields are in the fillable array

## Future Enhancements

- [ ] Add audit log export functionality
- [ ] Implement audit log search with Elasticsearch
- [ ] Add audit log dashboard with charts
- [ ] Implement audit log archiving
- [ ] Add email notifications for critical actions
- [ ] Create audit log API endpoints
- [ ] Add role-based audit log access control
- [ ] Implement audit log retention policies
- [ ] Add audit log comparison tool
- [ ] Create audit log reports

## Security Considerations

1. **Access Control**
   - Only admins should access audit logs
   - Consider additional permissions for sensitive logs

2. **Data Privacy**
   - Don't log sensitive data (passwords, credit cards)
   - Consider encryption for sensitive fields
   - Comply with GDPR/data protection laws

3. **Integrity**
   - Audit logs should be immutable
   - Prevent deletion except through cleanup process
   - Consider write-once storage

4. **Compliance**
   - Keep logs for required period
   - Document retention policy
   - Ensure logs are available for audits

## Support

For questions or issues:
1. Check this documentation
2. Review the code in `app/Services/AuditLogger.php`
3. Examine example implementation in `Admin\MemberController.php`
4. Check Laravel logs for errors

---

**Implementation Date:** October 29, 2025
**Status:** ✅ Completed and Ready for Use
**Version:** 1.0.0


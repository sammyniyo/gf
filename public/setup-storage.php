<?php
/**
 * Storage Link Setup Script for Shared Hosting
 *
 * This script creates the storage symlink when you don't have SSH access.
 *
 * USAGE:
 * 1. Upload this file to your public/ directory via Git
 * 2. Visit: https://yourdomain.com/setup-storage.php
 * 3. Delete this file after successful setup
 *
 * SECURITY: Delete this file immediately after use!
 */

// Prevent direct access in production (optional security check)
$allowedIPs = [
    '127.0.0.1',
    '::1',
    // Add your IP address here if you want extra security
    // '123.456.789.012',
];

// Comment out these lines if you want to allow access from any IP
// if (!in_array($_SERVER['REMOTE_ADDR'] ?? '', $allowedIPs)) {
//     die('Access denied. This script can only be run from allowed IPs.');
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage Link Setup - God's Family</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 28px;
        }
        .subtitle {
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .status {
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .status-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .status-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        .status-warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
        }
        .status-info {
            background: #d1ecf1;
            border: 1px solid #bee5eb;
            color: #0c5460;
        }
        .icon {
            font-size: 24px;
        }
        .code {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            font-size: 12px;
            overflow-x: auto;
            margin: 10px 0;
        }
        .button {
            background: #667eea;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .button:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .button-danger {
            background: #dc3545;
        }
        .button-danger:hover {
            background: #c82333;
        }
        .steps {
            margin: 20px 0;
        }
        .step {
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            margin-bottom: 15px;
            border-radius: 5px;
        }
        .step-title {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔗 Storage Link Setup</h1>
        <p class="subtitle">God's Family Choir - Shared Hosting Configuration</p>

        <?php
        $action = $_GET['action'] ?? 'check';
        $basePath = dirname(__DIR__); // Parent directory of public/
        $publicStorage = __DIR__ . '/storage';
        $targetStorage = $basePath . '/storage/app/public';

        function formatPath($path) {
            return str_replace('\\', '/', $path);
        }

        function checkStorageLink($publicStorage, $targetStorage) {
            if (file_exists($publicStorage)) {
                if (is_link($publicStorage)) {
                    $linkTarget = readlink($publicStorage);
                    $resolvedTarget = realpath($publicStorage);
                    return [
                        'exists' => true,
                        'is_link' => true,
                        'target' => $linkTarget,
                        'resolved' => $resolvedTarget,
                        'working' => ($resolvedTarget === realpath($targetStorage))
                    ];
                } else {
                    return [
                        'exists' => true,
                        'is_link' => false,
                        'is_directory' => is_dir($publicStorage)
                    ];
                }
            }
            return ['exists' => false];
        }

        // Check current status
        $status = checkStorageLink($publicStorage, $targetStorage);

        if ($action === 'check'):
        ?>
            <!-- Status Check -->
            <div class="status status-info">
                <span class="icon">ℹ️</span>
                <div>
                    <strong>Checking Storage Link Status...</strong><br>
                    <small>Base Path: <?= formatPath($basePath) ?></small>
                </div>
            </div>

            <?php if (!file_exists($targetStorage)): ?>
                <div class="status status-error">
                    <span class="icon">❌</span>
                    <div>
                        <strong>Target directory not found!</strong><br>
                        <code>storage/app/public/</code> does not exist.
                    </div>
                </div>
                <p>Please ensure your Laravel application is properly uploaded.</p>

            <?php elseif ($status['exists'] && $status['is_link'] && $status['working']): ?>
                <div class="status status-success">
                    <span class="icon">✅</span>
                    <div>
                        <strong>Storage link is working correctly!</strong><br>
                        <small>Target: <?= formatPath($status['resolved']) ?></small>
                    </div>
                </div>

                <div class="steps">
                    <div class="step">
                        <div class="step-title">✅ Symlink Status:</div>
                        Link exists and points to the correct location
                    </div>
                    <div class="step">
                        <div class="step-title">✅ Member Photos:</div>
                        Images should now be accessible at <code>/storage/member-photos/</code>
                    </div>
                </div>

                <p><strong>⚠️ Important:</strong> Delete this file now for security!</p>
                <a href="?action=delete-self" class="button button-danger">Delete This File</a>

            <?php elseif ($status['exists'] && !$status['is_link']): ?>
                <div class="status status-warning">
                    <span class="icon">⚠️</span>
                    <div>
                        <strong>Storage exists but is not a symlink!</strong><br>
                        It's a <?= $status['is_directory'] ? 'directory' : 'file' ?> instead.
                    </div>
                </div>

                <p>We need to remove the existing storage and create a proper symlink.</p>
                <a href="?action=fix" class="button">Fix Storage Link</a>

            <?php else: ?>
                <div class="status status-warning">
                    <span class="icon">⚠️</span>
                    <div>
                        <strong>Storage link does not exist</strong><br>
                        Member photos will not be accessible until the link is created.
                    </div>
                </div>

                <div class="steps">
                    <div class="step">
                        <div class="step-title">What this will do:</div>
                        Create a symbolic link from <code>public/storage</code> to <code>storage/app/public</code>
                    </div>
                    <div class="step">
                        <div class="step-title">Result:</div>
                        Member photos will be accessible via <code>/storage/member-photos/</code>
                    </div>
                </div>

                <a href="?action=create" class="button">Create Storage Link</a>
            <?php endif; ?>

        <?php elseif ($action === 'create' || $action === 'fix'): ?>
            <!-- Create/Fix Storage Link -->
            <?php
            $success = false;
            $message = '';

            try {
                // Remove existing if present
                if (file_exists($publicStorage)) {
                    if (is_link($publicStorage)) {
                        unlink($publicStorage);
                    } elseif (is_dir($publicStorage)) {
                        // Don't auto-remove directories for safety
                        throw new Exception('Please manually remove the public/storage directory first.');
                    } else {
                        unlink($publicStorage);
                    }
                }

                // Create symlink
                $relativePath = '../storage/app/public';

                // Try symlink first (Linux/Mac)
                if (function_exists('symlink')) {
                    $success = @symlink($relativePath, $publicStorage);
                }

                // If symlink fails, try creating directory junction (Windows Server)
                if (!$success && strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                    $cmd = 'mklink /J "' . str_replace('/', '\\', $publicStorage) . '" "' . str_replace('/', '\\', $targetStorage) . '"';
                    exec($cmd, $output, $return);
                    $success = ($return === 0);
                }

                if ($success) {
                    $message = 'Storage link created successfully!';
                } else {
                    throw new Exception('Failed to create symlink. Your hosting might not support symlinks.');
                }

            } catch (Exception $e) {
                $message = 'Error: ' . $e->getMessage();
            }
            ?>

            <?php if ($success): ?>
                <div class="status status-success">
                    <span class="icon">✅</span>
                    <div>
                        <strong>Success!</strong><br>
                        <?= $message ?>
                    </div>
                </div>

                <div class="steps">
                    <div class="step">
                        <div class="step-title">1. Test Images</div>
                        Go to your admin panel and check if member photos are displaying
                    </div>
                    <div class="step">
                        <div class="step-title">2. Delete This File</div>
                        For security, remove this file from your server immediately
                    </div>
                </div>

                <a href="?action=check" class="button">Verify Setup</a>
                <a href="?action=delete-self" class="button button-danger">Delete This File</a>

            <?php else: ?>
                <div class="status status-error">
                    <span class="icon">❌</span>
                    <div>
                        <strong>Failed!</strong><br>
                        <?= $message ?>
                    </div>
                </div>

                <div class="steps">
                    <div class="step">
                        <div class="step-title">Alternative Solution:</div>
                        Contact your hosting support and ask them to create a symlink:<br>
                        <code>ln -s ../storage/app/public public/storage</code>
                    </div>
                </div>

                <a href="?action=check" class="button">Try Again</a>
            <?php endif; ?>

        <?php elseif ($action === 'delete-self'): ?>
            <!-- Delete Script -->
            <?php
            $deleted = @unlink(__FILE__);
            ?>

            <?php if ($deleted): ?>
                <div class="status status-success">
                    <span class="icon">✅</span>
                    <div>
                        <strong>Script deleted successfully!</strong><br>
                        This page will no longer be accessible.
                    </div>
                </div>
                <p>You can now safely close this window.</p>
            <?php else: ?>
                <div class="status status-error">
                    <span class="icon">❌</span>
                    <div>
                        <strong>Could not delete script automatically</strong><br>
                        Please delete <code>public/setup-storage.php</code> manually via FTP or cPanel.
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="footer">
            God's Family Choir Management System<br>
            Storage Link Setup Tool
        </div>
    </div>
</body>
</html>


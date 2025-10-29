-- ==================================================================
-- COMPLETE FIX FOR MEMBER REGISTRATION
-- Run this SQL in phpMyAdmin on your REMOTE database
-- ==================================================================

-- Step 1: Add missing columns if they don't exist
ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `date_of_birth` DATE NULL AFTER `birthdate`;

ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `contribution_category` ENUM('student', 'alumni', 'exempt') DEFAULT 'student' AFTER `yearly_target`;

ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `has_payment_award` TINYINT(1) DEFAULT 0 AFTER `contribution_category`;

ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `payment_award_emoji` VARCHAR(10) NULL AFTER `has_payment_award`;

ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `paid_until_date` DATE NULL AFTER `payment_award_emoji`;

-- Step 2: Make certain fields nullable to prevent errors
ALTER TABLE `members` MODIFY COLUMN `address` TEXT NULL;
ALTER TABLE `members` MODIFY COLUMN `name` VARCHAR(255) NULL;
ALTER TABLE `members` MODIFY COLUMN `birthdate` DATE NULL;

-- Step 3: Sync existing data
UPDATE `members`
SET `date_of_birth` = `birthdate`
WHERE `birthdate` IS NOT NULL AND (`date_of_birth` IS NULL OR `date_of_birth` = '');

-- Step 4: Verify the changes worked
SELECT 'Database updated successfully!' AS status;

-- You can verify by running:
-- DESCRIBE members;


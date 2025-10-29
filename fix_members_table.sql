-- Fix Members Table - Run this SQL in phpMyAdmin
-- This fixes the "member_id doesn't have a default value" error

-- Step 1: Add missing columns
ALTER TABLE `members`
ADD COLUMN IF NOT EXISTS `date_of_birth` DATE NULL AFTER `birthdate`,
ADD COLUMN IF NOT EXISTS `contribution_category` ENUM('student', 'alumni', 'exempt') DEFAULT 'student' AFTER `yearly_target`,
ADD COLUMN IF NOT EXISTS `has_payment_award` TINYINT(1) DEFAULT 0 AFTER `contribution_category`,
ADD COLUMN IF NOT EXISTS `payment_award_emoji` VARCHAR(10) NULL AFTER `has_payment_award`,
ADD COLUMN IF NOT EXISTS `paid_until_date` DATE NULL AFTER `payment_award_emoji`;

-- Step 2: Make certain fields nullable to prevent insert errors
ALTER TABLE `members`
MODIFY COLUMN `address` TEXT NULL,
MODIFY COLUMN `name` VARCHAR(255) NULL,
MODIFY COLUMN `birthdate` DATE NULL;

-- Step 3: Sync existing data (copy birthdate to date_of_birth)
UPDATE `members`
SET `date_of_birth` = `birthdate`
WHERE `birthdate` IS NOT NULL AND `date_of_birth` IS NULL;

-- Step 4: Verify the changes
SELECT
    COLUMN_NAME,
    DATA_TYPE,
    IS_NULLABLE,
    COLUMN_DEFAULT,
    COLUMN_KEY
FROM
    INFORMATION_SCHEMA.COLUMNS
WHERE
    TABLE_SCHEMA = DATABASE()
    AND TABLE_NAME = 'members'
ORDER BY
    ORDINAL_POSITION;

-- Done! You should now be able to register members without errors.


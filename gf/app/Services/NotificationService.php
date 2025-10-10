<?php

namespace App\Services;

use App\Models\Notification;

class NotificationService
{
    /**
     * Create a new notification.
     */
    public static function create(
        string $type,
        string $title,
        string $message,
        ?string $actionUrl = null,
        ?string $actionText = null,
        string $color = 'blue',
        ?int $userId = null,
        ?array $data = null
    ): Notification {
        return Notification::create([
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'action_url' => $actionUrl,
            'action_text' => $actionText,
            'color' => $color,
            'user_id' => $userId,
            'data' => $data,
        ]);
    }

    /**
     * Notify about new event registration.
     */
    public static function newEventRegistration($registration): Notification
    {
        return self::create(
            type: 'registration',
            title: 'New Event Registration',
            message: "{$registration->name} registered for {$registration->event->title}",
            actionUrl: route('admin.registrations.show', $registration),
            actionText: 'View Details',
            color: 'green'
        );
    }

    /**
     * Notify about new member registration.
     */
    public static function newMemberRegistration($member): Notification
    {
        return self::create(
            type: 'member',
            title: 'New Member Application',
            message: "{$member->first_name} {$member->last_name} has applied to join the choir",
            actionUrl: route('admin.members.show', $member),
            actionText: 'Review Application',
            color: 'blue'
        );
    }

    /**
     * Notify about new contact message.
     */
    public static function newContactMessage($contact): Notification
    {
        return self::create(
            type: 'contact',
            title: 'New Contact Message',
            message: "{$contact->name} sent a message: " . \Str::limit($contact->message, 50),
            actionUrl: route('admin.contacts.show', $contact),
            actionText: 'Read Message',
            color: 'purple'
        );
    }

    /**
     * Notify about new contribution.
     */
    public static function newContribution($contribution): Notification
    {
        return self::create(
            type: 'contribution',
            title: 'New Contribution Received',
            message: "{$contribution->member->full_name} contributed " . number_format($contribution->amount) . " RWF",
            actionUrl: route('admin.contributions.index'),
            actionText: 'View Contributions',
            color: 'green'
        );
    }

    /**
     * Notify about upcoming event.
     */
    public static function upcomingEvent($event): Notification
    {
        return self::create(
            type: 'event',
            title: 'Upcoming Event Reminder',
            message: "{$event->title} is starting soon on {$event->start_at->format('M d, Y')}",
            actionUrl: route('admin.events.show', $event),
            actionText: 'View Event',
            color: 'yellow'
        );
    }

    /**
     * Get unread notifications count for user.
     */
    public static function getUnreadCount(?int $userId = null): int
    {
        return Notification::unread()
            ->forUser($userId)
            ->count();
    }

    /**
     * Get recent notifications for user.
     */
    public static function getRecent(?int $userId = null, int $limit = 10)
    {
        return Notification::forUser($userId)
            ->latest()
            ->limit($limit)
            ->get();
    }

    /**
     * Mark all notifications as read for user.
     */
    public static function markAllAsRead(?int $userId = null): void
    {
        Notification::unread()
            ->forUser($userId)
            ->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
    }
}


<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class QuoteMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $formData;
    public $emailType;

    /**
     * Create a new message instance.
     */
    public function __construct($formData, $emailType = 'admin')
    {
        $this->formData = $formData;
        $this->emailType = $emailType;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = match($this->emailType) {
            'admin' => '[견적요청] ' . $this->formData['subject'],
            'customer' => '[견적요청 접수완료] ' . $this->formData['subject'],
            'cc' => '[견적요청 사본] ' . $this->formData['subject'],
            default => '[견적요청] ' . $this->formData['subject']
        };

        $from = match($this->emailType) {
            'customer' => config('mail.from.address', 'noreply@company.com'),
            default => $this->formData['contact_email']
        };

        return new Envelope(
            from: $from,
            subject: $subject,
            replyTo: $this->formData['contact_email']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $view = match($this->emailType) {
            'admin' => 'emails.quote-admin',
            'customer' => 'emails.quote-customer',
            'cc' => 'emails.quote-cc',
            default => 'emails.quote-admin'
        };

        return new Content(
            view: $view,
            with: [
                'formData' => $this->formData,
                'emailType' => $this->emailType
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        $attachments = [];

        // Only attach files to admin and cc emails
        if (in_array($this->emailType, ['admin', 'cc']) && !empty($this->formData['attachments'])) {
            foreach ($this->formData['attachments'] as $attachment) {
                if (Storage::disk('public')->exists($attachment['path'])) {
                    $attachments[] = Attachment::fromStorageDisk('public', $attachment['path'])
                        ->as($attachment['original_name'])
                        ->withMime($attachment['mime_type']);
                }
            }
        }

        return $attachments;
    }
}

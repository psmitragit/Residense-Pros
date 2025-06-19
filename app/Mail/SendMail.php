<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $content, $attachments;
    /**
     * Create a new message instance.
     */
    public function __construct($subject, $content, $attachment = [])
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->attachments = $attachment;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.template',
            with: [
                "html" => $this->content
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $res = [];
        if (!empty($this->attachments)) {
            foreach ($this->attachments as $attachment) {
                if (file_exists(storage_path($attachment))) {
                    $res[] = Attachment::fromPath(storage_path($attachment));
                }
            }
        }
        return $res;
    }
}

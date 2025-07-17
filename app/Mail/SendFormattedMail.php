<?php

namespace App\Mail;

use App\Models\EmailTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendFormattedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $subject, $content, $attachments;
    /**
     * Create a new message instance.
     */
    public function __construct($templateId, $keywords = [], $attachment = [])
    {
        $this->attachments = $attachment;
        $template = EmailTemplate::find($templateId);
        $subject = $template?->subject ?? '';
        $content = $template?->content ?? '';
        $templateKeywords = $template?->keywords ?? '';
        $keys = explode(',', $templateKeywords);
        $this->subject = str_replace($keys, $keywords, $subject);
        $this->content = str_replace($keys, $keywords, $content);
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

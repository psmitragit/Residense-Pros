<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmailTemplate::truncate();
        EmailTemplate::insert([
            [
                'id'  => 1,
                'subject' => 'Please verify your email address to complete your registration',
                'content' => 'Hi ###NAME###,<br><br>
                    Thank you for registering with us!<br><br>
                    To complete your registration and activate your account, please verify your email address by clicking the button below:<br><br>
                    <a href="###URL###">Verify Email Address</a><br><br>
                    <span style="word-break: break-all;">If the button above doesn\'t work, copy and paste this link into your browser:
                    ###URL###</span><br><br>
                    This link will expire in 24 hours.<br><br>
                    If you didn’t create an account with us, you can safely ignore this email.<br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###NAME###,###URL###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id'  => 2,
                'subject' => 'Thank You for Subscribing to the ###PLAN_NAME### Plan!',
                'content' => 'Hi ###NAME###,<br><br>
                    Thank you for subscribing to the ###PLAN_NAME### Plan! 🎉  <br>
                    Your subscription is now active.<br>
                    Here\'s a quick summary of your plan:<br><br>
                    Plan Name: ###PLAN_NAME### <br>
                    Plan Duration: 1 Month <br>
                    Amount: ###AMOUNT###<br>
                    Plan Expire in ###END_DATE###<br>
                    Plan benifits: ###BENIFITS###<br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###NAME###,###PLAN_NAME###,###END_DATE###,###BENIFITS###,###AMOUNT###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'subject' => 'New Property Listing Notification',
                'content' => 'Hello Admin,<br><br>
                    A new property listing has just been submitted by an agent.<br><br>
                    <strong>Listing Details:</strong><br>
                        Agent Name: ###NAME###<br>
                        Property Title: ###PROPERTY###<br>
                        Submitted On: ###DATE###<br><br>
                    You can <a href="###URL###">view the listing here</a>.<br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###NAME###,###PROPERTY###,###DATE###,###URL###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'subject' => 'Hello ###AGENT_NAME###, you have a new enquiry for ###PROPERTY###',
                'content' => 'Hello ###AGENT_NAME###,<br><br>
                        You have received a new enquiry for your property listing:<br><br>
                        <strong>Property:</strong> ###PROPERTY###<br>
                        <strong>Enquiry Date:</strong> ###DATE###<br><br>
                        <strong>Enquirer\'s Details:</strong><br>
                        Name: ###USER_NAME###<br>
                        Email: ###USER_EMAIL###<br>
                        Phone: ###USER_PHONE###<br>
                        Message: <br>
                        <i>###USER_MESSAGE###</i><br><br>
                        Best regards,<br>
                        Residence Pros',
                'keywords' => '###AGENT_NAME###,###PROPERTY###,###DATE###,###USER_NAME###,###USER_EMAIL###,###USER_PHONE###,###USER_MESSAGE###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'subject' => 'New Contact Us Enquiry from ###NAME###',
                'content' => 'Hello Admin,<br><br>
                    You\'ve received a new enquiry from the website contact form. Here are the details:<br>
                       Name: ###NAME###<br>
                       Email: ###EMAIL###<br>
                       Phone: ###PHONE###<br>
                       Message: <br>
                       <i>###MESSAGE###</i><br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###NAME###,###EMAIL###,###PHONE###,###MESSAGE###',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

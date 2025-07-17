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
            ],
            [
                'id' => 6,
                'subject' => 'New Ad Pending Approval: ###AD_TITLE###',
                'content' => 'Hello Admin,<br><br>
                    A new ad has been submitted and is awaiting your approval. Here are the details:<br><br>
                    Position: ###AD_TITLE###<br>
                    Submitted By: ###AGENT_NAME###<br>
                    Submitted On: ###DATE###<br><br>
                    Please <a href="###APPROVAL_URL###">click here</a> to review and approve the ad to proceed with the next steps.<br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###AD_TITLE###,###AGENT_NAME###,###DATE###,###APPROVAL_URL###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'subject' => 'Your Ad is Now Live: ###AD_TITLE###',
                'content' => 'Hello ###AGENT_NAME###,<br><br>
                        Great news! Your ad "<strong>###AD_TITLE###</strong>" is now live on our website.<br><br>
                        Live Until: <strong>###END_DATE###</strong><br>
                        View Your Ad: <a href="###AD_URL###" target="_blank">Click Here</a><br><br>
                        Thank you for advertising with us. If you have any questions, please feel free to contact our support team.<br><br>
                        Best regards,<br>
                        Residence Pros',
                'keywords' => '###AD_TITLE###,###AGENT_NAME###,###END_DATE###,###AD_URL###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 8,
                'subject' => 'Your Ad is Approved: ###AD_TITLE###',
                'content' => 'Hello ###AGENT_NAME###,<br><br>
                        Your ad ###AD_TITLE### has been approved.<br><br>
                        To make it live on our website, please complete the payment.<br><br>
                        Complete Payment: <a href="###PAYMENT_URL###" target="_blank">Click Here</a><br><br>
                        Once the payment is completed, your ad will go live immediately.<br><br>
                        If you have any questions, feel free to reach out to our support team.<br><br>
                        Best regards,<br>
                        Residence Pros',
                'keywords' => '###AD_TITLE###,###AGENT_NAME###,###PAYMENT_URL###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 9,
                'subject' => 'Your Ad was Rejected: ###AD_TITLE###',
                'content' => 'Hello ###AGENT_NAME###,<br><br>
                        We regret to inform you that your ad ###AD_TITLE### has been rejected after review.<br><br>
                        If you believe this was a mistake or you wish to discuss it further, please contact our support team.<br><br>
                        Thank you for your understanding.<br><br>
                        Best regards,<br>
                        Residence Pros',
                'keywords' => '###AD_TITLE###,###AGENT_NAME###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 10,
                'subject' => 'New Property Listed: ###PROPERTY_NAME###',
                'content' => 'Hello user,<br><br>
                        We wanted to let you know that ###AGENT_NAME### has just listed a new property: ###PROPERTY_NAME###.<br><br>
                        You can view the property details here:<br>
                        <a href="###PROPERTY_URL###" target="_blank">Click to View Property</a><br><br>
                        Best regards,<br>
                        Residence Pros',
                'keywords' => '###PROPERTY_NAME###,###AGENT_NAME###,###PROPERTY_URL###',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

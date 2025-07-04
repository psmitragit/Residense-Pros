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
                    If you didn’t create an account with us, you can safely ignore this email.',
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
                    Plan benifits: ###BENIFITS###',
                'keywords' => '###NAME###,###PLAN_NAME###,###END_DATE###,###BENIFITS###,###AMOUNT###',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'subject' => 'New Property Listing Submitted for Approval',
                'content' => 'Hello Admin,<br><br>
                    A new property listing has been submitted by an agent and is pending your approval.<br><br>
                    Listing Details:<br>
                        Agent Name: ###NAME###<br>
                        Property Title: ###PROPERTY###<br>
                        Submitted On: ###DATE###<br><br>
                    Please <a href="###URL###">click here</a> to review and approve the listing.<br><br>
                    Thank you,<br>
                    Residence Pros',
                'keywords' => '###NAME###,###PROPERTY###,###DATE###,###URL###',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

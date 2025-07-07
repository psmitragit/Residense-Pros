<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function subscription()
    {
        return $this->hasOne(AgentSubscription::class, 'user_id', 'id');
    }

    public function active_subscription()
    {
        $subscription = AgentSubscription::where('user_id', $this->id)->whereDate('subscription_end_date', '>=', date('Y-m-d'))->first();
        if(empty($subscription)){
            return [];
        }
        return $subscription?->plan ?? [];
    }

    public function getTotalListing()
    {
        return Property::whereIn('status', ['published'])->where('created_by', $this->id)->count();
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Models\Folder;

class User extends Authenticatable implements MustVerifyEmail, TranslatableContract

{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use Translatable;

    public $translatedAttributes = ['titre', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'prenom',
        'email',
        'password',
        'profile_photo_path',
        'avatar',
        'pseudo',
        'internet',
        'facebook',
        'instagram',
        'twitter',
        'five_hundred_px',
        'tiktok',
        'mastodon',
        'large_banner',
        'small_banner',
        'mypays_id',
        'pending_images_count',


    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function isAdmin()
    {

        return $this->admin ? true : false;
    }

    public function isPhotographer()
    {

        return $this->whoiam_id == 2;
    }

    public function markEmailAsVerified()
    {

        $this->email_verified_at = now();
        $this->save();
    }

    public function pictures()
    {
        return $this->hasMany(Pictures::class);
    }

    public function pays()
    {
        return $this->belongsTo(Pays::class, 'mypays_id', 'pays_id');
    }

    public function folders()
    {
        return $this->belongsToMany(Folder::class, 'user_folders');
    }

    public function credits()
    {
        return $this->hasMany(UserCredit::class);
    }
    public function mediaPurchases()
    {
        return $this->hasMany(UserMediaPurchase::class);
    }
    public function purchasedMedias()
    {
        return $this->belongsToMany(ShareMedia::class, 'user_media_purchases', 'user_id', 'media_id')
            ->withTimestamps(); // Si votre table user_media_purchases contient les timestamps
    }
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'from_id');
    }

    /**
     * Obtient tous les messages reçus par l'utilisateur.
     */
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'to_id');
    }

    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            // Si vous stockez le chemin de l'avatar dans l'attribut 'avatar', ajustez le retour ci-dessous
            return $this->avatar;
        }

        // Retourne un avatar par défaut si aucun avatar n'est défini
        return asset('frontend/assets/images/avatar.jpg');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}

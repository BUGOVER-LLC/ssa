<?php

declare(strict_types=1);

namespace Modules\Users\Models;

use App\Model\AuthModel;

/**
 * @method static where(string $string, $input)
 */
abstract class User extends AuthModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'username', 'email', 'password', 'gender', 'setting_id'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(): array
    {
        return [];
    }

    /**
     * Get User full name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Define a setter for the password field.
     *
     * @noinspection PhpUnused
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = app('hash')->make($value);
    }
}

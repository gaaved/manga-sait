<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class ComentOtvetMangaPage
 * @package App\Models
 *
 * @property int $id
 * @property int $coment_id
 * @property int $user_id
 * @property int $post_id
 * @property string $coment
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user;
 * @property Post $post;
 */
class ComentOtvetMangaPage extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
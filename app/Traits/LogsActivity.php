<?php

namespace App\Traits;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    /**
     * Boot the trait and register Eloquent event hooks.
     */
    protected static function bootLogsActivity()
    {
        static::created(function ($model) {
            self::logActivity('tambah', $model);
        });

        static::updated(function ($model) {
            self::logActivity('ubah', $model);
        });

        static::deleted(function ($model) {
            self::logActivity('hapus', $model);
        });
    }

    /**
     * Save the activity log to the database.
     */
    protected static function logActivity(string $action, $model)
    {
        // Don't log activity during console commands (such as database seeding)
        if (app()->runningInConsole()) {
            return;
        }

        $user = Auth::user();
        $modelName = class_basename($model);
        
        // Resolve a descriptive title for the item
        $modelTitle = $model->title ?? $model->name ?? $model->question ?? "ID " . $model->id;

        $actionVerb = match ($action) {
            'tambah' => 'menambahkan',
            'ubah' => 'mengubah',
            'hapus' => 'menghapus',
            default => 'melakukan aksi pada',
        };

        $description = sprintf(
            "%s %s %s '%s'",
            $user ? $user->name : 'Sistem',
            $actionVerb,
            $modelName,
            $modelTitle
        );

        AuditLog::create([
            'user_id' => $user ? $user->id : null,
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}

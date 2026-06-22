<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationalStructure extends Model
{
    protected $table = 'organizational_structures';

    protected $fillable = [
        'parent_id',
        'name',
        'position',
        'nip',
        'specialty',
        'avatar',
        'order',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order')->orderBy('id');
    }

    /**
     * Get possible parents (exclude self and descendants to prevent circular reference)
     */
    public function getPossibleParents()
    {
        $excludeIds = [];
        if ($this->exists) {
            $excludeIds = $this->getDescendantIds();
            $excludeIds[] = $this->id;
        }

        return self::whereNotIn('id', $excludeIds)->orderBy('name')->get();
    }

    /**
     * Get all descendant IDs recursively
     */
    public function getDescendantIds()
    {
        $ids = [];
        foreach ($this->children as $child) {
            $ids[] = $child->id;
            $ids = array_merge($ids, $child->getDescendantIds());
        }
        return $ids;
    }
}

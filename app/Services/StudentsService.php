<?php

namespace App\Services;

use App\Models\Students;

/**
 * Class StudentsService.
 */
class StudentsService
{
    public function delete($id)
    {
        return Students::destroy($id);
    }

    public function getAll($perPage, $search = '', $searchable)
    {
        return  Students::query()
            ->where(function ($query) use ($search, $searchable) {
                foreach ($searchable as $index => $field) {
                    if ($index === 0) {
                        $query->where($field, 'like', "%{$search}%");
                    } else {
                        $query->orWhere($field, 'like', "%{$search}%");
                    }
                }
            })
            ->when(empty($search), function ($query) {
                return $query->orderBy('id');
            })
            ->orderBy('id')
            ->paginate($perPage)
            ->through(function ($data) {
                $data->can_edit = true;
                $data->can_delete = true;
                return $data;
            });
    }
}

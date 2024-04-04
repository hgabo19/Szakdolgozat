<?php

namespace App\Services;

use App\Models\Exercise;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ExerciseService
{

    public function save($validated)
    {
        try {
            $exercise = new Exercise();

            if ($validated['image']) {
                $filePath = $validated['image']->store('images/exercises/' . $validated['muscle_group'], 'public');
                $exercise->image_path = $filePath;
            }

            $exercise->name = $validated['name'];
            $exercise->description = $validated['description'];
            $exercise->muscle_group = $validated['muscle_group'];
            $exercise->created_at = now()->timezone('Europe/Budapest');
            $exercise->save();
        } catch (Exception $e) {
            throw new Exception($e . ' Failed to save exercise!');
        }
        return true;
    }

    public function update($validated, $exercise)
    {
        DB::transaction(function () use ($validated, $exercise) {
            try {
                if ($validated['image']) {
                    try {
                        $filePath = $validated['image']->store('images/exercises/' . $validated['muscle_group'], 'public');
                        Storage::delete($exercise->image_path);
                    } catch (Exception $e) {
                        throw new Exception($e);
                    }
                    $exercise->image_path = $filePath;
                }
                $exercise->name = $validated['name'];
                $exercise->description = $validated['description'];
                $exercise->muscle_group = $validated['muscle_group'];
                $exercise->updated_at = now()->timezone('Europe/Budapest');
                $exercise->save();
            } catch (Exception $e) {
                throw new Exception($e);
            }
        });
        return true;
    }

    public function hasChanged($validated, $exercise)
    {
        if (
            $validated['name'] != $exercise->name ||
            $validated['description'] != $exercise->description ||
            $validated['muscle_group'] != $exercise->muscle_group ||
            $validated['image'] instanceof TemporaryUploadedFile
        )
            return true;
        else return false;
    }
}

<?php

namespace App\Filament\Resources\ExerciseResource\Widgets;

use App\Models\Exercise;
use Filament\Widgets\Widget;

class ExerciseWidget extends Widget
{
    protected static string $view = 'filament.resources.exercise-resource.widgets.exercise-widget';

    protected static bool $isLazy = false;

    protected int | string | array $columnSpan = 'full';

    public Exercise $exercise;
}

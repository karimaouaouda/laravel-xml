<?php

namespace App\Filament\Teacher\Widgets;

use App\Models\Exercise;
use App\Models\User;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class GroupOverview extends ChartWidget
{
    protected static ?string $heading = 'Groups note avg par exo';

    protected static ?string $description = 'Groups note avg par exo for analyse Groups behavior';

    protected static bool $isLazy = false;

    protected static ?string $pollingInterval = "5s";

    public User $user;

    public function mount(): void
    {
        $this->user = Auth::user();
        parent::mount(); // TODO: Change the autogenerated stub

    }

    protected function getData(): array
    {
        $query = User::query()
                    ->selectRaw('AVG(answers.note) as avg, students_groups.group_id as grp_id, answers.exercise_id as exo_id')
                    ->join('students_groups', 'students_groups.student_id', '=', 'users.id')
                    ->join('answers', 'answers.student_id', '=', 'students_groups.student_id')
                    ->groupBy('students_groups.group_id', 'answers.exercise_id')
                    ->get(['avg', 'exo_id', 'grp_id']);


        $labels = $query->pluck('exo_id')->toArray();
        $points = $query->pluck('avg')->map(fn($v) => $v ?? 0)->toArray();


        return [
            'datasets' => [
                [
                    'label' => 'group not avg',
                    'data' => $points,
                ],
            ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

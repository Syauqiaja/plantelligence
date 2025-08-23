<?php

namespace Database\Seeders;

use App\Models\StudentTask;
use App\Models\TaskField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Enums\StudentTaskKey;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $formatFile = "[Nama kelompok]_LKM Pertemuan 1";

        $tasks = [
            [
                'title' => 'Angket Student Ownership of Learning Awal',
                'key' => StudentTaskKey::ANGKET_SOL_AWAL->value,
                'fields' => [
                    ['url' => 'https://forms.gle/QzAoro1Ztq3KD4ZE9', 'order' => 0],
                ],
            ],
            [
                'title' => 'Angket Literasi Digital Awal',
                'key' => StudentTaskKey::ANGKET_LITERASI_AWAL->value,
                'fields' => [
                    ['url' => 'https://forms.gle/KCqSkvfYyexzaryBA', 'order' => 0],
                ],
            ],
            [
                'title' => 'Pretest "Menggunakan tes literasi digital"',
                'key' => StudentTaskKey::PRETEST_LITERASI->value,
                'fields' => [
                    ['url' => 'https://forms.gle/TGy6JWcttdNz8vw39', 'order' => 0],
                ],
            ],
            [
                'title' => 'Orient students to the problem',
                'key' => StudentTaskKey::ORIENT_PROBLEM->value,
                'fields' => [
                    ['title' => "Format nama pengumpulan: $formatFile", 'order' => 0],
                ],
            ],
            [
                'title' => 'Organize students for study',
                'key' => StudentTaskKey::ORGANIZE_STUDY->value,
                'fields' => [
                    ['title' => 'Pengumpulan Mind Map', 'order' => 0],
                    ['title' => 'Pengumpulan Tugas Analisis Kritis Artikel', 'order' => 1],
                    ['title' => 'Pengumpulan LKM', 'order' => 2],
                ],
            ],
            [
                'title' => 'Assist independent and group investigation',
                'key' => StudentTaskKey::INVESTIGATION->value,
                'fields' => [
                    ['title' => 'Pengumpulan laporan sementara praktikum', 'order' => 0],
                    ['title' => 'Pengumpulan Tugas rencana investigasi', 'order' => 1],
                    ['title' => 'Pengumpulan Tugas hasil investigasi', 'order' => 2],
                ],
            ],
            [
                'title' => 'Develop and present artifacts and exhibits',
                'key' => StudentTaskKey::DEVELOP_EXHIBITS->value,
                'fields' => [
                    ['title' => 'Rencana Solusi', 'order' => 0],
                    ['title' => 'Pengumpulan Hasil Karya', 'order' => 1],
                ],
            ],
            [
                'title' => 'Analyze and evaluate the problem-solving process',
                'key' => StudentTaskKey::ANALYZE_EVALUATE->value,
                'fields' => [
                    ['title' => 'Pengumpulan hasil analisis dan evaluasi', 'order' => 0],
                ],
            ],
            [
                'title' => 'Student ownership of Learning',
                'key' => StudentTaskKey::STUDENT_OWNERSHIP->value,
                'fields' => [
                    ['title' => 'Esai Deskriptif 1', 'order' => 0],
                    ['title' => 'Esai Reflektif 1', 'order' => 1],
                    ['title' => 'Esai Deskriptif 2', 'order' => 2],
                    ['title' => 'Esai Reflektif 2', 'order' => 3],
                    ['title' => 'Esai Deskriptif 3', 'order' => 4],
                    ['title' => 'Esai Reflektif 3', 'order' => 5],
                ],
            ],
            [
                'title' => 'Posttest "Menggunakan tes literasi digital"',
                'key' => StudentTaskKey::POSTTEST_LITERASI->value,
                'fields' => [
                    ['url' => 'https://forms.gle/TGy6JWcttdNz8vw39', 'order' => 0],
                ],
            ],
            [
                'title' => 'Angket Student Ownership of Learning Akhir',
                'key' => StudentTaskKey::ANGKET_SOL_AKHIR->value,
                'fields' => [
                    ['url' => 'https://forms.gle/QzAoro1Ztq3KD4ZE9', 'order' => 0],
                ],
            ],
            [
                'title' => 'Angket Literasi Digital Akhir',
                'key' => StudentTaskKey::ANGKET_LITERASI_AKHIR->value,
                'fields' => [
                    ['url' => 'https://forms.gle/KCqSkvfYyexzaryBA', 'order' => 0],
                ],
            ],
        ];

        DB::transaction(function () use ($tasks) {
            foreach ($tasks as $taskData) {
                $task = StudentTask::updateOrCreate(
                    ['key' => $taskData['key']], // ensure idempotent seeding
                    ['title' => $taskData['title']]
                );

                foreach ($taskData['fields'] as $field) {
                    TaskField::updateOrCreate(
                        ['student_task_id' => $task->id, 'order' => $field['order']],
                        $field
                    );
                }
            }
        });
    }
}

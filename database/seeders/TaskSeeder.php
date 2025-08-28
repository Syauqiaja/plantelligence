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
                'file' => asset('doc/Lembar Kerja Mahasiswa 1 (+rubrik penilaian).docx'),
                'fields' => [
                    ['title' => "Format nama pengumpulan: $formatFile", 'order' => 0],
                ],
            ],
            [
                'title' => 'Organize students for study',
                'key' => StudentTaskKey::ORGANIZE_STUDY->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 2 (+rubrik penilaian).docx'),
                'fields' => [
                    ['title' => 'Pengumpulan Mind Map', 'order' => 0],
                    ['title' => 'Pengumpulan Tugas Analisis Kritis Artikel', 'order' => 1],
                    ['title' => 'Pengumpulan LKM', 'order' => 2],
                ],
            ],
            [
                'title' => 'Assist independent and group investigation',
                'key' => StudentTaskKey::INVESTIGATION->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 3 (+rubrik penilaian).docx'),
                'file2' => asset('doc/Lembar Kerja Mahasiswa 4 (+rubrik penilaian).docx'),
                'fields' => [
                    ['title' => 'Pengumpulan laporan sementara praktikum', 'order' => 0],
                    ['title' => 'Pengumpulan Tugas rencana investigasi', 'order' => 1],
                    ['title' => 'Pengumpulan Tugas hasil investigasi', 'order' => 2],
                ],
            ],
            [
                'title' => 'Develop and present artifacts and exhibits',
                'key' => StudentTaskKey::DEVELOP_EXHIBITS->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 5 (+rubrik penilaian).docx'),
                'fields' => [
                    ['title' => 'Rencana Solusi', 'order' => 0],
                    ['title' => 'Pengumpulan Hasil Karya', 'order' => 1],
                ],
            ],
            [
                'title' => 'Analyze and evaluate the problem-solving process',
                'key' => StudentTaskKey::ANALYZE_EVALUATE->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 6 (+rubrik penilaian).docx'),
                'file2' => asset('doc/Lembar Kerja Mahasiswa 7 (+rubrik penilaian).docx'),
                'fields' => [
                    ['title' => 'Pengumpulan hasil analisis dan evaluasi', 'order' => 0],
                ],
            ],
            [
                'title' => 'Student ownership of Learning',
                'key' => StudentTaskKey::STUDENT_OWNERSHIP->value,
                'fields' => [
                    ['title' => 'Esai Deskriptif 1', 'file' => asset('doc/1. Esai Deskriptif I (+rubrik penilaian).docx'), 'order' => 0],
                    ['title' => 'Esai Reflektif 1', 'file' => asset('doc/1. Esai Reflektif I (+rubrik penilaian).docx'), 'order' => 1],
                    ['title' => 'Esai Deskriptif 2', 'file' => asset('doc/2. Esai Deskriptif II (+rubrik penilaian).docx'), 'order' => 2],
                    ['title' => 'Esai Reflektif 2', 'file' => asset('doc/2. Esai Reflektif II (+rubrik penilaian).docx'), 'order' => 3],
                    ['title' => 'Esai Deskriptif 3', 'file' => asset('doc/3. Esai Deskriptif III+rubrik penilaian).docx'), 'order' => 4],
                    ['title' => 'Esai Reflektif 3', 'file' => asset('doc/3. Esai Reflektif III (+rubrik penilaian).docx'), 'order' => 5],
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
                    [
                        'title' => $taskData['title'],
                        'file' => $taskData['file'] ?? null,
                        'file2' => $taskData['file2'] ?? null
                    ]
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

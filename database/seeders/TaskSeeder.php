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
                'file' => asset('doc/Lembar Kerja Mahasiswa 1.docx'),
                'fields' => [
                    ['title' => "Pengumpulan LKM", 'order' => 0, 'format' => '[Nama Kelompok]_LKM 1'],
                ],
            ],
            [
                'title' => 'Organize students for study',
                'key' => StudentTaskKey::ORGANIZE_STUDY->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 2.docx'),
                'fields' => [
                    ['title' => 'Pengumpulan Mind Map', 'order' => 0, 'format' => '[Nama Kelompok]_Mindmap'],
                    ['title' => 'Pengumpulan Tugas Analisis Kritis Artikel', 'order' => 1, 'format' => '[Nama Kelompok]_Antis'],
                    ['title' => 'Pengumpulan LKM', 'order' => 2, 'format' => '[Nama Kelompok]_LKM 2'],
                ],
            ],
            [
                'title' => 'Assist independent and group investigation',
                'key' => StudentTaskKey::INVESTIGATION->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 3.docx'),
                'file2' => asset('doc/Lembar Kerja Mahasiswa 4.docx'),
                'fields' => [
                    ['title' => 'Pengumpulan laporan sementara praktikum 1', 'order' => 0, 'format' => '[Nama Kelompok]_Laporan Sementara 1'],
                    ['title' => 'Pengumpulan laporan sementara praktikum 2', 'order' => 1, 'format' => '[Nama Kelompok]_Laporan Sementara 2'],
                    ['title' => 'Pengumpulan Tugas rencana investigasi', 'order' => 2, 'format' => '[Nama Kelompok]_Rencana Investigasi'],
                    ['title' => 'Pengumpulan Tugas hasil investigasi', 'order' => 3, 'format' => '[Nama Kelompok]_Hasil Investigasi'],
                ],
            ],
            [
                'title' => 'Develop and present artifacts and exhibits',
                'key' => StudentTaskKey::DEVELOP_EXHIBITS->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 5.docx'),
                'fields' => [
                    ['title' => 'Rencana Solusi', 'order' => 0, 'format' => '[Nama Kelompok]_Rencana Solusi'],
                    ['title' => 'Pengumpulan Hasil Karya', 'order' => 1, 'format' => '[Nama Kelompok]_Hasil Karya'],
                ],
            ],
            [
                'title' => 'Analyze and evaluate the problem-solving process',
                'key' => StudentTaskKey::ANALYZE_EVALUATE->value,
                'file' => asset('doc/Lembar Kerja Mahasiswa 6.docx'),
                'file2' => asset('doc/Lembar Kerja Mahasiswa 7.docx'),
                'fields' => [
                    ['title' => 'Pengumpulan hasil analisis dan evaluasi', 'order' => 0, 'format' => '[Nama Kelompok]_Hasil analisis dan evaluasi'],
                ],
            ],
            [
                'title' => 'Student ownership of Learning',
                'key' => StudentTaskKey::STUDENT_OWNERSHIP->value,
                'fields' => [
                    ['title' => 'Esai Deskriptif 1', 'file' => asset('doc/Esai Deskriptif I.docx'), 'order' => 0, 'format' => '[Nama]_Esai Deskriptif 1'],
                    ['title' => 'Esai Reflektif 1', 'file' => asset('doc/Esai Reflektif I.docx'), 'order' => 1, 'format' => '[Nama]_Esai Reflektif 1'],
                    ['title' => 'Esai Deskriptif 2', 'file' => asset('doc/Esai Deskriptif II.docx'), 'order' => 2, 'format' => '[Nama]_Esai Deskriptif 2'],
                    ['title' => 'Esai Reflektif 2', 'file' => asset('doc/Esai Reflektif II.docx'), 'order' => 3, 'format' => '[Nama]_Esai Reflektif 2'],
                    ['title' => 'Esai Deskriptif 3', 'file' => asset('doc/Esai Deskriptif III.docx'), 'order' => 4, 'format' => '[Nama]_Esai Deskriptif 3'],
                    ['title' => 'Esai Reflektif 3', 'file' => asset('doc/Esai Reflektif III.docx'), 'order' => 5, 'format' => '[Nama]_Esai Reflektif 3'],
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
                        ['student_task_id' => $task->id, 'order' => $field['order'], 'format' => $field['format'] ?? null],
                        $field
                    );
                }
            }
        });
    }
}

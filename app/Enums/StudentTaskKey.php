<?php

namespace App\Enums;

enum StudentTaskKey: string
{
    case ANGKET_SOL_AWAL = 'angket_sol_awal';
    case ANGKET_LITERASI_AWAL = 'angket_literasi_awal';
    case PRETEST_LITERASI = 'pretest_literasi';
    case ORIENT_PROBLEM = 'orient_problem';
    case ORGANIZE_STUDY = 'organize_study';
    case INVESTIGATION = 'investigation';
    case DEVELOP_EXHIBITS = 'develop_exhibits';
    case ANALYZE_EVALUATE = 'analyze_evaluate';
    case STUDENT_OWNERSHIP = 'student_ownership';
    case POSTTEST_LITERASI = 'posttest_literasi';
    case ANGKET_SOL_AKHIR = 'angket_sol_akhir';
    case ANGKET_LITERASI_AKHIR = 'angket_literasi_akhir';
}

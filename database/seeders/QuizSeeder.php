<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\QuizQuestion;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Quiz 1
        $quiz1 = Quiz::create([
            'title' => 'Quiz 1',
            'order' => 1,
        ]);

        $quiz1Questions = [
            [
                'question' => 'Sel epidermis daun direndam dalam larutan garam pekat selama 10 menit. Setelah itu, membran plasma tampak terlepas dari dinding sel. Peristiwa ini adalah?',
                'answer_a' => 'Imbibisi',
                'answer_b' => 'Plasmolisis',
                'answer_c' => 'Turgiditas',
                'answer_d' => 'Difusi',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Potensial air (Ψ) suatu larutan menjadi lebih negatif jika?',
                'answer_a' => 'Konsentrasi zat terlarutnya meningkat',
                'answer_b' => 'Tekanan turgornya meningkat',
                'answer_c' => 'Tidak ada perbedaan konsentrasi',
                'answer_d' => 'Air bergerak masuk ke sel',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Buah mentimun segar dimasukkan ke dalam larutan gula pekat selama 1 jam. Setelah dikeluarkan, buah menjadi layu. Penyebab layunya adalah …',
                'answer_a' => 'Air masuk ke dalam sel karena larutan hipotonik',
                'answer_b' => 'Air keluar dari sel karena larutan hipertonik',
                'answer_c' => 'Turgor meningkat',
                'answer_d' => 'Potensial air buah lebih rendah daripada larutan',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Tekanan turgor yang tinggi pada sel tumbuhan berfungsi untuk …',
                'answer_a' => 'Menjaga bentuk dan kekakuan jaringan',
                'answer_b' => 'Mengurangi penyerapan air',
                'answer_c' => 'Menurunkan potensial air',
                'answer_d' => 'Menghentikan pertumbuhan',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Dua sel tumbuhan identik ditempatkan pada larutan berbeda: Sel A dalam larutan hipotonik Sel B dalam larutan isotonik  Perbedaan kondisi yang akan diamati adalah',
                'answer_a' => 'Sel A flaksid, Sel B turgid',
                'answer_b' => 'Sel A turgid, Sel B flaksid',
                'answer_c' => 'Sel A plasmolisis, Sel B turgid',
                'answer_d' => 'Sel A turgid, Sel B plasmolisis',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Mengapa akar tanaman dapat menyerap air dari tanah?',
                'answer_a' => 'Potensial air tanah lebih rendah daripada potensial air akar',
                'answer_b' => 'Potensial air tanah sama dengan potensial air akar',
                'answer_c' => 'Potensial air tanah lebih tinggi daripada potensial air akar',
                'answer_d' => 'Air bergerak dari daerah berpotensial air rendah ke tinggi',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Bagaimana nilai potensial osmotik (Ψs) pada larutan gula 0,3 M dibandingkan dengan larutan gula 0,1 M?',
                'answer_a' => 'Lebih positif',
                'answer_b' => 'Sama',
                'answer_c' => 'Lebih negatif',
                'answer_d' => 'Tidak dapat dibandingkan',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Apa yang terjadi pada sel tumbuhan yang berada di larutan hipertonik dalam waktu lama?',
                'answer_a' => 'Turgiditas maksimum',
                'answer_b' => 'Plasmolisis permanen',
                'answer_c' => 'Keseimbangan air',
                'answer_d' => 'Turgor rendah namun pulih kembali',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Dalam kondisi apa turgiditas maksimum pada sel tumbuhan dapat terjadi?',
                'answer_a' => 'Isotonik',
                'answer_b' => 'Hipertonik',
                'answer_c' => 'Hipotonik',
                'answer_d' => 'Tidak bermembran sel',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Mengapa sel daun tanaman bayam yang layu dapat segar kembali setelah direndam dalam air murni?',
                'answer_a' => 'Difusi CO₂ ke dalam sel',
                'answer_b' => 'Penyerapan mineral secara aktif',
                'answer_c' => 'Osmosis yang membuat air masuk ke sel hingga turgid',
                'answer_d' => 'Plasmolisis sementara',
                'correct_answer' => 'C',
            ],
        ];

        foreach ($quiz1Questions as $questionData) {
            $quiz1->questions()->create($questionData);
        }

        // Quiz 2
        $quiz2 = Quiz::create([
            'title' => 'Quiz 2',
            'order' => 2,
        ]);

        $quiz2Questions = [
            [
                'question' => 'Sel epidermis daun direndam dalam larutan garam pekat selama 10 menit. Setelah itu, membran plasma tampak terlepas dari dinding sel. Peristiwa ini adalah?',
                'answer_a' => 'Imbibisi',
                'answer_b' => 'Plasmolisis',
                'answer_c' => 'Turgiditas',
                'answer_d' => 'Difusi',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Potensial air (Ψ) suatu larutan menjadi lebih negatif jika?',
                'answer_a' => 'Konsentrasi zat terlarutnya meningkat',
                'answer_b' => 'Tekanan turgornya meningkat',
                'answer_c' => 'Tidak ada perbedaan konsentrasi',
                'answer_d' => 'Air bergerak masuk ke sel',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Buah mentimun segar dimasukkan ke dalam larutan gula pekat selama 1 jam. Setelah dikeluarkan, buah menjadi layu. Penyebab layunya adalah …',
                'answer_a' => 'Air masuk ke dalam sel karena larutan hipotonik',
                'answer_b' => 'Air keluar dari sel karena larutan hipertonik',
                'answer_c' => 'Turgor meningkat',
                'answer_d' => 'Potensial air buah lebih rendah daripada larutan',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Tekanan turgor yang tinggi pada sel tumbuhan berfungsi untuk …',
                'answer_a' => 'Menjaga bentuk dan kekakuan jaringan',
                'answer_b' => 'Mengurangi penyerapan air',
                'answer_c' => 'Menurunkan potensial air',
                'answer_d' => 'Menghentikan pertumbuhan',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Dua sel tumbuhan identik ditempatkan pada larutan berbeda: Sel A dalam larutan hipotonik Sel B dalam larutan isotonik  Perbedaan kondisi yang akan diamati adalah',
                'answer_a' => 'Sel A flaksid, Sel B turgid',
                'answer_b' => 'Sel A turgid, Sel B flaksid',
                'answer_c' => 'Sel A plasmolisis, Sel B turgid',
                'answer_d' => 'Sel A turgid, Sel B plasmolisis',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Mengapa akar tanaman dapat menyerap air dari tanah?',
                'answer_a' => 'Potensial air tanah lebih rendah daripada potensial air akar',
                'answer_b' => 'Potensial air tanah sama dengan potensial air akar',
                'answer_c' => 'Potensial air tanah lebih tinggi daripada potensial air akar',
                'answer_d' => 'Air bergerak dari daerah berpotensial air rendah ke tinggi',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Bagaimana nilai potensial osmotik (Ψs) pada larutan gula 0,3 M dibandingkan dengan larutan gula 0,1 M?',
                'answer_a' => 'Lebih positif',
                'answer_b' => 'Sama',
                'answer_c' => 'Lebih negatif',
                'answer_d' => 'Tidak dapat dibandingkan',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Apa yang terjadi pada sel tumbuhan yang berada di larutan hipertonik dalam waktu lama?',
                'answer_a' => 'Turgiditas maksimum',
                'answer_b' => 'Plasmolisis permanen',
                'answer_c' => 'Keseimbangan air',
                'answer_d' => 'Turgor rendah namun pulih kembali',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Dalam kondisi apa turgiditas maksimum pada sel tumbuhan dapat terjadi?',
                'answer_a' => 'Isotonik',
                'answer_b' => 'Hipertonik',
                'answer_c' => 'Hipotonik',
                'answer_d' => 'Tidak bermembran sel',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Mengapa sel daun tanaman bayam yang layu dapat segar kembali setelah direndam dalam air murni?',
                'answer_a' => 'Difusi CO₂ ke dalam sel',
                'answer_b' => 'Penyerapan mineral secara aktif',
                'answer_c' => 'Osmosis yang membuat air masuk ke sel hingga turgid',
                'answer_d' => 'Plasmolisis sementara',
                'correct_answer' => 'C',
            ],
        ];

        foreach ($quiz2Questions as $questionData) {
            $quiz2->questions()->create($questionData);
        }

        // Quiz 3
        $quiz3 = Quiz::create([
            'title' => 'Quiz 3',
            'order' => 3,
        ]);

        $quiz3Questions = [
            [
                'question' => 'Daun tua tanaman jagung menguning dari ujung lalu menyebar ke bagian tengah. Berdasarkan gejala ini, unsur hara yang paling mungkin mengalami defisiensi adalah …',
                'answer_a' => 'Kalsium (Ca)',
                'answer_b' => 'Besi (Fe)',
                'answer_c' => 'Nitrogen (N)',
                'answer_d' => 'Boron (B)',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Unsur hara mikro yang berperan sebagai komponen enzim fotosistem II adalah …',
                'answer_a' => 'Mangan (Mn)',
                'answer_b' => 'Tembaga (Cu)',
                'answer_c' => 'Seng (Zn)',
                'answer_d' => 'Molibdenum (Mo)',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Suatu tanaman menunjukkan pertumbuhan kerdil, daun kecil, dan roset daun. Defisiensi yang paling mungkin terjadi adalah …',
                'answer_a' => 'Fosfor (P)',
                'answer_b' => 'Seng (Zn)',
                'answer_c' => 'Magnesium (Mg)',
                'answer_d' => 'Kalium (K)',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Mekanisme transportasi air dari akar ke daun melalui xilem terutama disebabkan oleh …',
                'answer_a' => 'Tekanan turgor',
                'answer_b' => 'Kohesi–tensi–aliran massa',
                'answer_c' => 'Tekanan osmosis',
                'answer_d' => 'Pergerakan aktif ion',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Tanaman kentang menunjukkan pucuk mengering dan ujung akar mati. Gejala ini mengindikasikan defisiensi unsur',
                'answer_a' => 'Nitrogen (N)',
                'answer_b' => 'Kalsium (Ca)',
                'answer_c' => 'Sulfur (S)',
                'answer_d' => 'Besi (Fe)',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Sukrosa hasil fotosintesis di daun diangkut ke umbi melalui jaringan apa?',
                'answer_a' => 'Xilem',
                'answer_b' => 'Epidermis',
                'answer_c' => 'Floem',
                'answer_d' => 'Korteks',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Unsur hara makro yang menjadi atom pusat molekul klorofil adalah…',
                'answer_a' => 'Besi (Fe)',
                'answer_b' => 'Magnesium (Mg)',
                'answer_c' => 'Kalsium (Ca)',
                'answer_d' => 'Mangan (Mn)',
                'correct_answer' => 'B',
            ],
            [
                'question' => 'Tanaman tomat mengalami klorosis interveinal pada daun muda. Kemungkinan defisiensi terjadi pada unsur…',
                'answer_a' => 'Besi (Fe)',
                'answer_b' => 'Nitrogen (N)',
                'answer_c' => 'Fosfor (P)',
                'answer_d' => 'Kalium (K)',
                'correct_answer' => 'A',
            ],
            [
                'question' => 'Perpindahan hasil fotosintesis melalui floem mengikuti mekanisme…',
                'answer_a' => 'Cohesion-tension theory',
                'answer_b' => 'Diffusion-osmosis theory',
                'answer_c' => 'Pressure-flow hypothesis',
                'answer_d' => 'Active pumping theory',
                'correct_answer' => 'C',
            ],
            [
                'question' => 'Air yang diangkut oleh xilem diperlukan untuk fotosintesis di daun, sedangkan hasil fotosintesis yang dibawa floem menyediakan energi bagi pertumbuhan akar. Pernyataan ini menunjukkan…',
                'answer_a' => 'Kompetisi antar jaringan',
                'answer_b' => 'Peran tunggal floem',
                'answer_c' => 'Integrasi fungsi antara xilem dan floem',
                'answer_d' => 'Pergerakan searah dalam floem',
                'correct_answer' => 'C',
            ],
        ];

        foreach ($quiz3Questions as $questionData) {
            $quiz3->questions()->create($questionData);
        }
    }
}
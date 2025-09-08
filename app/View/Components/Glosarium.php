<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Glosarium extends Component
{
    public $glosariumPageOne = [
        'Absorbsi cahaya' => 'Proses penyerapan cahaya oleh pigmen seperti klorofil untuk digunakan dalam fotosintesis.',
        'Adhesi' => 'Gaya tarik menarik antara molekul air dan permukaan benda lain seperti dinding sel tumbuhan.',
        'Air' => 'Pelarut universal yang penting dalam proses fisiologis tumbuhan seperti transpor zat, fotosintesis, dan menjaga turgor sel.',
        'Apoplas' => 'Jalur transpor air dan zat terlarut yang bergerak melalui ruang antarsel dan dinding sel, tanpa melewati sitoplasma.',
        'Asimilat' => 'Produk fotosintesis seperti sukrosa yang ditranslokasikan ke bagian tumbuhan lain sebagai sumber energi atau cadangan.',
        'ATP (Adenosin Trifosfat)' => 'Molekul penyimpan energi kimia yang digunakan dalam berbagai reaksi metabolik termasuk sintesis gula.',
        'Boron' => 'Unsur mikro penting dalam pertumbuhan polen dan pembelahan sel, defisiensinya menyebabkan kematian meristem pucuk.',
        'Defisiensi hara' => 'Kekurangan unsur hara tertentu yang mengakibatkan gangguan fisiologis dan pertumbuhan abnormal pada tumbuhan.',
        'Fotosintesis' => 'Proses konversi energi cahaya menjadi energi kimia dalam bentuk glukosa oleh tumbuhan hijau.',
        'Floem' => 'Jaringan pengangkut yang bertugas menyalurkan hasil fotosintesis (seperti gula) dari daun ke seluruh tubuh tumbuhan.',
        'Grana' => 'Tumpukan tilakoid di dalam kloroplas tempat berlangsungnya reaksi terang fotosintesis.',
    ];

    public $glosariumPageTwo = [
        'Hara esensial' => 'Unsur-unsur kimia yang mutlak diperlukan tumbuhan untuk melangsungkan siklus hidupnya secara normal.',
        'Imbibisi' => 'Proses awal masuknya air ke dalam biji kering yang memicu dimulainya perkecambahan.',
        'Ion' => 'Atom atau molekul bermuatan yang terlibat dalam transportasi nutrisi dan aktivitas enzimatik di dalam sel tumbuhan.',
        'Klorofil' => 'Pigmen hijau dalam kloroplas yang menyerap cahaya matahari untuk fotosintesis.',
        'Kloroplas' => 'Organel tumbuhan tempat berlangsungnya fotosintesis, terdiri atas tilakoid, stroma, dan grana.',
        'Kohesi' => 'Gaya tarik antar molekul air yang memungkinkan air bergerak secara kontinu dalam jaringan tumbuhan.',
        'Kutikula' => 'Lapisan lilin pada permukaan daun yang berfungsi mencegah kehilangan air melalui penguapan.',
        'Mesofil' => 'Jaringan dalam daun tempat utama terjadinya fotosintesis.',
        'Mitokondria' => 'Organel sel yang menghasilkan energi melalui respirasi seluler.',
        'Nikel (Ni)' => 'Unsur mikro esensial yang berperan dalam aktivasi enzim urease dan mobilisasi nitrogen dalam perkecambahan.',
        'Phloem loading' => 'Proses pemuatan senyawa hasil fotosintesis (misalnya sukrosa) dari sel sumber ke dalam jaringan floem.',
        'Phloem unloading' => 'Proses pengosongan asimilat dari floem ke jaringan sink (seperti buah, akar, atau biji).',
        'Pigmen' => 'Zat pewarna dalam tumbuhan yang menyerap cahaya untuk fotosintesis, seperti klorofil dan karotenoid.',
        'Polaritas air' => 'Sifat molekul air yang memiliki distribusi muatan tidak merata, memungkinkan terbentuknya ikatan hidrogen.',
    ];

    public $glosariumPageThree = [
        'Sink' => 'Jaringan atau organ tumbuhan yang menggunakan atau menyimpan hasil fotosintesis.',
        'Source' => 'Organ atau jaringan penghasil hasil fotosintesis, seperti daun dewasa.',
        'Spektrum aksi' => 'Grafik yang menunjukkan efektivitas panjang gelombang cahaya terhadap suatu proses biologi, seperti fotosintesis.',
        'Spektrum absorbsi' => 'Grafik yang menunjukkan panjang gelombang cahaya yang diserap oleh suatu pigmen.',
        'Stomata' => 'Celah kecil di permukaan daun yang mengatur pertukaran gas dan Keseimbangan Air dalam Tubuh Tumbuhan.',
        'Sukrosa' => 'Gula utama yang ditranslokasikan dalam floem sebagai bentuk utama hasil fotosintesis.',
        'Tilakoid' => 'Struktur membran dalam kloroplas tempat berlangsungnya reaksi terang dalam fotosintesis.',
        'Translokasi' => 'Proses pemindahan hasil fotosintesis (misalnya gula) dari sumber ke jaringan penyimpanan atau pertumbuhan.',
        'Transpor aktif' => 'Pemindahan zat melawan gradien konsentrasi menggunakan energi (ATP).',
        'Transpor pasif' => 'Pergerakan zat mengikuti gradien konsentrasi tanpa menggunakan energi.',
        'Turgor' => 'Tekanan air dalam vakuola sel tumbuhan yang menjaga bentuk dan kekakuan jaringan.',
        'Xerofit' => 'Jenis tumbuhan yang beradaptasi untuk hidup di lingkungan kering dengan mengurangi kehilangan air.',
    ];

    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.glosarium');
    }
}

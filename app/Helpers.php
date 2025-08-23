<?php
    
if (!function_exists('scoreToFeedback')) {
    function scoreToFeedback($score)
    {
        if($score >= 85){
            return "Selamat! Kamu telah menunjukkan penguasaan materi yang sangat baik. Ini menunjukkan bahwa kamu belajar dengan sungguh-sungguh dan benar-benar memahami, bukan sekadar menghafal. Pertahankan semangat dan pola belajar ini! Jangan ragu untuk membagikan pemahamanmu kepada teman lain karena mengajarkan adalah bentuk pembelajaran tertinggi. Kamu berada di jalur yang luar biasa. Teruslah menjadi pembelajar aktif, reflektif, dan inspiratif!";
        }else if($score >= 70){
            return "Kamu telah memahami sebagian besar konsep dengan cukup baik. Jawabanmu menunjukkan upaya yang kuat dan pemahaman yang mulai terbentuk dengan jelas. Meski masih ada beberapa bagian yang dapat diperkuat, itu adalah hal yang wajar dalam proses belajar. Cobalah untuk meninjau ulang poin-poin yang masih membingungkan. Kamu sudah sangat dekat dengan penguasaan penuh teruskan semangatmu, dan jangan ragu berdiskusi atau bertanya jika diperlukan!";
        }else if($score >= 55){
            return "Kamu telah menunjukkan usaha yang baik dan pantang menyerah ini adalah sikap penting dalam belajar. Beberapa jawabanmu mencerminkan pemahaman awal, namun masih ada konsep-konsep yang perlu diperkuat. Cobalah kembali mengeksplorasi materi melalui video, simulasi, atau fitur AI yang tersedia dalam e-modul untuk membantu memperjelas bagian yang sulit. Ingat, membangun pemahaman itu proses, dan kamu sedang berada di tengah perjalanan yang benar. Teruslah berusaha, sedikit demi sedikit pemahamanmu akan semakin kuat!";
        }else if($score >= 40){
            return "Tidak apa-apa jika hasil ini belum sesuai harapan. Yang terpenting adalah kamu sudah memulai dan mencoba. Ini saat yang tepat untuk melakukan refleksi: bagian mana yang belum kamu pahami? Manfaatkan momen ini untuk memperbaiki, bukan menyerah. Cobalah pelajari ulang secara bertahap, gunakan media interaktif yang tersedia, dan ajukan pertanyaan jika ada yang belum jelas. Jangan ragu memanfaatkan AI untuk memberi penjelasan ulang atau contoh baru. Kamu punya potensi besar jangan biarkan satu hasil menentukan langkahmu ke depan. Terus berjuang, ya!";
        }else{
            return "Nilai ini bukan akhir dari segalanya ini justru awal dari proses belajar yang sesungguhnya. Mungkin kamu sedang beradaptasi atau belum menemukan metode belajar yang paling sesuai untukmu. Jangan khawatir, e-module ini menyediakan berbagai alat bantu seperti refleksi “Aku & Pemahamanku”, visualisasi, serta dukungan AI yang bisa kamu manfaatkan untuk belajar lebih menyenangkan dan personal. Cobalah ulangi materi dengan perlahan dan tanpa tekanan. Satu langkah kecil hari ini akan membawamu menuju pemahaman yang lebih besar esok hari. Tetap semangat, kamu tidak sendiri dalam perjalanan ini!";
        }
    }
}
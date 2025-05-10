<?php

namespace Database\Seeders;

use App\Models\Users;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Messages::factory(10)->create();
        // \App\Models\admin::factory(10)->create();

        Users::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('@dm1n123_'),
        ]);

        Blog::insert([
            [
                'title' => 'Menjelajahi Keindahan Alam Indonesia: Dari Sabang hingga Merauke',
                'content' => 'Indonesia, negara kepulauan terbesar di dunia, tidak hanya terkenal dengan keberagaman budaya dan tradisinya, tetapi juga dengan keindahan alam yang menakjubkan. Dari Sabang yang terletak di ujung barat Indonesia, hingga Merauke di ujung timur, setiap sudut tanah air ini menyimpan pesona alam yang luar biasa. Di Pulau Sumatera, kita dapat menemukan keindahan alam yang begitu memikat. Salah satu contohnya adalah Danau Toba di Sumatera Utara, danau vulkanik terbesar di dunia yang terletak di tengah Pulau Samosir. Danau ini dikelilingi oleh bukit-bukit hijau yang membentang, menciptakan panorama yang begitu menyejukkan mata. Selain itu, di Aceh, terdapat Pantai Lampuuk yang menawarkan pasir putih dan ombak yang cocok untuk para peselancar. Beranjak ke Jawa, pulau yang dikenal sebagai pusat ekonomi dan budaya Indonesia. Taman Nasional Bromo Tengger Semeru adalah salah satu destinasi paling terkenal di Jawa Timur. Pemandangan matahari terbit di Gunung Bromo yang memancarkan cahaya emas di atas lautan pasir sungguh memukau. Sementara itu, di Yogyakarta, kita bisa mengunjungi Candi Borobudur, situs warisan dunia yang menunjukkan kemegahan peradaban kuno. Tak kalah menarik, Bali yang dikenal sebagai Pulau Dewata. Selain pantainya yang mempesona, Bali juga memiliki hutan tropis yang lebat, danau yang tenang seperti Danau Beratan, serta banyak pura yang tersebar di seluruh pulau. Bali adalah destinasi yang menggabungkan keindahan alam dan spiritualitas dalam satu paket yang tak terlupakan. Di bagian timur Indonesia, ada Pulau Papua dengan segala keindahan alamnya yang masih sangat alami dan terjaga. Raja Ampat, dengan terumbu karangnya yang menakjubkan, adalah surga bagi para penyelam. Keanekaragaman hayati yang luar biasa di kawasan ini menjadikannya sebagai salah satu destinasi wisata alam terbaik di dunia. Indonesia juga memiliki banyak destinasi luar biasa lainnya seperti Lombok, Sulawesi, Kalimantan, dan lainnya yang menawarkan pesona alam yang beragam. Dari pegunungan yang tinggi, hutan tropis yang lebat, hingga pantai yang memukau, Indonesia adalah surga bagi para pencinta alam. Namun, di balik semua keindahan alam tersebut, kita juga perlu menyadari pentingnya menjaga kelestarian lingkungan. Kerusakan alam yang disebabkan oleh deforestasi, polusi, dan perubahan iklim dapat mengancam keberadaan banyak ekosistem yang ada. Oleh karena itu, penting bagi kita semua untuk turut berperan dalam menjaga kelestarian alam Indonesia agar keindahan ini bisa dinikmati oleh generasi mendatang. Indonesia bukan hanya tentang keindahan alamnya, tetapi juga tentang bagaimana kita sebagai bangsa dapat menjaga dan merawatnya. Melalui kesadaran dan tindakan nyata, kita dapat memastikan bahwa alam Indonesia tetap lestari dan tetap menjadi kebanggaan bangsa. Dengan segala keindahan dan keberagamannya, Indonesia memang layak menjadi salah satu tujuan utama wisata alam di dunia. Jangan ragu untuk menjelajahi lebih banyak keindahan alam yang ada, dan nikmati perjalanan tak terlupakan di tanah air tercinta ini. Semoga blog ini bisa memberikan inspirasi bagi Anda untuk menjelajahi dan melestarikan keindahan alam Indonesia.',
                'image' => "blog/VbOgQ1OOgck8f28ZOcrJuHIpeg37pvTm06rnS4bI.jpg",
                'slug' => 'menjelajahi-keindahan-alam-indonesia-dari-sabang-hingga-merauke'
            ],
            [
                'title' => 'Keajaiban Alam Raja Ampat: Surga Tersembunyi di Indonesia',
                'content' => 'Raja Ampat, yang terletak di Papua Barat, adalah salah satu destinasi wisata alam terindah di dunia. Kepulauan ini terkenal dengan keanekaragaman hayati laut yang luar biasa, menjadikannya surga bagi penyelam dan pecinta alam. Terumbu karangnya yang masih alami dan jernihnya air laut membuat Raja Ampat menjadi tempat yang wajib dikunjungi bagi siapa saja yang mencari petualangan di alam bebas. Selain keindahan bawah lautnya, Raja Ampat juga menawarkan pemandangan alam yang memukau dengan pulau-pulau kecil yang mengelilingi lautan biru yang luas. Penduduk setempat yang ramah dan budaya yang kaya semakin menambah daya tarik wisatawan untuk berkunjung dan merasakan suasana yang damai. Namun, dengan keindahan yang luar biasa ini, datang pula tanggung jawab besar untuk menjaga kelestarian alam Raja Ampat. Wisata yang bertanggung jawab dan upaya pelestarian sangat penting untuk memastikan bahwa keajaiban alam ini tetap dapat dinikmati oleh generasi mendatang.',
                'image' => "blog/3CiLWSujHJtH6m9dtDuGsDOWw7UMYJGvHiHcNkST.jpg",
                'slug' => 'keajaiban-alam-raja-ampat-surga-tersembunyi-di-indonesia'
            ],
            [
                'title' => 'Manfaat Meditasi untuk Kesehatan Mental',
                'content' => 'Meditasi telah lama dikenal sebagai cara yang efektif untuk menenangkan pikiran dan meredakan stres. Dengan melibatkan teknik pernapasan dan fokus pada momen saat ini, meditasi membantu meredakan kecemasan, meningkatkan konsentrasi, dan menurunkan tekanan darah. Aktivitas ini juga dikenal dapat meningkatkan kualitas tidur dan memberikan rasa kesejahteraan secara keseluruhan. Selain manfaat psikologis, meditasi juga membawa dampak positif bagi kesehatan fisik. Penelitian menunjukkan bahwa meditasi secara teratur dapat memperkuat sistem imun, meningkatkan kemampuan tubuh dalam menangani peradangan, dan mengurangi gejala kecemasan serta depresi. Untuk memulai meditasi, Anda tidak perlu alat khusus. Cukup luangkan waktu beberapa menit setiap hari untuk duduk tenang, fokus pada pernapasan, dan rasakan ketenangan yang datang. Dengan latihan rutin, manfaat meditasi dapat dirasakan dalam kehidupan sehari-hari.',
                'image' => "blog/giu8TJoEevqEKFOMQOWtFZIQ0UC3pmNL6FbTzO0x.jpg",
                'slug' => 'manfaat-meditasi-untuk-kesehatan-mental'
            ],
            [
                'title' => 'Mengapa Pendidikan Digital Penting di Era Modern?',
                'content' => 'Pendidikan digital menjadi sangat penting seiring dengan berkembangnya teknologi dan akses internet yang semakin luas. Dengan alat dan sumber daya digital, pendidikan dapat disampaikan secara lebih fleksibel dan menjangkau berbagai kalangan, bahkan mereka yang berada di daerah terpencil sekalipun. Teknologi memungkinkan siswa untuk belajar kapan saja dan di mana saja, menjadikan proses belajar lebih dinamis dan interaktif. Selain itu, pendidikan digital juga memungkinkan penggunaan materi pembelajaran yang lebih bervariasi, mulai dari video, artikel, hingga simulasi yang dapat membantu siswa memahami konsep dengan lebih mudah. Pembelajaran berbasis teknologi juga memberikan peluang untuk menciptakan lingkungan pembelajaran yang lebih inklusif, dengan memperhatikan berbagai gaya belajar siswa. Namun, tantangan yang dihadapi adalah ketimpangan akses terhadap teknologi yang masih ada di beberapa daerah. Oleh karena itu, penting bagi pemerintah dan masyarakat untuk bekerja sama agar pendidikan digital dapat dinikmati secara merata oleh semua lapisan masyarakat.',
                'image' => "blog/XLeEKI65p8UoYZtVRSlqzm1ecZaIZITvU00J0W0y.jpg",
                'slug' => 'mengapa-pendidikan-digital-penting-di-era-modern'
            ],
            [
                'title' => 'Keindahan Alam Pulau Komodo',
                'content' => 'Pulau Komodo, yang terletak di Nusa Tenggara Timur, adalah rumah bagi salah satu hewan purba yang masih ada, yaitu Komodo Dragon. Selain menjadi tempat hidup bagi reptil raksasa ini, Pulau Komodo juga menawarkan keindahan alam yang luar biasa dengan pantai berpasir pink dan terumbu karang yang memukau. Taman Nasional Komodo telah diakui sebagai salah satu situs warisan dunia UNESCO karena keanekaragaman hayati yang luar biasa. Bagi para pecinta diving, Pulau Komodo adalah surga tersembunyi dengan spot diving terbaik di dunia. Kejernihan airnya yang luar biasa dan keberagaman biota lautnya menjadikan setiap penyelaman di sini pengalaman yang tak terlupakan. Para wisatawan juga dapat menjelajahi pulau-pulau kecil yang tersebar di sekitar Pulau Komodo, menikmati keindahan alam yang masih alami. Namun, dengan pesona yang dimiliki, penting untuk menjaga kelestarian Pulau Komodo. Wisata yang bertanggung jawab dan pengelolaan yang baik sangat diperlukan untuk melindungi satwa liar dan ekosistem laut yang rapuh dari kerusakan yang disebabkan oleh aktivitas manusia.',
                'image' => "blog/mWWTKErdJLS8qKd00t9B7rrbdARpr9QjgVJ2YKkg.jpg",
                'slug' => 'keindahan-alam-pulau-komodo'
            ],
            [
                'title' => 'Cara Efektif Mengatur Waktu Saat Bekerja dari Rumah',
                'content' => 'Bekerja dari rumah menawarkan fleksibilitas yang tinggi, namun juga bisa menjadi tantangan besar dalam hal pengelolaan waktu. Tanpa batasan fisik seperti di kantor, seringkali kita tergoda untuk menunda pekerjaan atau melakukan aktivitas lain yang tidak terkait dengan tugas. Oleh karena itu, penting untuk memiliki rutinitas yang terstruktur untuk memastikan produktivitas tetap terjaga. Salah satu cara efektif untuk mengatur waktu adalah dengan membuat jadwal harian yang jelas. Tentukan waktu khusus untuk memulai dan mengakhiri pekerjaan, serta sisakan waktu untuk istirahat agar otak tetap segar. Menggunakan teknik Pomodoro, yang melibatkan kerja fokus selama 25 menit diselingi dengan istirahat singkat, juga dapat membantu meningkatkan konsentrasi. Selain itu, penting untuk menciptakan ruang kerja yang terpisah dari ruang pribadi untuk menghindari gangguan. Dengan lingkungan yang kondusif dan manajemen waktu yang baik, bekerja dari rumah dapat menjadi pengalaman yang produktif dan menyenangkan.',
                'image' => "blog/i2RcDluL19ZRA6PktFDNLlEPBhawZimZSynRxl7d.jpg",
                'slug' => 'cara-efektif-mengatur-waktu-saat-bekerja-dari-rumah'
            ],
            [
                'title' => '5 Kebiasaan Sehat yang Harus Anda Terapkan Setiap Hari',
                'content' => 'Memulai hari dengan kebiasaan sehat dapat meningkatkan kualitas hidup secara keseluruhan. Salah satu kebiasaan penting adalah rutin berolahraga. Tidak perlu olahraga berat; cukup dengan berjalan kaki selama 30 menit setiap hari sudah cukup untuk menjaga kesehatan tubuh. Selain itu, konsumsi makanan sehat dengan pola makan yang seimbang juga sangat penting. Pastikan untuk memasukkan lebih banyak buah, sayur, dan protein dalam menu sehari-hari. Selain menjaga tubuh, kebiasaan tidur yang cukup dan berkualitas juga sangat penting. Tidur yang cukup dapat meningkatkan daya tahan tubuh dan mengurangi stres. Salah satu kebiasaan sehat lainnya adalah mengelola stres dengan baik. Meditasi atau yoga dapat membantu menenangkan pikiran dan tubuh. Terakhir, pastikan Anda tetap terhidrasi dengan cukup air sepanjang hari, karena air membantu menjaga metabolisme tubuh tetap lancar. Dengan menerapkan kebiasaan sehat ini, Anda akan merasa lebih bugar, produktif, dan bahagia.',
                'image' => "blog/rhGpvt9lH2QAZ9n6dkC6NZKtGTHtqBIsA7gzWfdd.jpg",
                'slug' => '5-kebiasaan-sehat-yang-harus-anda-terapkan-setiap-hari'
            ],
            [
                'title' => 'Pentingnya Menjaga Kesehatan Mental di Tengah Kesibukan',
                'content' => 'Kesehatan mental seringkali terlupakan di tengah kesibukan dan tekanan hidup. Padahal, menjaga keseimbangan emosional dan mental sama pentingnya dengan menjaga kesehatan fisik. Stres yang tidak ditangani dengan baik dapat menyebabkan gangguan mental seperti kecemasan atau depresi, yang pada akhirnya dapat memengaruhi kualitas hidup.

Untuk menjaga kesehatan mental, penting untuk meluangkan waktu untuk diri sendiri. Aktivitas seperti meditasi, berolahraga, atau bahkan sekadar menikmati waktu santai dapat membantu meredakan ketegangan dan meningkatkan perasaan bahagia. Berbicara dengan orang terdekat atau seorang profesional juga dapat memberikan dukungan yang sangat dibutuhkan.

Selain itu, penting untuk mengenali tanda-tanda stres dan mencari cara untuk menghadapinya dengan bijak. Menerapkan kebiasaan sehat seperti tidur yang cukup, makan dengan baik, dan mengatur waktu untuk bersantai akan sangat berkontribusi pada kesehatan mental yang lebih baik.',
                'image' => "blog/1jRWGq2eZVsq0974CZ7Vm5fFgJz0FMA3QU7DbDgd.jpg",
                'slug' => 'pentingnya-menjaga-kesehatan-mental-di-tengah-kesibukan'
            ],
            [
                'title' => 'Keunggulan Teknologi 5G dalam Kehidupan Sehari-hari',
                'content' => 'Teknologi 5G hadir dengan janji untuk mengubah cara kita berinteraksi dengan dunia digital. Kecepatan internet yang jauh lebih tinggi dibandingkan dengan generasi sebelumnya memungkinkan unduhan yang lebih cepat, pengurangan latensi, dan koneksi yang lebih stabil. Hal ini sangat menguntungkan bagi berbagai sektor, termasuk hiburan, industri, dan pendidikan.

Dengan 5G, penggunaan aplikasi berbasis cloud dan perangkat pintar semakin optimal. Kecepatan internet yang tinggi memungkinkan streaming video 4K atau bahkan 8K tanpa gangguan buffering, serta membuka peluang bagi pengembangan teknologi baru seperti kendaraan otonom dan kota pintar.

Namun, meskipun manfaatnya besar, implementasi 5G juga membawa tantangan terkait infrastruktur, biaya, dan regulasi. Pengembangan yang matang dan penyebaran yang merata sangat diperlukan agar 5G dapat dinikmati secara maksimal oleh seluruh lapisan masyarakat.',
                'image' => "blog/IiPh7Iwmb3c2VqyjqCh1p3yO4foA16kiaOE34BHz.jpg",
                'slug' => 'keunggulan-teknologi-5g-dalam-kehidupan-sehari-hari'

            ]
        ]);
        
    }
}

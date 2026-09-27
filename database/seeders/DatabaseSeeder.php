<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Dhamma;
use App\Models\Event;
use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Achievement;
use App\Models\Admission;
use App\Models\Gallery;
use App\Models\ContactMessage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'ព្រះគ្រូគ្រប់គ្រងព័ត៌មាន (Admin)',
            'email' => 'admin@watpreysdei.edu.kh',
            'password' => Hash::make('admin123'),
        ]);

        // Categories
        $categories = [
            ['name' => 'ព័ត៌មានវត្តអារាម', 'slug' => 'wat-news', 'type' => 'post', 'description' => 'ព័ត៌មានទូទៅ និងសកម្មភាពកសាងក្នុងវត្ត'],
            ['name' => 'សាលាពុទ្ធិកបឋមសិក្សា', 'slug' => 'school-news', 'type' => 'post', 'description' => 'ដំណឹង និងសកម្មភាពអប់រំរបស់សមណសិស្ស'],
            ['name' => 'ធម្មទាន និងអប់រំចិត្ត', 'slug' => 'dhamma-teaching', 'type' => 'dhamma', 'description' => 'អត្ថបទធម៌ និងគតិអប់រំជីវិត'],
            ['name' => 'កម្មវិធីបុណ្យទាន', 'slug' => 'ceremonies', 'type' => 'event', 'description' => 'កាលវិភាគពិធីបុណ្យជាតិ និងសាសនា'],
            ['name' => 'វិចិត្រសាលរូបភាព', 'slug' => 'photo-gallery', 'type' => 'gallery', 'description' => 'កម្រងរូបភាពសកម្មភាពផ្សេងៗ'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // School Classes
        SchoolClass::create([
            'grade_level' => 'tri',
            'name_kh' => 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ត្រី (កម្រិតទី១)',
            'name_en' => 'Pali Primary School - Grade 1 (Tri Class)',
            'description' => 'ថ្នាក់ដំបូងនៃការសិក្សាពុទ្ធិកបឋមសិក្សា ដោយផ្តោតលើមូលដ្ឋានគ្រឹះភាសាបាលី វេយ្យាករណ៍បាលី វិន័យបិដក និងចំណេះដឹងទូទៅទំនើប។',
            'subjects' => [
                'ភាសាបាលី (នាម និងអក្ខរវិធី)',
                'ពុទ្ធប្រវត្តិ និងវិន័យបឋម',
                'ធម្មវិភាគ និងពុទ្ធសាសនាសុភាសិត',
                'ភាសាខ្មែរ (អក្សរសាស្ត្រ និងតែងសេចក្ដី)',
                'គណិតវិទ្យា និងវិទ្យាសាស្ត្របឋម',
                'សីលធម៌ និងប្រវត្តិវិទ្យាខ្មែរ'
            ],
            'schedule_summary' => 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
            'student_count' => 45,
            'age_range' => '១២ ដល់ ១៨ ឆ្នាំ',
            'teacher_in_charge' => 'ព្រះមហា សុវណ្ណជោតិ',
        ]);

        SchoolClass::create([
            'grade_level' => 'tho',
            'name_kh' => 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ទោ (កម្រិតទី២)',
            'name_en' => 'Pali Primary School - Grade 2 (Tho Class)',
            'description' => 'ថ្នាក់មធ្យមនៃពុទ្ធិកបឋមសិក្សា ពង្រឹងការបកប្រែបាលី ធម្មបទដ្ឋកថា វិន័យសង្ឃកម្រិតកណ្ដាល និងចំណេះដឹងភាសាអង់គ្លេស/កុំព្យូទ័រ។',
            'subjects' => [
                'បាលីប្រែ (ធម្មបទដ្ឋកថា ភាគ១-២)',
                'បាលីវេយ្យាករណ៍ (សមាស និងតទ្ធិត)',
                'វិន័យមហាវិភង្គ',
                'អភិធម្មត្ថសង្គហៈបឋម',
                'ភាសាអង់គ្លេសបឋម',
                'កុំព្យូទ័របឋម និងរដ្ឋបាលទូទៅ'
            ],
            'schedule_summary' => 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
            'student_count' => 38,
            'age_range' => '១៣ ដល់ ២០ ឆ្នាំ',
            'teacher_in_charge' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម',
        ]);

        SchoolClass::create([
            'grade_level' => 'ek',
            'name_kh' => 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ឯ (កម្រិតបញ្ចប់)',
            'name_en' => 'Pali Primary School - Grade 3 (Ek Class - Graduation)',
            'description' => 'ថ្នាក់ត្រៀមប្រឡងយកសញ្ញាបត្រពុទ្ធិកបឋមសិក្សាទូទាំងប្រទេស ដោយផ្តោតលើការប្រែបាលីជាន់ខ្ពស់ តែងបាលី និងវិទ្យាសាស្ត្រសង្គម។',
            'subjects' => [
                'បាលីប្រែ និងតែងគាថាបាលី (ធម្មបទដ្ឋកថា ភាគ៣-៤)',
                'បាលីវេយ្យាករណ៍កម្រិតខ្ពស់ (អាខ្យាត និងកិតក៍)',
                'សមណវិន័យ និងបរមត្ថធម៌',
                'សាសនវិទ្យា និងប្រវត្តិពុទ្ធសាសនាពិភពលោក',
                'ភាសាអង់គ្លេស និងភាសាខ្មែរជាន់ខ្ពស់',
                'វិធីសាស្ត្រទេសនានិងស្រាវជ្រាវ'
            ],
            'schedule_summary' => 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
            'student_count' => 32,
            'age_range' => '១៤ ដល់ ២២ ឆ្នាំ',
            'teacher_in_charge' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល',
        ]);

        // Teachers & Monks
        $teachers = [
            [
                'name' => 'ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត ផល សុភឿន',
                'dharma_name' => 'វិសុទ្ធានុញ្ញាណ',
                'role' => 'ព្រះចៅអធិការ និងជានាយកពុទ្ធិកបឋមសិក្សា',
                'title' => 'ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត (Ph.D. in Linguistics)',
                'bio' => 'បានបញ្ចប់ការសិក្សាថ្នាក់បណ្ឌិត ជំនាញភាសាវិទ្យា (Doctor of Philosophy in Linguistics) ពីរាជបណ្ឌិត្យសភាកម្ពុជា នាឆ្នាំ២០២៤។ បច្ចុប្បន្នជាព្រះចៅអធិការវត្តព្រៃស្ដី និងជានាយកដឹកនាំពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី។',
                'photo' => '/images/abbot_phal_sophoeun.jpg',
                'teaching_subjects' => 'ភាសាវិទ្យា, ភាសាបាលី, វិធីសាស្ត្រដឹកនាំវត្តអារាម',
                'phone' => '012 345 678',
                'email' => 'abbot.phalsophoeun@wat.edu.kh',
                'sort_order' => 1,
            ],
            [
                'name' => 'ភិក្ខុ សាំង សំណាង',
                'dharma_name' => null,
                'role' => 'នាយករងទទួលបន្ទុកផ្នែករដ្ឋបាល',
                'title' => 'នាយករង',
                'bio' => 'នាយករងទទួលបន្ទុកផ្នែករដ្ឋបាល សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី ទទួលខុសត្រូវលើកិច្ចការរដ្ឋបាល ការសម្របសម្រួល និងការគ្រប់គ្រងកិច្ចការទូទៅក្នុងសាលា។',
                'photo' => '/images/teacher_sang_samnang.jpg',
                'teaching_subjects' => 'រដ្ឋបាល និងកិច្ចការទូទៅ',
                'phone' => '012 889 900',
                'email' => 'admin.sangsamnang@wat.edu.kh',
                'sort_order' => 2,
            ],
            [
                'name' => 'ភិក្ខុ ញ៉េ ណារ៉ា',
                'dharma_name' => null,
                'role' => 'នាយករងទទួលបន្ទុកបច្ចេកទេស',
                'title' => 'នាយករង (បេក្ខជនបណ្ឌិត)',
                'bio' => 'នាយករងទទួលបន្ទុកផ្នែកបច្ចេកទេស សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី។ ជាបេក្ខជនបណ្ឌិតផ្នែកអក្សរសាស្ត្រអង់គ្លេស (Ph.D. Candidate in English Literature) ទទួលបន្ទុកកម្មវិធីសិក្សា បច្ចេកទេសបង្រៀន និងការអភិវឌ្ឍគុណភាពអប់រំ។',
                'photo' => '/images/teacher_nye_nara.jpg',
                'teaching_subjects' => 'ភាសាអង់គ្លេស, វិធីសាស្ត្របង្រៀន និងបច្ចេកវិទ្យាអប់រំ',
                'phone' => '087 223 344',
                'email' => 'academic.nyenara@wat.edu.kh',
                'sort_order' => 3,
            ],
            [
                'name' => 'ភិក្ខុ ស្រ៊ុន សៅហេង',
                'dharma_name' => null,
                'role' => 'ប្រធានការិយាល័យសិក្សា និងរដ្ឋបាល',
                'title' => 'ប្រធានការិយាល័យ (បេក្ខជនអនុបណ្ឌិត)',
                'bio' => 'ប្រធានការិយាល័យសិក្សា និងរដ្ឋបាល សាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី។ ជាបេក្ខជនអនុបណ្ឌិតផ្នែកច្បាប់រដ្ឋបាល (Master\'s Degree Candidate in Administrative Law) ទទួលបន្ទុកការងាររដ្ឋបាលសិក្សា ឯកសារ និងកិច្ចការទូទៅ។',
                'photo' => '/images/teacher_srun_saoheng.jpg',
                'teaching_subjects' => 'ច្បាប់រដ្ឋបាល, កិច្ចការរដ្ឋបាលសិក្សា',
                'phone' => '098 334 455',
                'email' => 'office.srunsaoheng@wat.edu.kh',
                'sort_order' => 4,
            ],
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }

        // Posts / News
        $posts = [
            [
                'title' => 'ពិធីសម្ពោធដាក់ឱ្យប្រើប្រាស់អគារសិក្សាថ្មី នៃសាលាពុទ្ធិកបឋមសិក្សា',
                'slug' => 'inauguration-new-school-building',
                'excerpt' => 'វត្តអារាមយើងខ្ញុំបានរៀបចំពិធីសម្ពោធអគារសិក្សាថ្មីកម្ពស់ ២ ជាន់ មាន ៦ បន្ទប់ សម្រាប់សមណសិស្សសិក្សាប្រកបដោយផាសុកភាព។',
                'content' => '<p>ដោយមានការឧបត្ថម្ភជ្រោមជ្រែងពីសំណាក់ពុទ្ធបរិស័ទជិតឆ្ងាយ និងសប្បុរសជនទាំងក្នុងនិងក្រៅប្រទេស វត្តយើងខ្ញុំបានកសាងអគារសិក្សាថ្មីមួយខ្នងកម្ពស់ ២ ជាន់ មានចំនួន ៦ បន្ទប់ ដែលបំពាក់ដោយតុ កៅអី ក្ដារខៀន និងបណ្ណាល័យស្រាវជ្រាវទំនើប។</p><p>ពិធីនេះប្រព្រឹត្តទៅក្រោមអធិបតីភាពដ៏ខ្ពង់ខ្ពស់របស់ព្រះមេគណខេត្ត និងអាជ្ញាធរដែនដី ដោយមានសមណសិស្ស និងពុទ្ធបរិស័ទចូលរួមយ៉ាងច្រើនកុះករ។</p>',
                'category' => 'សាលារៀន',
                'author' => 'លេខាធិការដ្ឋានសាលា',
                'thumbnail' => 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80',
                'is_featured' => true,
                'views' => 342,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'សេចក្ដីជូនដំណឹងស្ដីពីការបើកទទួលពាក្យសុំចុះឈ្មោះចូលរៀន ឆ្នាំសិក្សាថ្មី',
                'slug' => 'admission-announcement-new-academic-year',
                'excerpt' => 'សាលាពុទ្ធិកបឋមសិក្សា ប្រកាសទទួលពាក្យចូលរៀនថ្នាក់ត្រី ថ្នាក់ទោ និងថ្នាក់ឯ សម្រាប់កុលបុត្រ និងសមណសិស្សគ្រប់វត្តអារាម។',
                'content' => '<p>គណៈគ្រប់គ្រងសាលាពុទ្ធិកបឋមសិក្សា មានកិត្តិយសសូមជម្រាបជូនដំណឹងដល់ព្រះចៅអធិការគ្រប់វត្តអារាម និងអាណាព្យាបាលសិស្សទាំងអស់ឱ្យបានជ្រាបថា សាលានឹងចាប់ផ្ដើមទទួលពាក្យចុះឈ្មោះចូលរៀនចាប់ពីថ្ងៃនេះតទៅ។</p><ul><li>កាលបរិច្ឆេទទទួលពាក្យ៖ ចាប់ពីថ្ងៃនេះ រហូតដល់ដាច់ខែ</li><li>ការសិក្សា៖ ផ្ដល់ជូនការស្នាក់នៅ បិណ្ឌបាត និងសម្ភារសិក្សាឥតគិតថ្លៃ</li><li>ទីកន្លែងទទួលពាក្យ៖ ការិយាល័យពុទ្ធិកបឋមសិក្សាក្នុងបរិវេណវត្ត</li></ul>',
                'category' => 'សាលារៀន',
                'author' => 'ការិយាល័យសិក្សាធិការ',
                'thumbnail' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&auto=format&fit=crop&q=80',
                'is_featured' => true,
                'views' => 520,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'ទិដ្ឋភាពនៃការរៀបចំពិធីបុណ្យកាន់បិណ្ឌ និងភ្ជុំបិណ្ឌ ប្រចាំឆ្នាំ',
                'slug' => 'pchum-ben-festival-highlights',
                'excerpt' => 'ពុទ្ធបរិស័ទចំណុះជើងវត្តយ៉ាងច្រើនកុះករបានមកប្រគេនចង្ហាន់ និងបង្សុកូលឧទ្ទិសកុសលជូនបុព្វការីជន។',
                'content' => '<p>ពិធីបុណ្យភ្ជុំបិណ្ឌជាបុណ្យប្រពៃណីជាតិដ៏ធំមួយរបស់ខ្មែរ។ វត្តអារាមយើងខ្ញុំបានរៀបចំពិធីរាប់បាត្រ វេនកាន់បិណ្ឌទាំង ១៤ ថ្ងៃ និងពិធីឆ្លងបុណ្យភ្ជុំធំយ៉ាងឱឡារិក ប្រកបដោយសេចក្ដីជ្រះថ្លា និងសុខសប្បាយ។</p>',
                'category' => 'វត្តអារាម',
                'author' => 'គណៈកម្មការវត្ត',
                'thumbnail' => 'https://images.unsplash.com/photo-1548625361-04285e6878b3?w=800&auto=format&fit=crop&q=80',
                'is_featured' => false,
                'views' => 280,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'វឌ្ឍនភាពនៃការសាងសង់មហាកុដិ និងសាលាឆាន់ថ្មី សម្រេចបាន ៨០%',
                'slug' => 'monastery-construction-progress-80-percent',
                'excerpt' => 'សូមថ្លែងអំណរអរគុណដល់ញាតិញោមពុទ្ធបរិស័ទដែលបានចូលរួមកសាងសមិទ្ធផលនេះជាបន្តបន្ទាប់។',
                'content' => '<p>គម្រោងសាងសង់សាលាឆាន់ និងកុដិស្នាក់នៅសម្រាប់ព្រះសង្ឃនិងសមណសិស្ស ដែលបានចាប់ផ្ដើមកាលពីដើមឆ្នាំ ពេលនេះសម្រេចការងារសំណង់បាន ៨០% ហើយ នៅសល់តែការរៀបចំក្បូរក្បាច់រចនា និងលាបថ្នាំពណ៌ប៉ុណ្ណោះ។</p>',
                'category' => 'វត្តអារាម',
                'author' => 'គណៈកម្មការសាងសង់',
                'thumbnail' => 'https://images.unsplash.com/photo-1563911302283-d2bc129e7570?w=800&auto=format&fit=crop&q=80',
                'is_featured' => false,
                'views' => 195,
                'published_at' => now()->subDays(18),
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }

        // Events / Ceremonies
        $events = [
            [
                'title' => 'ពិធីដង្ហែព្រះពុទ្ធបដិមាស្ពាន់ (ព្រះជីវ៍ធំ) មកកាន់វត្តព្រៃស្ដី',
                'slug' => 'ceremony-procession-bronze-buddha-statue-wat-preysdey',
                'description' => 'យើងខ្ញុំទាំងអស់គ្នាជាគណៈកម្មការ អាចារ្យ និងពុទ្ធបរិស័ទចំណុះជើងវត្តព្រៃស្ដី សូមអនុមោទនាពិធីដង្ហែព្រះពុទ្ធបដិមាស្ពាន់ (ព្រះជីវ៍ធំ) មកកាន់វត្តព្រៃស្ដី ដើម្បីតម្កល់ទុកជាទីសក្ការបូជាដ៏ខ្ពង់ខ្ពស់។',
                'content' => '<p>សូមគោរពអញ្ជើញសម្ដេច ឯកឧត្តម លោកជំទាវ លោក លោកស្រី និងពុទ្ធបរិស័ទចំណុះជើងវត្តជិតឆ្ងាយ ចូលរួមអនុមោទនា ពិធីដង្ហែព្រះពុទ្ធបដិមាស្ពាន់ (ព្រះជីវ៍ធំ) មកកាន់វត្តព្រៃស្ដី។</p><p><strong>កម្មវិធីបុណ្យ៖</strong></p><ul><li>ម៉ោង ៦:៣០ នាទីព្រឹក៖ ជួបជុំពុទ្ធបរិស័ទ</li><li>ម៉ោង ៧:០០ នាទីព្រឹក៖ ប្រារព្ធពិធីនមស្សការព្រះរតនត្រ័យ និងដង្ហែព្រះពុទ្ធបដិមា</li><li>ម៉ោង ៩:០០ នាទីព្រឹក៖ ពិធីពុទ្ធាភិសេក និងរាប់បាត្រប្រគេនព្រះសង្ឃ</li></ul>',
                'location' => 'បរិវេណព្រះវិហារថ្មី វត្តព្រៃស្ដី',
                'start_date' => '2026-09-28',
                'end_date' => '2026-09-28',
                'lunar_date' => 'ថ្ងៃ ១៥ កើត ខែអស្សុជ',
                'is_upcoming' => true,
                'image' => '/images/buddha_statue_event.jpg',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        // Dhamma Teachings & Audios
        $dhammas = [
            [
                'title' => 'មង្គល ៣៨ ប្រការ៖ ផ្លូវឆ្ពោះទៅកាន់សេចក្ដីចម្រើនក្នុងជីវិត',
                'slug' => '38-blessings-of-life-mangala-sutta',
                'preacher' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល',
                'category' => 'ធម៌អប់រំចិត្ត',
                'excerpt' => 'ការសេពគប់បណ្ឌិត ការមិនសេពគប់បុគ្គលពាល និងការគោរពបុគ្គលដែលគួរគោរព គឺជាមង្គលដ៏ឧត្ដម។',
                'content' => '<p>ក្នុងមង្គលសូត្រ ព្រះសម្មាសម្ពុទ្ធទ្រង់បានត្រាស់សម្តែងនូវមង្គលទាំង ៣៨ ប្រការ ដែលជាមាគ៌ានាំមកនូវសេចក្ដីសុខ សេចក្ដីចម្រើន និងសន្តិភាពក្នុងចិត្ត។</p><p>១. <strong>អសេវនា ច ពាលានំ</strong>៖ ការមិនគប់រកបុគ្គលពាល ព្រោះបុគ្គលពាលរមែងនាំទៅរកផ្លូវវិនាស។<br>២. <strong>បណ្ឌិតានញ្ច សេវនា</strong>៖ ការគប់រកបណ្ឌិតអ្នកប្រាជ្ញ ព្រោះបណ្ឌិតរមែងនាំទៅរកផ្លូវភ្លឺស្វាង។<br>៣. <strong>បូជា ច បូជនីយានំ</strong>៖ ការបូជាដល់បុគ្គលដែលគួរគោរពបូជា ដូចជា មាតាបិតា គ្រូបាធ្យាយ និងព្រះសង្ឃ។</p>',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                'duration' => '32:45',
                'read_time' => 6,
                'views' => 450,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'កតញ្ញូតាធម៌៖ គុណមាតាបិតាធំធេងលើសលប់ផែនដី',
                'slug' => 'gratitude-to-parents-katannu',
                'preacher' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម',
                'category' => 'គតិលោក និងសីលធម៌',
                'excerpt' => 'កូនដែលដឹងគុណ និងតបគុណមាតាបិតា រមែងជាបុគ្គលមានសិរីសួស្តី និងមិនចេះក្រឡាប់ធ្លាក់ចុះឡើយ។',
                'content' => '<p>ព្រះសម្មាសម្ពុទ្ធទ្រង់ត្រាស់ថា មាតាបិតាគឺជាព្រះព្រហ្មរបស់កូន គឺជាគ្រូដំបូង និងជាព្រះអរហន្តក្នុងផ្ទះ។ ការបម្រើផ្គត់ផ្គង់លោកទាំងពីរនៅពេលចាស់ជរា និងការធ្វើចិត្តឱ្យលោកមានសេចក្ដីសុខ គឺជាបុណ្យកុសលដ៏ធំធេងបំផុត។</p>',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
                'duration' => '28:10',
                'read_time' => 5,
                'views' => 620,
                'published_at' => now()->subDays(7),
            ],
            [
                'title' => 'អានាបានស្សតិ៖ វិធីចម្រើនសមាធិកំណត់ដង្ហើមចេញចូលរំងាប់ចិត្ត',
                'slug' => 'anapanasati-mindfulness-of-breathing',
                'preacher' => 'ព្រះមហា សុវណ្ណជោតិ',
                'category' => 'ការចម្រើនភាវនា (សមាធិ)',
                'excerpt' => 'ការតាមដឹងដង្ហើមចេញ និងដង្ហើមចូលដោយស្មារតី ដឹងច្បាស់នូវបច្ចុប្បន្នភាព ជួយឱ្យចិត្តស្ងប់ និងកើតបញ្ញា។',
                'content' => '<p>អានាបានស្សតិភាវនា គឺជាវិធីសមាធិដែលព្រះពុទ្ធទ្រង់បានបដិបត្តិដើម្បីត្រាស់ដឹង។ គ្រាន់តែអង្គុយក្នុងឥរិយាបថត្រង់ ដាក់ស្មារតីចំពោះមុខ ដឹងថាដង្ហើមចូលវែង ឬខ្លី ដង្ហើមចេញវែង ឬខ្លី ដោយមិនបង្ខំដង្ហើម ចិត្តនឹងត្រជាក់និងស្ងប់ផូរផង់។</p>',
                'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-3.mp3',
                'duration' => '45:00',
                'read_time' => 8,
                'views' => 810,
                'published_at' => now()->subDays(10),
            ],
        ];

        foreach ($dhammas as $dhamma) {
            Dhamma::create($dhamma);
        }

        // Achievements / Honors
        $achievements = [
            [
                'student_name' => 'សមណសិស្ស កែវ ចាន់ធឿន',
                'dharma_name' => 'ធម្មរង្សី',
                'title' => 'ជ័យលាភីលេខ ១ ទូទាំងខេត្ត ក្នុងការប្រឡងបញ្ចប់សញ្ញាបត្រពុទ្ធិកបឋមសិក្សា (ថ្នាក់ឯ)',
                'academic_year' => '២០២៤ - ២០២៥',
                'grade_level' => 'ថ្នាក់ឯ',
                'description' => 'ទទួលបាននិទ្ទេសល្អប្រសើរ (A) លើមុខវិជ្ជាបាលីប្រែ វិន័យបិដក និងអក្សរសាស្ត្រខ្មែរ។',
                'rank' => 1,
                'badge' => 'មេដាយមាសកិត្តិយស',
                'photo' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=600&auto=format&fit=crop&q=80',
            ],
            [
                'student_name' => 'សមណសិស្ស សុខ វណ្ណៈ',
                'dharma_name' => 'សិរិបញ្ញោ',
                'title' => 'ជ័យលាភីលេខ ១ ប្រឡងប្រជែងវេយ្យាករណ៍បាលី ថ្នាក់ទោ',
                'academic_year' => '២០២៤ - ២០២៥',
                'grade_level' => 'ថ្នាក់ទោ',
                'description' => 'ពូកែខាងបកប្រែគម្ពីរធម្មបទដ្ឋកថា និងវេយ្យាករណ៍បាលីកម្រិតមធ្យម។',
                'rank' => 1,
                'badge' => 'បណ្ណសរសើរឆ្នើម',
                'photo' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?w=600&auto=format&fit=crop&q=80',
            ],
            [
                'student_name' => 'សមណសិស្ស ហេង ពិសាល',
                'dharma_name' => 'បញ្ញាវុទ្ធោ',
                'title' => 'ជ័យលាភីលេខ ២ ផ្នែកសូត្រធម៌បាលី និងធម្មវិភាគ ថ្នាក់ត្រី',
                'academic_year' => '២០២៤ - ២០២៥',
                'grade_level' => 'ថ្នាក់ត្រី',
                'description' => 'មានទឹកដមសំឡេងពីរោះរណ្ដំក្នុងការសូត្រធម៌ និងមានវិន័យរៀបរយល្អឥតខ្ចោះ។',
                'rank' => 2,
                'badge' => 'បណ្ណកិត្តិយស',
                'photo' => 'https://images.unsplash.com/photo-1544717302-de2939b7ef71?w=600&auto=format&fit=crop&q=80',
            ],
        ];

        foreach ($achievements as $achieve) {
            Achievement::create($achieve);
        }

        // Admissions sample
        $admissions = [
            [
                'applicant_name' => 'ព្រះតេជគុណ ចាន់ សុភា',
                'dharma_name' => 'សុភធម្មោ',
                'gender' => 'ប្រុស',
                'date_of_birth' => '2008-05-15',
                'parent_name' => 'ចាន់ ផល្លា',
                'phone' => '012 889 900',
                'address' => 'ភូមិវត្តថ្មី ឃុំព្រែកតាទែន ស្រុកពញាឮ ខេត្តកណ្ដាល',
                'applied_grade' => 'ថ្នាក់ត្រី',
                'monk_status' => 'សមណសិស្ស (ព្រះសង្ឃ)',
                'previous_education' => 'បឋមសិក្សាចំណេះទូទៅ ថ្នាក់ទី៦',
                'status' => 'approved',
                'notes' => 'មានលិខិតអនុញ្ញាតពីព្រះចៅអធិការវត្តដើម និងឯកសារគ្រប់គ្រាន់',
            ],
            [
                'applicant_name' => 'កុលបុត្រ រ័ត្ន វិបុល',
                'dharma_name' => null,
                'gender' => 'ប្រុស',
                'date_of_birth' => '2009-11-20',
                'parent_name' => 'រ័ត្ន សំអាត',
                'phone' => '097 554 433',
                'address' => 'ភូមិកំពង់ស្ពាន ស្រុកមុខកំពូល ខេត្តកណ្ដាល',
                'applied_grade' => 'ថ្នាក់ត្រី',
                'monk_status' => 'កុលបុត្រ/សិស្សគ្រហស្ថ',
                'previous_education' => 'អនុវិទ្យាល័យ ថ្នាក់ទី៧',
                'status' => 'pending',
                'notes' => 'មានបំណងបួសជាសាមណេរ និងចូលរៀនពុទ្ធិកសិក្សា',
            ],
        ];

        foreach ($admissions as $adm) {
            Admission::create($adm);
        }

        // Photo Galleries & Facebook Albums
        $galleries = [
            [
                'title' => 'កម្រងរូបភាពពិធីបោះបាយបិណ្ឌ (បិណ្ឌ១) វត្តព្រៃស្ដី',
                'category' => 'ពិធីបុណ្យ',
                'image_url' => '/images/album_proum_bind1.jpg',
                'caption' => 'សូមអនុមោទនាពិធីបោះបាយបិណ្ឌ បិណ្ឌ១ — ថ្ងៃអាទិត្យ ១រោច ខែភទ្របទ ឆ្នាំរោង ឆស័ក ពុទ្ធសករាជ ២៥៦៨ វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
                'event_date' => '2024-09-22',
                'facebook_url' => 'https://web.facebook.com/share/p/19yqkeyzHt/',
            ],
            [
                'title' => 'កម្រងរូបភាពវឌ្ឍនភាពការសាងសង់ព្រះវិហារថ្មី នៃអារាមដ្ឋានព្រៃស្ដី',
                'category' => 'វត្តអារាម',
                'image_url' => '/images/temple_construction_fb.jpg',
                'caption' => 'ដំណើរការសាងសង់ព្រះវិហារថ្មី នៃអារាមដ្ឋានព្រៃស្ដី ដើម្បីតម្កល់ទុកជាមត៌កសម្រាប់ព្រះពុទ្ធសាសនា',
                'event_date' => '2024-10-15',
                'facebook_url' => 'https://web.facebook.com/share/p/1FDxCsQmot/',
            ],
            [
                'title' => 'កម្រងរូបភាពទិដ្ឋភាពពីលើអាកាស នៃវត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
                'category' => 'វត្តអារាម',
                'image_url' => '/images/wat_preysdey_aerial_temple.jpg',
                'caption' => 'ទិដ្ឋភាពរួមនៃទីអារាមវត្តព្រៃស្ដី រួមមានព្រះវិហារថ្មី សាលាឆាន់ កុដិ និងបរិវេណវត្តដ៏ធំទូលាយ',
                'event_date' => '2025-01-01',
                'facebook_url' => 'https://web.facebook.com/psppagoda',
            ],
            [
                'title' => 'កម្រងរូបភាពសមណសិស្ស និងកុលបុត្រ ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
                'category' => 'សាលារៀន',
                'image_url' => '/images/school_students_monks.jpg',
                'caption' => 'ទិដ្ឋភាពសមណសិស្ស និងគណៈគ្រប់គ្រងសាលាពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី',
                'event_date' => '2025-02-01',
                'facebook_url' => 'https://web.facebook.com/psppagoda',
            ],
        ];

        foreach ($galleries as $gal) {
            Gallery::create($gal);
        }

        // Sample contact message
        ContactMessage::create([
            'name' => 'ឧបាសក សេង ហុង',
            'email' => 'senghong@gmail.com',
            'phone' => '012 334 455',
            'subject' => 'សាកសួរអំពីការចូលរួមជាបច្ច័យកសាងសាលាឆាន់',
            'message' => 'ខ្ញុំករុណាមានបំណងចង់ចូលរួមកសាងសាលាឆាន់ថ្មីចំនួន ៥០០ ដុល្លារ តើអាចទាក់ទងលោកអាចារ្យណាបានដែរ?',
            'is_read' => false,
        ]);

        // Videos & Live Streams
        $videos = [
            [
                'title' => 'ផ្សាយបន្តផ្ទាល់ (Live)៖ ពិធីបុណ្យមាឃបូជា និងធម្មទេសនាគ្រែពីរ',
                'slug' => 'live-meak-bochea-ceremony-2026',
                'preacher' => 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ និងព្រះមហាថេរ',
                'category' => 'ផ្សាយបន្តផ្ទាល់ Live',
                'youtube_id' => 'Jf4v_7QkI4A',
                'youtube_url' => 'https://www.youtube.com/watch?v=Jf4v_7QkI4A',
                'description' => 'ការផ្សាយបន្តផ្ទាល់ពិធីបុណ្យមាឃបូជា នមស្សការព្រះរតនត្រ័យ សមាទានសីល ធម្មទេសនា និងដង្ហែប្រទក្សិណ ៣ ជុំជុំវិញព្រះវិហារវត្តព្រៃស្ដី។',
                'duration' => '1:45:00',
                'is_live' => true,
                'is_featured' => true,
                'views' => 1420,
                'published_at' => now(),
            ],
            [
                'title' => 'ធម្មទេសនា៖ អានាបានស្សតិ និងសេចក្ដីស្ងប់ក្នុងចិត្ត',
                'slug' => 'sermon-anapanasati-inner-peace',
                'preacher' => 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ (ព្រះចៅអធិការ)',
                'category' => 'ធម្មទេសនា',
                'youtube_id' => '1ZYbU82GVz4',
                'youtube_url' => 'https://www.youtube.com/watch?v=1ZYbU82GVz4',
                'description' => 'ការចម្រើនសតិដឹងនូវដង្ហើមចេញចូល រំងាប់នូវសេចក្តីក្រោធ និងអូសទាញចិត្តឱ្យស្ថិតក្នុងបច្ចុប្បន្នកាល។',
                'duration' => '42:15',
                'is_live' => false,
                'is_featured' => true,
                'views' => 890,
                'published_at' => now()->subDays(3),
            ],
            [
                'title' => 'ធម្មទាន៖ កតញ្ញូតាធម៌តបគុណមាតាបិតា',
                'slug' => 'sermon-gratitude-to-parents',
                'preacher' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម',
                'category' => 'ធម្មទេសនា',
                'youtube_id' => 'kJQP7kiw5Fk',
                'youtube_url' => 'https://www.youtube.com/watch?v=kJQP7kiw5Fk',
                'description' => 'គុណមាតាបិតាធំធេងលើសលប់ផែនដី កូនប្រុសស្រីត្រូវដឹងគុណ និងតបគុណលោកទាំងពីរឱ្យបានសមរម្យ។',
                'duration' => '35:20',
                'is_live' => false,
                'is_featured' => false,
                'views' => 640,
                'published_at' => now()->subDays(6),
            ],
        ];

        foreach ($videos as $v) {
            \App\Models\Video::create($v);
        }
    }
}

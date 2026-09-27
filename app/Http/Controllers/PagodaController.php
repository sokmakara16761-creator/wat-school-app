<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\Gallery;
use Illuminate\Http\Request;

class PagodaController extends Controller
{
    public function about()
    {
        $abbot = Teacher::where('role', 'like', '%ចៅអធិការ%')->first();
        $abbotLineage = [
            [
                'order' => 'ជំនាន់ទី ៤ (បច្ចុប្បន្ន)',
                'name' => 'ព្រះវិសុទ្ធានុញ្ញាណ បណ្ឌិត ផល សុភឿន',
                'period' => 'បច្ចុប្បន្ន',
                'description' => 'បណ្ឌិតភាសាវិទ្យា (Ph.D. in Linguistics) ពីរាជបណ្ឌិត្យសភាកម្ពុជា។ ព្រះចៅអធិការ និងជានាយកពុទ្ធិកបឋមសិក្សាវត្តព្រៃស្ដី។',
            ],
            [
                'order' => 'ជំនាន់ទី ៣',
                'name' => 'ព្រះគ្រូសិរីធម្មោ ប៉ែន ឈាង',
                'period' => '១៩៩៨ - ២០១៥',
                'description' => 'បានដឹកនាំកសាងព្រះវិហារថ្មី និងសាលាឆាន់ ដោយមានការចូលរួមពីពុទ្ធបរិស័ទចំណុះជើងវត្តយ៉ាងច្រើនកុះករ។',
            ],
            [
                'order' => 'ជំនាន់ទី ២',
                'name' => 'ព្រះឧបជ្ឈាយ៍ ធម្មវិទូ អ៊ុច ស៊ឹម',
                'period' => '១៩៧៩ - ១៩៩៨',
                'description' => 'បានប្រមូលពុទ្ធបរិស័ទកសាងវត្តអារាមឡើងវិញក្រោយសម័យសង្គ្រាម និងផ្ដួចផ្ដើមបង្កើតថ្នាក់រៀនអក្សរខ្មែរនិងធម៌វិន័យ។',
            ],
            [
                'order' => 'ជំនាន់ទី ១ (ស្ថាបនិក)',
                'name' => 'ព្រះមហាថេរ ធម្មរតនោ កែវ ម៉ែន',
                'period' => '១៩៧៤ - ១៩៧៥',
                'description' => 'ព្រះអង្គជាអ្នកផ្ដួចផ្ដើមកសាងទីអារាមដំបូងបង្អស់លើទឹកដីភូមិស្រុកនេះ។',
            ],
        ];

        $landmarks = $this->getCampusLocations();

        $committee = [
            ['role' => 'ប្រធានគណៈកម្មការវត្ត', 'name' => 'ឧបាសក ចាន់ ថន', 'phone' => '012 998 877'],
            ['role' => 'អនុប្រធានគណៈកម្មការ', 'name' => 'ឧបាសក អ៊ុក សារិន', 'phone' => '098 776 655'],
            ['role' => 'អាចារ្យធំ (អាចារ្យវត្ត)', 'name' => 'អាចារ្យ ហេង សុខ', 'phone' => '077 443 322'],
            ['role' => 'ហេរញ្ញិក (គ្រប់គ្រងបច្ច័យ)', 'name' => 'ឧបាសិកា យឹម សារ៉េត', 'phone' => '089 112 233'],
        ];

        $photos = Gallery::where('category', 'វត្តអារាម')->take(6)->get();

        return view('pagoda.about', compact('abbot', 'abbotLineage', 'landmarks', 'committee', 'photos'));
    }

    public function map(Request $request)
    {
        $locations = $this->getCampusLocations();
        $selectedId = $request->query('location_id', 9); // default to ព្រះវិហារ (id: 9)

        $categories = [
            'all' => 'ទីតាំងទាំងអស់',
            'entrance' => 'ខ្លោងទ្វារចូល',
            'worship' => 'ព្រះវិហារសក្ការៈ',
            'education' => 'សាលារៀន & ការិយាល័យ',
            'residence' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
            'nature' => 'ស្រះទឹក & កន្លែងអង្គុយលេង',
        ];

        return view('pagoda.map', compact('locations', 'selectedId', 'categories'));
    }

    private function getCampusLocations()
    {
        return [
            [
                'id' => 1,
                'name' => 'ខ្លោងទ្វារទី ១ (ច្រកចូលខាងលិច)',
                'name_en' => 'Main Entrance Gate 1 (West)',
                'category' => 'entrance',
                'category_name' => 'ខ្លោងទ្វារចូល',
                'icon' => 'fa-archway',
                'badge_color' => 'bg-stone-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&auto=format&fit=crop&q=80',
                'status' => 'ច្រកចេញ-ចូលសំខាន់',
                'description' => 'ខ្លោងទ្វារធំទី ១ ស្ថិតនៅជ្រុងខាងលើឆ្វេង ជាច្រកចេញចូលដ៏សំខាន់សម្រាប់ពុទ្ធបរិស័ទធ្វើដំណើរចូលមកកាន់ទីអារាម ឆ្ពោះទៅកុដិព្រះចៅអធិកា និងការិយាល័យសិក្សា។',
                'activities' => 'ច្រកចេញចូលយានយន្ត, ផ្លូវដំណើរចូលវត្ត, សន្តិសុខនិងសុវត្ថិភាព',
                'coordinates' => ['top' => '8%', 'left' => '16%'],
                'zone' => 'ជ្រុងខាងលើឆ្វេង (ទិសពាយ័ព្យ)',
            ],
            [
                'id' => 2,
                'name' => 'ខ្លោងទ្វារទី ២ (ច្រកចូលខាងកើត)',
                'name_en' => 'Main Entrance Gate 2 (East)',
                'category' => 'entrance',
                'category_name' => 'ខ្លោងទ្វារចូល',
                'icon' => 'fa-archway',
                'badge_color' => 'bg-stone-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=800&auto=format&fit=crop&q=80',
                'status' => 'ច្រកចេញ-ចូលសំខាន់',
                'description' => 'ខ្លោងទ្វារធំទី ២ ស្ថិតនៅជ្រុងខាងលើស្តាំ ជាច្រកចេញចូលឆ្ពោះទៅកាន់អគារសាលារៀនពុទ្ធិកបឋមសិក្សា និងព្រះវិហារ។',
                'activities' => 'ច្រកចេញចូលសមណសិស្ស, ផ្លូវចូលសាលារៀន និងព្រះវិហារ',
                'coordinates' => ['top' => '8%', 'left' => '84%'],
                'zone' => 'ជ្រុងខាងលើស្តាំ (ទិសឦសាន)',
            ],
            [
                'id' => 3,
                'name' => 'កុដិព្រះចៅអធិកា',
                'name_en' => 'Abbot Kuti Residence',
                'category' => 'residence',
                'category_name' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
                'icon' => 'fa-landmark',
                'badge_color' => 'bg-amber-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការប្រចាំថ្ងៃ',
                'description' => 'ទីគង់ប្រថាប់របស់ព្រះចៅអធិការវត្ត សម្រាប់ទទួលភ្ញៀវពុទ្ធបរិស័ទជិតឆ្ងាយ ការពិគ្រោះយោបល់ធម៌ និងការដឹកនាំគ្រប់គ្រងកិច្ចការវត្តអារាមទូទៅ។',
                'activities' => 'ទទួលភ្ញៀវពុទ្ធបរិស័ទ, កិច្ចការដឹកនាំអារាម, ការប្រជុំគណៈកម្មការវត្ត',
                'coordinates' => ['top' => '17%', 'left' => '42%'],
                'zone' => 'ជួរខាងលើ ក្បែរខ្លោងទ្វារទី១',
            ],
            [
                'id' => 4,
                'name' => 'សាលារៀន (ពុទ្ធិកបឋមសិក្សា)',
                'name_en' => 'School Classrooms Building',
                'category' => 'education',
                'category_name' => 'សាលារៀន & ការិយាល័យ',
                'icon' => 'fa-graduation-cap',
                'badge_color' => 'bg-red-800 text-amber-200',
                'image' => '/images/school_students_monks.jpg',
                'status' => 'ដំណើរការបង្រៀនប្រចាំថ្ងៃ',
                'description' => 'អគារសាលារៀនពុទ្ធិកបឋមសិក្សា សម្រាប់បណ្ដុះបណ្ដាលសមណសិស្សទាំង ៣ កម្រិតថ្នាក់ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ) លើភាសាបាលី វិន័យបិដក ធម្មវិភាគ និងចំណេះដឹងទូទៅទំនើប។',
                'activities' => 'ថ្នាក់រៀនភាសាបាលី, វិន័យសង្ឃ, គណិតវិទ្យា, ភាសាខ្មែរ, ប្រឡងឆមាស',
                'coordinates' => ['top' => '17%', 'left' => '70%'],
                'zone' => 'ជួរខាងលើ ក្បែរខ្លោងទ្វារទី២',
            ],
            [
                'id' => 5,
                'name' => 'ការិយាល័យសិក្សា',
                'name_en' => 'Academic & Education Office',
                'category' => 'education',
                'category_name' => 'សាលារៀន & ការិយាល័យ',
                'icon' => 'fa-chalkboard-user',
                'badge_color' => 'bg-blue-800 text-white',
                'image' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការរៀងរាល់ថ្ងៃ',
                'description' => 'ការិយាល័យរដ្ឋបាលពុទ្ធិកសិក្សាធិការ សម្រាប់ទទួលពាក្យចុះឈ្មោះចូលរៀនថ្មី កត់ត្រាពិន្ទុ និងលទ្ធផលប្រឡងរបស់សមណសិស្ស ព្រមទាំងរៀបចំកាលវិភាគសិក្សា។',
                'activities' => 'ចុះឈ្មោះសិស្សថ្មី, គ្រប់គ្រងលទ្ធផលប្រឡង, កិច្ចការរដ្ឋបាលសាលា',
                'coordinates' => ['top' => '33%', 'left' => '32%'],
                'zone' => 'ប្លុកកណ្តាលខាងឆ្វេង (ផ្នែកលើ)',
            ],
            [
                'id' => 6,
                'name' => 'សាលាឆាន់',
                'name_en' => 'Sala Chhan (Dining & Assembly Hall)',
                'category' => 'residence',
                'category_name' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
                'icon' => 'fa-utensils',
                'badge_color' => 'bg-amber-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1563911302283-d2bc129e7570?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការប្រចាំថ្ងៃ',
                'description' => 'សាលាឆាន់សម្រាប់ព្រះសង្ឃនិងសមណសិស្សឆាន់ចង្ហាន់ ព្រមទាំងទទួលទានអាហារពេលព្រឹក និងថ្ងៃត្រង់ ដោយមានរបៀបរៀបរយ និងអនាម័យខ្ពស់។',
                'activities' => 'ឆាន់ចង្ហាន់ពេលព្រឹក-ថ្ងៃត្រង់, ការជួបជុំសាមគ្គី, ពិធីបុណ្យប្រគេនចង្ហាន់',
                'coordinates' => ['top' => '45%', 'left' => '32%'],
                'zone' => 'ប្លុកកណ្តាលខាងឆ្វេង (ក្បែរការិយាល័យ)',
            ],
            [
                'id' => 7,
                'name' => 'ផ្ទះបាយ',
                'name_en' => 'Pagoda Kitchen',
                'category' => 'residence',
                'category_name' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
                'icon' => 'fa-fire-burner',
                'badge_color' => 'bg-orange-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1556911220-e15b29be8c8f?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការប្រចាំថ្ងៃ',
                'description' => 'ផ្ទះបាយសម្រាប់ចម្អិនចង្ហាន់ និងរៀបចំម្ហូបអាហារសម្រាប់ប្រគេនព្រះសង្ឃ និងផ្គត់ផ្គង់សមណសិស្សស្នាក់នៅក្នុងវត្ត។',
                'activities' => 'ចម្អិនចង្ហាន់, រៀបចំម្ហូបអាហារ, ទទួលទេយ្យទានពីពុទ្ធបរិស័ទ',
                'coordinates' => ['top' => '45%', 'left' => '10%'],
                'zone' => 'ជ្រុងខាងឆ្វេងជាប់សាលាឆាន់',
            ],
            [
                'id' => 8,
                'name' => 'មហាកុដិ',
                'name_en' => 'Maha Kuti (Senior Monk Residence)',
                'category' => 'residence',
                'category_name' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
                'icon' => 'fa-hotel',
                'badge_color' => 'bg-indigo-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការប្រចាំថ្ងៃ',
                'description' => 'អគារមហាកុដិដ៏ធំទូលាយនិងរឹងមាំ សម្រាប់ព្រះសង្ឃថេរៈ និងសមណគ្រូបង្រៀនគង់នៅបដិបត្តិធម៌វិន័យ និងទទួលបដិសណ្ឋារកិច្ច។',
                'activities' => 'ទីគង់នៅរបស់ព្រះថេរៈ, ការចម្រើនភាវនា, ស្វ័យសិក្សាធម៌វិន័យ',
                'coordinates' => ['top' => '60%', 'left' => '32%'],
                'zone' => 'ប្លុកកណ្តាលខាងឆ្វេង (ផ្នែកក្រោម)',
            ],
            [
                'id' => 9,
                'name' => 'ព្រះវិហារ វត្តព្រៃស្ដី',
                'name_en' => 'Main Temple / Vihear',
                'category' => 'worship',
                'category_name' => 'ព្រះវិហារសក្ការៈ',
                'icon' => 'fa-place-of-worship',
                'badge_color' => 'bg-amber-500 text-red-950',
                'image' => '/images/school_building_construction.jpg',
                'status' => 'កំពុងសាងសង់ (សម្រេចបាន ៨០%)',
                'description' => 'សំណង់ព្រះវិហារបេតុងប្រកបដោយក្បូរក្បាច់រចនាបថខ្មែរបុរាណកម្ពស់ត្រដែត ជាបេះដូង និងជាទីសក្ការបូជាធំបំផុតក្នុងអារាម សម្រាប់ប្រារព្ធពិធីឧបសម្បទា (បំបួសភិក្ខុ) ថ្វាយបង្គំព្រះ និងសូត្របាតិមោក្ខ។',
                'activities' => 'ពិធីបុណ្យជាតិ-សាសនា, ពិធីបំបួសភិក្ខុ, សូត្របាតិមោក្ខ, នមស្សការព្រះរតនត្រ័យ',
                'coordinates' => ['top' => '44%', 'left' => '68%'],
                'zone' => 'តំបន់កណ្តាលខាងស្តាំ (បេះដូងអារាម)',
            ],
            [
                'id' => 10,
                'name' => 'ស្រះទឹក',
                'name_en' => 'Pagoda Pond / Reservoir',
                'category' => 'nature',
                'category_name' => 'ស្រះទឹក & កន្លែងអង្គុយលេង',
                'icon' => 'fa-water',
                'badge_color' => 'bg-cyan-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1548625361-04285e6878b3?w=800&auto=format&fit=crop&q=80',
                'status' => 'ទីសក្ការៈធម្មជាតិ',
                'description' => 'ស្រះទឹកធម្មជាតិរាងទ្រវែងតាមបណ្តោយខាងកើតនៃព្រះវិហារ ផ្តល់នូវភាពត្រជាក់ត្រជុំ បរិយាកាសស្រស់ស្រាយ និងជាកន្លែងលែងត្រីធ្វើទាន។',
                'activities' => 'ការលែងសត្វធ្វើទាន, ការគយគន់ធម្មជាតិ, រក្សាប្រភពទឹកត្រជាក់ក្នុងអារាម',
                'coordinates' => ['top' => '48%', 'left' => '88%'],
                'zone' => 'ជួរខាងស្តាំបំផុតជាប់ព្រះវិហារ',
            ],
            [
                'id' => 11,
                'name' => 'កន្លែងអង្គុយលេង',
                'name_en' => 'Relaxation & Sitting Garden',
                'category' => 'nature',
                'category_name' => 'ស្រះទឹក & កន្លែងអង្គុយលេង',
                'icon' => 'fa-couch',
                'badge_color' => 'bg-emerald-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?w=800&auto=format&fit=crop&q=80',
                'status' => 'ទីលំហែអារម្មណ៍ស្ងប់ស្ងាត់',
                'description' => 'ទីធ្លាអង្គុយលេងក្រោមម្លប់ឈើត្រឈឹងត្រឈៃ មានបង់ថ្មសម្រាប់សមណសិស្សអង្គុយអានសៀវភៅ រំលឹកមេរៀន និងពុទ្ធបរិស័ទអង្គុយសម្រាកលំហែចិត្ត។',
                'activities' => 'ការអានសៀវភៅក្រៅថ្នាក់, ការសម្រាកលំហែ, ពិភាក្សាធម៌',
                'coordinates' => ['top' => '70%', 'left' => '72%'],
                'zone' => 'ផ្នែកខាងក្រោមខាងស្តាំ (ខាងត្បូងព្រះវិហារ)',
            ],
            [
                'id' => 12,
                'name' => 'កុដិព្រះសង្ឃគង់នៅ',
                'name_en' => 'Monk & Novice Quarters (South)',
                'category' => 'residence',
                'category_name' => 'កុដិ ផ្ទះបាយ & សាលាឆាន់',
                'icon' => 'fa-bed',
                'badge_color' => 'bg-indigo-700 text-white',
                'image' => 'https://images.unsplash.com/photo-1590073242678-70ee3fc28e8e?w=800&auto=format&fit=crop&q=80',
                'status' => 'ដំណើរការប្រចាំថ្ងៃ',
                'description' => 'អគារកុដិស្នាក់នៅជួរធំទូលាយខាងក្រោម សម្រាប់ព្រះសង្ឃ សាមណេរ និងសមណសិស្សគង់នៅរៀនសូត្រ ប្រកបដោយផាសុកភាព និងសេចក្តីស្ងប់ស្ងាត់។',
                'activities' => 'ទីគង់នៅរបស់ព្រះសង្ឃ-សមណសិស្ស, ការស្វ័យសិក្សាពេលរាត្រី, ការប្រតិបត្តិធម៌',
                'coordinates' => ['top' => '86%', 'left' => '48%'],
                'zone' => 'ជួរខាងក្រោមបំផុត (ទិសខាងត្បូង)',
            ],
        ];
    }
}

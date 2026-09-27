<?php

namespace Database\Seeders;

use App\Models\ExamResult;
use App\Models\Timetable;
use Illuminate\Database\Seeder;

class ExamAndTimetableSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Seed Exam Results
        $examResults = [
            // Student 1 - Tri Class (Top Rank 1)
            [
                'student_id' => 'PSD-2026-001',
                'student_name' => 'សមណសិស្ស កែវ ចាន់ធឿន',
                'dharma_name' => 'ធម្មរង្សី',
                'gender' => 'ប្រុស',
                'grade_level' => 'tri',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'ភាសាបាលី (បាលីវេយ្យាករណ៍)', 'score' => 96, 'max_score' => 100, 'teacher_notes' => 'ពូកែខាងវេយ្យាករណ៍បាលីណាស់'],
                    ['subject' => 'វិន័យបិដក និងពុទ្ធប្រវត្តិ', 'score' => 94, 'max_score' => 100, 'teacher_notes' => 'យល់ដឹងច្បាស់ពីវិន័យសង្ឃ'],
                    ['subject' => 'ធម្មវិភាគ និងសុភាសិត', 'score' => 92, 'max_score' => 100, 'teacher_notes' => 'ការបកស្រាយក្បោះក្បាយ'],
                    ['subject' => 'ភាសាខ្មែរ (តែងសេចក្ដី)', 'score' => 90, 'max_score' => 100, 'teacher_notes' => 'សំណេរស្អាត អក្ខរាវិរុទ្ធត្រឹមត្រូវ'],
                    ['subject' => 'គណិតវិទ្យា និងវិទ្យាសាស្ត្រ', 'score' => 88, 'max_score' => 100, 'teacher_notes' => 'ការគិតលេខរហ័ស'],
                    ['subject' => 'សីលធម៌ និងប្រវត្តិវិទ្យាខ្មែរ', 'score' => 95, 'max_score' => 100, 'teacher_notes' => 'ការចងចាំប្រវត្តិសាស្ត្រល្អ'],
                ],
                'total_score' => 555,
                'max_total' => 600,
                'average' => 92.50,
                'rank' => 1,
                'grade_mention' => 'ល្អប្រសើរ (A)',
                'status' => 'ជាប់កិត្តិយស',
                'remarks' => 'សមណសិស្សឆ្នើមជាប់ចំណាត់ថ្នាក់លេខ ១ ប្រចាំពុទ្ធិកថ្នាក់ត្រី មានវិន័យ និងការខិតខំប្រឹងប្រែងខ្ពស់។',
            ],
            // Student 2 - Tri Class (Rank 2)
            [
                'student_id' => 'PSD-2026-002',
                'student_name' => 'សមណសិស្ស ហេង ពិសាល',
                'dharma_name' => 'បញ្ញាវុទ្ធោ',
                'gender' => 'ប្រុស',
                'grade_level' => 'tri',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'ភាសាបាលី (បាលីវេយ្យាករណ៍)', 'score' => 88, 'max_score' => 100, 'teacher_notes' => 'យល់វេយ្យាករណ៍បានល្អ'],
                    ['subject' => 'វិន័យបិដក និងពុទ្ធប្រវត្តិ', 'score' => 92, 'max_score' => 100, 'teacher_notes' => 'សូត្រធម៌បានរលូន'],
                    ['subject' => 'ធម្មវិភាគ និងសុភាសិត', 'score' => 89, 'max_score' => 100, 'teacher_notes' => 'ឆ្លើយត្រូវតាមខ្លឹមសារ'],
                    ['subject' => 'ភាសាខ្មែរ (តែងសេចក្ដី)', 'score' => 86, 'max_score' => 100, 'teacher_notes' => 'តែងសេចក្តីបានល្អ'],
                    ['subject' => 'គណិតវិទ្យា និងវិទ្យាសាស្ត្រ', 'score' => 84, 'max_score' => 100, 'teacher_notes' => 'លទ្ធផលល្អ'],
                    ['subject' => 'សីលធម៌ និងប្រវត្តិវិទ្យាខ្មែរ', 'score' => 91, 'max_score' => 100, 'teacher_notes' => 'មានការយល់ដឹងច្រើន'],
                ],
                'total_score' => 530,
                'max_total' => 600,
                'average' => 88.33,
                'rank' => 2,
                'grade_mention' => 'ល្អណាស់ (B)',
                'status' => 'ជាប់',
                'remarks' => 'សមណសិស្សមានសីលធម៌រៀបរយ និងការរៀនសូត្រស្ទាត់ជំនាញ។',
            ],
            // Student 3 - Tri Class (Rank 3)
            [
                'student_id' => 'PSD-2026-003',
                'student_name' => 'សាមណេរ ចាន់ សុភា',
                'dharma_name' => 'សុភធម្មោ',
                'gender' => 'ប្រុស',
                'grade_level' => 'tri',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'ភាសាបាលី (បាលីវេយ្យាករណ៍)', 'score' => 82, 'max_score' => 100, 'teacher_notes' => 'ខិតខំបន្ថែមលើនាម'],
                    ['subject' => 'វិន័យបិដក និងពុទ្ធប្រវត្តិ', 'score' => 85, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'ធម្មវិភាគ និងសុភាសិត', 'score' => 84, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'ភាសាខ្មែរ (តែងសេចក្ដី)', 'score' => 80, 'max_score' => 100, 'teacher_notes' => 'កែលម្អអក្សរដៃបន្តិច'],
                    ['subject' => 'គណិតវិទ្យា និងវិទ្យាសាស្ត្រ', 'score' => 78, 'max_score' => 100, 'teacher_notes' => 'មធ្យម'],
                    ['subject' => 'សីលធម៌ និងប្រវត្តិវិទ្យាខ្មែរ', 'score' => 86, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                ],
                'total_score' => 495,
                'max_total' => 600,
                'average' => 82.50,
                'rank' => 3,
                'grade_mention' => 'ល្អ (C)',
                'status' => 'ជាប់',
                'remarks' => 'សមណសិស្សឆ្លាតវៃ គួរខិតខំពង្រឹងបន្ថែមលើផ្នែកគណិតវិទ្យា។',
            ],

            // Student 4 - Tho Class (Rank 1)
            [
                'student_id' => 'PSD-2026-010',
                'student_name' => 'សមណសិស្ស សុខ វណ្ណៈ',
                'dharma_name' => 'សិរិបញ្ញោ',
                'gender' => 'ប្រុស',
                'grade_level' => 'tho',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'បាលីប្រែ (ធម្មបទដ្ឋកថា ភាគ១)', 'score' => 97, 'max_score' => 100, 'teacher_notes' => 'បកប្រែបានរលូន និងច្បាស់លាស់'],
                    ['subject' => 'បាលីវេយ្យាករណ៍ (សមាស/តទ្ធិត)', 'score' => 94, 'max_score' => 100, 'teacher_notes' => 'វិភាគរូបសព្ទបានត្រឹមត្រូវ'],
                    ['subject' => 'វិន័យមហាវិភង្គ', 'score' => 92, 'max_score' => 100, 'teacher_notes' => 'យល់ច្បាស់នូវអាបត្តិ'],
                    ['subject' => 'អភិធម្មត្ថសង្គហៈបឋម', 'score' => 90, 'max_score' => 100, 'teacher_notes' => 'ចងចាំបរមត្ថធម៌ល្អ'],
                    ['subject' => 'ភាសាអង់គ្លេសបឋម', 'score' => 88, 'max_score' => 100, 'teacher_notes' => 'ការសរសេរ និងអានបានល្អ'],
                    ['subject' => 'កុំព្យូទ័របឋម និងរដ្ឋបាល', 'score' => 95, 'max_score' => 100, 'teacher_notes' => 'ប្រើប្រាស់កម្មវិធីការិយាល័យស្ទាត់'],
                ],
                'total_score' => 556,
                'max_total' => 600,
                'average' => 92.67,
                'rank' => 1,
                'grade_mention' => 'ល្អប្រសើរ (A)',
                'status' => 'ជាប់កិត្តិយស',
                'remarks' => 'ជ័យលាភីលេខ ១ ថ្នាក់ទោ គំរូទាំងការសិក្សា និងវិន័យសង្ឃ។',
            ],
            // Student 5 - Tho Class (Rank 2)
            [
                'student_id' => 'PSD-2026-011',
                'student_name' => 'សមណសិស្ស រឿន ពិសិដ្ឋ',
                'dharma_name' => 'ធម្មវង្ស',
                'gender' => 'ប្រុស',
                'grade_level' => 'tho',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'បាលីប្រែ (ធម្មបទដ្ឋកថា ភាគ១)', 'score' => 90, 'max_score' => 100, 'teacher_notes' => 'បកប្រែល្អ'],
                    ['subject' => 'បាលីវេយ្យាករណ៍ (សមាស/តទ្ធិត)', 'score' => 88, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'វិន័យមហាវិភង្គ', 'score' => 89, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'អភិធម្មត្ថសង្គហៈបឋម', 'score' => 85, 'max_score' => 100, 'teacher_notes' => 'ល្អបង្គួរ'],
                    ['subject' => 'ភាសាអង់គ្លេសបឋម', 'score' => 84, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'កុំព្យូទ័របឋម និងរដ្ឋបាល', 'score' => 91, 'max_score' => 100, 'teacher_notes' => 'ល្អណាស់'],
                ],
                'total_score' => 527,
                'max_total' => 600,
                'average' => 87.83,
                'rank' => 2,
                'grade_mention' => 'ល្អណាស់ (B)',
                'status' => 'ជាប់',
                'remarks' => 'សមណសិស្សឧស្សាហ៍ព្យាយាម រក្សាបាននូវលទ្ធផលខ្ពស់។',
            ],

            // Student 6 - Ek Class (Graduation Class Rank 1)
            [
                'student_id' => 'PSD-2026-020',
                'student_name' => 'ព្រះតេជគុណ មាស សុភ័ក្ត្រ',
                'dharma_name' => 'ញាណវិជយោ',
                'gender' => 'ប្រុស',
                'grade_level' => 'ek',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'បាលីប្រែ និងតែងគាថាបាលី', 'score' => 98, 'max_score' => 100, 'teacher_notes' => 'តែងគាថាបាលីបានពិរោះ និងត្រឹមត្រូវតាមឆន្ទោលក្ខណ៍'],
                    ['subject' => 'បាលីវេយ្យាករណ៍ជាន់ខ្ពស់ (អាខ្យាត/កិតក៍)', 'score' => 95, 'max_score' => 100, 'teacher_notes' => 'ជំនាញជ្រៅជ្រះខាងកិតក៍'],
                    ['subject' => 'សមណវិន័យ និងបរមត្ថធម៌', 'score' => 94, 'max_score' => 100, 'teacher_notes' => 'ច្បាស់លាស់ទាំងបាលីនិងអត្ថន័យ'],
                    ['subject' => 'សាសនវិទ្យា និងប្រវត្តិពុទ្ធសាសនា', 'score' => 92, 'max_score' => 100, 'teacher_notes' => 'ការស្រាវជ្រាវទូលំទូលាយ'],
                    ['subject' => 'ភាសាអង់គ្លេស និងខ្មែរជាន់ខ្ពស់', 'score' => 91, 'max_score' => 100, 'teacher_notes' => 'ចំណេះដឹងភាសាខ្ពស់'],
                    ['subject' => 'វិធីសាស្ត្រទេសនា និងស្រាវជ្រាវ', 'score' => 96, 'max_score' => 100, 'teacher_notes' => 'វោហារស័ព្ទល្អ ទេសនាមានភាពទាក់ទាញ'],
                ],
                'total_score' => 566,
                'max_total' => 600,
                'average' => 94.33,
                'rank' => 1,
                'grade_mention' => 'ល្អប្រសើរ (A)',
                'status' => 'ជាប់កិត្តិយស',
                'remarks' => 'សមណសិស្សឆ្នើមថ្នាក់ឯ បេក្ខជនត្រៀមប្រឡងសញ្ញាបត្រពុទ្ធិកបឋមសិក្សាទូទាំងប្រទេស។',
            ],
            // Student 7 - Ek Class (Rank 2)
            [
                'student_id' => 'PSD-2026-021',
                'student_name' => 'ព្រះតេជគុណ ស៊ាន បូរិន',
                'dharma_name' => 'ធម្មបាលោ',
                'gender' => 'ប្រុស',
                'grade_level' => 'ek',
                'academic_year' => '២០២៥ - ២០២៦',
                'exam_type' => 'ឆមាសទី១',
                'scores' => [
                    ['subject' => 'បាលីប្រែ និងតែងគាថាបាលី', 'score' => 91, 'max_score' => 100, 'teacher_notes' => 'ល្អណាស់'],
                    ['subject' => 'បាលីវេយ្យាករណ៍ជាន់ខ្ពស់ (អាខ្យាត/កិតក៍)', 'score' => 89, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'សមណវិន័យ និងបរមត្ថធម៌', 'score' => 90, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'សាសនវិទ្យា និងប្រវត្តិពុទ្ធសាសនា', 'score' => 88, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'ភាសាអង់គ្លេស និងខ្មែរជាន់ខ្ពស់', 'score' => 86, 'max_score' => 100, 'teacher_notes' => 'ល្អ'],
                    ['subject' => 'វិធីសាស្ត្រទេសនា និងស្រាវជ្រាវ', 'score' => 92, 'max_score' => 100, 'teacher_notes' => 'ល្អណាស់'],
                ],
                'total_score' => 536,
                'max_total' => 600,
                'average' => 89.33,
                'rank' => 2,
                'grade_mention' => 'ល្អណាស់ (B)',
                'status' => 'ជាប់',
                'remarks' => 'សមណសិស្សមានទេពកោសល្យផ្នែកទេសនា និងបកប្រែគម្ពីរ។',
            ],
        ];

        foreach ($examResults as $res) {
            ExamResult::create($res);
        }

        // 2. Seed Timetables
        $days = ['ចន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍'];

        // Tri Class Schedule
        $triSchedule = [
            ['session' => 'ព្រឹក', 'time_slot' => '០៧:០០ - ០៨:១៥', 'subject' => 'ភាសាបាលី (នាម និងអក្ខរវិធី)', 'teacher_name' => 'ព្រះមហា សុវណ្ណជោតិ', 'room' => 'បន្ទប់លេខ ១'],
            ['session' => 'ព្រឹក', 'time_slot' => '០៨:៣០ - ០៩:៤៥', 'subject' => 'ពុទ្ធប្រវត្តិ និងវិន័យបឋម', 'teacher_name' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម', 'room' => 'បន្ទប់លេខ ១'],
            ['session' => 'ព្រឹក', 'time_slot' => '១០:០០ - ១១:០០', 'subject' => 'ធម្មវិភាគ និងសុភាសិត', 'teacher_name' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល', 'room' => 'បន្ទប់លេខ ១'],
            ['session' => 'រសៀល', 'time_slot' => '១៣:០០ - ០២:១៥', 'subject' => 'ភាសាខ្មែរ (តែងសេចក្ដី)', 'teacher_name' => 'លោកគ្រូ សុខ ពិសិដ្ឋ', 'room' => 'បន្ទប់លេខ ១'],
            ['session' => 'រសៀល', 'time_slot' => '០២:៣០ - ០៣:៤៥', 'subject' => 'គណិតវិទ្យា និងវិទ្យាសាស្ត្រ', 'teacher_name' => 'លោកគ្រូ សុខ ពិសិដ្ឋ', 'room' => 'បន្ទប់លេខ ១'],
            ['session' => 'រសៀល', 'time_slot' => '០៤:០០ - ០៤:៤៥', 'subject' => 'សមាធិ និងសូត្រធម៌ល្ងាច', 'teacher_name' => 'ព្រះគ្រូសូត្រស្តាំ', 'room' => 'សាលាធម្មសភា'],
        ];

        foreach ($days as $day) {
            foreach ($triSchedule as $idx => $item) {
                Timetable::create(array_merge($item, [
                    'grade_level' => 'tri',
                    'day_of_week' => $day,
                    'sort_order' => $idx + 1,
                ]));
            }
        }

        // Tho Class Schedule
        $thoSchedule = [
            ['session' => 'ព្រឹក', 'time_slot' => '០៧:០០ - ០៨:១៥', 'subject' => 'បាលីប្រែ (ធម្មបទដ្ឋកថា ភាគ១)', 'teacher_name' => 'ព្រះមហា សុវណ្ណជោតិ', 'room' => 'បន្ទប់លេខ ២'],
            ['session' => 'ព្រឹក', 'time_slot' => '០៨:៣០ - ០៩:៤៥', 'subject' => 'បាលីវេយ្យាករណ៍ (សមាស/តទ្ធិត)', 'teacher_name' => 'ព្រះមហា សុវណ្ណជោតិ', 'room' => 'បន្ទប់លេខ ២'],
            ['session' => 'ព្រឹក', 'time_slot' => '១០:០០ - ១១:០០', 'subject' => 'វិន័យមហាវិភង្គ', 'teacher_name' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម', 'room' => 'បន្ទប់លេខ ២'],
            ['session' => 'រសៀល', 'time_slot' => '១៣:០០ - ០២:១៥', 'subject' => 'អភិធម្មត្ថសង្គហៈបឋម', 'teacher_name' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល', 'room' => 'បន្ទប់លេខ ២'],
            ['session' => 'រសៀល', 'time_slot' => '០២:៣០ - ០៣:៤៥', 'subject' => 'ភាសាអង់គ្លេស & កុំព្យូទ័រ', 'teacher_name' => 'លោកគ្រូ សុខ ពិសិដ្ឋ', 'room' => 'បន្ទប់កុំព្យូទ័រ'],
            ['session' => 'រសៀល', 'time_slot' => '០៤:០០ - ០៤:៤៥', 'subject' => 'សមាធិ និងសូត្រធម៌ល្ងាច', 'teacher_name' => 'ព្រះគ្រូសូត្រឆ្វេង', 'room' => 'សាលាធម្មសភា'],
        ];

        foreach ($days as $day) {
            foreach ($thoSchedule as $idx => $item) {
                Timetable::create(array_merge($item, [
                    'grade_level' => 'tho',
                    'day_of_week' => $day,
                    'sort_order' => $idx + 1,
                ]));
            }
        }

        // Ek Class Schedule
        $ekSchedule = [
            ['session' => 'ព្រឹក', 'time_slot' => '០៧:០០ - ០៨:១៥', 'subject' => 'បាលីប្រែ និងតែងគាថាបាលី', 'teacher_name' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល', 'room' => 'បន្ទប់លេខ ៣'],
            ['session' => 'ព្រឹក', 'time_slot' => '០៨:៣០ - ០៩:៤៥', 'subject' => 'បាលីវេយ្យាករណ៍ជាន់ខ្ពស់ (អាខ្យាត/កិតក៍)', 'teacher_name' => 'ព្រះមហា សុវណ្ណជោតិ', 'room' => 'បន្ទប់លេខ ៣'],
            ['session' => 'ព្រឹក', 'time_slot' => '១០:០០ - ១១:០០', 'subject' => 'សមណវិន័យ និងបរមត្ថធម៌', 'teacher_name' => 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម', 'room' => 'បន្ទប់លេខ ៣'],
            ['session' => 'រសៀល', 'time_slot' => '១៣:០០ - ០២:១៥', 'subject' => 'សាសនវិទ្យា និងប្រវត្តិពុទ្ធសាសនា', 'teacher_name' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល', 'room' => 'បន្ទប់លេខ ៣'],
            ['session' => 'រសៀល', 'time_slot' => '០២:៣០ - ០៣:៤៥', 'subject' => 'វិធីសាស្ត្រទេសនា និងស្រាវជ្រាវ', 'teacher_name' => 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល', 'room' => 'បន្ទប់លេខ ៣'],
            ['session' => 'រសៀល', 'time_slot' => '០៤:០០ - ០៤:៤៥', 'subject' => 'សមាធិ និងសូត្រធម៌ល្ងាច', 'teacher_name' => 'ព្រះគ្រូសូត្រស្តាំ', 'room' => 'សាលាធម្មសភា'],
        ];

        foreach ($days as $day) {
            foreach ($ekSchedule as $idx => $item) {
                Timetable::create(array_merge($item, [
                    'grade_level' => 'ek',
                    'day_of_week' => $day,
                    'sort_order' => $idx + 1,
                ]));
            }
        }
    }
}

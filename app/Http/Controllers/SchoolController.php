<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Teacher;
use App\Models\Achievement;
use App\Models\Admission;
use App\Models\Gallery;
use App\Models\ExamResult;
use App\Models\Timetable;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        $teachers = Teacher::orderBy('sort_order', 'asc')->get();
        $achievements = Achievement::orderBy('rank', 'asc')->take(4)->get();
        $photos = Gallery::where('category', 'សាលារៀន')->take(6)->get();
        $recentHonors = ExamResult::where('rank', 1)->take(3)->get();

        return view('school.index', compact('classes', 'teachers', 'achievements', 'photos', 'recentHonors'));
    }

    public function curriculum()
    {
        $classes = SchoolClass::all();
        return view('school.curriculum', compact('classes'));
    }

    public function teachers()
    {
        $teachers = Teacher::orderBy('sort_order', 'asc')->get();
        return view('school.teachers', compact('teachers'));
    }

    public function achievements()
    {
        $achievements = Achievement::orderBy('rank', 'asc')->get();
        $honors = ExamResult::where('rank', '<=', 3)->orderBy('grade_level')->orderBy('rank')->get();
        return view('school.achievements', compact('achievements', 'honors'));
    }

    public function admissions()
    {
        $classes = SchoolClass::all();
        return view('school.admissions', compact('classes'));
    }

    public function storeAdmission(Request $request)
    {
        $validated = $request->validate([
            'applicant_name' => 'required|string|max:255',
            'dharma_name' => 'nullable|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'nullable|date',
            'parent_name' => 'nullable|string|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'nullable|string|max:500',
            'applied_grade' => 'required|string',
            'monk_status' => 'required|string',
            'previous_education' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:1000',
        ]);

        $validated['status'] = 'pending';

        Admission::create($validated);

        return redirect()->route('school.admissions')->with('success', 'ពាក្យស្នើសុំចុះឈ្មោះចូលរៀនត្រូវបានបញ្ជូនដោយជោគជ័យ! គណៈគ្រប់គ្រងសាលានឹងទាក់ទងមកលោកអ្នកក្នុងពេលឆាប់ៗនេះ។');
    }

    public function results(Request $request)
    {
        $search = trim($request->query('search', ''));
        $grade = $request->query('grade', 'all');
        $examType = $request->query('exam_type', 'all');

        $query = ExamResult::query();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('student_id', 'like', "%{$search}%")
                  ->orWhere('student_name', 'like', "%{$search}%")
                  ->orWhere('dharma_name', 'like', "%{$search}%");
            });
        }

        if ($grade && $grade !== 'all') {
            $query->where('grade_level', $grade);
        }

        if ($examType && $examType !== 'all') {
            $query->where('exam_type', $examType);
        }

        $results = !empty($search) || $grade !== 'all' || $examType !== 'all'
            ? $query->orderBy('rank', 'asc')->get()
            : collect();

        // Selected single result for detailed transcript card view
        $selectedResult = null;
        if ($request->has('view_id')) {
            $selectedResult = ExamResult::find($request->query('view_id'));
        } elseif ($results->count() === 1) {
            $selectedResult = $results->first();
        }

        $sampleStudents = ExamResult::take(6)->get();

        return view('school.results', compact('results', 'selectedResult', 'search', 'grade', 'examType', 'sampleStudents'));
    }

    public function resultSlip($id)
    {
        $result = ExamResult::findOrFail($id);
        return view('school.result_slip', compact('result'));
    }

    public function timetable(Request $request)
    {
        $currentGrade = $request->query('grade', 'tri');
        $currentTab = $request->query('tab', 'weekly'); // weekly or exam

        $days = ['ចន្ទ', 'អង្គារ', 'ពុធ', 'ព្រហស្បតិ៍', 'សុក្រ', 'សៅរ៍'];

        $timetables = Timetable::where('grade_level', $currentGrade)
            ->orderBy('sort_order', 'asc')
            ->get()
            ->groupBy('day_of_week');

        $teachers = Teacher::orderBy('sort_order', 'asc')->get();

        $examSchedules = [
            [
                'date' => 'ថ្ងៃចន្ទ ទី១៥ ខែមីនា ឆ្នាំ២០២៦',
                'lunar' => 'ថ្ងៃ ៧ កើត ខែផល្គុន',
                'morning_subject' => 'ភាសាបាលី (បាលីវេយ្យាករណ៍ / បាលីប្រែ)',
                'morning_time' => '០៧:៣០ - ១០:៣០ (៣ ម៉ោង)',
                'afternoon_subject' => 'វិន័យបិដក (សមណវិន័យ/មហាវិភង្គ)',
                'afternoon_time' => '០១:៣០ - ០៣:៣០ (២ ម៉ោង)',
                'room' => 'សាលប្រឡងធំ (អគារពុទ្ធិកបឋមសិក្សា)',
            ],
            [
                'date' => 'ថ្ងៃអង្គារ ទី១៦ ខែមីនា ឆ្នាំ២០២៦',
                'lunar' => 'ថ្ងៃ ៨ កើត ខែផល្គុន (ថ្ងៃសីល)',
                'morning_subject' => 'ធម្មវិភាគ និងពុទ្ធប្រវត្តិ / អភិធម្ម',
                'morning_time' => '០៧:៣០ - ០៩:៣០ (២ ម៉ោង)',
                'afternoon_subject' => 'ភាសាខ្មែរ (តែងសេចក្ដី និងអក្សរសាស្ត្រ)',
                'afternoon_time' => '០១:៣០ - ០៤:០០ (២ ម៉ោងកន្លះ)',
                'room' => 'សាលប្រឡងធំ (អគារពុទ្ធិកបឋមសិក្សា)',
            ],
            [
                'date' => 'ថ្ងៃពុធ ទី១៧ ខែមីនា ឆ្នាំ២០២៦',
                'lunar' => 'ថ្ងៃ ៩ កើត ខែផល្គុន',
                'morning_subject' => 'គណិតវិទ្យា និងវិទ្យាសាស្ត្រ / សាសនវិទ្យា',
                'morning_time' => '០៧:៣០ - ០៩:៣០ (២ ម៉ោង)',
                'afternoon_subject' => 'ភាសាអង់គ្លេស / វិធីសាស្ត្រទេសនា',
                'afternoon_time' => '០១:៣០ - ០៣:៣០ (២ ម៉ោង)',
                'room' => 'សាលប្រឡងធំ (អគារពុទ្ធិកបឋមសិក្សា)',
            ],
        ];

        return view('school.timetable', compact('timetables', 'currentGrade', 'currentTab', 'days', 'teachers', 'examSchedules'));
    }
}

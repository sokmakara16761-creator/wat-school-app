<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use App\Models\Admission;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Dhamma;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\SchoolClass;
use App\Models\Teacher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    /**
     * Home Summary API for Mobile App
     */
    public function home(): JsonResponse
    {
        $posts = Post::orderBy('published_at', 'desc')->take(4)->get();
        $events = Event::where('is_upcoming', true)->orderBy('start_date', 'asc')->take(3)->get();
        $dhamma = Dhamma::orderBy('published_at', 'desc')->take(3)->get();
        
        $stats = [
            'classes_count' => SchoolClass::count(),
            'students_count' => SchoolClass::sum('student_count'),
            'teachers_count' => Teacher::count(),
            'posts_count' => Post::count(),
            'dhamma_count' => Dhamma::count(),
            'events_count' => Event::count(),
        ];

        $pagodaInfo = [
            'name_kh' => 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
            'name_pali' => 'វត្តព្រៃស្ដី',
            'school_name' => 'សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
            'address' => 'ភូមិព្រៃស្ដី សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ',
            'abbot' => 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ (ព្រះចៅអធិការ)',
            'founded_year' => '១៩៦០',
            'buddhist_era' => '២៥៦៩',
            'phone' => '092 888 777 / 012 345 678',
            'email' => 'info@watpreysdei.edu.kh',
            'banner_images' => [
                url('/images/wat-hero.jpg'),
                url('/images/school-hero.jpg'),
                url('/images/dhamma-hero.jpg'),
            ]
        ];

        $dailyQuote = [
            'quote_kh' => 'ចិត្តដែលបានអប់រំល្អហើយ រមែងនាំមកនូវសេចក្តីសុខពិតប្រាកដ។',
            'quote_pali' => 'Cittaṃ dantaṃ sukhāvahaṃ',
            'source' => 'ធម្មបទដ្ឋកថា (ព្រះពុទ្ធភាសិត)',
        ];

        return response()->json([
            'success' => true,
            'data' => [
                'pagoda' => $pagodaInfo,
                'stats' => $stats,
                'daily_quote' => $dailyQuote,
                'latest_posts' => $posts,
                'upcoming_events' => $events,
                'latest_dhamma' => $dhamma,
            ]
        ]);
    }

    /**
     * Pagoda Details API
     */
    public function pagoda(): JsonResponse
    {
        $info = [
            'name_kh' => 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
            'location' => 'ភូមិព្រៃស្ដី សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ',
            'history' => 'វត្តធនរតនេសោភណារាម ហៅវត្តព្រៃស្ដី ត្រូវបានកសាងឡើងដើម្បីជាទីសក្ការបូជា និងជាមជ្ឈមណ្ឌលផ្សព្វផ្សាយព្រះពុទ្ធសាសនា និងការអប់រំសីលធម៌ក្នុងសង្គមខ្មែរ។ វត្តមានទីធ្លាធំទូលាយ មានព្រះវិហារ ឧបដ្ឋានសាលា កុដិសមណសិស្ស និងអគារពុទ្ធិកបឋមសិក្សា។',
            'abbot' => [
                'title' => 'ព្រះគ្រូសិរីធម្មវិជ្ជោ',
                'name' => 'សេង ថៃ',
                'role' => 'ព្រះចៅអធិការវត្ត និងជាទីប្រឹក្សាពុទ្ធិកបឋមសិក្សា',
                'bio' => 'ព្រះអង្គបានដឹកនាំកសាងសមិទ្ធផលនានាក្នុងវត្ត និងលើកកម្ពស់វិស័យពុទ្ធិកសិក្សាឱ្យមានការរីកចម្រើនគួរជាទីមោទនៈ។'
            ],
            'monk_count' => 85,
            'buildings' => [
                ['name' => 'ព្រះវិហារ', 'description' => 'ទីសក្ការៈបូជា និងប្រារព្ធពិធីសាសនាធំៗ'],
                ['name' => 'សាលាពុទ្ធិកបឋមសិក្សា', 'description' => 'អគារសិក្សា ៣ ជាន់ មាន ៦ បន្ទប់រៀន និងបណ្ណាល័យ'],
                ['name' => 'ធម្មសាលា / ឧបដ្ឋានសាលា', 'description' => 'ទីស្ដាប់ធម៌ និងប្រគេនចង្ហាន់'],
                ['name' => 'កុដិស្នាក់នៅសមណសិស្ស', 'description' => 'កន្លែងស្នាក់អាស្រ័យរបស់សមណសិស្សមកពីបណ្តាខេត្ត']
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $info
        ]);
    }

    /**
     * School API (Classes, Teachers, Achievements)
     */
    public function school(): JsonResponse
    {
        $classes = SchoolClass::all();
        $teachers = Teacher::orderBy('sort_order', 'asc')->get();
        $achievements = Achievement::orderBy('academic_year', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'classes' => $classes,
                'teachers' => $teachers,
                'achievements' => $achievements,
                'summary' => [
                    'name' => 'ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
                    'vision' => 'បណ្តុះបណ្តាលសមណសិស្សឱ្យមានចំណេះដឹងជ្រៅជ្រះទាំងផ្នែកពុទ្ធចក្រ និងអាណាចក្រ ប្រកបដោយសីលធម៌ សុជីវធម៌ និងសមត្ថភាពចូលរួមអភិវឌ្ឍសង្គមជាតិ។',
                    'curriculum_overview' => 'កម្មវិធីសិក្សា ៣ ឆ្នាំ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ) បង្រៀនដោយឥតគិតថ្លៃ ទាំងភាសាបាលី ព្រះត្រៃបិដក និងចំណេះដឹងទូទៅ។',
                ]
            ]
        ]);
    }

    /**
     * Submit Admission Online Form API
     */
    public function submitAdmission(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'applicant_name' => 'required|string|max:255',
            'gender' => 'required|string',
            'date_of_birth' => 'required|date',
            'parent_name' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:500',
            'applied_grade' => 'required|string',
            'monk_status' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'សូមបំពេញព័ត៌មានឱ្យបានត្រឹមត្រូវ',
                'errors' => $validator->errors()
            ], 422);
        }

        $admission = Admission::create([
            'applicant_name' => $request->applicant_name,
            'dharma_name' => $request->dharma_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'parent_name' => $request->parent_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'applied_grade' => $request->applied_grade,
            'monk_status' => $request->monk_status,
            'previous_education' => $request->previous_education,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'ពាក្យចុះឈ្មោះត្រូវបានបញ្ជូនដោយជោគជ័យ! សាលានឹងទាក់ទងមកលោកអ្នកវិញក្នុងពេលឆាប់ៗ។',
            'data' => $admission
        ], 201);
    }

    /**
     * Posts / News List API
     */
    public function posts(Request $request): JsonResponse
    {
        $query = Post::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $posts = $query->orderBy('published_at', 'desc')->paginate($request->get('per_page', 10));

        return response()->json([
            'success' => true,
            'data' => $posts
        ]);
    }

    /**
     * Post Detail API
     */
    public function postDetail($slugOrId): JsonResponse
    {
        $post = Post::where('slug', $slugOrId)->orWhere('id', $slugOrId)->firstOrFail();
        $post->increment('views');

        $related = Post::where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'post' => $post,
                'related' => $related
            ]
        ]);
    }

    /**
     * Dhamma Library API
     */
    public function dhamma(Request $request): JsonResponse
    {
        $query = Dhamma::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('preacher', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $items = $query->orderBy('published_at', 'desc')->paginate($request->get('per_page', 10));

        return response()->json([
            'success' => true,
            'data' => $items
        ]);
    }

    /**
     * Dhamma Detail API
     */
    public function dhammaDetail($slugOrId): JsonResponse
    {
        $dhamma = Dhamma::where('slug', $slugOrId)->orWhere('id', $slugOrId)->firstOrFail();
        $dhamma->increment('views');

        $related = Dhamma::where('id', '!=', $dhamma->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'dhamma' => $dhamma,
                'related' => $related
            ]
        ]);
    }

    /**
     * Events API
     */
    public function events(Request $request): JsonResponse
    {
        $upcoming = Event::where('is_upcoming', true)->orderBy('start_date', 'asc')->get();
        $past = Event::where('is_upcoming', false)->orderBy('start_date', 'desc')->take(10)->get();

        return response()->json([
            'success' => true,
            'data' => [
                'upcoming' => $upcoming,
                'past' => $past
            ]
        ]);
    }

    /**
     * Event Detail API
     */
    public function eventDetail($slugOrId): JsonResponse
    {
        $event = Event::where('slug', $slugOrId)->orWhere('id', $slugOrId)->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    /**
     * Gallery API
     */
    public function gallery(): JsonResponse
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $galleries
        ]);
    }

    /**
     * Donations & Bank Accounts API
     */
    public function donations(): JsonResponse
    {
        $donationData = [
            'title' => 'ចូលរួមបុណ្យកុសល និងឧបត្ថម្ភសាលាពុទ្ធិកបឋមសិក្សា',
            'description' => 'សូមអនុមោទនាកុសលចេតនាពីសំណាក់ពុទ្ធបរិស័ទជិតឆ្ងាយក្នុងការចូលរួមចំណែកទ្រទ្រង់ព្រះពុទ្ធសាសនា និងការសិក្សារបស់សមណសិស្សក្រីក្រ។',
            'bank_accounts' => [
                [
                    'bank_name' => 'ABA Bank',
                    'account_name' => 'WAT PREY SDEI PRIMARY SCHOOL',
                    'account_number' => '001 888 999',
                    'currency' => 'USD / KHR',
                    'qr_image' => url('/images/aba-qr.png'),
                ],
                [
                    'bank_name' => 'ACLEDA Bank',
                    'account_name' => 'WAT PREY SDEI CHARITY FUND',
                    'account_number' => '0123-4567-8901',
                    'currency' => 'KHR / USD',
                    'qr_image' => url('/images/acleda-qr.png'),
                ],
                [
                    'bank_name' => 'Wing Bank',
                    'account_name' => 'WAT PREY SDEI',
                    'account_number' => '092 888 777',
                    'currency' => 'USD / KHR',
                    'qr_image' => url('/images/wing-qr.png'),
                ]
            ],
            'campaigns' => [
                [
                    'title' => 'មូលនិធិទ្រទ្រង់ចង្ហាន់ និងអាហារូបករណ៍សមណសិស្ស',
                    'target_amount' => '$5,000 / ខែ',
                    'description' => 'សម្រាប់ផ្គត់ផ្គង់ចង្ហាន់ ទឹកភ្លើង សៀវភៅ និងសម្ភារសិក្សាដល់សមណសិស្សជាង ១០០ អង្គ/នាក់។'
                ],
                [
                    'title' => 'កសាងបណ្ណាល័យ និងបន្ទប់កុំព្យូទ័រ',
                    'target_amount' => '$12,000',
                    'description' => 'បំពាក់កុំព្យូទ័រ ២០ គ្រឿង សៀវភៅព្រះត្រៃបិដក និងតុសិក្សាទំនើប។'
                ]
            ]
        ];

        return response()->json([
            'success' => true,
            'data' => $donationData
        ]);
    }

    /**
     * Submit Contact Message API
     */
    public function submitContact(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'សូមបំពេញព័ត៌មានឱ្យបានត្រឹមត្រូវ',
                'errors' => $validator->errors()
            ], 422);
        }

        $message = ContactMessage::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'is_read' => false,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'សាររបស់អ្នកត្រូវបានបញ្ជូនដោយជោគជ័យ! សូមអរគុណ។',
            'data' => $message
        ], 201);
    }
}

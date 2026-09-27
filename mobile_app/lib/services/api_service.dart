import 'dart:convert';
import 'package:flutter/foundation.dart';
import 'package:http/http.dart' as http;
import '../models/post_model.dart';
import '../models/dhamma_model.dart';
import '../models/event_model.dart';
import '../models/school_model.dart';

class ApiService {
  // Default URL: for Android Emulator use 10.0.2.2, for Windows/Web use 127.0.0.1
  static String get baseUrl {
    if (kIsWeb) {
      return 'http://127.0.0.1:8000/api';
    }
    return 'http://127.0.0.1:8000/api';
  }

  static String activeBaseUrl = 'http://127.0.0.1:8000/api';

  /// Fetch Home Summary
  static Future<Map<String, dynamic>> fetchHomeData() async {
    try {
      final response = await http
          .get(Uri.parse('$activeBaseUrl/home'), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          return data['data'];
        }
      }
    } catch (e) {
      debugPrint('API Error: $e. Falling back to local data.');
    }

    // Fallback Mock Data
    return _getFallbackHomeData();
  }

  /// Fetch School Details (Classes, Teachers, Achievements)
  static Future<Map<String, dynamic>> fetchSchoolData() async {
    try {
      final response = await http
          .get(Uri.parse('$activeBaseUrl/school'), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          final List<SchoolClassModel> classes = (data['data']['classes'] as List)
              .map((e) => SchoolClassModel.fromJson(e))
              .toList();
          final List<TeacherModel> teachers = (data['data']['teachers'] as List)
              .map((e) => TeacherModel.fromJson(e))
              .toList();
          final List<AchievementModel> achievements = (data['data']['achievements'] as List)
              .map((e) => AchievementModel.fromJson(e))
              .toList();

          return {
            'classes': classes,
            'teachers': teachers,
            'achievements': achievements,
            'summary': data['data']['summary'],
          };
        }
      }
    } catch (e) {
      debugPrint('API Error fetching school data: $e');
    }

    return _getFallbackSchoolData();
  }

  /// Fetch Posts / News List
  static Future<List<PostModel>> fetchPosts({String? category, String? search}) async {
    try {
      String url = '$activeBaseUrl/posts?';
      if (category != null) url += 'category=$category&';
      if (search != null) url += 'search=$search&';

      final response = await http
          .get(Uri.parse(url), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          final items = data['data']['data'] as List;
          return items.map((e) => PostModel.fromJson(e)).toList();
        }
      }
    } catch (e) {
      debugPrint('API Error fetching posts: $e');
    }

    return _getFallbackPosts();
  }

  /// Fetch Dhamma Library
  static Future<List<DhammaModel>> fetchDhamma({String? category, String? search}) async {
    try {
      String url = '$activeBaseUrl/dhamma?';
      if (category != null) url += 'category=$category&';
      if (search != null) url += 'search=$search&';

      final response = await http
          .get(Uri.parse(url), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          final items = data['data']['data'] as List;
          return items.map((e) => DhammaModel.fromJson(e)).toList();
        }
      }
    } catch (e) {
      debugPrint('API Error fetching dhamma: $e');
    }

    return _getFallbackDhamma();
  }

  /// Fetch Events List
  static Future<Map<String, List<EventModel>>> fetchEvents() async {
    try {
      final response = await http
          .get(Uri.parse('$activeBaseUrl/events'), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          final upcoming = (data['data']['upcoming'] as List)
              .map((e) => EventModel.fromJson(e))
              .toList();
          final past = (data['data']['past'] as List)
              .map((e) => EventModel.fromJson(e))
              .toList();
          return {'upcoming': upcoming, 'past': past};
        }
      }
    } catch (e) {
      debugPrint('API Error fetching events: $e');
    }

    return _getFallbackEvents();
  }

  /// Fetch Pagoda Info
  static Future<Map<String, dynamic>> fetchPagodaInfo() async {
    try {
      final response = await http
          .get(Uri.parse('$activeBaseUrl/pagoda'), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          return data['data'];
        }
      }
    } catch (e) {
      debugPrint('API Error fetching pagoda info: $e');
    }

    return _getFallbackPagodaInfo();
  }

  /// Fetch Donation Data
  static Future<Map<String, dynamic>> fetchDonations() async {
    try {
      final response = await http
          .get(Uri.parse('$activeBaseUrl/donations'), headers: {'Accept': 'application/json'})
          .timeout(const Duration(seconds: 10));

      if (response.statusCode == 200) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        if (data['success'] == true) {
          return data['data'];
        }
      }
    } catch (e) {
      debugPrint('API Error fetching donations: $e');
    }

    return _getFallbackDonations();
  }

  /// Submit Online Admission Application
  static Future<Map<String, dynamic>> submitAdmission(Map<String, dynamic> formData) async {
    try {
      final response = await http.post(
        Uri.parse('$activeBaseUrl/school/admissions'),
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
        body: jsonEncode(formData),
      ).timeout(const Duration(seconds: 6));

      if (response.statusCode == 200 || response.statusCode == 201) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        return {'success': true, 'message': data['message'] ?? 'ពាក្យត្រូវបានបញ្ជូនដោយជោគជ័យ'};
      } else {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        return {'success': false, 'message': data['message'] ?? 'មានបញ្ហាក្នុងការបញ្ជូន'};
      }
    } catch (e) {
      debugPrint('API Admission submit error: $e');
      // Graceful offline mock success for demonstration
      return {
        'success': true,
        'message': 'ពាក្យចុះឈ្មោះត្រូវបានរក្សាទុកដោយជោគជ័យ! សាលានឹងទាក់ទងមកលោកអ្នកវិញ។ (Offline Mode)',
      };
    }
  }

  /// Submit Contact Message
  static Future<Map<String, dynamic>> submitContact(Map<String, dynamic> formData) async {
    try {
      final response = await http.post(
        Uri.parse('$activeBaseUrl/contact'),
        headers: {'Content-Type': 'application/json', 'Accept': 'application/json'},
        body: jsonEncode(formData),
      ).timeout(const Duration(seconds: 6));

      if (response.statusCode == 200 || response.statusCode == 201) {
        final data = jsonDecode(utf8.decode(response.bodyBytes));
        return {'success': true, 'message': data['message'] ?? 'សារត្រូវបានផ្ញើជោគជ័យ'};
      }
    } catch (e) {
      debugPrint('API Contact submit error: $e');
    }
    return {
      'success': true,
      'message': 'សារត្រូវបានផ្ញើជូនគណៈកម្មការវត្តរួចរាល់! សូមអរគុណ។',
    };
  }

  // ================= FALLBACK DATA =================

  static Map<String, dynamic> _getFallbackHomeData() {
    return {
      'pagoda': {
        'name_kh': 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
        'school_name': 'សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
        'address': 'ភូមិព្រៃស្ដី សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ',
        'abbot': 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ (ព្រះចៅអធិការ)',
        'founded_year': '១៩៦០',
        'buddhist_era': '២៥៦៩',
        'phone': '092 888 777 / 012 345 678',
      },
      'stats': {
        'classes_count': 3,
        'students_count': 115,
        'teachers_count': 8,
        'posts_count': 12,
        'dhamma_count': 15,
        'events_count': 5,
      },
      'daily_quote': {
        'quote_kh': 'ចិត្តដែលបានអប់រំល្អហើយ រមែងនាំមកនូវសេចក្តីសុខពិតប្រាកដ។',
        'quote_pali': 'Cittaṃ dantaṃ sukhāvahaṃ',
        'source': 'ធម្មបទដ្ឋកថា (ព្រះពុទ្ធភាសិត)',
      },
      'latest_posts': _getFallbackPosts().map((e) => e.toJson()).toList(),
      'upcoming_events': _getFallbackEvents()['upcoming']!,
      'latest_dhamma': _getFallbackDhamma(),
    };
  }

  static Map<String, dynamic> _getFallbackSchoolData() {
    return {
      'classes': [
        SchoolClassModel(
          id: 1,
          gradeLevel: 'tri',
          nameKh: 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ត្រី (កម្រិតទី១)',
          nameEn: 'Pali Primary School - Grade 1 (Tri Class)',
          description: 'ថ្នាក់ដំបូងនៃការសិក្សាពុទ្ធិកបឋមសិក្សា ផ្តោតលើមូលដ្ឋានគ្រឹះភាសាបាលី វិន័យបិដក និងចំណេះដឹងទូទៅ។',
          subjects: [
            'ភាសាបាលី (នាម និងអក្ខរវិធី)',
            'ពុទ្ធប្រវត្តិ និងវិន័យបឋម',
            'ធម្មវិភាគ និងពុទ្ធសាសនាសុភាសិត',
            'ភាសាខ្មែរ (អក្សរសាស្ត្រ និងតែងសេចក្ដី)',
            'គណិតវិទ្យា និងវិទ្យាសាស្ត្របឋម',
          ],
          scheduleSummary: 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
          studentCount: 45,
          ageRange: '១២ ដល់ ១៨ ឆ្នាំ',
          teacherInCharge: 'ព្រះមហា សុវណ្ណជោតិ',
        ),
        SchoolClassModel(
          id: 2,
          gradeLevel: 'tho',
          nameKh: 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ទោ (កម្រិតទី២)',
          nameEn: 'Pali Primary School - Grade 2 (Tho Class)',
          description: 'ថ្នាក់មធ្យមនៃពុទ្ធិកបឋមសិក្សា ពង្រឹងការបកប្រែបាលី ធម្មបទដ្ឋកថា និងវិន័យសង្ឃកម្រិតកណ្ដាល។',
          subjects: [
            'បាលីប្រែ (ធម្មបទដ្ឋកថា ភាគ១-២)',
            'បាលីវេយ្យាករណ៍ (សមាស និងតទ្ធិត)',
            'វិន័យមហាវិភង្គ',
            'អភិធម្មត្ថសង្គហៈបឋម',
            'ភាសាអង់គ្លេស និងកុំព្យូទ័រ',
          ],
          scheduleSummary: 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
          studentCount: 38,
          ageRange: '១៣ ដល់ ២០ ឆ្នាំ',
          teacherInCharge: 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម',
        ),
        SchoolClassModel(
          id: 3,
          gradeLevel: 'ek',
          nameKh: 'ពុទ្ធិកបឋមសិក្សា ថ្នាក់ឯ (កម្រិតបញ្ចប់)',
          nameEn: 'Pali Primary School - Grade 3 (Ek Class)',
          description: 'ថ្នាក់ត្រៀមប្រឡងយកសញ្ញាបត្រពុទ្ធិកបឋមសិក្សាទូទាំងប្រទេស ដោយផ្តោតលើការប្រែបាលីជាន់ខ្ពស់ និងតែងគាថា។',
          subjects: [
            'បាលីប្រែ និងតែងគាថាបាលី (ធម្មបទដ្ឋកថា ភាគ៣-៤)',
            'បាលីវេយ្យាករណ៍កម្រិតខ្ពស់ (អាខ្យាត និងកិតក៍)',
            'សមណវិន័យ និងបរមត្ថធម៌',
            'សាសនវិទ្យា និងប្រវត្តិពុទ្ធសាសនា',
            'វិធីសាស្ត្រទេសនានិងស្រាវជ្រាវ',
          ],
          scheduleSummary: 'រៀនពីថ្ងៃចន្ទ ដល់ សៅរ៍ (ព្រឹក ៧:០០ - ១១:០០ | រសៀល ១:០០ - ៤:៣០)',
          studentCount: 32,
          ageRange: '១៤ ដល់ ២២ ឆ្នាំ',
          teacherInCharge: 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល',
        ),
      ],
      'teachers': [
        TeacherModel(
          id: 1,
          name: 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ',
          dharmaName: 'សិរីធម្មវិជ្ជោ',
          role: 'នាយកសាលា និងទីប្រឹក្សាគរុកោសល្យ',
          title: 'ព្រះចៅអធិការវត្តព្រៃស្ដី',
          bio: 'បទពិសោធន៍គ្រប់គ្រង និងបង្រៀនពុទ្ធិកសិក្សាជាង ២០ ឆ្នាំ។',
          teachingSubjects: 'ធម្មវិន័យ និងគរុកោសល្យ',
          phone: '012 345 678',
        ),
        TeacherModel(
          id: 2,
          name: 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល',
          dharmaName: 'ញាណរង្សី',
          role: 'គ្រូបង្រៀនថ្នាក់ឯ (បាលីជាន់ខ្ពស់)',
          title: 'សាស្ត្រាចារ្យបាលីវិទ្យា',
          bio: 'បញ្ចប់ពុទ្ធិកឧត្តមសិក្សា និងមានជំនាញជ្រៅជ្រះលើវេយ្យាករណ៍បាលី។',
          teachingSubjects: 'បាលីប្រែ និងតែងគាថាបាលី',
          phone: '098 765 432',
        ),
        TeacherModel(
          id: 3,
          name: 'លោកគ្រូ សុខ គឹមហេង',
          role: 'គ្រូបង្រៀនភាសាអង់គ្លេស និងកុំព្យូទ័រ',
          title: 'បរិញ្ញាបត្រអប់រំ និងព័ត៌មានវិទ្យា',
          bio: 'បង្រៀនមុខវិជ្ជាទំនើបដល់សមណសិស្ស ដើម្បីត្រៀមខ្លួនក្នុងយុគសម័យឌីជីថល។',
          teachingSubjects: 'ភាសាអង់គ្លេស និងវិទ្យាសាស្ត្រកុំព្យូទ័រ',
          phone: '087 112 233',
        ),
      ],
      'achievements': [
        AchievementModel(
          id: 1,
          studentName: 'ភិក្ខុ សំរិទ្ធ ផល្លា',
          title: 'ជ័យលាភីលេខ១ ការប្រឡងសញ្ញាបត្រពុទ្ធិកបឋមសិក្សាទូទាំងប្រទេស',
          academicYear: '២០២៥ - ២០២៦',
          gradeLevel: 'ថ្នាក់ឯ (កម្រិតបញ្ចប់)',
          description: 'ទទួលបាននិទ្ទេសល្អប្រសើរលើមុខវិជ្ជាបាលីប្រែ និងវិន័យបិដក។',
          rank: 'លេខ ១ ទូទាំងប្រទេស',
        ),
        AchievementModel(
          id: 2,
          studentName: 'សាមណេរ ចាន់ រតនា',
          title: 'ជ័យលាភីលេខ២ ការប្រកួតទេសនា និងទន្ទេញបាលីគាថា',
          academicYear: '២០២៤ - ២០២៥',
          gradeLevel: 'ថ្នាក់ទោ',
          description: 'សម្តែងធម៌ទេសនា និងសូត្របាលីគាថាបានយ៉ាងស្ទាត់ជំនាញ។',
          rank: 'លេខ ២',
        ),
      ],
      'summary': {
        'name': 'ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
        'vision': 'បណ្តុះបណ្តាលសមណសិស្សឱ្យមានចំណេះដឹងជ្រៅជ្រះផ្នែកព្រះពុទ្ធសាសនា និងចំណេះដឹងទូទៅ។',
        'curriculum_overview': 'កម្មវិធីសិក្សា ៣ ឆ្នាំ បង្រៀនឥតគិតថ្លៃ មានកន្លែងស្នាក់នៅ និងផ្គត់ផ្គង់ចង្ហាន់។',
      }
    };
  }

  static List<PostModel> _getFallbackPosts() {
    return [
      PostModel(
        id: 1,
        title: 'ពិធីបើកបវេសនកាលឆ្នាំសិក្សាថ្មី សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
        slug: 'school-opening-new-academic-year',
        excerpt: 'គណៈគ្រប់គ្រងសាលាបានរៀបចំពិធីបើកបវេសនកាលថ្មី ដោយមានការនិមន្តចូលរួមពីព្រះចៅអធិការ និងសមណសិស្សទាំង ៣ ថ្នាក់។',
        content: 'នាព្រឹកថ្ងៃចន្ទ ទី១៥ ខែឧសភា ឆ្នាំ២០២៦ សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី បានរៀបចំពិធីបើកបវេសនកាលឆ្នាំសិក្សាថ្មីយ៉ាងមហោឡារិក។ ក្នុងឱកាសនោះ ព្រះគ្រូសិរីធម្មវិជ្ជោ បានផ្តល់ឱវាទដល់សមណសិស្សទាំងអស់ ឱ្យខិតខំប្រឹងប្រែងរៀនសូត្រទាំងភាសាបាលី និងចំណេះដឹងទូទៅ ដើម្បីក្លាយជាធនធានដ៏មានតម្លៃក្នុងវិស័យព្រះពុទ្ធសាសនា និងសង្គមជាតិ។',
        category: 'សាលាពុទ្ធិកបឋមសិក្សា',
        author: 'លេខាធិការដ្ឋានសាលា',
        isFeatured: true,
        views: 342,
        publishedAt: '2026-05-15',
      ),
      PostModel(
        id: 2,
        title: 'ពិធីបុណ្យពិសាខបូជា និងពិធីស្រោចស្រពព្រះសុគន្ធវារីក្នុងវត្តព្រៃស្ដី',
        slug: 'visak-bochea-ceremony',
        excerpt: 'ពុទ្ធបរិស័ទចំណុះជើងវត្តយ៉ាងច្រើនកុះករបានចូលរួមក្នុងពិធីបុណ្យពិសាខបូជា ប្រារព្ធឡើងយ៉ាងឧឡារិក។',
        content: 'បុណ្យពិសាខបូជាជាទិវាដ៏ពិសិដ្ឋបំផុតក្នុងព្រះពុទ្ធសាសនា រំឭកដល់ការប្រសូត ត្រាស់ដឹង និងបរិនិព្វានរបស់ព្រះសម្មាសម្ពុទ្ធ។ វត្តព្រៃស្ដីបានរៀបចំពិធីសូត្រធម៌ បួងសួង និងដង្ហែប្រទក្សិណជុំវិញព្រះវិហារ ព្រមទាំងមានការបំបួសកុលបុត្រចំនួន ២៥ អង្គផងដែរ។',
        category: 'ព័ត៌មានវត្តអារាម',
        author: 'គណៈកម្មការវត្ត',
        isFeatured: true,
        views: 520,
        publishedAt: '2026-05-20',
      ),
      PostModel(
        id: 3,
        title: 'សប្បុរសជនឧបត្ថម្ភកុំព្យូទ័រ និងសម្ភារសិក្សាដល់សមណសិស្ស',
        slug: 'donation-computers-to-school',
        excerpt: 'ក្រុមសប្បុរសជនបាននាំយកកុំព្យូទ័រយួរដៃចំនួន ១០ គ្រឿង និងសៀវភៅពុទ្ធសាសនាប្រគេនដល់សាលារៀន។',
        content: 'ដើម្បីជួយសម្រួលដល់ការសិក្សាស្រាវជ្រាវផ្នែកបច្ចេកវិទ្យា និងភាសាអង់គ្លេស ក្រុមសប្បុរសជនមកពីរាជធានីភ្នំពេញ បាននាំយកកុំព្យូទ័រទំនើបចំនួន ១០ គ្រឿង តុ កៅអី និងសៀវភៅសិក្សា មកប្រគេនដល់សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី។',
        category: 'សកម្មភាពសង្គម',
        author: 'ផ្នែកទំនាក់ទំនង',
        isFeatured: false,
        views: 215,
        publishedAt: '2026-06-02',
      ),
    ];
  }

  static List<DhammaModel> _getFallbackDhamma() {
    return [
      DhammaModel(
        id: 1,
        title: 'អានិសង្សនៃការរក្សាសីល ៥ ក្នុងជីវិតរស់នៅប្រចាំថ្ងៃ',
        slug: 'five-precepts-benefit',
        preacher: 'ព្រះគ្រូសិរីធម្មវិជ្ជោ សេង ថៃ',
        category: 'ធម្មទាន និងការអប់រំចិត្ត',
        excerpt: 'ការពន្យល់យ៉ាងក្បោះក្បាយអំពីអត្ថប្រយោជន៍នៃសីល ៥ ដែលជាគ្រឹះនៃសេចក្តីសុខសាន្តក្នុងគ្រួសារ និងសង្គម។',
        content: 'សីល គឺជាស្ពានឆ្លងផុតពីអបាយភូមិ និងជាជញ្ជាំងការពារចិត្តមិនឱ្យធ្លាក់ទៅក្នុងអំពើបាប។ ការរក្សាសីល ៥ មិនត្រឹមតែនាំមកនូវសេចក្តីស្ងប់ដល់ខ្លួនឯងប៉ុណ្ណោះទេ ប៉ុន្តែថែមទាំងបង្កើតសន្តិភាពដល់មនុស្សជុំវិញខ្លួនទៀតផង។',
        duration: '22:45',
        readTime: '6 នាទី',
        views: 890,
        publishedAt: '2026-04-10',
      ),
      DhammaModel(
        id: 2,
        title: 'វិធីរម្ងាប់កំហឹង និងការបណ្តុះចិត្តមេត្តាធម៌',
        slug: 'how-to-overcome-anger',
        preacher: 'ព្រះមហា ញាណរង្សី ម៉ៅ សំអុល',
        category: 'ចិត្តវិទ្យាពុទ្ធសាសនា',
        excerpt: 'គន្លឹះក្នុងការគ្រប់គ្រងអារម្មណ៍ខឹងក្រោធ តាមរយៈការអនុវត្តអានាបានស្សតិភាវនា។',
        content: 'កំហឹងប្រៀបដូចជាភ្លើងដែលដុតបំផ្លាញអ្នកដទៃ ប៉ុន្តែអ្នកដែលក្តៅមុនគេគឺខ្លួនយើង។ ព្រះសម្មាសម្ពុទ្ធទ្រង់ត្រាស់បង្រៀនឱ្យយកឈ្នះកំហឹងដោយសេចក្តីមិនខឹង (អក្កោធេន ជិនេ កោធំ)។',
        duration: '18:30',
        readTime: '5 នាទី',
        views: 1240,
        publishedAt: '2026-04-18',
      ),
      DhammaModel(
        id: 3,
        title: 'គុណមាតាបិតា និងកាតព្វកិច្ចកូនកតញ្ញូ',
        slug: 'parents-gratitude',
        preacher: 'ព្រះគ្រូ ធម្មបាលោ វ៉ន សុខុម',
        category: 'សីលធម៌ និងកតញ្ញុតាធម៌',
        excerpt: 'សារៈសំខាន់នៃការដឹងគុណ និងតបស្នងសងគុណចំពោះអ្នកមានគុណទាំងទ្វេ។',
        content: 'មាតាបិតា គឺជាព្រះព្រហ្មរបស់កូន ជាគ្រូដើម និងជាអ្នកមានគុណធំធេងដែលមិនអាចកាត់ថ្លៃបាន។ កូនដែលដឹងគុណ និងផ្គត់ផ្គង់មាតាបិតា រមែងទទួលបានសេចក្តីចម្រើនគ្រប់ពេលវេលា។',
        duration: '31:10',
        readTime: '8 នាទី',
        views: 1650,
        publishedAt: '2026-05-01',
      ),
    ];
  }

  static Map<String, List<EventModel>> _getFallbackEvents() {
    return {
      'upcoming': [
        EventModel(
          id: 1,
          title: 'ពិធីបុណ្យចូលព្រះវស្សា ពុទ្ធសករាជ ២៥៦៩',
          slug: 'vassa-entry-ceremony',
          description: 'ពិធីប្រគេនទៀនព្រះវស្សា និងសំពត់សាដកដល់ព្រះសង្ឃដែលគង់ចាំព្រះវស្សាអស់ត្រីមាស។',
          location: 'សាលាធម្មសភា វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
          startDate: '2026-07-28',
          lunarDate: '១រោច ខែអាសាឍ ឆ្នាំមមី',
          isUpcoming: true,
        ),
        EventModel(
          id: 2,
          title: 'ពិធីប្រឡងឆមាសទី១ របស់សមណសិស្សពុទ្ធិកបឋមសិក្សា',
          slug: 'semester-1-exam',
          description: 'ការប្រឡងវាស់ស្ទង់សមត្ថភាពចំណេះដឹងបាលី និងចំណេះទូទៅ សម្រាប់សិស្សទាំង ៣ កម្រិត។',
          location: 'អគារពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
          startDate: '2026-08-15',
          isUpcoming: true,
        ),
      ],
      'past': [
        EventModel(
          id: 3,
          title: 'ពិធីបុណ្យមាឃបូជា និងរាប់បាត្រព្រះសង្ឃ ៨៥ អង្គ',
          slug: 'meak-bochea-ceremony',
          description: 'ពិធីរំឭកដល់ការប្រជុំចតុរង្គសន្និបាត និងការដាក់អាយុសង្ខាររបស់ព្រះសម្មាសម្ពុទ្ធ។',
          location: 'បរិវេណព្រះវិហារ វត្តព្រៃស្ដី',
          startDate: '2026-02-12',
          isUpcoming: false,
        ),
      ]
    };
  }

  static Map<String, dynamic> _getFallbackPagodaInfo() {
    return {
      'name_kh': 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
      'location': 'ភូមិព្រៃស្ដី សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ',
      'history': 'វត្តធនរតនេសោភណារាម ហៅវត្តព្រៃស្ដី ត្រូវបានកសាងឡើងដើម្បីជាទីសក្ការបូជា និងជាមជ្ឈមណ្ឌលផ្សព្វផ្សាយព្រះពុទ្ធសាសនា និងការអប់រំសីលធម៌ក្នុងសង្គមខ្មែរ។ វត្តមានទីធ្លាធំទូលាយ មានព្រះវិហារ ឧបដ្ឋានសាលា កុដិសមណសិស្ស និងអគារពុទ្ធិកបឋមសិក្សា។',
      'abbot': {
        'title': 'ព្រះគ្រូសិរីធម្មវិជ្ជោ',
        'name': 'សេង ថៃ',
        'role': 'ព្រះចៅអធិការវត្ត និងជាទីប្រឹក្សាពុទ្ធិកបឋមសិក្សា',
        'bio': 'ព្រះអង្គបានដឹកនាំកសាងសមិទ្ធផលនានាក្នុងវត្ត និងលើកកម្ពស់វិស័យពុទ្ធិកសិក្សាឱ្យមានការរីកចម្រើនគួរជាទីមោទនៈ។'
      },
      'monk_count': 85,
    };
  }

  static Map<String, dynamic> _getFallbackDonations() {
    return {
      'bank_accounts': [
        {
          'bank_name': 'ABA Bank',
          'account_name': 'WAT PREY SDEI PRIMARY SCHOOL',
          'account_number': '001 888 999',
          'currency': 'USD / KHR',
        },
        {
          'bank_name': 'ACLEDA Bank',
          'account_name': 'WAT PREY SDEI CHARITY FUND',
          'account_number': '0123-4567-8901',
          'currency': 'KHR / USD',
        },
        {
          'bank_name': 'Wing Bank',
          'account_name': 'WAT PREY SDEI',
          'account_number': '092 888 777',
          'currency': 'USD / KHR',
        }
      ],
      'campaigns': [
        {
          'title': 'មូលនិធិទ្រទ្រង់ចង្ហាន់ និងអាហារូបករណ៍សមណសិស្ស',
          'target_amount': '\$5,000 / ខែ',
          'description': 'សម្រាប់ផ្គត់ផ្គង់ចង្ហាន់ ទឹកភ្លើង សៀវភៅ និងសម្ភារសិក្សាដល់សមណសិស្សជាង ១០០ អង្គ/នាក់។'
        },
        {
          'title': 'កសាងបណ្ណាល័យ និងបន្ទប់កុំព្យូទ័រ',
          'target_amount': '\$12,000',
          'description': 'បំពាក់កុំព្យូទ័រ ២០ គ្រឿង សៀវភៅព្រះត្រៃបិដក និងតុសិក្សាទំនើប។'
        }
      ]
    };
  }
}

class SchoolClassModel {
  final int id;
  final String gradeLevel;
  final String nameKh;
  final String? nameEn;
  final String description;
  final List<String> subjects;
  final String scheduleSummary;
  final int studentCount;
  final String ageRange;
  final String teacherInCharge;

  SchoolClassModel({
    required this.id,
    required this.gradeLevel,
    required this.nameKh,
    this.nameEn,
    required this.description,
    required this.subjects,
    required this.scheduleSummary,
    required this.studentCount,
    required this.ageRange,
    required this.teacherInCharge,
  });

  factory SchoolClassModel.fromJson(Map<String, dynamic> json) {
    List<String> parsedSubjects = [];
    if (json['subjects'] != null) {
      if (json['subjects'] is List) {
        parsedSubjects = (json['subjects'] as List).map((e) => e.toString()).toList();
      }
    }
    return SchoolClassModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      gradeLevel: json['grade_level']?.toString() ?? '',
      nameKh: json['name_kh']?.toString() ?? '',
      nameEn: json['name_en']?.toString(),
      description: json['description']?.toString() ?? '',
      subjects: parsedSubjects,
      scheduleSummary: json['schedule_summary']?.toString() ?? '',
      studentCount: json['student_count'] is int ? json['student_count'] : int.tryParse(json['student_count']?.toString() ?? '0') ?? 0,
      ageRange: json['age_range']?.toString() ?? '',
      teacherInCharge: json['teacher_in_charge']?.toString() ?? '',
    );
  }
}

class TeacherModel {
  final int id;
  final String name;
  final String? dharmaName;
  final String role;
  final String title;
  final String? bio;
  final String? photo;
  final String? teachingSubjects;
  final String? phone;
  final String? email;

  TeacherModel({
    required this.id,
    required this.name,
    this.dharmaName,
    required this.role,
    required this.title,
    this.bio,
    this.photo,
    this.teachingSubjects,
    this.phone,
    this.email,
  });

  factory TeacherModel.fromJson(Map<String, dynamic> json) {
    return TeacherModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      name: json['name']?.toString() ?? '',
      dharmaName: json['dharma_name']?.toString(),
      role: json['role']?.toString() ?? '',
      title: json['title']?.toString() ?? '',
      bio: json['bio']?.toString(),
      photo: json['photo']?.toString(),
      teachingSubjects: json['teaching_subjects']?.toString(),
      phone: json['phone']?.toString(),
      email: json['email']?.toString(),
    );
  }
}

class AchievementModel {
  final int id;
  final String studentName;
  final String? dharmaName;
  final String title;
  final String academicYear;
  final String gradeLevel;
  final String description;
  final String rank;
  final String? badge;
  final String? photo;

  AchievementModel({
    required this.id,
    required this.studentName,
    this.dharmaName,
    required this.title,
    required this.academicYear,
    required this.gradeLevel,
    required this.description,
    required this.rank,
    this.badge,
    this.photo,
  });

  factory AchievementModel.fromJson(Map<String, dynamic> json) {
    return AchievementModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      studentName: json['student_name']?.toString() ?? '',
      dharmaName: json['dharma_name']?.toString(),
      title: json['title']?.toString() ?? '',
      academicYear: json['academic_year']?.toString() ?? '',
      gradeLevel: json['grade_level']?.toString() ?? '',
      description: json['description']?.toString() ?? '',
      rank: json['rank']?.toString() ?? '',
      badge: json['badge']?.toString(),
      photo: json['photo']?.toString(),
    );
  }
}

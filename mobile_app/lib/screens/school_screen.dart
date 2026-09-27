import 'package:flutter/material.dart';
import '../models/school_model.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';
import 'admission_form_screen.dart';

class SchoolScreen extends StatefulWidget {
  const SchoolScreen({super.key});

  @override
  State<SchoolScreen> createState() => _SchoolScreenState();
}

class _SchoolScreenState extends State<SchoolScreen> with SingleTickerProviderStateMixin {
  late TabController _tabController;
  bool _isLoading = true;
  List<SchoolClassModel> _classes = [];
  List<TeacherModel> _teachers = [];
  List<AchievementModel> _achievements = [];

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: 3, vsync: this);
    _loadData();
  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    final data = await ApiService.fetchSchoolData();
    setState(() {
      _classes = (data['classes'] as List<SchoolClassModel>?) ?? [];
      _teachers = (data['teachers'] as List<TeacherModel>?) ?? [];
      _achievements = (data['achievements'] as List<AchievementModel>?) ?? [];
      _isLoading = false;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'ពុទ្ធិកបឋមសិក្សា',
        subtitle: 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh_rounded, color: Colors.white),
            onPressed: _loadData,
          ),
        ],
      ),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator(color: AppColors.saffronPrimary))
          : Column(
              children: [
                // Top Banner
                Container(
                  padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                  decoration: BoxDecoration(
                    color: AppColors.lotusAmber.withValues(alpha: 0.3),
                    border: const Border(bottom: BorderSide(color: AppColors.borderLight)),
                  ),
                  child: Row(
                    children: [
                      const Icon(Icons.school_rounded, color: AppColors.saffronDark, size: 24),
                      const SizedBox(width: 10),
                      const Expanded(
                        child: Text(
                          'កម្មវិធីសិក្សា ៣ ឆ្នាំ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ)',
                          style: TextStyle(fontSize: 12, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                        ),
                      ),
                      ElevatedButton(
                        onPressed: () {
                          Navigator.of(context).push(
                            MaterialPageRoute(builder: (_) => const AdmissionFormScreen()),
                          );
                        },
                        style: ElevatedButton.styleFrom(
                          padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 6),
                          textStyle: const TextStyle(fontSize: 12, fontWeight: FontWeight.bold),
                        ),
                        child: const Text('ចុះឈ្មោះ'),
                      ),
                    ],
                  ),
                ),

                // Tab Bar
                Container(
                  color: Colors.white,
                  child: TabBar(
                    controller: _tabController,
                    labelColor: AppColors.maroonPrimary,
                    unselectedLabelColor: AppColors.textMuted,
                    indicatorColor: AppColors.saffronPrimary,
                    indicatorWeight: 3,
                    labelStyle: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13),
                    tabs: const [
                      Tab(text: 'កម្រិតថ្នាក់រៀន', icon: Icon(Icons.menu_book_rounded, size: 18)),
                      Tab(text: 'សមណគ្រូ', icon: Icon(Icons.person_pin_rounded, size: 18)),
                      Tab(text: 'តារាងកិត្តិយស', icon: Icon(Icons.military_tech_rounded, size: 18)),
                    ],
                  ),
                ),

                // Tab Views
                Expanded(
                  child: TabBarView(
                    controller: _tabController,
                    children: [
                      _buildClassesList(),
                      _buildTeachersList(),
                      _buildAchievementsList(),
                    ],
                  ),
                ),
              ],
            ),
    );
  }

  Widget _buildClassesList() {
    return ListView.builder(
      padding: const EdgeInsets.all(16),
      itemCount: _classes.length,
      itemBuilder: (context, index) {
        final c = _classes[index];
        return Card(
          margin: const EdgeInsets.only(bottom: 16),
          child: Padding(
            padding: const EdgeInsets.all(16),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Expanded(
                      child: Text(
                        c.nameKh,
                        style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 15, color: AppColors.maroonPrimary),
                      ),
                    ),
                    Container(
                      padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 4),
                      decoration: BoxDecoration(
                        color: AppColors.saffronLight.withValues(alpha: 0.25),
                        borderRadius: BorderRadius.circular(8),
                      ),
                      child: Text(
                        '${c.studentCount} អង្គ/នាក់',
                        style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 11, color: AppColors.saffronDark),
                      ),
                    ),
                  ],
                ),
                const SizedBox(height: 8),
                Text(
                  c.description,
                  style: const TextStyle(fontSize: 12, color: AppColors.textDark, height: 1.5),
                ),
                const SizedBox(height: 12),
                const Divider(),
                const SizedBox(height: 6),
                const Text(
                  'មុខវិជ្ជាសិក្សា៖',
                  style: TextStyle(fontWeight: FontWeight.bold, fontSize: 12, color: AppColors.saffronDark),
                ),
                const SizedBox(height: 6),
                Wrap(
                  spacing: 6,
                  runSpacing: 6,
                  children: c.subjects.map((sub) {
                    return Container(
                      padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 3),
                      decoration: BoxDecoration(
                        color: Colors.grey.shade100,
                        borderRadius: BorderRadius.circular(6),
                        border: Border.all(color: Colors.grey.shade300),
                      ),
                      child: Text(sub, style: const TextStyle(fontSize: 11)),
                    );
                  }).toList(),
                ),
                const SizedBox(height: 12),
                Row(
                  children: [
                    const Icon(Icons.schedule_rounded, size: 14, color: AppColors.textMuted),
                    const SizedBox(width: 4),
                    Expanded(
                      child: Text(
                        c.scheduleSummary,
                        style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                      ),
                    ),
                  ],
                ),
                const SizedBox(height: 6),
                Row(
                  children: [
                    const Icon(Icons.person_rounded, size: 14, color: AppColors.textMuted),
                    const SizedBox(width: 4),
                    Text(
                      'ប្រធានថ្នាក់/ទទួលបន្ទុក៖ ${c.teacherInCharge}',
                      style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                    ),
                  ],
                ),
              ],
            ),
          ),
        );
      },
    );
  }

  Widget _buildTeachersList() {
    return ListView.builder(
      padding: const EdgeInsets.all(16),
      itemCount: _teachers.length,
      itemBuilder: (context, index) {
        final t = _teachers[index];
        return Card(
          margin: const EdgeInsets.only(bottom: 14),
          child: Padding(
            padding: const EdgeInsets.all(14),
            child: Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  width: 50,
                  height: 50,
                  decoration: BoxDecoration(
                    color: AppColors.saffronLight.withValues(alpha: 0.3),
                    shape: BoxShape.circle,
                    border: Border.all(color: AppColors.saffronPrimary),
                  ),
                  child: const Icon(Icons.person_rounded, color: AppColors.maroonPrimary, size: 30),
                ),
                const SizedBox(width: 14),
                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        t.name,
                        style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 14, color: AppColors.maroonPrimary),
                      ),
                      const SizedBox(height: 2),
                      Text(
                        t.role,
                        style: const TextStyle(fontWeight: FontWeight.w600, fontSize: 12, color: AppColors.saffronDark),
                      ),
                      if (t.teachingSubjects != null) ...[
                        const SizedBox(height: 4),
                        Text(
                          'បង្រៀន៖ ${t.teachingSubjects}',
                          style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                        ),
                      ],
                      if (t.phone != null) ...[
                        const SizedBox(height: 4),
                        Row(
                          children: [
                            const Icon(Icons.phone_rounded, size: 12, color: AppColors.textMuted),
                            const SizedBox(width: 4),
                            Text(t.phone!, style: const TextStyle(fontSize: 11, color: AppColors.textMuted)),
                          ],
                        ),
                      ],
                    ],
                  ),
                ),
              ],
            ),
          ),
        );
      },
    );
  }

  Widget _buildAchievementsList() {
    return ListView.builder(
      padding: const EdgeInsets.all(16),
      itemCount: _achievements.length,
      itemBuilder: (context, index) {
        final a = _achievements[index];
        return Card(
          margin: const EdgeInsets.only(bottom: 14),
          child: Padding(
            padding: const EdgeInsets.all(16),
            child: Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Container(
                  padding: const EdgeInsets.all(10),
                  decoration: BoxDecoration(
                    color: Colors.amber.shade100,
                    shape: BoxShape.circle,
                  ),
                  child: const Icon(Icons.emoji_events_rounded, color: Colors.amber, size: 28),
                ),
                const SizedBox(width: 14),
                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        a.studentName,
                        style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 14, color: AppColors.maroonPrimary),
                      ),
                      const SizedBox(height: 4),
                      Text(
                        a.title,
                        style: const TextStyle(fontWeight: FontWeight.w600, fontSize: 12, color: AppColors.saffronDark),
                      ),
                      const SizedBox(height: 6),
                      Text(
                        a.description,
                        style: const TextStyle(fontSize: 11, color: AppColors.textDark, height: 1.4),
                      ),
                      const SizedBox(height: 8),
                      Container(
                        padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 2),
                        decoration: BoxDecoration(
                          color: AppColors.saffronPrimary.withValues(alpha: 0.1),
                          borderRadius: BorderRadius.circular(6),
                        ),
                        child: Text(
                          '${a.rank} • ឆ្នាំ ${a.academicYear}',
                          style: const TextStyle(fontSize: 10, fontWeight: FontWeight.bold, color: AppColors.saffronDark),
                        ),
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        );
      },
    );
  }
}

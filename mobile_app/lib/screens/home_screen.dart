import 'package:flutter/material.dart';
import '../models/post_model.dart';
import '../models/event_model.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import 'post_detail_screen.dart';
import 'admission_form_screen.dart';

class HomeScreen extends StatefulWidget {
  final Function(int)? onNavigateTab;

  const HomeScreen({super.key, this.onNavigateTab});

  @override
  State<HomeScreen> createState() => _HomeScreenState();
}

class _HomeScreenState extends State<HomeScreen> {
  bool _isLoading = true;
  Map<String, dynamic> _homeData = {};

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    final data = await ApiService.fetchHomeData();
    setState(() {
      _homeData = data;
      _isLoading = false;
    });
  }

  @override
  Widget build(BuildContext context) {
    if (_isLoading) {
      return const Scaffold(
        body: Center(
          child: CircularProgressIndicator(color: AppColors.saffronPrimary),
        ),
      );
    }

    final stats = _homeData['stats'] as Map<String, dynamic>? ?? {};
    final quote = _homeData['daily_quote'] as Map<String, dynamic>? ?? {};
    final rawPosts = _homeData['latest_posts'] as List? ?? [];
    final posts = rawPosts.map((e) => e is PostModel ? e : PostModel.fromJson(e)).toList();
    final rawEvents = _homeData['upcoming_events'] as List? ?? [];
    final events = rawEvents.map((e) => e is EventModel ? e : EventModel.fromJson(e)).toList();

    return Scaffold(
      body: RefreshIndicator(
        onRefresh: _loadData,
        color: AppColors.saffronPrimary,
        child: CustomScrollView(
          physics: const AlwaysScrollableScrollPhysics(),
          slivers: [
            // Custom Sliver App Bar with Hero Header
            SliverAppBar(
              expandedHeight: 200,
              floating: false,
              pinned: true,
              backgroundColor: AppColors.maroonPrimary,
              flexibleSpace: FlexibleSpaceBar(
                titlePadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
                title: const Row(
                  children: [
                    Icon(Icons.temple_buddhist_rounded, color: AppColors.saffronLight, size: 20),
                    SizedBox(width: 8),
                    Expanded(
                      child: Text(
                        'វត្តធនរតនេសោភណារាម',
                        style: TextStyle(
                          color: Colors.white,
                          fontSize: 14,
                          fontWeight: FontWeight.bold,
                        ),
                        maxLines: 1,
                        overflow: TextOverflow.ellipsis,
                      ),
                    ),
                  ],
                ),
                background: Stack(
                  fit: StackFit.expand,
                  children: [
                    Container(
                      decoration: const BoxDecoration(
                        gradient: LinearGradient(
                          begin: Alignment.topCenter,
                          end: Alignment.bottomCenter,
                          colors: [
                            Color(0xFF450A0A),
                            Color(0xFF7F1D1D),
                            Color(0xFFD97706),
                          ],
                        ),
                      ),
                    ),
                    // Pattern overlay
                    Positioned(
                      right: -30,
                      bottom: -20,
                      child: Icon(
                        Icons.brightness_7_rounded,
                        size: 180,
                        color: Colors.white.withValues(alpha: 0.08),
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.only(left: 20, right: 20, top: 40),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Container(
                            padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                            decoration: BoxDecoration(
                              color: AppColors.saffronLight.withValues(alpha: 0.25),
                              borderRadius: BorderRadius.circular(20),
                              border: Border.all(color: AppColors.saffronLight.withValues(alpha: 0.4)),
                            ),
                            child: const Text(
                              '☸ ពុទ្ធសករាជ ២៥៦៩',
                              style: TextStyle(
                                color: AppColors.lotusAmber,
                                fontSize: 11,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                          const SizedBox(height: 8),
                          const Text(
                            'វត្តព្រៃស្ដី & ពុទ្ធិកបឋមសិក្សា',
                            style: TextStyle(
                              color: Colors.white,
                              fontSize: 18,
                              fontWeight: FontWeight.bold,
                            ),
                          ),
                          const SizedBox(height: 4),
                          const Text(
                            'ទីសក្ការៈបូជា និងថ្នាលបណ្តុះបណ្តាលសមណសិស្ស',
                            style: TextStyle(
                              color: AppColors.lotusAmber,
                              fontSize: 12,
                            ),
                          ),
                        ],
                      ),
                    )
                  ],
                ),
              ),
            ),

            // Main Content Area
            SliverToBoxAdapter(
              child: Padding(
                padding: const EdgeInsets.all(16),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    // Daily Dhamma Quote Card
                    if (quote.isNotEmpty) ...[
                      Container(
                        padding: const EdgeInsets.all(16),
                        decoration: BoxDecoration(
                          gradient: LinearGradient(
                            colors: [
                              AppColors.lotusAmber.withValues(alpha: 0.35),
                              Colors.white,
                            ],
                            begin: Alignment.topLeft,
                            end: Alignment.bottomRight,
                          ),
                          borderRadius: BorderRadius.circular(16),
                          border: Border.all(color: AppColors.saffronLight.withValues(alpha: 0.6)),
                          boxShadow: [
                            BoxShadow(
                              color: AppColors.saffronPrimary.withValues(alpha: 0.06),
                              blurRadius: 10,
                              offset: const Offset(0, 3),
                            )
                          ],
                        ),
                        child: Row(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Container(
                              padding: const EdgeInsets.all(8),
                              decoration: BoxDecoration(
                                color: AppColors.saffronPrimary.withValues(alpha: 0.15),
                                shape: BoxShape.circle,
                              ),
                              child: const Icon(Icons.format_quote_rounded, color: AppColors.saffronDark, size: 22),
                            ),
                            const SizedBox(width: 12),
                            Expanded(
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    quote['quote_kh'] ?? '',
                                    style: const TextStyle(
                                      fontWeight: FontWeight.bold,
                                      fontSize: 13,
                                      color: AppColors.saffronDeep,
                                      height: 1.4,
                                    ),
                                  ),
                                  const SizedBox(height: 4),
                                  Text(
                                    quote['source'] ?? 'ព្រះពុទ្ធភាសិត',
                                    style: const TextStyle(
                                      fontSize: 11,
                                      color: AppColors.textMuted,
                                      fontStyle: FontStyle.italic,
                                    ),
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                      const SizedBox(height: 20),
                    ],

                    // Quick Action Menu Grid
                    const Text(
                      'មុខងាររហ័ស',
                      style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                    ),
                    const SizedBox(height: 12),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        _buildQuickActionItem(
                          icon: Icons.school_rounded,
                          label: 'សាលារៀន',
                          color: const Color(0xFFD97706),
                          onTap: () => widget.onNavigateTab?.call(1),
                        ),
                        _buildQuickActionItem(
                          icon: Icons.record_voice_over_rounded,
                          label: 'ព្រះធម៌',
                          color: const Color(0xFF991B1B),
                          onTap: () => widget.onNavigateTab?.call(2),
                        ),
                        _buildQuickActionItem(
                          icon: Icons.how_to_reg_rounded,
                          label: 'ចុះឈ្មោះរៀន',
                          color: const Color(0xFF0D9488),
                          onTap: () {
                            Navigator.of(context).push(
                              MaterialPageRoute(builder: (_) => const AdmissionFormScreen()),
                            );
                          },
                        ),
                        _buildQuickActionItem(
                          icon: Icons.volunteer_activism_rounded,
                          label: 'បរិច្ចាគ',
                          color: const Color(0xFFE11D48),
                          onTap: () => widget.onNavigateTab?.call(4),
                        ),
                      ],
                    ),
                    const SizedBox(height: 24),

                    // Stats Banner Card
                    Container(
                      padding: const EdgeInsets.symmetric(vertical: 14, horizontal: 16),
                      decoration: BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.circular(16),
                        border: Border.all(color: AppColors.borderLight),
                        boxShadow: [
                          BoxShadow(
                            color: Colors.black.withValues(alpha: 0.04),
                            blurRadius: 8,
                            offset: const Offset(0, 2),
                          ),
                        ],
                      ),
                      child: Row(
                        mainAxisAlignment: MainAxisAlignment.spaceAround,
                        children: [
                          _buildStatItem('សមណសិស្ស', '${stats['students_count'] ?? 115}', Icons.groups_rounded),
                          Container(height: 30, width: 1, color: Colors.grey.shade200),
                          _buildStatItem('កម្រិតថ្នាក់', '${stats['classes_count'] ?? 3}', Icons.class_rounded),
                          Container(height: 30, width: 1, color: Colors.grey.shade200),
                          _buildStatItem('សមណគ្រូ', '${stats['teachers_count'] ?? 8}', Icons.person_pin_rounded),
                        ],
                      ),
                    ),
                    const SizedBox(height: 24),

                    // Upcoming Events Section
                    if (events.isNotEmpty) ...[
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          const Text(
                            '📅 កម្មវិធីបុណ្យខាងមុខ',
                            style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                          ),
                          TextButton(
                            onPressed: () => widget.onNavigateTab?.call(3),
                            child: const Text('មើលទាំងអស់ >', style: TextStyle(color: AppColors.saffronDark, fontSize: 12)),
                          ),
                        ],
                      ),
                      const SizedBox(height: 8),
                      ...events.take(2).map((ev) => _buildEventCard(ev)),
                      const SizedBox(height: 20),
                    ],

                    // Latest News Section
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text(
                          '📰 ព័ត៌មាន និងសកម្មភាពថ្មីៗ',
                          style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                        ),
                        TextButton(
                          onPressed: () => widget.onNavigateTab?.call(0),
                          child: const Text('ព័ត៌មានទាំងអស់', style: TextStyle(color: AppColors.saffronDark, fontSize: 12)),
                        ),
                      ],
                    ),
                    const SizedBox(height: 8),
                    ...posts.map((post) => _buildPostCard(post)),
                    const SizedBox(height: 30),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }

  Widget _buildQuickActionItem({
    required IconData icon,
    required String label,
    required Color color,
    required VoidCallback onTap,
  }) {
    return GestureDetector(
      onTap: onTap,
      child: Column(
        children: [
          Container(
            width: 58,
            height: 58,
            decoration: BoxDecoration(
              color: color.withValues(alpha: 0.12),
              borderRadius: BorderRadius.circular(16),
              border: Border.all(color: color.withValues(alpha: 0.3)),
            ),
            child: Icon(icon, color: color, size: 28),
          ),
          const SizedBox(height: 6),
          Text(
            label,
            style: const TextStyle(fontSize: 12, fontWeight: FontWeight.w600),
          ),
        ],
      ),
    );
  }

  Widget _buildStatItem(String label, String value, IconData icon) {
    return Column(
      children: [
        Icon(icon, size: 20, color: AppColors.saffronPrimary),
        const SizedBox(height: 4),
        Text(
          value,
          style: const TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonDark),
        ),
        Text(
          label,
          style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
        ),
      ],
    );
  }

  Widget _buildEventCard(EventModel event) {
    return Container(
      margin: const EdgeInsets.only(bottom: 12),
      padding: const EdgeInsets.all(14),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(14),
        border: Border.all(color: AppColors.borderLight),
        boxShadow: [
          BoxShadow(
            color: Colors.black.withValues(alpha: 0.03),
            blurRadius: 6,
            offset: const Offset(0, 2),
          ),
        ],
      ),
      child: Row(
        children: [
          Container(
            padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
            decoration: BoxDecoration(
              gradient: const LinearGradient(
                colors: [AppColors.maroonPrimary, AppColors.saffronDark],
              ),
              borderRadius: BorderRadius.circular(10),
            ),
            child: Column(
              children: [
                const Icon(Icons.event_note_rounded, color: Colors.white, size: 18),
                const SizedBox(height: 2),
                Text(
                  event.startDate.split('-').last,
                  style: const TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 14),
                ),
              ],
            ),
          ),
          const SizedBox(width: 14),
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  event.title,
                  style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13),
                  maxLines: 1,
                  overflow: TextOverflow.ellipsis,
                ),
                const SizedBox(height: 4),
                Text(
                  event.description,
                  style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                  maxLines: 2,
                  overflow: TextOverflow.ellipsis,
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildPostCard(PostModel post) {
    return GestureDetector(
      onTap: () {
        Navigator.of(context).push(
          MaterialPageRoute(builder: (_) => PostDetailScreen(post: post)),
        );
      },
      child: Container(
        margin: const EdgeInsets.only(bottom: 14),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(14),
          border: Border.all(color: AppColors.borderLight),
          boxShadow: [
            BoxShadow(
              color: Colors.black.withValues(alpha: 0.04),
              blurRadius: 6,
              offset: const Offset(0, 2),
            ),
          ],
        ),
        child: Padding(
          padding: const EdgeInsets.all(14),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Container(
                    padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 3),
                    decoration: BoxDecoration(
                      color: AppColors.lotusAmber.withValues(alpha: 0.5),
                      borderRadius: BorderRadius.circular(6),
                    ),
                    child: Text(
                      post.category,
                      style: const TextStyle(fontSize: 10, fontWeight: FontWeight.bold, color: AppColors.saffronDark),
                    ),
                  ),
                  Text(
                    post.publishedAt ?? '',
                    style: const TextStyle(fontSize: 10, color: AppColors.textMuted),
                  ),
                ],
              ),
              const SizedBox(height: 8),
              Text(
                post.title,
                style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 14, height: 1.4),
              ),
              const SizedBox(height: 6),
              Text(
                post.excerpt,
                style: const TextStyle(fontSize: 12, color: AppColors.textMuted, height: 1.5),
                maxLines: 2,
                overflow: TextOverflow.ellipsis,
              ),
              const SizedBox(height: 10),
              const Row(
                mainAxisAlignment: MainAxisAlignment.end,
                children: [
                  Text(
                    'អានបន្ត',
                    style: TextStyle(fontSize: 11, fontWeight: FontWeight.bold, color: AppColors.saffronDark),
                  ),
                  Icon(Icons.arrow_forward_ios_rounded, size: 10, color: AppColors.saffronDark),
                ],
              ),
            ],
          ),
        ),
      ),
    );
  }
}

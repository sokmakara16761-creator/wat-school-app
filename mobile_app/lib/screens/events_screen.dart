import 'package:flutter/material.dart';
import '../models/event_model.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';

class EventsScreen extends StatefulWidget {
  const EventsScreen({super.key});

  @override
  State<EventsScreen> createState() => _EventsScreenState();
}

class _EventsScreenState extends State<EventsScreen> with SingleTickerProviderStateMixin {
  late TabController _tabController;
  bool _isLoading = true;
  List<EventModel> _upcomingEvents = [];
  List<EventModel> _pastEvents = [];

  @override
  void initState() {
    super.initState();
    _tabController = TabController(length: 2, vsync: this);
    _loadData();
  }

  @override
  void dispose() {
    _tabController.dispose();
    super.dispose();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    final data = await ApiService.fetchEvents();
    setState(() {
      _upcomingEvents = data['upcoming'] ?? [];
      _pastEvents = data['past'] ?? [];
      _isLoading = false;
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'កម្មវិធីបុណ្យទាន',
        subtitle: 'កាលវិភាគពិធីបុណ្យជាតិ និងសាសនា',
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh_rounded, color: Colors.white),
            onPressed: _loadData,
          ),
        ],
      ),
      body: Column(
        children: [
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
                Tab(text: 'កម្មវិធីខាងមុខ', icon: Icon(Icons.event_available_rounded, size: 18)),
                Tab(text: 'កម្មវិធីកន្លងទៅ', icon: Icon(Icons.history_rounded, size: 18)),
              ],
            ),
          ),
          Expanded(
            child: _isLoading
                ? const Center(child: CircularProgressIndicator(color: AppColors.saffronPrimary))
                : TabBarView(
                    controller: _tabController,
                    children: [
                      _buildEventsList(_upcomingEvents, isUpcoming: true),
                      _buildEventsList(_pastEvents, isUpcoming: false),
                    ],
                  ),
          ),
        ],
      ),
    );
  }

  Widget _buildEventsList(List<EventModel> events, {required bool isUpcoming}) {
    if (events.isEmpty) {
      return const Center(
        child: Text('មិនមានកម្មវិធីក្នុងបញ្ជីនេះទេ', style: TextStyle(color: AppColors.textMuted)),
      );
    }

    return ListView.builder(
      padding: const EdgeInsets.all(16),
      itemCount: events.length,
      itemBuilder: (context, index) {
        final ev = events[index];
        return Card(
          margin: const EdgeInsets.only(bottom: 16),
          child: Padding(
            padding: const EdgeInsets.all(16),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Row(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Container(
                      padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 8),
                      decoration: BoxDecoration(
                        gradient: LinearGradient(
                          colors: isUpcoming
                              ? [AppColors.maroonPrimary, AppColors.saffronDark]
                              : [Colors.grey.shade600, Colors.grey.shade800],
                        ),
                        borderRadius: BorderRadius.circular(10),
                      ),
                      child: Column(
                        children: [
                          const Icon(Icons.calendar_month_rounded, color: Colors.white, size: 16),
                          const SizedBox(height: 2),
                          Text(
                            ev.startDate,
                            style: const TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 11),
                          ),
                        ],
                      ),
                    ),
                    const SizedBox(width: 12),
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            ev.title,
                            style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 14, color: AppColors.maroonPrimary),
                          ),
                          if (ev.lunarDate != null) ...[
                            const SizedBox(height: 4),
                            Text(
                              'កាលបរិច្ឆេទខ្មែរ៖ ${ev.lunarDate}',
                              style: const TextStyle(fontSize: 11, color: AppColors.saffronDark, fontWeight: FontWeight.w600),
                            ),
                          ],
                        ],
                      ),
                    ),
                  ],
                ),
                const SizedBox(height: 10),
                Text(
                  ev.description,
                  style: const TextStyle(fontSize: 12, color: AppColors.textDark, height: 1.5),
                ),
                const SizedBox(height: 12),
                Row(
                  children: [
                    const Icon(Icons.location_on_outlined, size: 14, color: AppColors.textMuted),
                    const SizedBox(width: 4),
                    Expanded(
                      child: Text(
                        ev.location,
                        style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                      ),
                    ),
                  ],
                ),
                if (isUpcoming) ...[
                  const SizedBox(height: 12),
                  OutlinedButton.icon(
                    onPressed: () {
                      ScaffoldMessenger.of(context).showSnackBar(
                        SnackBar(content: Text('បានដាក់ការរំឭកសម្រាប់ "${ev.title}"!')),
                      );
                    },
                    icon: const Icon(Icons.notifications_active_outlined, size: 16),
                    label: const Text('ដាក់ការដាស់តឿន (Reminder)'),
                    style: OutlinedButton.styleFrom(
                      minimumSize: const Size.fromHeight(36),
                      padding: const EdgeInsets.symmetric(vertical: 6),
                    ),
                  ),
                ],
              ],
            ),
          ),
        );
      },
    );
  }
}

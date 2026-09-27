import 'package:flutter/material.dart';
import '../models/dhamma_model.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';
import 'dhamma_detail_screen.dart';

class DhammaScreen extends StatefulWidget {
  const DhammaScreen({super.key});

  @override
  State<DhammaScreen> createState() => _DhammaScreenState();
}

class _DhammaScreenState extends State<DhammaScreen> {
  bool _isLoading = true;
  List<DhammaModel> _dhammaList = [];
  String _selectedCategory = 'ទាំងអស់';
  final _searchController = TextEditingController();

  final List<String> _categories = [
    'ទាំងអស់',
    'ធម្មទាន និងការអប់រំចិត្ត',
    'ចិត្តវិទ្យាពុទ្ធសាសនា',
    'សីលធម៌ និងកតញ្ញុតាធម៌',
  ];

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  @override
  void dispose() {
    _searchController.dispose();
    super.dispose();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    final list = await ApiService.fetchDhamma();
    setState(() {
      _dhammaList = list;
      _isLoading = false;
    });
  }

  List<DhammaModel> get _filteredList {
    return _dhammaList.where((item) {
      final matchesCategory = _selectedCategory == 'ទាំងអស់' || item.category == _selectedCategory;
      final query = _searchController.text.toLowerCase().trim();
      final matchesSearch = query.isEmpty ||
          item.title.toLowerCase().contains(query) ||
          item.preacher.toLowerCase().contains(query);
      return matchesCategory && matchesSearch;
    }).toList();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'បណ្ណាល័យព្រះធម៌',
        subtitle: 'ធម៌ទេសនា និងគតិអប់រំចិត្ត',
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh_rounded, color: Colors.white),
            onPressed: _loadData,
          ),
        ],
      ),
      body: Column(
        children: [
          // Search & Filters Header
          Container(
            padding: const EdgeInsets.all(14),
            color: Colors.white,
            child: Column(
              children: [
                // Search Input
                TextField(
                  controller: _searchController,
                  onChanged: (_) => setState(() {}),
                  decoration: InputDecoration(
                    hintText: 'ស្វែងរកធម៌ទេសនា ឬ ព្រះនាមសម្តែង...',
                    prefixIcon: const Icon(Icons.search_rounded, color: AppColors.saffronDark),
                    suffixIcon: _searchController.text.isNotEmpty
                        ? IconButton(
                            icon: const Icon(Icons.clear, size: 18),
                            onPressed: () {
                              _searchController.clear();
                              setState(() {});
                            },
                          )
                        : null,
                    contentPadding: const EdgeInsets.symmetric(horizontal: 14, vertical: 10),
                  ),
                ),
                const SizedBox(height: 10),

                // Category Filter Chips
                SingleChildScrollView(
                  scrollDirection: Axis.horizontal,
                  child: Row(
                    children: _categories.map((cat) {
                      final isSelected = _selectedCategory == cat;
                      return Padding(
                        padding: const EdgeInsets.only(right: 8),
                        child: ChoiceChip(
                          label: Text(cat),
                          selected: isSelected,
                          selectedColor: AppColors.saffronPrimary,
                          backgroundColor: Colors.grey.shade100,
                          labelStyle: TextStyle(
                            color: isSelected ? Colors.white : AppColors.textDark,
                            fontSize: 11,
                            fontWeight: isSelected ? FontWeight.bold : FontWeight.normal,
                          ),
                          onSelected: (selected) {
                            if (selected) {
                              setState(() => _selectedCategory = cat);
                            }
                          },
                        ),
                      );
                    }).toList(),
                  ),
                ),
              ],
            ),
          ),

          // Dhamma List
          Expanded(
            child: _isLoading
                ? const Center(child: CircularProgressIndicator(color: AppColors.saffronPrimary))
                : _filteredList.isEmpty
                    ? const Center(
                        child: Text('មិនមានព្រះធម៌ត្រូវនឹងការស្វែងរកនេះទេ', style: TextStyle(color: AppColors.textMuted)),
                      )
                    : RefreshIndicator(
                        onRefresh: _loadData,
                        color: AppColors.saffronPrimary,
                        child: ListView.builder(
                          padding: const EdgeInsets.all(16),
                          itemCount: _filteredList.length,
                          itemBuilder: (context, index) {
                            final d = _filteredList[index];
                            return _buildDhammaCard(d);
                          },
                        ),
                      ),
          ),
        ],
      ),
    );
  }

  Widget _buildDhammaCard(DhammaModel d) {
    return GestureDetector(
      onTap: () {
        Navigator.of(context).push(
          MaterialPageRoute(builder: (_) => DhammaDetailScreen(dhamma: d)),
        );
      },
      child: Container(
        margin: const EdgeInsets.only(bottom: 14),
        padding: const EdgeInsets.all(14),
        decoration: BoxDecoration(
          color: Colors.white,
          borderRadius: BorderRadius.circular(16),
          border: Border.all(color: AppColors.borderLight),
          boxShadow: [
            BoxShadow(
              color: Colors.black.withValues(alpha: 0.04),
              blurRadius: 6,
              offset: const Offset(0, 2),
            ),
          ],
        ),
        child: Row(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Audio Icon Badge
            Container(
              width: 50,
              height: 50,
              decoration: BoxDecoration(
                gradient: const LinearGradient(
                  colors: [AppColors.maroonPrimary, AppColors.saffronDark],
                ),
                borderRadius: BorderRadius.circular(12),
              ),
              child: const Icon(Icons.play_circle_filled_rounded, color: Colors.white, size: 28),
            ),
            const SizedBox(width: 14),
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Container(
                    padding: const EdgeInsets.symmetric(horizontal: 6, vertical: 2),
                    decoration: BoxDecoration(
                      color: AppColors.lotusAmber.withValues(alpha: 0.4),
                      borderRadius: BorderRadius.circular(4),
                    ),
                    child: Text(
                      d.category,
                      style: const TextStyle(fontSize: 9, fontWeight: FontWeight.bold, color: AppColors.saffronDark),
                    ),
                  ),
                  const SizedBox(height: 6),
                  Text(
                    d.title,
                    style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13, height: 1.3),
                    maxLines: 2,
                    overflow: TextOverflow.ellipsis,
                  ),
                  const SizedBox(height: 4),
                  Text(
                    'សម្តែងដោយ៖ ${d.preacher}',
                    style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                  ),
                  const SizedBox(height: 8),
                  Row(
                    children: [
                      const Icon(Icons.access_time_rounded, size: 12, color: AppColors.saffronDark),
                      const SizedBox(width: 4),
                      Text(d.duration, style: const TextStyle(fontSize: 10, color: AppColors.textMuted)),
                      const SizedBox(width: 12),
                      const Icon(Icons.headset_rounded, size: 12, color: AppColors.saffronDark),
                      const SizedBox(width: 4),
                      Text('${d.views} នាក់', style: const TextStyle(fontSize: 10, color: AppColors.textMuted)),
                    ],
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}

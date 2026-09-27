import 'package:flutter/material.dart';
import 'screens/home_screen.dart';
import 'screens/school_screen.dart';
import 'screens/dhamma_screen.dart';
import 'screens/events_screen.dart';
import 'screens/donation_screen.dart';
import 'screens/admission_form_screen.dart';
import 'services/api_service.dart';
import 'theme/app_theme.dart';

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  runApp(const WatSchoolApp());
}

class WatSchoolApp extends StatefulWidget {
  const WatSchoolApp({super.key});

  @override
  State<WatSchoolApp> createState() => _WatSchoolAppState();
}

class _WatSchoolAppState extends State<WatSchoolApp> {
  ThemeMode _themeMode = ThemeMode.light;

  void toggleTheme() {
    setState(() {
      _themeMode = _themeMode == ThemeMode.light ? ThemeMode.dark : ThemeMode.light;
    });
  }

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'វត្តធនរតនេសោភណារាម & ពុទ្ធិកបឋមសិក្សា',
      debugShowCheckedModeBanner: false,
      theme: AppTheme.lightTheme,
      darkTheme: AppTheme.darkTheme,
      themeMode: _themeMode,
      home: MainNavigationScaffold(onToggleTheme: toggleTheme),
    );
  }
}

class MainNavigationScaffold extends StatefulWidget {
  final VoidCallback onToggleTheme;

  const MainNavigationScaffold({super.key, required this.onToggleTheme});

  @override
  State<MainNavigationScaffold> createState() => _MainNavigationScaffoldState();
}

class _MainNavigationScaffoldState extends State<MainNavigationScaffold> {
  int _currentIndex = 0;

  late final List<Widget> _screens;

  @override
  void initState() {
    super.initState();
    _screens = [
      HomeScreen(onNavigateTab: (index) => setState(() => _currentIndex = index)),
      const SchoolScreen(),
      const DhammaScreen(),
      const EventsScreen(),
      const DonationScreen(),
    ];
  }

  void _showApiSettingsDialog() {
    final controller = TextEditingController(text: ApiService.activeBaseUrl);
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        title: const Text('កំណត់ API Server URL', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 16)),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const Text(
              'បញ្ចូល Server Base URL សម្រាប់ភ្ជាប់ទិន្នន័យ Laravel API៖',
              style: TextStyle(fontSize: 12),
            ),
            const SizedBox(height: 10),
            TextField(
              controller: controller,
              decoration: const InputDecoration(
                hintText: 'http://10.0.2.2:8000/api ឬ http://localhost:8000/api',
              ),
            ),
            const SizedBox(height: 8),
            const Text(
              '• Android Emulator: http://10.0.2.2:8000/api\n• Windows/Web: http://localhost:8000/api',
              style: TextStyle(fontSize: 10, color: AppColors.textMuted),
            ),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () => Navigator.of(ctx).pop(),
            child: const Text('បោះបង់'),
          ),
          ElevatedButton(
            onPressed: () {
              ApiService.activeBaseUrl = controller.text.trim();
              Navigator.of(ctx).pop();
              ScaffoldMessenger.of(context).showSnackBar(
                SnackBar(content: Text('បានប្តូរ Server ទៅកាន់៖ ${ApiService.activeBaseUrl}')),
              );
              setState(() {});
            },
            child: const Text('រក្សាទុក'),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: IndexedStack(
        index: _currentIndex,
        children: _screens,
      ),
      drawer: Drawer(
        child: ListView(
          padding: EdgeInsets.zero,
          children: [
            DrawerHeader(
              decoration: const BoxDecoration(
                gradient: LinearGradient(
                  colors: [AppColors.maroonPrimary, AppColors.saffronDark],
                  begin: Alignment.topLeft,
                  end: Alignment.bottomRight,
                ),
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.end,
                children: [
                  Container(
                    padding: const EdgeInsets.all(8),
                    decoration: BoxDecoration(
                      color: Colors.white.withValues(alpha: 0.2),
                      shape: BoxShape.circle,
                    ),
                    child: const Icon(Icons.temple_buddhist_rounded, color: AppColors.saffronLight, size: 36),
                  ),
                  const SizedBox(height: 10),
                  const Text(
                    'វត្តធនរតនេសោភណារាម',
                    style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 16),
                  ),
                  const Text(
                    'ពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
                    style: TextStyle(color: AppColors.lotusAmber, fontSize: 12),
                  ),
                ],
              ),
            ),
            ListTile(
              leading: const Icon(Icons.how_to_reg_rounded, color: AppColors.saffronDark),
              title: const Text('ចុះឈ្មោះចូលរៀនអនឡាញ'),
              onTap: () {
                Navigator.of(context).pop();
                Navigator.of(context).push(
                  MaterialPageRoute(builder: (_) => const AdmissionFormScreen()),
                );
              },
            ),
            ListTile(
              leading: const Icon(Icons.brightness_medium_rounded, color: AppColors.saffronDark),
              title: const Text('ប្តូរ Dark / Light Mode'),
              onTap: () {
                Navigator.of(context).pop();
                widget.onToggleTheme();
              },
            ),
            ListTile(
              leading: const Icon(Icons.settings_ethernet_rounded, color: AppColors.saffronDark),
              title: const Text('កំណត់ Server API URL'),
              onTap: () {
                Navigator.of(context).pop();
                _showApiSettingsDialog();
              },
            ),
            const Divider(),
            const Padding(
              padding: EdgeInsets.all(16),
              child: Text(
                'វត្តព្រៃស្ដី Mobile App v1.0\nពុទ្ធសករាជ ២៥៦៩',
                style: TextStyle(fontSize: 11, color: AppColors.textMuted),
                textAlign: TextAlign.center,
              ),
            ),
          ],
        ),
      ),
      bottomNavigationBar: Container(
        decoration: BoxDecoration(
          boxShadow: [
            BoxShadow(
              color: Colors.black.withValues(alpha: 0.08),
              blurRadius: 10,
              offset: const Offset(0, -2),
            ),
          ],
        ),
        child: NavigationBar(
          selectedIndex: _currentIndex,
          onDestinationSelected: (index) {
            setState(() {
              _currentIndex = index;
            });
          },
          backgroundColor: Colors.white,
          indicatorColor: AppColors.saffronLight.withValues(alpha: 0.4),
          destinations: const [
            NavigationDestination(
              icon: Icon(Icons.home_outlined),
              selectedIcon: Icon(Icons.home_rounded, color: AppColors.maroonPrimary),
              label: 'ទំព័រដើម',
            ),
            NavigationDestination(
              icon: Icon(Icons.school_outlined),
              selectedIcon: Icon(Icons.school_rounded, color: AppColors.maroonPrimary),
              label: 'សាលារៀន',
            ),
            NavigationDestination(
              icon: Icon(Icons.record_voice_over_outlined),
              selectedIcon: Icon(Icons.record_voice_over_rounded, color: AppColors.maroonPrimary),
              label: 'ព្រះធម៌',
            ),
            NavigationDestination(
              icon: Icon(Icons.calendar_month_outlined),
              selectedIcon: Icon(Icons.calendar_month_rounded, color: AppColors.maroonPrimary),
              label: 'បុណ្យទាន',
            ),
            NavigationDestination(
              icon: Icon(Icons.volunteer_activism_outlined),
              selectedIcon: Icon(Icons.volunteer_activism_rounded, color: AppColors.maroonPrimary),
              label: 'បរិច្ចាគ',
            ),
          ],
        ),
      ),
    );
  }
}

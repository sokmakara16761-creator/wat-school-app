import 'package:flutter/material.dart';
import '../models/dhamma_model.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';

class DhammaDetailScreen extends StatefulWidget {
  final DhammaModel dhamma;

  const DhammaDetailScreen({super.key, required this.dhamma});

  @override
  State<DhammaDetailScreen> createState() => _DhammaDetailScreenState();
}

class _DhammaDetailScreenState extends State<DhammaDetailScreen> {
  bool _isPlaying = false;
  double _progress = 0.25;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'ព្រះធម៌ទេសនា',
        subtitle: widget.dhamma.preacher,
        showBack: true,
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Audio Player Section
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(20),
              decoration: BoxDecoration(
                gradient: const LinearGradient(
                  colors: [AppColors.maroonPrimary, AppColors.saffronDark],
                  begin: Alignment.topLeft,
                  end: Alignment.bottomRight,
                ),
                boxShadow: [
                  BoxShadow(
                    color: Colors.black.withValues(alpha: 0.1),
                    blurRadius: 8,
                    offset: const Offset(0, 4),
                  )
                ],
              ),
              child: Column(
                children: [
                  Container(
                    width: 70,
                    height: 70,
                    decoration: BoxDecoration(
                      color: Colors.white.withValues(alpha: 0.15),
                      shape: BoxShape.circle,
                      border: Border.all(color: AppColors.saffronLight.withValues(alpha: 0.5), width: 2),
                    ),
                    child: const Icon(Icons.record_voice_over_rounded, color: AppColors.saffronLight, size: 36),
                  ),
                  const SizedBox(height: 12),
                  Text(
                    widget.dhamma.title,
                    textAlign: TextAlign.center,
                    style: const TextStyle(
                      color: Colors.white,
                      fontSize: 16,
                      fontWeight: FontWeight.bold,
                    ),
                  ),
                  const SizedBox(height: 6),
                  Text(
                    widget.dhamma.preacher,
                    style: const TextStyle(color: AppColors.lotusAmber, fontSize: 13),
                  ),
                  const SizedBox(height: 16),

                  // Audio Progress Slider
                  SliderTheme(
                    data: SliderTheme.of(context).copyWith(
                      activeTrackColor: AppColors.saffronLight,
                      inactiveTrackColor: Colors.white24,
                      thumbColor: Colors.white,
                      trackHeight: 4,
                    ),
                    child: Slider(
                      value: _progress,
                      onChanged: (val) {
                        setState(() {
                          _progress = val;
                        });
                      },
                    ),
                  ),

                  // Timestamps
                  Padding(
                    padding: const EdgeInsets.symmetric(horizontal: 16),
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Text(
                          '${(_progress * 15).floor()}:${((_progress * 60) % 60).floor().toString().padLeft(2, '0')}',
                          style: const TextStyle(color: Colors.white70, fontSize: 11),
                        ),
                        Text(
                          widget.dhamma.duration,
                          style: const TextStyle(color: Colors.white70, fontSize: 11),
                        ),
                      ],
                    ),
                  ),
                  const SizedBox(height: 10),

                  // Player Controls
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      IconButton(
                        icon: const Icon(Icons.replay_10_rounded, color: Colors.white),
                        iconSize: 28,
                        onPressed: () {
                          setState(() {
                            _progress = (_progress - 0.05).clamp(0.0, 1.0);
                          });
                        },
                      ),
                      const SizedBox(width: 16),
                      GestureDetector(
                        onTap: () {
                          setState(() {
                            _isPlaying = !_isPlaying;
                          });
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                              content: Text(_isPlaying ? 'កំពុងចាក់សំឡេងធម៌ទេសនា...' : 'បានផ្អាកការចាក់សំឡេង'),
                              duration: const Duration(seconds: 1),
                            ),
                          );
                        },
                        child: Container(
                          width: 54,
                          height: 54,
                          decoration: const BoxDecoration(
                            color: AppColors.saffronLight,
                            shape: BoxShape.circle,
                            boxShadow: [
                              BoxShadow(color: Colors.black26, blurRadius: 6, offset: Offset(0, 2))
                            ],
                          ),
                          child: Icon(
                            _isPlaying ? Icons.pause_rounded : Icons.play_arrow_rounded,
                            color: AppColors.maroonDark,
                            size: 34,
                          ),
                        ),
                      ),
                      const SizedBox(width: 16),
                      IconButton(
                        icon: const Icon(Icons.forward_10_rounded, color: Colors.white),
                        iconSize: 28,
                        onPressed: () {
                          setState(() {
                            _progress = (_progress + 0.05).clamp(0.0, 1.0);
                          });
                        },
                      ),
                    ],
                  )
                ],
              ),
            ),

            // Sermon Reading Section
            Padding(
              padding: const EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  const Row(
                    children: [
                      Icon(Icons.menu_book_rounded, color: AppColors.saffronDark, size: 20),
                      SizedBox(width: 8),
                      Text(
                        'អត្ថបទសង្ខេប និងគតិធម៌',
                        style: TextStyle(
                          fontSize: 16,
                          fontWeight: FontWeight.bold,
                          color: AppColors.maroonPrimary,
                        ),
                      ),
                    ],
                  ),
                  const SizedBox(height: 14),

                  if (widget.dhamma.excerpt.isNotEmpty) ...[
                    Container(
                      padding: const EdgeInsets.all(14),
                      decoration: BoxDecoration(
                        color: AppColors.lotusAmber.withValues(alpha: 0.25),
                        borderRadius: BorderRadius.circular(12),
                        border: Border.all(color: AppColors.saffronLight.withValues(alpha: 0.4)),
                      ),
                      child: Text(
                        widget.dhamma.excerpt,
                        style: const TextStyle(
                          fontSize: 13,
                          height: 1.6,
                          color: AppColors.saffronDark,
                          fontStyle: FontStyle.italic,
                        ),
                      ),
                    ),
                    const SizedBox(height: 16),
                  ],

                  Text(
                    widget.dhamma.content,
                    style: const TextStyle(
                      fontSize: 15,
                      height: 1.8,
                      color: AppColors.textDark,
                    ),
                  ),
                  const SizedBox(height: 30),

                  // Actions
                  ElevatedButton.icon(
                    onPressed: () {
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(content: Text('បានទាញយកឯកសារសំឡេងទុកស្ដាប់ក្រៅបណ្ដាញ (Offline)!')),
                      );
                    },
                    icon: const Icon(Icons.download_rounded, size: 18),
                    label: const Text('ទាញយកសំឡេងទុកស្ដាប់ Offline'),
                    style: ElevatedButton.styleFrom(
                      minimumSize: const Size.fromHeight(48),
                    ),
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

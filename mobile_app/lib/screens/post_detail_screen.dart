import 'package:flutter/material.dart';
import '../models/post_model.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';

class PostDetailScreen extends StatelessWidget {
  final PostModel post;

  const PostDetailScreen({super.key, required this.post});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: CustomAppBar(
        title: 'អត្ថបទព័ត៌មាន',
        subtitle: post.category,
        showBack: true,
      ),
      body: SingleChildScrollView(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            // Header Card / Thumbnail Banner
            Container(
              width: double.infinity,
              padding: const EdgeInsets.all(20),
              decoration: BoxDecoration(
                gradient: LinearGradient(
                  colors: [
                    AppColors.saffronDark.withValues(alpha: 0.9),
                    AppColors.maroonDark.withValues(alpha: 0.95),
                  ],
                  begin: Alignment.topLeft,
                  end: Alignment.bottomRight,
                ),
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Container(
                    padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 4),
                    decoration: BoxDecoration(
                      color: AppColors.saffronLight,
                      borderRadius: BorderRadius.circular(20),
                    ),
                    child: Text(
                      post.category,
                      style: const TextStyle(
                        color: Colors.black87,
                        fontSize: 11,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                  const SizedBox(height: 12),
                  Text(
                    post.title,
                    style: const TextStyle(
                      color: Colors.white,
                      fontSize: 18,
                      fontWeight: FontWeight.bold,
                      height: 1.4,
                    ),
                  ),
                  const SizedBox(height: 12),
                  Row(
                    children: [
                      const Icon(Icons.person_outline, size: 14, color: AppColors.lotusAmber),
                      const SizedBox(width: 4),
                      Text(
                        post.author,
                        style: const TextStyle(color: AppColors.lotusAmber, fontSize: 12),
                      ),
                      const SizedBox(width: 16),
                      const Icon(Icons.visibility_outlined, size: 14, color: AppColors.lotusAmber),
                      const SizedBox(width: 4),
                      Text(
                        '${post.views} ដង',
                        style: const TextStyle(color: AppColors.lotusAmber, fontSize: 12),
                      ),
                    ],
                  ),
                ],
              ),
            ),

            // Content Body
            Padding(
              padding: const EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  if (post.excerpt.isNotEmpty) ...[
                    Container(
                      padding: const EdgeInsets.all(14),
                      decoration: BoxDecoration(
                        color: AppColors.lotusAmber.withValues(alpha: 0.3),
                        borderRadius: BorderRadius.circular(12),
                        border: Border.all(color: AppColors.saffronLight.withValues(alpha: 0.5)),
                      ),
                      child: Row(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const Icon(Icons.format_quote_rounded, color: AppColors.saffronDark, size: 22),
                          const SizedBox(width: 8),
                          Expanded(
                            child: Text(
                              post.excerpt,
                              style: const TextStyle(
                                fontStyle: FontStyle.italic,
                                color: AppColors.saffronDark,
                                fontSize: 13,
                                height: 1.5,
                              ),
                            ),
                          ),
                        ],
                      ),
                    ),
                    const SizedBox(height: 16),
                  ],

                  // Full article text
                  Text(
                    post.content,
                    style: const TextStyle(
                      fontSize: 15,
                      height: 1.8,
                      color: AppColors.textDark,
                    ),
                  ),
                  const SizedBox(height: 30),

                  // Share & Bookmark bar
                  Container(
                    padding: const EdgeInsets.symmetric(vertical: 12, horizontal: 16),
                    decoration: BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.circular(16),
                      border: Border.all(color: AppColors.borderLight),
                    ),
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceAround,
                      children: [
                        TextButton.icon(
                          onPressed: () {
                            ScaffoldMessenger.of(context).showSnackBar(
                              const SnackBar(content: Text('បានចម្លងតំណភ្ជាប់ព័ត៌មាន!')),
                            );
                          },
                          icon: const Icon(Icons.share_rounded, color: AppColors.saffronPrimary, size: 18),
                          label: const Text('ចែករំលែក', style: TextStyle(color: AppColors.saffronDark)),
                        ),
                        Container(height: 20, width: 1, color: Colors.grey.shade300),
                        TextButton.icon(
                          onPressed: () {
                            ScaffoldMessenger.of(context).showSnackBar(
                              const SnackBar(content: Text('បានរក្សាទុកក្នុងបញ្ជីពេញចិត្ត!')),
                            );
                          },
                          icon: const Icon(Icons.bookmark_border_rounded, color: AppColors.maroonPrimary, size: 18),
                          label: const Text('រក្សាទុក', style: TextStyle(color: AppColors.maroonPrimary)),
                        ),
                      ],
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

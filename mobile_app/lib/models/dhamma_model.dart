class DhammaModel {
  final int id;
  final String title;
  final String slug;
  final String preacher;
  final String category;
  final String excerpt;
  final String content;
  final String? audioUrl;
  final String duration;
  final String readTime;
  final int views;
  final String? publishedAt;

  DhammaModel({
    required this.id,
    required this.title,
    required this.slug,
    required this.preacher,
    required this.category,
    required this.excerpt,
    required this.content,
    this.audioUrl,
    required this.duration,
    required this.readTime,
    required this.views,
    this.publishedAt,
  });

  factory DhammaModel.fromJson(Map<String, dynamic> json) {
    return DhammaModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      title: json['title']?.toString() ?? '',
      slug: json['slug']?.toString() ?? '',
      preacher: json['preacher']?.toString() ?? 'ព្រះសង្ឃវត្តព្រៃស្ដី',
      category: json['category']?.toString() ?? 'ធម្មទាន',
      excerpt: json['excerpt']?.toString() ?? '',
      content: json['content']?.toString() ?? '',
      audioUrl: json['audio_url']?.toString(),
      duration: json['duration']?.toString() ?? '15:00',
      readTime: json['read_time']?.toString() ?? '5 នាទី',
      views: json['views'] is int ? json['views'] : int.tryParse(json['views']?.toString() ?? '0') ?? 0,
      publishedAt: json['published_at']?.toString(),
    );
  }
}

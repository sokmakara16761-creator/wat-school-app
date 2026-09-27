class PostModel {
  final int id;
  final String title;
  final String slug;
  final String excerpt;
  final String content;
  final String category;
  final String author;
  final String? thumbnail;
  final bool isFeatured;
  final int views;
  final String? publishedAt;

  PostModel({
    required this.id,
    required this.title,
    required this.slug,
    required this.excerpt,
    required this.content,
    required this.category,
    required this.author,
    this.thumbnail,
    required this.isFeatured,
    required this.views,
    this.publishedAt,
  });

  factory PostModel.fromJson(Map<String, dynamic> json) {
    return PostModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      title: json['title']?.toString() ?? '',
      slug: json['slug']?.toString() ?? '',
      excerpt: json['excerpt']?.toString() ?? '',
      content: json['content']?.toString() ?? '',
      category: json['category']?.toString() ?? 'ព័ត៌មានទូទៅ',
      author: json['author']?.toString() ?? 'វត្តព្រៃស្ដី',
      thumbnail: json['thumbnail']?.toString(),
      isFeatured: json['is_featured'] == true || json['is_featured'] == 1 || json['is_featured']?.toString() == '1',
      views: json['views'] is int ? json['views'] : int.tryParse(json['views']?.toString() ?? '0') ?? 0,
      publishedAt: json['published_at']?.toString(),
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'title': title,
      'slug': slug,
      'excerpt': excerpt,
      'content': content,
      'category': category,
      'author': author,
      'thumbnail': thumbnail,
      'is_featured': isFeatured,
      'views': views,
      'published_at': publishedAt,
    };
  }
}

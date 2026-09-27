class EventModel {
  final int id;
  final String title;
  final String slug;
  final String description;
  final String? content;
  final String location;
  final String startDate;
  final String? endDate;
  final String? lunarDate;
  final bool isUpcoming;
  final String? image;

  EventModel({
    required this.id,
    required this.title,
    required this.slug,
    required this.description,
    this.content,
    required this.location,
    required this.startDate,
    this.endDate,
    this.lunarDate,
    required this.isUpcoming,
    this.image,
  });

  factory EventModel.fromJson(Map<String, dynamic> json) {
    return EventModel(
      id: json['id'] is int ? json['id'] : int.tryParse(json['id']?.toString() ?? '0') ?? 0,
      title: json['title']?.toString() ?? '',
      slug: json['slug']?.toString() ?? '',
      description: json['description']?.toString() ?? '',
      content: json['content']?.toString(),
      location: json['location']?.toString() ?? 'វត្តធនរតនេសោភណារាម (ព្រៃស្ដី)',
      startDate: json['start_date']?.toString() ?? '',
      endDate: json['end_date']?.toString(),
      lunarDate: json['lunar_date']?.toString(),
      isUpcoming: json['is_upcoming'] == true || json['is_upcoming'] == 1 || json['is_upcoming']?.toString() == '1',
      image: json['image']?.toString(),
    );
  }
}

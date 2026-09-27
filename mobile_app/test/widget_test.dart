import 'package:flutter_test/flutter_test.dart';
import 'package:wat_school_mobile/main.dart';

void main() {
  testWidgets('Wat School App loads smoke test', (WidgetTester tester) async {
    // Build our app and trigger a frame.
    await tester.pumpWidget(const WatSchoolApp());
    await tester.pumpAndSettle();

    // Verify that the title appears
    expect(find.text('វត្តធនរតនេសោភណារាម'), findsWidgets);
  });
}

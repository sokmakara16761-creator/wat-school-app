import 'package:flutter/material.dart';

class AppColors {
  // Primary Saffron & Gold palette
  static const Color saffronPrimary = Color(0xFFD97706);
  static const Color saffronLight = Color(0xFFFBBF24);
  static const Color saffronDark = Color(0xFF92400E);
  static const Color saffronDeep = Color(0xFF78350F);

  // Buddhist Maroon & Red palette
  static const Color maroonPrimary = Color(0xFF7F1D1D);
  static const Color maroonDark = Color(0xFF450A0A);
  static const Color maroonLight = Color(0xFF991B1B);

  // Accent & Lotus Pink/Gold
  static const Color lotusGold = Color(0xFFF59E0B);
  static const Color lotusAmber = Color(0xFFFEF3C7);
  static const Color lotusAccent = Color(0xFFE11D48);

  // Neutral Backgrounds & Cards
  static const Color bgLight = Color(0xFFFCFAF6);
  static const Color surfaceLight = Color(0xFFFFFFFF);
  static const Color cardLight = Color(0xFFFFFFFF);
  static const Color borderLight = Color(0xFFF1E5D1);

  // Dark Mode Palette
  static const Color bgDark = Color(0xFF0F172A);
  static const Color surfaceDark = Color(0xFF1E293B);
  static const Color cardDark = Color(0xFF1E293B);
  static const Color borderDark = Color(0xFF334155);

  // Text Colors
  static const Color textDark = Color(0xFF1F2937);
  static const Color textMuted = Color(0xFF6B7280);
  static const Color textLight = Color(0xFFF9FAFB);
}

class AppTheme {
  static const List<String> khmerFontFallback = [
    'Kantumruy Pro',
    'Khmer OS Siemreap',
    'Battambang',
    'Khmer OS',
    'sans-serif',
  ];

  static ThemeData get lightTheme {
    return ThemeData(
      useMaterial3: true,
      brightness: Brightness.light,
      primaryColor: AppColors.saffronPrimary,
      scaffoldBackgroundColor: AppColors.bgLight,
      colorScheme: const ColorScheme.light(
        primary: AppColors.saffronPrimary,
        onPrimary: Colors.white,
        secondary: AppColors.maroonPrimary,
        onSecondary: Colors.white,
        surface: AppColors.surfaceLight,
        onSurface: AppColors.textDark,
        error: Color(0xFFDC2626),
      ),
      fontFamilyFallback: khmerFontFallback,
      appBarTheme: const AppBarTheme(
        backgroundColor: Colors.white,
        elevation: 0,
        scrolledUnderElevation: 1,
        centerTitle: false,
        iconTheme: IconThemeData(color: AppColors.maroonDark),
        titleTextStyle: TextStyle(
          color: AppColors.maroonDark,
          fontSize: 18,
          fontWeight: FontWeight.bold,
          fontFamilyFallback: khmerFontFallback,
        ),
      ),
      cardTheme: CardThemeData(
        color: AppColors.cardLight,
        elevation: 1.5,
        shadowColor: AppColors.saffronDark.withValues(alpha: 0.08),
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(16),
          side: const BorderSide(color: AppColors.borderLight, width: 0.8),
        ),
      ),
      elevatedButtonTheme: ElevatedButtonThemeData(
        style: ElevatedButton.styleFrom(
          backgroundColor: AppColors.saffronPrimary,
          foregroundColor: Colors.white,
          elevation: 2,
          padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 12),
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(12),
          ),
          textStyle: const TextStyle(
            fontWeight: FontWeight.bold,
            fontSize: 14,
            fontFamilyFallback: khmerFontFallback,
          ),
        ),
      ),
      outlinedButtonTheme: OutlinedButtonThemeData(
        style: OutlinedButton.styleFrom(
          foregroundColor: AppColors.maroonPrimary,
          side: const BorderSide(color: AppColors.saffronPrimary, width: 1.2),
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(12),
          ),
          textStyle: const TextStyle(
            fontWeight: FontWeight.w600,
            fontSize: 14,
            fontFamilyFallback: khmerFontFallback,
          ),
        ),
      ),
      inputDecorationTheme: InputDecorationTheme(
        filled: true,
        fillColor: Colors.white,
        border: OutlineInputBorder(
          borderRadius: BorderRadius.circular(12),
          borderSide: const BorderSide(color: AppColors.borderLight),
        ),
        enabledBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(12),
          borderSide: const BorderSide(color: AppColors.borderLight),
        ),
        focusedBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(12),
          borderSide: const BorderSide(color: AppColors.saffronPrimary, width: 1.8),
        ),
        contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
      ),
    );
  }

  static ThemeData get darkTheme {
    return ThemeData(
      useMaterial3: true,
      brightness: Brightness.dark,
      primaryColor: AppColors.saffronLight,
      scaffoldBackgroundColor: AppColors.bgDark,
      colorScheme: const ColorScheme.dark(
        primary: AppColors.saffronLight,
        onPrimary: Colors.black,
        secondary: AppColors.saffronPrimary,
        surface: AppColors.surfaceDark,
        onSurface: AppColors.textLight,
      ),
      fontFamilyFallback: khmerFontFallback,
      appBarTheme: const AppBarTheme(
        backgroundColor: AppColors.surfaceDark,
        elevation: 0,
        centerTitle: false,
        titleTextStyle: TextStyle(
          color: Colors.white,
          fontSize: 18,
          fontWeight: FontWeight.bold,
          fontFamilyFallback: khmerFontFallback,
        ),
      ),
      cardTheme: CardThemeData(
        color: AppColors.cardDark,
        elevation: 2,
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(16),
          side: const BorderSide(color: AppColors.borderDark, width: 0.8),
        ),
      ),
    );
  }
}

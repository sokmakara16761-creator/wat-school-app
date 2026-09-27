import 'package:flutter/material.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';

class AdmissionFormScreen extends StatefulWidget {
  final String? preselectedGrade;

  const AdmissionFormScreen({super.key, this.preselectedGrade});

  @override
  State<AdmissionFormScreen> createState() => _AdmissionFormScreenState();
}

class _AdmissionFormScreenState extends State<AdmissionFormScreen> {
  final _formKey = GlobalKey<FormState>();

  final _nameController = TextEditingController();
  final _dharmaNameController = TextEditingController();
  final _dobController = TextEditingController(text: '2010-01-15');
  final _parentController = TextEditingController();
  final _phoneController = TextEditingController();
  final _addressController = TextEditingController();
  final _previousSchoolController = TextEditingController();
  final _notesController = TextEditingController();

  final String _gender = 'ប្រុស';
  String _grade = 'ថ្នាក់ត្រី (កម្រិតទី១)';
  String _monkStatus = 'បព្វជិត (សាមណេរ)';
  bool _isSubmitting = false;

  @override
  void initState() {
    super.initState();
    if (widget.preselectedGrade != null) {
      _grade = widget.preselectedGrade!;
    }
  }

  @override
  void dispose() {
    _nameController.dispose();
    _dharmaNameController.dispose();
    _dobController.dispose();
    _parentController.dispose();
    _phoneController.dispose();
    _addressController.dispose();
    _previousSchoolController.dispose();
    _notesController.dispose();
    super.dispose();
  }

  Future<void> _submitForm() async {
    if (!_formKey.currentState!.validate()) return;

    setState(() {
      _isSubmitting = true;
    });

    final formData = {
      'applicant_name': _nameController.text.trim(),
      'dharma_name': _dharmaNameController.text.trim(),
      'gender': _gender,
      'date_of_birth': _dobController.text.trim(),
      'parent_name': _parentController.text.trim(),
      'phone': _phoneController.text.trim(),
      'address': _addressController.text.trim(),
      'applied_grade': _grade,
      'monk_status': _monkStatus,
      'previous_education': _previousSchoolController.text.trim(),
      'notes': _notesController.text.trim(),
    };

    final result = await ApiService.submitAdmission(formData);

    setState(() {
      _isSubmitting = false;
    });

    if (!mounted) return;

    if (result['success'] == true) {
      showDialog(
        context: context,
        builder: (ctx) => AlertDialog(
          shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
          title: const Row(
            children: [
              Icon(Icons.check_circle_rounded, color: Colors.green, size: 28),
              SizedBox(width: 8),
              Text('ជោគជ័យ!', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 18)),
            ],
          ),
          content: Text(
            result['message'] ?? 'ពាក្យចុះឈ្មោះត្រូវបានបញ្ជូនដោយជោគជ័យ!',
            style: const TextStyle(height: 1.5),
          ),
          actions: [
            ElevatedButton(
              onPressed: () {
                Navigator.of(ctx).pop();
                Navigator.of(context).pop();
              },
              child: const Text('យល់ព្រម'),
            ),
          ],
        ),
      );
    } else {
      ScaffoldMessenger.of(context).showSnackBar(
        SnackBar(
          content: Text(result['message'] ?? 'មានបញ្ហាក្នុងការបញ្ជូនពាក្យ'),
          backgroundColor: Colors.red,
        ),
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: const CustomAppBar(
        title: 'ចុះឈ្មោះចូលរៀន',
        subtitle: 'សាលាពុទ្ធិកបឋមសិក្សា វត្តព្រៃស្ដី',
        showBack: true,
      ),
      body: SingleChildScrollView(
        padding: const EdgeInsets.all(20),
        child: Form(
          key: _formKey,
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              // Info Banner
              Container(
                padding: const EdgeInsets.all(16),
                decoration: BoxDecoration(
                  gradient: LinearGradient(
                    colors: [
                      AppColors.saffronLight.withValues(alpha: 0.2),
                      AppColors.saffronPrimary.withValues(alpha: 0.1),
                    ],
                  ),
                  borderRadius: BorderRadius.circular(14),
                  border: Border.all(color: AppColors.saffronLight),
                ),
                child: const Row(
                  children: [
                    Icon(Icons.school_rounded, color: AppColors.saffronDark, size: 28),
                    SizedBox(width: 12),
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'ពាក្យសុំចុះឈ្មោះចូលរៀនថ្មី',
                            style: TextStyle(fontWeight: FontWeight.bold, color: AppColors.maroonPrimary, fontSize: 14),
                          ),
                          SizedBox(height: 4),
                          Text(
                            'ការសិក្សាឥតគិតថ្លៃ មានកន្លែងស្នាក់នៅ និងផ្គត់ផ្គង់ចង្ហាន់ដល់សមណសិស្ស។',
                            style: TextStyle(fontSize: 12, color: AppColors.saffronDark),
                          ),
                        ],
                      ),
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 24),

              // Section 1: Applicant Info
              const Text(
                '១. ព័ត៌មានសមណសិស្ស / សិស្ស',
                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 15, color: AppColors.maroonPrimary),
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _nameController,
                decoration: const InputDecoration(
                  labelText: 'គោត្តនាម និងនាម *',
                  hintText: 'ឧ. សេង វិបុល',
                  prefixIcon: Icon(Icons.person_rounded, color: AppColors.saffronDark),
                ),
                validator: (val) => val == null || val.isEmpty ? 'សូមបញ្ចូលឈ្មោះ' : null,
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _dharmaNameController,
                decoration: const InputDecoration(
                  labelText: 'ឆាយា (បើជាព្រះសង្ឃ)',
                  hintText: 'ឧ. ធម្មបាលោ',
                  prefixIcon: Icon(Icons.temple_buddhist_rounded, color: AppColors.saffronDark),
                ),
              ),
              const SizedBox(height: 14),

              // Status Dropdown
              DropdownButtonFormField<String>(
                initialValue: _monkStatus,
                decoration: const InputDecoration(
                  labelText: 'ស្ថានភាពសមណភាព *',
                  prefixIcon: Icon(Icons.badge_rounded, color: AppColors.saffronDark),
                ),
                items: const [
                  DropdownMenuItem(value: 'បព្វជិត (សាមណេរ)', child: Text('បព្វជិត (សាមណេរ)')),
                  DropdownMenuItem(value: 'ឧបសម្បទា (ភិក្ខុ)', child: Text('ឧបសម្បទា (ភិក្ខុ)')),
                  DropdownMenuItem(value: 'គ្រហស្ថ (សិស្សទូទៅ)', child: Text('គ្រហស្ថ (សិស្សទូទៅ)')),
                ],
                onChanged: (val) {
                  if (val != null) setState(() => _monkStatus = val);
                },
              ),
              const SizedBox(height: 14),

              // Grade Level Dropdown
              DropdownButtonFormField<String>(
                initialValue: _grade,
                decoration: const InputDecoration(
                  labelText: 'ថ្នាក់ដែលត្រូវចូលរៀន *',
                  prefixIcon: Icon(Icons.grade_rounded, color: AppColors.saffronDark),
                ),
                items: const [
                  DropdownMenuItem(value: 'ថ្នាក់ត្រី (កម្រិតទី១)', child: Text('ថ្នាក់ត្រី (កម្រិតទី១)')),
                  DropdownMenuItem(value: 'ថ្នាក់ទោ (កម្រិតទី២)', child: Text('ថ្នាក់ទោ (កម្រិតទី២)')),
                  DropdownMenuItem(value: 'ថ្នាក់ឯ (កម្រិតបញ្ចប់)', child: Text('ថ្នាក់ឯ (កម្រិតបញ្ចប់)')),
                ],
                onChanged: (val) {
                  if (val != null) setState(() => _grade = val);
                },
              ),
              const SizedBox(height: 24),

              // Section 2: Contact & Guardian
              const Text(
                '២. ព័ត៌មានអាណាព្យាបាល និងទំនាក់ទំនង',
                style: TextStyle(fontWeight: FontWeight.bold, fontSize: 15, color: AppColors.maroonPrimary),
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _parentController,
                decoration: const InputDecoration(
                  labelText: 'ឈ្មោះអាណាព្យាបាល / ព្រះចៅអធិការ *',
                  hintText: 'ឧ. ព្រះគ្រូចៅអធិការវត្ត ឬ មាតាបិតា',
                  prefixIcon: Icon(Icons.supervisor_account_rounded, color: AppColors.saffronDark),
                ),
                validator: (val) => val == null || val.isEmpty ? 'សូមបញ្ចូលឈ្មោះអាណាព្យាបាល' : null,
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _phoneController,
                keyboardType: TextInputType.phone,
                decoration: const InputDecoration(
                  labelText: 'លេខទូរស័ព្ទទំនាក់ទំនង *',
                  hintText: '012 345 678',
                  prefixIcon: Icon(Icons.phone_rounded, color: AppColors.saffronDark),
                ),
                validator: (val) => val == null || val.isEmpty ? 'សូមបញ្ចូលលេខទូរស័ព្ទ' : null,
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _addressController,
                maxLines: 2,
                decoration: const InputDecoration(
                  labelText: 'អាសយដ្ឋានបច្ចុប្បន្ន / វត្តដើម *',
                  hintText: 'ភូមិ ឃុំ/សង្កាត់ ស្រុក/ខណ្ឌ ខេត្ត/រាជធានី',
                  prefixIcon: Icon(Icons.location_on_rounded, color: AppColors.saffronDark),
                ),
                validator: (val) => val == null || val.isEmpty ? 'សូមបញ្ចូលអាសយដ្ឋាន' : null,
              ),
              const SizedBox(height: 14),

              TextFormField(
                controller: _notesController,
                maxLines: 2,
                decoration: const InputDecoration(
                  labelText: 'ចំណាំបន្ថែម (ប្រសិនបើមាន)',
                  hintText: 'បញ្ជាក់អំពីបំណងសិក្សា...',
                  prefixIcon: Icon(Icons.note_alt_rounded, color: AppColors.saffronDark),
                ),
              ),
              const SizedBox(height: 28),

              // Submit Button
              ElevatedButton(
                onPressed: _isSubmitting ? null : _submitForm,
                style: ElevatedButton.styleFrom(
                  minimumSize: const Size.fromHeight(50),
                  backgroundColor: AppColors.maroonPrimary,
                ),
                child: _isSubmitting
                    ? const SizedBox(
                        width: 22,
                        height: 22,
                        child: CircularProgressIndicator(color: Colors.white, strokeWidth: 2),
                      )
                    : const Row(
                        mainAxisAlignment: MainAxisAlignment.center,
                        children: [
                          Icon(Icons.send_rounded, size: 20),
                          SizedBox(width: 8),
                          Text('បញ្ជូនពាក្យចុះឈ្មោះ', style: TextStyle(fontSize: 16)),
                        ],
                      ),
              ),
              const SizedBox(height: 20),
            ],
          ),
        ),
      ),
    );
  }
}

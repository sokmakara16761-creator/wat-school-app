import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import '../services/api_service.dart';
import '../theme/app_theme.dart';
import '../widgets/custom_app_bar.dart';

class DonationScreen extends StatefulWidget {
  const DonationScreen({super.key});

  @override
  State<DonationScreen> createState() => _DonationScreenState();
}

class _DonationScreenState extends State<DonationScreen> {
  bool _isLoading = true;
  Map<String, dynamic> _donationData = {};

  @override
  void initState() {
    super.initState();
    _loadData();
  }

  Future<void> _loadData() async {
    setState(() => _isLoading = true);
    final data = await ApiService.fetchDonations();
    setState(() {
      _donationData = data;
      _isLoading = false;
    });
  }

  void _copyToClipboard(String text, String label) {
    Clipboard.setData(ClipboardData(text: text));
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Text('បានចម្លង $label៖ $text'),
        backgroundColor: AppColors.maroonPrimary,
        duration: const Duration(seconds: 2),
      ),
    );
  }

  void _showQrDialog(Map<String, dynamic> bank) {
    showDialog(
      context: context,
      builder: (ctx) => AlertDialog(
        shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(16)),
        title: Text(
          'KHQR ${bank['bank_name']}',
          style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 16),
          textAlign: TextAlign.center,
        ),
        content: Column(
          mainAxisSize: MainAxisSize.min,
          children: [
            Container(
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                color: Colors.white,
                borderRadius: BorderRadius.circular(16),
                border: Border.all(color: Colors.red.shade900, width: 2),
              ),
              child: Column(
                children: [
                  Container(
                    padding: const EdgeInsets.symmetric(horizontal: 12, vertical: 4),
                    decoration: BoxDecoration(
                      color: Colors.red.shade900,
                      borderRadius: BorderRadius.circular(6),
                    ),
                    child: const Text(
                      'KHQR BAKONG',
                      style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 12),
                    ),
                  ),
                  const SizedBox(height: 14),
                  const Icon(Icons.qr_code_2_rounded, size: 160, color: Colors.black87),
                  const SizedBox(height: 8),
                  Text(
                    bank['account_name'] ?? '',
                    style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 12),
                    textAlign: TextAlign.center,
                  ),
                  Text(
                    bank['account_number'] ?? '',
                    style: const TextStyle(color: AppColors.saffronDark, fontSize: 13, fontWeight: FontWeight.bold),
                  ),
                ],
              ),
            ),
          ],
        ),
        actions: [
          TextButton(
            onPressed: () => Navigator.of(ctx).pop(),
            child: const Text('បិទ'),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    final banks = (_donationData['bank_accounts'] as List?) ?? [];
    final campaigns = (_donationData['campaigns'] as List?) ?? [];

    return Scaffold(
      appBar: CustomAppBar(
        title: 'កុសលបរិច្ចាគ',
        subtitle: 'ចូលរួមទ្រទ្រង់វត្ត និងពុទ្ធិកបឋមសិក្សា',
        actions: [
          IconButton(
            icon: const Icon(Icons.refresh_rounded, color: Colors.white),
            onPressed: _loadData,
          ),
        ],
      ),
      body: _isLoading
          ? const Center(child: CircularProgressIndicator(color: AppColors.saffronPrimary))
          : SingleChildScrollView(
              padding: const EdgeInsets.all(16),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  // Hero Card
                  Container(
                    width: double.infinity,
                    padding: const EdgeInsets.all(18),
                    decoration: BoxDecoration(
                      gradient: const LinearGradient(
                        colors: [AppColors.maroonPrimary, AppColors.saffronDark],
                        begin: Alignment.topLeft,
                        end: Alignment.bottomRight,
                      ),
                      borderRadius: BorderRadius.circular(16),
                      boxShadow: [
                        BoxShadow(
                          color: AppColors.maroonPrimary.withValues(alpha: 0.2),
                          blurRadius: 10,
                          offset: const Offset(0, 4),
                        ),
                      ],
                    ),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Row(
                          children: [
                            Container(
                              padding: const EdgeInsets.all(8),
                              decoration: BoxDecoration(
                                color: Colors.white.withValues(alpha: 0.2),
                                shape: BoxShape.circle,
                              ),
                              child: const Icon(Icons.volunteer_activism_rounded, color: AppColors.saffronLight, size: 24),
                            ),
                            const SizedBox(width: 10),
                            const Expanded(
                              child: Text(
                                'កុសលចេតនាចូលរួមបុណ្យ',
                                style: TextStyle(color: Colors.white, fontWeight: FontWeight.bold, fontSize: 16),
                              ),
                            ),
                          ],
                        ),
                        const SizedBox(height: 10),
                        const Text(
                          'សូមអនុមោទនាកុសលចេតនាពីសំណាក់ពុទ្ធបរិស័ទជិតឆ្ងាយក្នុងការចូលរួមចំណែកទ្រទ្រង់ព្រះពុទ្ធសាសនា និងការសិក្សារបស់សមណសិស្សក្រីក្រ។',
                          style: TextStyle(color: AppColors.lotusAmber, fontSize: 12, height: 1.5),
                        ),
                      ],
                    ),
                  ),
                  const SizedBox(height: 24),

                  // Bank Accounts Section
                  const Text(
                    'គណនីធនាគារ (KHQR Transfer)',
                    style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                  ),
                  const SizedBox(height: 12),

                  ...banks.map((b) => _buildBankCard(b as Map<String, dynamic>)),

                  const SizedBox(height: 20),

                  // Campaigns Section
                  if (campaigns.isNotEmpty) ...[
                    const Text(
                      'គម្រោងកសាង និងមូលនិធិសកម្ម',
                      style: TextStyle(fontSize: 16, fontWeight: FontWeight.bold, color: AppColors.maroonPrimary),
                    ),
                    const SizedBox(height: 12),
                    ...campaigns.map((c) => _buildCampaignCard(c as Map<String, dynamic>)),
                  ],

                  const SizedBox(height: 20),

                  // Contact & Location Card
                  Card(
                    child: Padding(
                      padding: const EdgeInsets.all(16),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          const Row(
                            children: [
                              Icon(Icons.location_on_rounded, color: AppColors.saffronDark, size: 20),
                              SizedBox(width: 8),
                              Text('ទីតាំងវត្តអារាម', style: TextStyle(fontWeight: FontWeight.bold, fontSize: 14)),
                            ],
                          ),
                          const SizedBox(height: 8),
                          const Text(
                            'ភូមិព្រៃស្ដី សង្កាត់ចោមចៅ២ ខណ្ឌពោធិ៍សែនជ័យ រាជធានីភ្នំពេញ',
                            style: TextStyle(fontSize: 12, color: AppColors.textDark),
                          ),
                          const SizedBox(height: 12),
                          Row(
                            children: [
                              Expanded(
                                child: OutlinedButton.icon(
                                  onPressed: () => _copyToClipboard('012 345 678', 'លេខទូរស័ព្ទ'),
                                  icon: const Icon(Icons.phone_rounded, size: 16),
                                  label: const Text('012 345 678'),
                                ),
                              ),
                              const SizedBox(width: 10),
                              Expanded(
                                child: ElevatedButton.icon(
                                  onPressed: () {
                                    ScaffoldMessenger.of(context).showSnackBar(
                                      const SnackBar(content: Text('កំពុងបើកផែនទី Google Maps...')),
                                    );
                                  },
                                  icon: const Icon(Icons.map_rounded, size: 16),
                                  label: const Text('មើលផែនទី'),
                                ),
                              ),
                            ],
                          )
                        ],
                      ),
                    ),
                  ),
                  const SizedBox(height: 30),
                ],
              ),
            ),
    );
  }

  Widget _buildBankCard(Map<String, dynamic> bank) {
    return Container(
      margin: const EdgeInsets.only(bottom: 12),
      padding: const EdgeInsets.all(14),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(14),
        border: Border.all(color: AppColors.borderLight),
        boxShadow: [
          BoxShadow(
            color: Colors.black.withValues(alpha: 0.03),
            blurRadius: 6,
            offset: const Offset(0, 2),
          ),
        ],
      ),
      child: Row(
        children: [
          Container(
            width: 46,
            height: 46,
            decoration: BoxDecoration(
              color: AppColors.saffronPrimary.withValues(alpha: 0.12),
              borderRadius: BorderRadius.circular(10),
            ),
            child: const Icon(Icons.account_balance_rounded, color: AppColors.saffronDark, size: 24),
          ),
          const SizedBox(width: 14),
          Expanded(
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  bank['bank_name'] ?? '',
                  style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 14, color: AppColors.maroonPrimary),
                ),
                Text(
                  bank['account_name'] ?? '',
                  style: const TextStyle(fontSize: 11, color: AppColors.textMuted),
                ),
                const SizedBox(height: 2),
                Text(
                  bank['account_number'] ?? '',
                  style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13, color: AppColors.saffronDark),
                ),
              ],
            ),
          ),
          Column(
            children: [
              IconButton(
                icon: const Icon(Icons.qr_code_rounded, color: AppColors.maroonPrimary),
                tooltip: 'KHQR Code',
                onPressed: () => _showQrDialog(bank),
              ),
              IconButton(
                icon: const Icon(Icons.copy_rounded, color: AppColors.saffronDark, size: 18),
                tooltip: 'ចម្លងលេខគណនី',
                onPressed: () => _copyToClipboard(bank['account_number'] ?? '', 'លេខគណនី'),
              ),
            ],
          ),
        ],
      ),
    );
  }

  Widget _buildCampaignCard(Map<String, dynamic> c) {
    return Card(
      margin: const EdgeInsets.only(bottom: 12),
      child: Padding(
        padding: const EdgeInsets.all(14),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.spaceBetween,
              children: [
                Expanded(
                  child: Text(
                    c['title'] ?? '',
                    style: const TextStyle(fontWeight: FontWeight.bold, fontSize: 13, color: AppColors.maroonPrimary),
                  ),
                ),
                Container(
                  padding: const EdgeInsets.symmetric(horizontal: 8, vertical: 3),
                  decoration: BoxDecoration(
                    color: Colors.green.shade50,
                    borderRadius: BorderRadius.circular(6),
                    border: Border.all(color: Colors.green.shade200),
                  ),
                  child: Text(
                    c['target_amount'] ?? '',
                    style: TextStyle(fontSize: 11, fontWeight: FontWeight.bold, color: Colors.green.shade800),
                  ),
                ),
              ],
            ),
            const SizedBox(height: 6),
            Text(
              c['description'] ?? '',
              style: const TextStyle(fontSize: 11, color: AppColors.textDark, height: 1.4),
            ),
          ],
        ),
      ),
    );
  }
}

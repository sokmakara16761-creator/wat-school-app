# វត្តធនរតនេសោភណារាម (ព្រៃស្ដី) និង ពុទ្ធិកបឋមសិក្សា - កម្មវិធីទូរស័ព្ទ (Mobile App)

កម្មវិធីទូរស័ព្ទផ្លូវការ **Wat School Mobile App** ត្រូវបានបង្កើតឡើងដោយប្រើប្រាស់ **Flutter** សម្រាប់ដំណើរការលើ Android, iOS និង Web ភ្ជាប់ជាមួយ **Laravel REST API**។

---

## ✨ លក្ខណៈពិសេសចម្បង (Key Features)

1. **ទំព័រដើម (Home Screen)**
   - ផ្ទាំង Banner ពុទ្ធសករាជ និងព័ត៌មានវត្ត
   - គតិធម៌អប់រំចិត្តប្រចាំថ្ងៃ (Daily Dhamma Quote)
   - ស្ថិតិសមណសិស្ស ថ្នាក់រៀន និងសមណគ្រូ
   - កម្មវិធីបុណ្យទានខាងមុខ & ព័ត៌មានថ្មីៗ

2. **ពុទ្ធិកបឋមសិក្សា (School Screen)**
   - កម្មវិធីសិក្សា ៣ ឆ្នាំ (ថ្នាក់ត្រី ថ្នាក់ទោ ថ្នាក់ឯ)
   - បញ្ជីរាយនាមសមណគ្រូ និងមុខវិជ្ជាបង្រៀន
   - តារាងកិត្តិយសសមណសិស្សឆ្នើម

3. **ចុះឈ្មោះចូលរៀនអនឡាញ (Online Admissions)**
   - បំពេញពាក្យសុំចុះឈ្មោះចូលរៀន និងបញ្ជូនផ្ទាល់ទៅកាន់ Laravel API Server
   - មានការត្រួតពិនិត្យទិន្នន័យ (Form Validation) ត្រឹមត្រូវ

4. **បណ្ណាល័យព្រះធម៌ (Dhamma Library)**
   - ស្ដាប់សំឡេងធម៌ទេសនា (Interactive Audio Player)
   - អានអត្ថបទធម៌ និងគតិអប់រំចិត្ត
   - ស្វែងរក និងច្រោះតាមប្រភេទ

5. **កម្មវិធីបុណ្យទាន (Events & Ceremonies)**
   - កាលវិភាគបុណ្យសាសនា និងកាលបរិច្ឆេទខ្មែរ
   - មុខងារដាក់ការរំឭក (Event Reminder)

6. **កុសលបរិច្ចាគ (Donations & KHQR)**
   - បង្ហាញលេខគណនីធនាគារ (ABA, ACLEDA, Wing)
   - ស្កេន KHQR Code Bakong ផ្ទាល់
   - ចម្លងលេខគណនីដោយចុចតែមួយប៉ក់ (One-tap Copy)

7. **ការរចនា និងភាពងាយស្រួល (Design & Accessibility)**
   - ពណ៌បែបព្រះពុទ្ធសាសនា ពណ៌លឿងទុំ (Saffron Gold) និងពណ៌ក្រហមឈាមជ្រូក (Royal Maroon)
   - អក្សរខ្មែរស្រួលអាន (Kantumruy Pro, Battambang, Siemreap)
   - គាំទ្រ Dark Mode / Light Mode
   - ដំណើរការបានទាំង **Online (ភ្ជាប់ API)** និង **Offline (ទិន្នន័យបម្រុងទុក)**

---

## 🚀 របៀបដំណើរការ (How to Run)

### ១. បើកដំណើរការ Laravel Backend Server
នៅក្នុង Folder Root នៃគម្រោង៖
```bash
php artisan serve
```
*(Server នឹងដំណើរការនៅ `http://localhost:8000`)*

### ២. បើកដំណើរការ Flutter Mobile App
ចូលទៅកាន់ Folder `mobile_app`៖
```bash
cd mobile_app
flutter pub get
flutter run
```

> **ចំណាំសម្រាប់អ្នកប្រើ Android Emulator៖**
> API URL លំនាំដើមសម្រាប់ Android Emulator គឺ `http://10.0.2.2:8000/api`។
> លោកអ្នកអាចចុច Menu Drawer ខាងឆ្វេង -> **កំណត់ Server API URL** ដើម្បីប្តូរ URL តាមតម្រូវការ។

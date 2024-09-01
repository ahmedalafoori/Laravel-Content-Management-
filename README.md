# نظام إدارة المحتوى

## نظرة عامة

هذا المشروع هو نظام إدارة محتوى (CMS) مبني باستخدام إطار العمل Laravel. يوفر منصة قوية وسهلة الاستخدام لإنشاء وإدارة ومشاركة المحتوى الرقمي، مع التركيز على المرونة والأمان وسهولة الاستخدام.

## الميزات الرئيسية

1. **إدارة المستخدمين**: 
   - تسجيل المستخدمين وتسجيل الدخول
   - إدارة الصلاحيات والأدوار

2. **إدارة المنشورات**:
   - إنشاء وتحرير وحذف المنشورات
   - دعم المحتوى الغني (Rich Text)

3. **إدارة الوسائط**:
   - رفع وإدارة الصور والملفات
   - ربط الوسائط بالمنشورات

4. **التصنيفات**:
   - إنشاء وإدارة فئات للمنشورات
   - تصنيف المنشورات لسهولة التنظيم والبحث

5. **البحث**:
   - خاصية البحث المتقدم في المحتوى

6. **واجهة مستخدم سهلة الاستخدام**:
   - تصميم متجاوب يعمل على مختلف الأجهزة
   - لوحة تحكم بديهية للمستخدمين والمشرفين

7. **الأمان**:
   - حماية ضد هجمات CSRF و XSS
   - تشفير البيانات الحساسة

## التقنيات المستخدمة

- **لغة البرمجة**: PHP 8.x
- **إطار العمل**: Laravel 10.x
- **قاعدة البيانات**: MySQL
- **الواجهة الأمامية**: 
  - HTML5, CSS3, JavaScript
  - Bootstrap 5 للتصميم المتجاوب
  - Blade كمحرك قوالب
- **إدارة الاعتماديات**: Composer للـ PHP, NPM للـ JavaScript
- **التخزين**: استخدام نظام الملفات المحلي لتخزين الوسائط

## متطلبات النظام

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js >= 14.x و NPM
- خادم ويب (Apache أو Nginx)

## التثبيت والإعداد

1. **استنساخ المستودع**:
2. 
2. **تثبيت اعتماديات PHP**:
3. 
3. **إعداد ملف البيئة**:
- انسخ ملف `.env.example` إلى `.env`
- قم بتعديل إعدادات قاعدة البيانات في ملف `.env`

4. **توليد مفتاح التطبيق**:

5. **تشغيل الترحيلات وزراعة البيانات**:


6. **تثبيت وبناء أصول الواجهة الأمامية**:


7. **إنشاء رابط رمزي للتخزين**:


3. افتح المتصفح وانتقل إلى `http://localhost:8000`

ملاحظة: تأكد من تشغيل `npm run dev` في الخلفية أثناء التطوير لضمان تحديث الأصول الأمامية تلقائيًا عند إجراء تغييرات.

للإنتاج، استخدم `npm run build` بدلاً من ذلك لإنشاء نسخة مضغوطة ومحسنة من الأصول الأمامية.


![Screenshot (383)](https://github.com/user-attachments/assets/9048836b-801e-4480-9427-40cd592a307f)
![Screenshot (382)](https://github.com/user-attachments/assets/b8075cfa-8593-4539-a2c2-ca7acdeefd46)
![Screenshot (381)](https://github.com/user-attachments/assets/f2c086eb-514d-4b0c-b5b5-31dba4331ca8)
![Screenshot (380)](https://github.com/user-attachments/assets/3e1bb1ec-23e7-46d9-a47e-1b8518ee8f3a)
![Screenshot (379)](https://github.com/user-attachments/assets/26304267-25c4-4b73-8e65-ac298f76876b)
![Screenshot (378)](https://github.com/user-attachments/assets/23dda4e7-6c16-4166-bb69-afef896abb4c)
![Screenshot (377)](https://github.com/user-attachments/assets/c466b65a-cf23-4b0a-a867-d5bc98a259c4)
![Screenshot (374)](https://github.com/user-attachments/assets/5dd3f9db-5b36-4626-ba0a-2e5aec69ad75)
![Screenshot (373)](https://github.com/user-attachments/assets/da66243a-7df9-42a8-995a-50d562ce7f9e)
![Screenshot (372)](https://github.com/user-attachments/assets/419d81b1-39be-4fd7-ada4-fa3bf8b25bfa)
![Screenshot (371)](https://github.com/user-attachments/assets/eb744615-fe92-4323-8f65-9dbbbe9a355a)
![Screenshot (370)](https://github.com/user-attachments/assets/f2d65a28-a336-4c45-9df5-a4a5b6930e99)
![Screenshot (369)](https://github.com/user-attachments/assets/a3dcf856-6a49-4fb5-a062-94e1cf7b7658)
![Screenshot (368)](https://github.com/user-attachments/assets/cdeac5a8-389b-4dfe-beef-281a4dcfb5b8)
![Screenshot (367)](https://github.com/user-attachments/assets/58786001-ef66-4d9a-a4ee-7620b9bf7330)
![Screenshot (366)](https://github.com/user-attachments/assets/6052d492-6520-412f-951a-928279926de1)
![Screenshot (375)](https://github.com/user-attachments/assets/1a8effe8-c038-4880-9999-b0b499821e22)
![Screenshot (365)](https://github.com/user-attachments/assets/1d9a75ad-b7b3-4f5e-b8e4-99cd8d76902e)
![Screenshot (376)](https://github.com/user-attachments/assets/4b57fcaa-734e-4029-934b-03be17a5c147)
![Screenshot (385)](https://github.com/user-attachments/assets/c651a708-933d-408c-8567-6c3258c6f17e)
![Screenshot (384)](https://github.com/user-attachments/assets/ef91bc7f-f1b6-4b2b-8e76-a0fa6c6fb39f)

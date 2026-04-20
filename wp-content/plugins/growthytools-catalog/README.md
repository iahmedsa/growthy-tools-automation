# GrowthyTools Catalog Plugin

إضافة Companion مسؤولة عن إدارة بيانات القوالب داخل WordPress بشكل قابل للنقل بين الثيمات.

## ما الذي تضيفه؟
- نوع منشور مخصص: `gt_template` (القوالب)
- تصنيفات القوالب والمجالات
- Meta boxes لإدارة البيانات البيعية، التراخيص، وروابط الشراء المباشر
- أعمدة إدارية مخصصة
- helper لإضافة بيانات تجريبية

## التثبيت
1. ضع المجلد `growthytools-catalog` في `wp-content/plugins/`
2. فعّل الإضافة من لوحة التحكم
3. فعّل قالب `growthytools`

## بيانات تجريبية
يمكنك تنفيذ endpoint إداري آمن بإرسال طلب:
`/wp-admin/admin-post.php?action=gt_catalog_seed&_wpnonce=<nonce>`

(أنشئ nonce باستخدام `wp_nonce_url` داخل لوحة التحكم أو أداة مخصصة.)

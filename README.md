# Music App

Supabase destekli, GitHub Pages uyumlu modern müzik paylaşım platformu.

Bu proje; kullanıcı sistemi, admin paneli, müzik yükleme sistemi ve Supabase Storage entegrasyonu bulunan statik bir müzik uygulamasıdır.

## 🌍 Özellikler

- Kullanıcı kayıt & giriş sistemi
- Admin paneli
- Müzik yükleme sistemi
- Şarkı düzenleme
- Şarkı gizleme / yayına alma
- Şarkı silme sistemi
- Album cover yükleme
- Supabase Storage entegrasyonu
- Responsive tasarım
- GitHub Pages desteği
- Tamamen statik frontend mimarisi

---

# 🚀 Kullanılan Teknolojiler

<p align="left">
  <img src="https://img.shields.io/badge/HTML-E34F26?style=for-the-badge&logo=html5&logoColor=white">
  <img src="https://img.shields.io/badge/CSS-1572B6?style=for-the-badge&logo=css3&logoColor=white">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black">
  <img src="https://img.shields.io/badge/Supabase-3FCF8E?style=for-the-badge&logo=supabase&logoColor=white">
  <img src="https://img.shields.io/badge/GitHub_Pages-121013?style=for-the-badge&logo=github&logoColor=white">
</p>

---

# 📂 Proje Yapısı

```text
.
├── css/
├── js/
├── uploaded_music/
├── uploaded_album/
├── supabase/
│   ├── schema.sql
│   ├── seed-songs.sql
│   └── admin-actions-policies.sql
├── index.html
├── login.html
├── admin.html
└── upload.html
```

---

# ⚙️ GitHub Pages Yayına Alma

## GitHub Desktop ile Yayınlama

1. GitHub Desktop açın.
2. `File > Add local repository` seçeneğine girin.
3. Proje klasörünü seçin.
4. Repository GitHub’da yoksa:

```text
Publish repository
```

butonuna basın.

5. GitHub repository ayarlarından:

```text
Settings > Pages
```

ekranına girin.

6. Aşağıdaki ayarları yapın:

```text
Deploy from a branch
Branch: main
Folder: /root
```

7. Kaydedin.

GitHub Pages adresiniz genellikle şu formatta olur:

```text
https://username.github.io/repository-name/
```

---

# 🔑 Supabase Ayarları

Projede Supabase bağlantısı hazır şekilde bulunmaktadır.

Yeni bir Supabase projesi kullanacaksanız:

```text
js/supabase-config.js
```

dosyasını düzenleyin.

```js
window.MUSIC_SUPABASE_CONFIG = {
    url: 'https://PROJECT_ID.supabase.co',
    anonKey: 'SUPABASE_ANON_KEY',
    storageBucket: 'music-files'
};
```

⚠️ Güvenlik nedeniyle:

- `service_role`
- `secret key`
- `.env`

dosyalarını GitHub’a yüklemeyin.

---

# 🛠️ Supabase SQL Kurulumu

Supabase Dashboard üzerinden:

```text
SQL Editor
```

ekranına girin.

Sırasıyla çalıştırın:

```text
1. supabase/schema.sql
2. supabase/seed-songs.sql
3. supabase/admin-actions-policies.sql
```

---

# 👑 Admin Yetkisi Verme

İlk hesabınızı oluşturduktan sonra SQL Editor üzerinden:

```sql
update public.profiles
set role = 'admin'
where email = 'your-email@example.com';
```

sorgusunu çalıştırın.

---

# 🔐 Authentication URL Ayarı

Supabase Dashboard:

```text
Authentication > URL Configuration
```

ekranına girin.

GitHub Pages adresinizi ekleyin.

Örnek:

```text
https://username.github.io/repository-name/
https://username.github.io/repository-name/login.html
https://username.github.io/repository-name/admin.html
https://username.github.io/repository-name/upload.html
```

---

# 🎵 Dosya Sistemi

- Eski müzik dosyaları:

```text
uploaded_music/
```

- Album cover dosyaları:

```text
uploaded_album/
```

klasörlerinde tutulur.

Yeni yüklenen dosyalar:

```text
music-files
```

Supabase Storage bucket’ına kaydedilir.

---

# 📦 Proje Boyutu

- Toplam proje boyutu yaklaşık:

```text
137 MB
```

- GitHub yükleme limitleriyle uyumludur.
- En büyük dosya GitHub’ın 100 MB sınırını aşmaz.

---

# 🎯 Proje Amacı

Bu proje;

- Modern müzik platformu geliştirmek
- Supabase Authentication sistemi kullanmak
- Storage yönetimini öğrenmek
- Static frontend mimarisi oluşturmak
- GitHub Pages üzerinde dinamik yapı kurmak

amacıyla geliştirilmiştir.

---

# 📄 License

This project is licensed under the MIT License.

For more details:
<a href="LICENSE">LICENSE</a>

---

Made with ❤️ by Arda Altunel
